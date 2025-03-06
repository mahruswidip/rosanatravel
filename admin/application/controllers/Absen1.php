<?php

class Absen1 extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') !== TRUE) {
      redirect('login');
    }
  }
  public function index()
  {
    $data['_view'] = 'absensikaryawan/admin/index';
    $this->load->view('layouts/main', $data);
  }
  public function koordinator()
  {
    $data['_view'] = 'absensikaryawan/koordinator/index';
    $this->load->view('layouts/main', $data);
  }
  public function karyawan()
  {
    $data['_view'] = 'absensikaryawan/karyawan/index';
    $this->load->view('layouts/main', $data);
  }
}
