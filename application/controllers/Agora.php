<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agora extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_config()
    {
        // Konfigurasi Agora yang bisa diubah dari backend
        $config = [
            'appId' => '41019619f375437fa941d7d995b9f103', // Ganti dengan App ID yang benar
            'token' => '007eJxTYPghcShbbOKfLy/NropNvOLXf3Oib7p4EIPuv5rtG5t8uxUVGAyMTYwtktISk41NTE1S00wsUkxNTdKSTC0Mk42MLY2SPm7dlt4QyMjwJ9+ElZEBAkF8Hoai/OLEvMSSosSy1BwGBgDAAiQx',
            'channelId' => 'rosanatravel'
        ];

        header('Content-Type: application/json');
        echo json_encode($config);
    }
}
