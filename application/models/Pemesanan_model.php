<?php

class Pemesanan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get pemesanan by id_pemesanan
     */
    function get_pemesanan($id_pemesanan)
    {
        return $this->db->get_where('pemesanan', array('id_pemesanan' => $id_pemesanan))->row_array();
    }

    function get_pemesanan_uuid($uuid)
    {
        return $this->db->get_where('pendaftar', array('uuid' => $uuid))->row_array();
    }

    /*
     * Get all pemesanan count
     */
    function get_all_pemesanan_count()
    {
        $this->db->from('pemesanan');
        return $this->db->count_all_results();
    }

    /*
     * Get all pemesanan
     */
    function get_all_pemesanan($params = array())
    {
        $this->db->order_by('pemesanan.id_pemesanan', 'desc');
        // $this->db->join('tbl_users', 'tbl_users.id_pemesanan=pemesanan.id_pemesanan', 'left');
        if (isset($params) && !empty($params)) {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('pemesanan')->result_array();
    }

    function get_users_by_created_by($user_id)
    {
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan=tbl_users.id_pemesanan', 'left');
        return $this->db->get_where('tbl_users', array('created_by' => $user_id))->result_array();
    }

    /*
     * function to add new pemesanan
     */

    function add_pemesan($params)
    {
        $this->db->set('nik', $params['nik']);
        $this->db->set('uuid', $params['uuid']);
        // $this->db->set('uuid', 'UUID_SHORT()', FALSE);
        $this->db->set('nama_pendaftar', $params['nama_pendaftar']);
        $this->db->set('jenis_kelamin', $params['jenis_kelamin']);
        $this->db->set('email', $params['email']);
        $this->db->set('nomor_telepon', $params['nomor_telepon']);
        $this->db->set('alamat', $params['alamat']);
        $this->db->set('pesan_apa', $params['pesan_apa']);
        $this->db->set('berapa_orang', $params['berapa_orang']);
        $this->db->set('request', $params['request']);
        $this->db->set('qr_code', $params['qr_code']);
        $this->db->insert('pendaftar');
    }

    /*
     * function to update pemesanan
     */
    function update_pemesanan($id_pemesanan, $params)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->update('pemesanan', $params);
    }

    /*
     * function to delete pemesanan
     */
    function delete_pemesanan($id_pemesanan)
    {
        return $this->db->delete('pemesanan', array('id_pemesanan' => $id_pemesanan));
    }
}
