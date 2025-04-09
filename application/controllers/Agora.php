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
        // Ambil token terbaru dari database (bisa pakai LIMIT 1 atau ORDER BY id DESC)
        $query = $this->db->get_where('token', ['channel_id' => 'rosanatravel'], 1);
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
