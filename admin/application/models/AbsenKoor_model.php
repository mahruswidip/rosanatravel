<?php
class AbsenKoor_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_karyawan_count()
    {
        return $this->db->count_all('karyawan');
    }
    public function get_all_karyawan($params = array())
    {
        $this->db->select('
            karyawan.id_karyawan,
            tbl_users.user_name,
            tbl_users.user_email,
            kantor_cabang.kota,
            karyawan.nomor_hp
        ');
        $this->db->from('karyawan');
        $this->db->join('tbl_users', 'karyawan.fk_id_user = tbl_users.user_id', 'left');
        $this->db->join('kantor_cabang', 'karyawan.fk_id_kantor = kantor_cabang.id_kantor', 'left');
        
        return $this->db->get()->result_array();
    }
    public function get_karyawan($id_karyawan)
    {
        $this->db->select('
            karyawan.id_karyawan,
            karyawan.fk_id_user,
            tbl_users.user_name,
            tbl_users.user_email,
            tbl_users.pass,
            karyawan.fk_id_kantor,
            kantor_cabang.kota,
            karyawan.nomor_hp
        ');
        $this->db->from('karyawan');
        $this->db->join('tbl_users', 'karyawan.fk_id_user = tbl_users.user_id', 'left');
        $this->db->join('kantor_cabang', 'karyawan.fk_id_kantor = kantor_cabang.id_kantor', 'left');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);
    
        return $this->db->get()->row_array();
    }
    public function get_kantor_cabang()
    {
        $this->db->select('id_kantor, kota');
        $this->db->from('kantor_cabang');
        return $this->db->get()->result();
    }
    public function insert_user($data)
    {
        $this->db->insert('tbl_users', $data);
        return $this->db->insert_id();
    }
    public function insert_karyawan($data)
    {
        return $this->db->insert('karyawan', $data);
    }
    public function update_karyawan($id_karyawan, $data)
    {
        $this->db->where('id_karyawan', $id_karyawan);
        return $this->db->update('karyawan', $data);
    }
    public function delete_karyawan($id_karyawan)
    {
        $this->db->select('fk_id_user');
        $this->db->where('id_karyawan', $id_karyawan);
        $query = $this->db->get('karyawan');
        $result = $query->row();
        if ($result) {
            $fk_id_user = $result->fk_id_user;
            $this->db->delete('karyawan', array('id_karyawan' => $id_karyawan));
            if (!empty($fk_id_user)) {
                $this->db->delete('tbl_users', array('user_id' => $fk_id_user));
            }
            // $this->reorder_karyawan_ids();
        }
    }
    // public function reorder_karyawan_ids()
    // {
    //     $this->db->query("SET @num := 0;");
    //     $this->db->query("UPDATE karyawan SET id_karyawan = (@num := @num + 1) ORDER BY id_karyawan;");
    //     $this->db->query("ALTER TABLE karyawan AUTO_INCREMENT = 1;");
    // }
    
    public function update_user($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update('tbl_users', $data);
    }
    public function get_all_presensi_count()
    {
        return $this->db->count_all('absensi_karyawan');
    }

    public function get_all_presensi($params= array(), $tanggal = null, $kota = null, $nama_pegawai = null)
    {
        $this->db->select('
            absensi_karyawan.*, 
            karyawan.nama_karyawan, 
            kantor_cabang.kota
        ');
        $this->db->from('absensi_karyawan');
        $this->db->join('karyawan', 'karyawan.id_karyawan = absensi_karyawan.fk_id_karyawan', 'left');
        $this->db->join('kantor_cabang', 'karyawan.fk_id_kantor = kantor_cabang.id_kantor', 'left');
        if (!empty($tanggal)) {
            $dates = explode(' s.d. ', $tanggal);
            if (count($dates) == 2) {
                $this->db->where('DATE(waktu_absen) >=', date('Y-m-d', strtotime(str_replace('-', '/', $dates[0]))));
                $this->db->where('DATE(waktu_absen) <=', date('Y-m-d', strtotime(str_replace('-', '/', $dates[1]))));
            }
        }
        if (!empty($kota)) {
            $this->db->where('karyawan.fk_id_kantor', $kota);
        }

        if (!empty($nama_pegawai)) {
            $this->db->where('karyawan.id_karyawan', $nama_pegawai);
        }

        $this->db->order_by('waktu_absen', 'DESC');
        return $this->db->get()->result_array();
    }
    public function get_all_cabang()
    {
        $this->db->select('id_kantor, kota');
        $this->db->from('kantor_cabang');
        return $this->db->get()->result_array();
    }
    public function get_all_karyawan_log()
    {
        $this->db->select('id_karyawan, nama_karyawan');
        $this->db->from('karyawan');
        return $this->db->get()->result_array();
    }
    public function get_filtered_absen($tanggal_awal = null, $tanggal_akhir = null, $cabang = null, $nama_pegawai = null) {
        $this->db->select("
            DATE(waktu_absen) as tanggal,
            nama_karyawan,
            karyawan.id_karyawan,
            kantor_cabang.kota as cabang,
            
            (SELECT waktu_absen FROM absensi_karyawan AS a 
             WHERE a.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND a.tipe_absen = 'Masuk' 
             AND DATE(a.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY a.waktu_absen DESC LIMIT 1) AS masuk,
    
            (SELECT waktu_absen FROM absensi_karyawan AS b 
             WHERE b.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND b.tipe_absen = 'Pulang' 
             AND DATE(b.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY b.waktu_absen DESC LIMIT 1) AS pulang,
    
            (SELECT foto_absen FROM absensi_karyawan AS a 
             WHERE a.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND a.tipe_absen = 'Masuk' 
             AND DATE(a.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY a.waktu_absen DESC LIMIT 1) AS foto_masuk,
    
            (SELECT foto_absen FROM absensi_karyawan AS b 
             WHERE b.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND b.tipe_absen = 'Pulang' 
             AND DATE(b.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY b.waktu_absen DESC LIMIT 1) AS foto_pulang,
    
            (SELECT CONCAT('Lat: ', lokasi_lat) FROM absensi_karyawan AS a 
             WHERE a.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND a.tipe_absen = 'Masuk' 
             AND DATE(a.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY a.waktu_absen DESC LIMIT 1) AS lokasi_masuk,
    
            (SELECT CONCAT('Lat: ', lokasi_lat) FROM absensi_karyawan AS b 
             WHERE b.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND b.tipe_absen = 'Pulang' 
             AND DATE(b.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY b.waktu_absen DESC LIMIT 1) AS lokasi_pulang,
             
             (SELECT CASE 
                WHEN TIME(a.waktu_absen) < '08:00:00' THEN '<span class=\"badge bg-success\">Masuk</span>'
                ELSE '<span class=\"badge bg-danger\">Terlambat</span>'
            END FROM absensi_karyawan AS a 
             WHERE a.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND a.tipe_absen = 'Masuk' 
             AND DATE(a.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY a.waktu_absen DESC LIMIT 1) AS status_masuk,
    
            (SELECT CASE 
                WHEN TIME(b.waktu_absen) >= '16:00:00' THEN '<span class=\"badge bg-primary\">Pulang</span>'
                ELSE '<span class=\"badge bg-warning\">Pulang Dulu</span>'
            END FROM absensi_karyawan AS b 
             WHERE b.fk_id_karyawan = absensi_karyawan.fk_id_karyawan 
             AND b.tipe_absen = 'Pulang' 
             AND DATE(b.waktu_absen) = DATE(absensi_karyawan.waktu_absen) 
             ORDER BY b.waktu_absen DESC LIMIT 1) AS status_pulang
        ");
    
        $this->db->from('absensi_karyawan');
        $this->db->join('karyawan', 'karyawan.id_karyawan = absensi_karyawan.fk_id_karyawan', 'left');
        $this->db->join('kantor_cabang', 'karyawan.fk_id_kantor = kantor_cabang.id_kantor', 'left');
    
        if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
            $this->db->where("DATE(waktu_absen) >=", $tanggal_awal);
            $this->db->where("DATE(waktu_absen) <=", $tanggal_akhir);
        }
    
        if (!empty($nama_pegawai)) {
            $this->db->where('karyawan.id_karyawan', $nama_pegawai);
        }
    
        if (!empty($cabang)) {
            $this->db->where('kantor_cabang.id_kantor', $cabang);
        }
    
        $this->db->group_by(['nama_karyawan', 'DATE(waktu_absen)']);
        $this->db->order_by('tanggal', 'DESC');
    
        $query = $this->db->get();
        log_message('debug', 'Query executed: ' . $this->db->last_query());
        $this->db->limit($limit, $start); 
        return $query->result_array();
    }    
    public function getIzin() {
        $this->db->select('
            pengajuan_izin.id_pengajuan,
            karyawan.nama_karyawan,
            pengajuan_izin.jenis_pengajuan,
            pengajuan_izin.tanggal_mulai,
            pengajuan_izin.tanggal_selesai,
            kantor_cabang.kota AS nama_cabang,
            pengajuan_izin.alasan,
            pengajuan_izin.lampiran,
            pengajuan_izin.status_pengajuan
        ');
        $this->db->from('pengajuan_izin');
        $this->db->join('karyawan', 'pengajuan_izin.fk_id_karyawan = karyawan.id_karyawan');
        $this->db->join('kantor_cabang', 'pengajuan_izin.fk_id_kantor = kantor_cabang.id_kantor', 'left');
        return $this->db->get()->result_array();
    }

    public function updateStatus($id, $status) {
        // Validasi status
        $allowed_statuses = ['Disetujui', 'Ditolak'];
        if (!in_array($status, $allowed_statuses)) {
            return false;
        }
    
        // Update database
        $this->db->where('id_pengajuan', $id);
        return $this->db->update('pengajuan_izin', ['status_pengajuan' => $status]);
    }
}