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
    $this->load->view('layouts/main');
  }
}