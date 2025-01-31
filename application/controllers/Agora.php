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
            'token' => '007eJxTYFjxrPb56bmT2t58UJVZumgJx1MO53R/7a4LeX2Cz6J+2i9VYDAxNDC0NDO0TDM2NzUxNk9LtDQxTDFPsbQ0TbJMMzQw9pvUkN4QyMgQeC6UmZEBAkF8Hoai/OLEvMSSosSy1BwGBgC5+SM+',
            'channelId' => 'rosanatravel'
        ];

        header('Content-Type: application/json');
        echo json_encode($config);
    }
}
