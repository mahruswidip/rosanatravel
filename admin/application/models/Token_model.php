<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get token by id
     */
    function get_token($id)
    {
        return $this->db->get_where('token', array('id' => $id))->row_array();
    }

    /*
     * Get all tokens count
     */
    function get_all_tokens_count()
    {
        $this->db->from('token');
        return $this->db->count_all_results();
    }

    /*
     * Get all tokens
     */
    function get_all_tokens($params = array())
    {
        $this->db->order_by('id', 'ASC');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('token')->result_array();
    }

    /*
     * Add new token
     */
    function add_token($params)
    {
        $this->db->insert('token', $params);
        $this->rearrange_ids(); // Urutkan ulang ID setelah menambah data
        return $this->db->insert_id();
    }

    /*
     * Update token
     */
    function update_token($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('token', $params);
    }

    /*
     * Delete token
     */
    function delete_token($id)
    {
        $this->db->delete('token', array('id' => $id));
        $this->rearrange_ids(); // Urutkan ulang ID setelah menghapus data
    }

    /*
     * Rearrange ID after deletion
     */
    private function rearrange_ids()
    {
        // Ambil semua data token dan urutkan berdasarkan ID
        $tokens = $this->db->order_by('id', 'ASC')->get('token')->result_array();

        // Reset ID mulai dari 1
        $new_id = 1;
        foreach ($tokens as $token) {
            $this->db->where('id', $token['id']);
            $this->db->update('token', ['id' => $new_id]);
            $new_id++;
        }

        // Reset AUTO_INCREMENT ke ID terakhir yang digunakan
        $this->db->query("ALTER TABLE token AUTO_INCREMENT = $new_id");
    }
}
