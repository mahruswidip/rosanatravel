<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Privacy extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $data['_view'] = 'privacy/index';
        $this->load->view('layouts/main', $data);
    }
}