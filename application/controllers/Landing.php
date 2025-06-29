<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Landing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');
    }

    function index()
    {
        $data['paket'] = $this->Paket_model->get_all_paket();
        $data['paket_terbaru'] = $this->Paket_model->get_paket_terbaru();
        $data['galeri'] = $this->Paket_model->get_all_galeri();
        $data['artikel'] = $this->Paket_model->get_artikel_rosana_only();

        echo '<pre>';
        print_r($data['paket']);
        exit();

        $data['_view'] = 'landing';
        $this->load->view('layouts/main', $data);
    }

    function detail_paket($id_paket)
    {
        // Mengambil data paket dari model (sesuaikan dengan implementasi Anda)
        $data['detail_paket'] = $this->Paket_model->get_paket($id_paket);

        // Memuat halaman detail paket
        $data['_view'] = 'paket/detail_paket.php';
        $this->load->view('layouts/main', $data);
    }

    public function search_paket()
    {
        $destinasi = $this->input->post('destinasi'); // Assuming 'destinasi' is the name attribute in your select element
        $daterange = $this->input->post('daterange');
        $daterangeexploded = explode(' - ', $daterange);

        $daterangeConverted = [
            date('Y-m-d', strtotime($daterangeexploded[0])),
            date('Y-m-d', strtotime($daterangeexploded[1]))
        ];

        $data['paketpencarian'] = $this->Paket_model->search_paket($destinasi, $daterangeConverted);

        // echo '<pre>';
        // print_r($data['paketpencarian']);
        // exit();

        // Load the view with the search results
        $data['_view'] = 'paket/pencarian';
        $this->load->view('layouts/main', $data);
    }
}
