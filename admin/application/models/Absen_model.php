<?php

class Absen_model extends CI_Model
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
}
