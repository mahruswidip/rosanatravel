<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Pemesanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemesanan_model');
        $this->load->model('Paket_model');
    }

    /*
     * Listing of pemesanan
     */
    function index($id_paket)
    {
        $data['paket'] = $this->Paket_model->get_tanggal_keberangkatan_for_detail($id_paket);
        // $data['pemesanan'] = $this->Pemesanan_model->get_all_pemesanan($params);

        // echo '<pre>';
        // print_r($data['paket']);
        // exit();

        $data['_view'] = 'pemesanan/index';
        $this->load->view('layouts/main', $data);
    }

    function add()
    {
        $params = array(
            'nik' => $this->input->post('nik'),
            'nama_jamaah' => $this->input->post('nama_jamaah'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'pesan_apa' => $this->input->post('pesan_apa'),
        );

        echo '<pre>';
        print_r($params);
        exit();

        $this->Pemesanan_model->add_jamaah($params);
        redirect(base_url());
    }

    /*
    * Adding a new pemesanan
    */

    function view($id_pemesanan)
    {
        $data['pemesanan'] = $this->Pemesanan_model->get_pemesanan($id_pemesanan); // Call a method from your model to get data from the database
        $data['pemesananlain'] = $this->Pemesanan_model->get_all_pemesanan();
        // echo json_encode($data);
        // echo "<pre>";
        // print_r($data);
        $data['_view'] = 'pemesanan/view';
        $this->load->view('layouts/main', $data);
    }

    function get()
    {
        $result = $this->Paket_model->get_pemesanan_rosana_only_api();

        // Menyusun data untuk respons JSON
        $response = array(
            'status' => '200',
            'message' => 'Data retrieved successfully',
            'data' => json_decode($result, true) // Decode JSON menjadi array
        );

        // Menyusun respons dalam format JSON
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    function get_detail_pemesanan($id)
    {
        $result = $this->Paket_model->get_pemesanan_api($id);

        if ($result) {
            // Menyusun data untuk respons JSON
            $response = array(
                'status' => '200',
                'message' => 'Data retrieved successfully',
                'data' => json_decode($result, true) // Decode JSON menjadi array
            );

            // Menyusun respons dalam format JSON
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        } else {
            // Jika data tidak ditemukan
            $response = array(
                'status' => 'error',
                'message' => 'Data not found'
            );

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }


    /*
     * Deleting pemesanan
     */
    function remove($id_pemesanan)
    {
        $pemesanan = $this->Pemesanan_model->get_pemesanan($id_pemesanan);

        $this->Pemesanan_model->delete_pemesanan($id_pemesanan);
        unlink(FCPATH . 'assets/images/pemesanan/' . $pemesanan['pemesanan_img']);
        redirect('pemesanan/index');
    }
}
