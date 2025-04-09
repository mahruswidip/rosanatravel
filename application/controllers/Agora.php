<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agora extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Pastikan database diload
    }

    // public function get_config()
    // {
    //     // Konfigurasi Agora yang bisa diubah dari backend
    //     $config = [
    //         'appId' => '03438bfac3454ef48d554fb581c2392b', // Ganti dengan App ID yang benar
    //         'token' => '007eJxTYPir/rtXbqaN1IWKD2mntG9F/Hq6S3OZYP9L1j2yazj1+lYpMBgYmxhbJKUlJhubmJqkpplYpJiamqQlmVoYJhsZWxolFf76mt4QyMjAefw0CyMDBIL4PAxF+cWJeYklRYllqTkMDADMkyRn',
    //         'channelId' => 'rosanatravel'
    //     ];

    //     header('Content-Type: application/json');
    //     echo json_encode($config);
    // }
    public function get_config()
    {
        $this->db->where('channel_id', 'rosanatravel');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('token');
        $row = $query->row();

        if ($row) {
            $config = [
                'appId' => $row->app_id,
                'token' => $row->token,
                'channelId' => $row->channel_id
            ];
        } else {
            $config = [
                'error' => 'Token tidak ditemukan untuk channel rosanatravel'
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($config);
    }
}
