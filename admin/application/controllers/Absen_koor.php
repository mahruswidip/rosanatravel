<?php
class Absen_koor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AbsenKoor_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = $this->input->get('per_page') ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('absen_koor/index?');
        $config['total_rows'] = $this->AbsenKoor_model->get_all_karyawan_count();
        $this->pagination->initialize($config);

        $data['karyawan'] = $this->AbsenKoor_model->get_all_karyawan($params);
        $data['_view'] = 'absensikaryawan/koordinator/layout';

        $this->load->view('layouts/main', $data);
    }
    public function add()
    {
        $data['kantor_cabang'] = $this->AbsenKoor_model->get_kantor_cabang();
        if ($this->input->post()) {
            $this->form_validation->set_rules('user_name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('user_email', 'Username', 'required|trim');
            $this->form_validation->set_rules('pass', 'Password', 'required|trim');
            $this->form_validation->set_rules('fk_id_kantor', 'Cabang', 'required|trim');
            $this->form_validation->set_rules('nomor_hp', 'No HP', 'required|trim');
            
            if ($this->form_validation->run()) {
                $userData = [
                    'user_name'  => $this->input->post('user_name', true),
                    'user_email' => $this->input->post('user_email', true),
                    'pass'       => $this->input->post('pass', true),
                    'user_password' => md5($this->input->post('pass', true)),
                    'user_level' => 6,
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => 1,
                    'is_jamaah'  => 0
                ];
                
                $user_id = $this->AbsenKoor_model->insert_user($userData);
                if ($user_id) {
                    $karyawanData = [
                        'fk_id_user'  => $user_id,
                        'fk_id_kantor' => $this->input->post('fk_id_kantor', true),
                        'nomor_hp'    => $this->input->post('nomor_hp', true)
                    ];
    
                    $this->AbsenKoor_model->insert_karyawan($karyawanData);
                    $this->session->set_flashdata('success', 'Data karyawan berhasil ditambahkan!');
                    redirect('absen_koor/index');
                }
            }
        }
        $data['_view'] = 'absensikaryawan/koordinator/add';
        $this->load->view('layouts/main', $data);
    }
    public function edit($id_karyawan) 
    {
        $karyawan = $this->AbsenKoor_model->get_karyawan($id_karyawan);
        $kantor_cabang = $this->AbsenKoor_model->get_kantor_cabang();
        if (!$karyawan) {
            show_404();
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('user_name', 'Nama', 'required|trim');
            $this->form_validation->set_rules('user_email', 'Username', 'required|trim');
            $this->form_validation->set_rules('fk_id_kantor', 'Cabang', 'required|trim');
            $this->form_validation->set_rules('nomor_hp', 'No HP', 'required|trim');
    
            if ($this->form_validation->run()) {
                $userData = [
                    'user_name'  => $this->input->post('user_name', true),
                    'user_email' => $this->input->post('user_email', true)
                ];
                if (!empty($this->input->post('pass'))) {
                    $userData['pass'] = $this->input->post('pass', true);
                    $userData['user_password'] = md5($this->input->post('pass', true));
                }
                $this->AbsenKoor_model->update_user($karyawan['fk_id_user'], $userData);
                $karyawanData = [
                    'fk_id_kantor' => $this->input->post('fk_id_kantor', true),
                    'nomor_hp'     => $this->input->post('nomor_hp', true)
                ];
                $this->AbsenKoor_model->update_karyawan($id_karyawan, $karyawanData);
                $this->session->set_flashdata('success', 'Data karyawan berhasil diperbarui.');
                redirect('absen_koor/index');
            }
        }
        $data = [
            'karyawan' => $karyawan,
            'kantor_cabang' => $kantor_cabang
        ];
        $data['_view'] = 'absensikaryawan/koordinator/edit';
        $this->load->view('layouts/main', $data);
    }
    public function remove($id_karyawan)
    {
        $karyawan = $this->AbsenKoor_model->get_karyawan($id_karyawan);
        if ($karyawan) {
            $this->AbsenKoor_model->delete_karyawan($id_karyawan);
            $this->AbsenKoor_model->reorder_karyawan_ids();
            $this->session->set_flashdata('success', 'Data karyawan berhasil dihapus!');
            redirect('absen_koor/index');
        } else {
            show_404();
        }
    }
}
