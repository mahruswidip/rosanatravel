<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jamaah_model');
        $this->load->model('Paket_model');
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
    }

    function index()
    {
        $user_level = $this->session->userdata('user_level');
        if (in_array($user_level, ['4', '5', '6'])) {
            redirect('absensi/index');
        }
        $tahun = $this->input->get('tahun') ?? date('Y');

        $data['jamaah'] = $this->Jamaah_model->get_all_jamaah_count();
        $data['jamaah_umroh_only'] = $this->Jamaah_model->get_umroh_only_jamaah_count();
        $data['jamaah_haji_only'] = $this->Jamaah_model->get_haji_only_jamaah_count();
        $data['jamaah_pasuruan'] = $this->Jamaah_model->get_jamaah_pasuruan_count();
        $data['jamaah_malang'] = $this->Jamaah_model->get_jamaah_malang_count();
        $data['jamaah_surabaya'] = $this->Jamaah_model->get_jamaah_surabaya_count();
        $data['jamaah_probolinggo'] = $this->Jamaah_model->get_jamaah_probolinggo_count();
        $data['jamaah_jakarta'] = $this->Jamaah_model->get_jamaah_jakarta_count();
        $data['jamaah_situbondo'] = $this->Jamaah_model->get_jamaah_situbondo_count();
        $data['jamaah_jember'] = $this->Jamaah_model->get_jamaah_jember_count();
        $data['jamaah_perbulan'] = $this->Jamaah_model->get_jamaah_per_bulan($tahun);
        $data['jamaah_by_paket'] = $this->Jamaah_model->get_jamaah_by_paket($tahun);
        $data['tahun'] = $tahun;

        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main', $data);
    }
}
