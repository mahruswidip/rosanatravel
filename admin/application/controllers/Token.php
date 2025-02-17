<?php
class Token extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Token_model');
        $this->load->library('session');
        $this->load->library('form_validation'); // Memastikan form validation terload
    }

    function index()
    {
        // Pagination setup
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        // Pagination config
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('token/index?');
        $config['total_rows'] = $this->Token_model->get_all_tokens_count();
        $this->pagination->initialize($config);

        // Fetch data
        $data['tokens'] = $this->Token_model->get_all_tokens($params);

        // Set view and load the layout
        $data['_view'] = 'token/index';  // Sesuaikan dengan file index
        $this->load->view('layouts/main', $data);
    }

    public function add()
{
    if ($this->input->post()) {
        $this->form_validation->set_rules('token', 'Token', 'required|trim|is_unique[token.token]');
        $this->form_validation->set_rules('app_id', 'App ID', 'required|trim');
        $this->form_validation->set_rules('channel_id', 'Channel ID', 'required|trim');

        if ($this->form_validation->run()) {
            $params = array(
                'token'      => $this->input->post('token', true),
                'app_id'     => $this->input->post('app_id', true),
                'channel_id' => $this->input->post('channel_id', true)
            );

            $this->Token_model->add_token($params);
            $this->session->set_flashdata('success', 'Token berhasil disimpan!');

            redirect('token/index');
        }
    }

    $data['_view'] = 'token/add_token';
    $this->load->view('layouts/main', $data);
}



    function edit($id)
    {
        $data['token'] = $this->Token_model->get_token($id);

        // Check if the token exists
        if ($data['token']) {
            // Handle form submission for editing token
            if ($this->input->post()) {
                $this->form_validation->set_rules('token', 'Token', 'required|trim');
                $this->form_validation->set_rules('app_id', 'App ID', 'required|trim');
                $this->form_validation->set_rules('channel_id', 'Channel ID', 'required|trim');
                $this->form_validation->set_rules('tanggal_aktif', 'Tanggal Aktif', 'required');
                $this->form_validation->set_rules('tanggal_berakhir', 'Tanggal Berakhir', 'required');

                // Check if validation passes
                if ($this->form_validation->run()) {
                    $params = array(
                        'app_id' => $this->input->post('app_id', true),
                        'token' => $this->input->post('token', true),
                        'channel_id' => $this->input->post('channel_id', true),
                        'tanggal_aktif' => $this->input->post('tanggal_aktif'),
                        'tanggal_berakhir' => $this->input->post('tanggal_berakhir')
                    );

                    // Update token in the database
                    $this->Token_model->update_token($id, $params);

                    // Set success message
                    $this->session->set_flashdata('success', 'Token berhasil diperbarui');
                    
                    // Redirect to index page
                    redirect('token/index');
                }
            }

            // Load the edit token view
            $data['_view'] = 'token/edit';
            $this->load->view('layouts/main', $data);
        } else {
            // Show 404 if token not found
            show_404();
        }
    }

    function remove($id)
    {
        $token = $this->Token_model->get_token($id);
    
        if ($token) {
            // Hapus token dari database
            $this->Token_model->delete_token($id);
            // Set pesan sukses
            $this->session->set_flashdata('success', 'Token berhasil dihapus');
            // Redirect ke halaman daftar token
            redirect('token/index');
        } else {
            // Jika token tidak ditemukan, tampilkan error
            show_404();
        }
    }
    
}
