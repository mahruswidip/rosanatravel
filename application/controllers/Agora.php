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
            'token' => '007eJxTYPh/0Ja3ujZlZxvv9omrlq8Lbrzt7B0rV5J30ey75O06NQEFBgNjE2OLpLTEZGMTU5PUNBOLFFNTk7QkUwvDZCNjS6OkgzfupDcEMjK0NZxnZGSAQBCfh6EovzgxL7GkKLEsNYeBAQBsoiOE',
            'channelId' => 'rosanatravel'
        ];

        header('Content-Type: application/json');
        echo json_encode($config);
    }
}
