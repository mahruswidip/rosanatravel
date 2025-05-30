<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
    }

    /*
     * Listing of artikel
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('artikel/index?');
        $config['total_rows'] = $this->Artikel_model->get_all_artikel_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['artikel'] = $this->Artikel_model->get_all_artikel($params);


        // echo '<pre>';
        // print_r($data['artikel']);
        // exit();

        $data['_view'] = 'artikel/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new artikel
     */

    function add()
    {
        $config['upload_path'] = './assets/images/artikel/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');

        $isi_artikel = $this->input->post('konten');

        $this->upload->initialize($config);
        if (!empty($_FILES['artikel_img']['name'])) {
            if ($this->upload->do_upload('artikel_img')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/artikel/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = '20%';
                $config['max_size'] = '5000';
                $config['new_image'] = './assets/images/artikel/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name'];

                $params = array(
                    'kategori' => $this->input->post('kategori'),
                    'travel' => $this->input->post('travel'),
                    'konten' => $isi_artikel,
                    'artikel_img' => $this->input->post('artikel_img'),
                    'judul_artikel' => $this->input->post('judul_artikel'),

                );
                $this->Artikel_model->add_artikel($params, $gambar);
                redirect('artikel/index');
            } else {
                echo "else";
                exit();
                redirect('artikel/index');
            }
        } else {
            $data['_view'] = 'artikel/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a artikel
     */

    function edit($id)
    {
        $config['upload_path'] = './assets/images/artikel/'; // Path folder penyimpanan
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; // Format yang diperbolehkan
        $config['encrypt_name'] = TRUE; // Enkripsi nama file
        $this->upload->initialize($config);

        $user_id = $this->session->userdata('user_id');
        $isi_artikel = $this->input->post('konten');

        // Ambil data artikel lama
        $existing_artikel = $this->Artikel_model->get_artikel($id);
        $gambar_lama = $existing_artikel['artikel_img']; // Simpan gambar lama

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (!empty($_FILES['artikel_img']['name'])) {
                if ($this->upload->do_upload('artikel_img')) {
                    // Hapus gambar lama jika ada
                    if (!empty($gambar_lama) && file_exists('./assets/images/artikel/' . $gambar_lama)) {
                        unlink('./assets/images/artikel/' . $gambar_lama);
                    }

                    // Simpan nama gambar baru
                    $gbr = $this->upload->data();
                    $gambar = $gbr['file_name'];

                    // Kompres gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/artikel/' . $gambar;
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '60%';
                    $config['width'] = '20%';
                    $config['max_size'] = '5000';
                    $config['new_image'] = './assets/images/artikel/' . $gambar;
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                } else {
                    // Jika upload gagal, kembali ke halaman edit dengan pesan error
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('artikel/edit/' . $id);
                }
            } else {
                // Jika tidak ada gambar baru, gunakan gambar lama
                $gambar = $gambar_lama;
            }

            $params = array(
                'kategori' => $this->input->post('kategori'),
                'travel' => $this->input->post('travel'),
                'konten' => $isi_artikel,
                'artikel_img' => $gambar, // Gunakan gambar lama jika tidak ada gambar baru
                'judul_artikel' => $this->input->post('judul_artikel'),
            );

            $this->Artikel_model->edit_artikel($id, $params);
            redirect('artikel/index');
        } else {
            $data['artikel'] = $existing_artikel;
            $data['_view'] = 'artikel/edit';
            $this->load->view('layouts/main', $data);
        }
    }




    function view()
    {
        $data = $this->Artikel_model->get_all_artikel(); // Call a method from your model to get data from the database
        echo json_encode($data);
    }




    /*
     * Deleting artikel
     */
    function remove($id_artikel)
    {
        $artikel = $this->Artikel_model->get_artikel($id_artikel);

        $this->Artikel_model->delete_artikel($id_artikel);
        unlink(FCPATH . 'assets/images/artikel/' . $artikel['artikel_img']);
        redirect('artikel/index');
    }
}
