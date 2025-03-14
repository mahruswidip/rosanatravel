<?php

class Absensi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get absensi by id_absensi
     */
    function get_absensi($id_absensi)
    {
        return $this->db->get_where('absensi', array('id_absensi' => $id_absensi))->row_array();
    }

    /*
     * Get all absensi count
     */
    function get_all_absensi_count()
    {
        $this->db->from('absensi');
        return $this->db->count_all_results();
    }

    /*
     * Get all absensi
     */
    function get_all_absensi($params = array())
    {
        $this->db->order_by('absensi.id_absensi', 'desc');
        // $this->db->join('tbl_users', 'tbl_users.id_absensi=absensi.id_absensi', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('absensi')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('absensi', 'absensi.id_absensi=tbl_users.id_absensi', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new absensi
     */
    public function add_absensi($params, $gambar)
    {
        $data = array(
            'kategori' => $params['kategori'],
            'travel' => $params['travel'],
            'judul_absensi' => $params['judul_absensi'],
            'konten' => $params['konten'],
            'absensi_img' => $gambar
        );

        $this->db->insert('absensi', $data);
    }

    /*
     * function to update absensi
     */

    public function update_absensi($id_absensi, $data)
    {
        // Update data absensi berdasarkan ID
        $this->db->where('id_absensi', $id_absensi);
        $this->db->update('absensi', $data);
    }

    public function edit_absensi($id, $data)
    {
        $this->db->where('id_absensi', $id);
        $this->db->update('absensi', $data);
    }

    /*
     * function to delete absensi
     */
    function delete_absensi($id_absensi)
    {
        return $this->db->delete('absensi', array('id_absensi' => $id_absensi));
    }

    public function get_absensi_by_karyawan($fk_id_karyawan)
    {
        return $this->db->where('fk_id_karyawan', $fk_id_karyawan)
            ->order_by('waktu_absen', 'DESC')
            ->get('absensi_karyawan')
            ->result();
    }

    public function cek_radius_absensi($lat_absen, $lng_absen, $id_kantor)
    {
        // Ambil koordinat kantor cabang berdasarkan ID kantor
        $this->db->select("lokasi_lat, lokasi_lng");
        $this->db->from("kantor_cabang");
        $this->db->where("id_kantor", $id_kantor);
        $kantor = $this->db->get()->row();

        if ($kantor) {
            $lat_kantor = $kantor->lokasi_lat;
            $lng_kantor = $kantor->lokasi_lng;

            // Perhitungan Haversine Formula dalam PHP
            $earth_radius = 6371; // Radius bumi dalam km

            $dLat = deg2rad($lat_absen - $lat_kantor);
            $dLng = deg2rad($lng_absen - $lng_kantor);

            $a = sin($dLat / 2) * sin($dLat / 2) +
                cos(deg2rad($lat_kantor)) * cos(deg2rad($lat_absen)) *
                sin($dLng / 2) * sin($dLng / 2);

            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
            $distance = $earth_radius * $c * 1000; // Hasil dalam meter

            return ($distance <= 20); // True jika dalam radius 20m, false jika di luar
        }
        return false;
    }

    public function getIzinByKaryawan($id_karyawan)
    {
        $this->db->where('fk_id_karyawan', $id_karyawan);
        $this->db->order_by('tanggal_pengajuan', 'DESC');
        return $this->db->get('pengajuan_izin')->result_array();
    }

    public function ajukanIzin($data)
    {
        return $this->db->insert('pengajuan_izin', $data);
    }

    public function getAllIzin()
    {
        return $this->db->get('pengajuan_izin')->result();
    }

    public function updateStatusIzin($id, $status)
    {
        return $this->db->where('id_pengajuan', $id)->update('pengajuan_izin', ['status_pengajuan' => $status]);
    }
}
