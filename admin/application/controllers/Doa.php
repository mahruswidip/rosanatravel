<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model jika Anda menggunakan model untuk mengambil data
        $this->load->model('Doa_model'); // Pastikan Anda memiliki model ini
    }

    public function index()
    {
        // Ambil data doa dari model
        $doaList = $this->Doa_model->get_all_doa();

        // Mengembalikan data dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['data' => $doaList]));
    }
}
