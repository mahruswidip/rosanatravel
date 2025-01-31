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
            'token' => '007eJxTYHjh2S/eNqVGxP78IT0987j5ffpn/3AvLemXdjeR6uxf9k+BwcTQwNDSzNAyzdjc1MTYPC3R0sQwxTzF0tI0yTLN0MD4Y+ec9IZARgaVeeUMjFAI4vMwFOUXJ+YllhQllqXmMDAAAM2aISU=',
            'channelId' => 'rosanatravel'
        ];

        header('Content-Type: application/json');
        echo json_encode($config);
    }
}
