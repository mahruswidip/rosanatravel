<?php
class AbsenAdmin_model extends CI_Model
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
            tbl_users.pass,
            kantor_cabang.kota,
            karyawan.nomor_hp
        ');
        $this->db->from('karyawan');
        $this->db->join('tbl_users', 'karyawan.fk_id_user = tbl_users.user_id', 'left');
        $this->db->join('kantor_cabang', 'karyawan.fk_id_kantor = kantor_cabang.id_kantor', 'left');

        if (isset($params['limit']) && isset($params['offset'])) {
            $this->db->limit($params['limit'], $params['offset']);
        }

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
            $this->reorder_karyawan_ids();
        }
    }
    public function reorder_karyawan_ids()
    {
        $this->db->query("SET @num := 0;");
        $this->db->query("UPDATE karyawan SET id_karyawan = (@num := @num + 1) ORDER BY id_karyawan;");
        $this->db->query("ALTER TABLE karyawan AUTO_INCREMENT = 1;");
    }
    
    public function update_user($user_id, $data)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->update('tbl_users', $data);
    }

}