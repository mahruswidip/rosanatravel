<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Jamaah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Jamaah_model');
        $this->load->model('Users_model');
        $this->load->model('Scan_model');
        $this->load->library('form_validation');
    }

    /*
     * Listing of luasan
     */
    function index()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('jamaah/index?');
        $config['total_rows'] = $this->Jamaah_model->get_all_jamaah_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['jamaah'] = '';
        if ($user_level == '2') {
            $data['jamaah'] = $this->Jamaah_model->get_all_jamaah_by_cabang($user_id);
        } elseif ($user_level == '1') {
            $data['jamaah'] = $this->Jamaah_model->get_all_jamaah($params);
        }

        $data['_view'] = 'jamaah/index';
        $this->load->view('layouts/main', $data);
    }

    public function getstates()
    {
        $json = array();
        $this->Jamaah_model->setCountryID($this->input->post('countryID'));
        $json = $this->Jamaah_model->getStates();
        header('Content-Type: application/json');
        echo json_encode($json);
    }

    function view()
    {
        $data = $this->Jamaah_model->get_all_jamaah(); // Call a method from your model to get data from the database
        echo json_encode($data);
    }

    // function view()
    // {
    //     $user_level = $this->session->userdata('user_level');
    //     $user_id = $this->session->userdata('user_id');

    //     if ($user_level == '2') {
    //         $data = $this->Jamaah_model->get_all_jamaah_by_cabang($user_id);
    //     } elseif ($user_level == '1') {
    //         $data = $this->Jamaah_model->get_all_jamaah();
    //     } else {
    //         // Handle other user levels or provide a default behavior
    //         $data = array(); // You might want to handle this case accordingly
    //     }

    //     echo json_encode($data);
    // }


    function bukatambah()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
        $data['_view'] = 'jamaah/add';
        $this->load->view('layouts/main', $data);
    }


    // Tanggal
    public function getdatatanggal()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response = $this->Jamaah_model->get_tanggal_keberangkatan($searchTerm);
        echo json_encode($response);
    }

    // Paket    
    public function getdatapaket($id_keberangkatan)
    {
        $searchTerm = $this->input->post('searchTerm');
        $response = $this->Jamaah_model->get_paket($id_keberangkatan, $searchTerm);
        echo json_encode($response);
    }

    function add_keberangkatan($id_jamaah)
    {
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);
        $data['getCountries'] = $this->Jamaah_model->getAllCountries();

        if (isset($_POST) && count($_POST) > 0) {
            $params = array(
                'id_jamaah' => $this->input->post('id_jamaah'),
                'id_paket' => $this->input->post('id_paket'),
            );

            $this->Jamaah_model->add_keberangkatan($params);
            redirect('jamaah/detail/' . $id_jamaah);
        } else {
            $data['_view'] = 'jamaah/add_keberangkatan';
            $this->load->view('layouts/main', $data);
        }
    }


    function add()
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }

        $config['upload_path'] = './assets/images/'; // Path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; // Jenis file yang diizinkan
        $config['encrypt_name'] = TRUE; // Enkripsi nama file yang diupload
        $this->upload->initialize($config);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'is_unique[jamaah.nik]');

        if ($this->form_validation->run() != false) {
            $gambar = "profile_default.jpg"; // Gambar default jika tidak diupload
            if (!empty($_FILES['jamaah_img']['name'])) {
                if ($this->upload->do_upload('jamaah_img')) {
                    $gbr = $this->upload->data();
                    // Resize dan kompres gambar
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/' . $gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = TRUE;
                    $config['quality'] = '70%';
                    $config['width'] = 300;
                    $config['height'] = 300;
                    $config['new_image'] = './assets/images/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                    $gambar = $gbr['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Gagal mengupload gambar.');
                    redirect('jamaah/bukatambah');
                }
            }

            // Ambil ID wilayah dari form
            $provinsi_id = $this->input->post('provinsi');
            $kabupaten_id = $this->input->post('kabupaten_kota');
            $kecamatan_id = $this->input->post('kecamatan');
            $kelurahan_id = $this->input->post('kelurahan');

            // Ambil nama wilayah dari API Emsifa
            $provinsi = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/province/$provinsi_id.json");
            $kabupaten = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/regency/$kabupaten_id.json");
            $kecamatan = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/district/$kecamatan_id.json");
            $kelurahan = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/village/$kelurahan_id.json");

            $profesi = $this->input->post('profesi');
            $profesi_lainnya = $this->input->post('profesi_lainnya');

            if (($profesi == "Wiraswasta" || $profesi == "Lainnya") && !empty($profesi_lainnya)) {
                $profesi = $profesi_lainnya;
            }

            $params = array(
                'marketing' => $this->input->post('marketing'),
                'nik' => $this->input->post('nik'),
                'nama_jamaah' => $this->input->post('nama_jamaah'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'nomor_telepon' => $this->input->post('nomor_telepon'),
                'alamat' => $this->input->post('alamat'),
                'nomor_paspor' => $this->input->post('nomor_paspor'),
                'email' => $this->input->post('email'),
                'ttl' => $this->input->post('ttl'),
                'provinsi' => $provinsi,  // Simpan nama provinsi
                'kabupaten_kota' => $kabupaten,  // Simpan nama kabupaten
                'kecamatan' => $kecamatan,  // Simpan nama kecamatan
                'kelurahan' => $kelurahan,  // Simpan nama kelurahan
                'profesi' => $profesi, // Simpan profesi yang dipilih atau diinput
                'created_by' => $this->session->userdata('user_id'),
            );

            $this->Jamaah_model->add_jamaah($params, $gambar);
            $this->session->set_flashdata('success', 'Jamaah berhasil ditambahkan.');
            redirect('jamaah/index');
        } else {
            $this->session->set_flashdata('error', 'NIK sudah terdaftar.');
            redirect('jamaah/bukatambah');
        }
    }

    public function get_marketing()
    {
        $search = $this->input->get("search");
        $this->db->select("user_id, user_name");
        $this->db->from("tbl_users");
        $this->db->where("user_level", 6);
        $this->db->order_by("user_id", "DESC");

        if (!empty($search)) {
            $this->db->like("user_name", $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        echo json_encode($result);
    }

    public function cek_nomor_telepon()
    {
        $nomor = $this->input->get('nomor');
        $cek = $this->db->get_where('jamaah', ['nomor_telepon' => $nomor])->row();

        if ($cek) {
            echo json_encode(["status" => "duplikat"]);
        } else {
            echo json_encode(["status" => "tersedia"]);
        }
    }

    /**
     * Fungsi untuk mendapatkan nama wilayah dari API Emsifa
     */
    private function get_nama_wilayah_api($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        return $data['name'] ?? null; // Ambil nama wilayah dari API
    }

    /*
     * Editing a luasan
     */
    function edit($id_jamaah)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }

        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);

        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);

        if (isset($data['jamaah']['id_jamaah'])) {
            if ($_POST) {
                $params = array(
                    'nik' => $this->input->post('nik'),
                    'nama_jamaah' => $this->input->post('nama_jamaah'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'nomor_paspor' => $this->input->post('nomor_paspor'),
                    'nomor_telepon' => $this->input->post('nomor_telepon'),
                    'email' => $this->input->post('email'),
                    'ttl' => $this->input->post('ttl'),

                );

                // Ambil ID wilayah dari form
                $provinsi_id = $this->input->post('provinsi');
                $kabupaten_id = $this->input->post('kabupaten_kota');
                $kecamatan_id = $this->input->post('kecamatan');
                $kelurahan_id = $this->input->post('kelurahan');

                // Ambil nama wilayah dari API
                $params['provinsi'] = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/province/$provinsi_id.json");
                $params['kabupaten_kota'] = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/regency/$kabupaten_id.json");
                $params['kecamatan'] = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/district/$kecamatan_id.json");
                $params['kelurahan'] = $this->get_nama_wilayah_api("https://www.emsifa.com/api-wilayah-indonesia/api/village/$kelurahan_id.json");

                // Upload dan kompres gambar jika ada perubahan
                if (!empty($_FILES['jamaah_img']['name'])) {
                    if ($this->upload->do_upload('jamaah_img')) {
                        $gbr = $this->upload->data();

                        // Konfigurasi kompresi gambar
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/' . $gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['quality'] = '70%';
                        $config['width'] = 300;
                        $config['height'] = 300;
                        $config['new_image'] = './assets/images/' . $gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        // Hapus gambar lama
                        if (!empty($data['jamaah']['jamaah_img']) && $data['jamaah']['jamaah_img'] != 'profile_default.jpg') {
                            unlink(FCPATH . 'assets/images/' . $data['jamaah']['jamaah_img']);
                        }

                        // Simpan nama file baru
                        $params['jamaah_img'] = $gbr['file_name'];
                    } else {
                        $this->session->set_flashdata('error', 'Gagal mengupload gambar.');
                        redirect('jamaah/edit/' . $id_jamaah);
                    }
                }

                // Update data jamaah
                $this->Jamaah_model->update_jamaah($id_jamaah, $params);
                $this->session->set_flashdata('success', 'Jamaah berhasil diperbarui.');
                redirect('jamaah/index');
            } else {
                $data['_view'] = 'jamaah/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Jamaah yang Anda coba edit tidak ditemukan.');
        }
    }


    function buatuser($id_jamaah)
    {
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);
        $user_id = $this->session->userdata('user_id');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('fk_id_jamaah', 'fk_id_jamaah', 'is_unique[tbl_users.fk_id_jamaah]');

        if (isset($_POST) && count($_POST) > 0) {
            if ($this->form_validation->run() != false) {
                $params = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_email' => $this->input->post('nik'),
                    'user_password' => md5($this->input->post('user_password')),
                    'fk_id_jamaah' => $this->input->post('fk_id_jamaah'),
                    'user_level' => '3',
                    'pass' => $this->input->post('user_password'),
                    'created_by' => $user_id,
                    'is_jamaah' => '1',
                );

                $is_user = array('is_user' => '1');

                $this->Users_model->register($params);
                $this->Users_model->update_is_users($id_jamaah, $is_user);
                redirect('jamaah/index');
            } else {
                $this->session->set_flashdata('fk_id_jamaah', 'Maaf ! Jamaah sudah terdaftar sebagai User');
                $data['_view'] = 'jamaah/buatuser';
                $this->load->view('layouts/main', $data);
            }
        } else {
            $data['_view'] = 'jamaah/buatuser';
            $this->load->view('layouts/main', $data);
        }
    }

    function detail($id_jamaah)
    {
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);
        $data['record'] = $this->Jamaah_model->get_record_keberangkatan($id_jamaah);
        // echo '<pre>';
        // var_dump($data['record']);
        // exit();
        $data['_view'] = 'jamaah/detail';
        $this->load->view('layouts/main', $data);
    }

    function updateqr($id_jamaah)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');
        $this->load->library('ciqrcode');
        // check if the luasan exists before trying to edit it
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);

        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir'] = './assets/'; //string, the default is application/cache/
        $config['errorlog'] = './assets/'; //string, the default is application/logs/
        $config['imagedir'] = './assets/images/qr_uuid/'; //direktori penyimpanan qr code
        $config['quality'] = true; //boolean, the default is true
        $config['size'] = '1024'; //interger, the default is 1024
        $config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $nama = $data['jamaah']['uuid'];

        $qr_code = $nama . '.png'; //buat name dari qr code sesuai dengan nim

        $params1['data'] = $nama; //data yang akan di jadikan QR CODE
        $params1['level'] = 'H'; //H=High
        $params1['size'] = 10;
        $params1['savename'] = FCPATH . $config['imagedir'] . $qr_code; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params1); // fungsi untuk generate QR CODE

        $params = array(
            'qr_code_benar' => $qr_code
        );

        $this->Jamaah_model->update_jamaah($id_jamaah, $params);
        redirect('jamaah/index');
    }

    function updateqrdaricetak($id_jamaah)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');
        $this->load->library('ciqrcode');
        // check if the luasan exists before trying to edit it
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);

        $config['cacheable'] = true; //boolean, the default is true
        $config['cachedir'] = './assets/'; //string, the default is application/cache/
        $config['errorlog'] = './assets/'; //string, the default is application/logs/
        $config['imagedir'] = './assets/images/qr_uuid/'; //direktori penyimpanan qr code
        $config['quality'] = true; //boolean, the default is true
        $config['size'] = '1024'; //interger, the default is 1024
        $config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $nama = $data['jamaah']['uuid'];

        $qr_code = $nama . '.png'; //buat name dari qr code sesuai dengan nim

        $params1['data'] = $nama; //data yang akan di jadikan QR CODE
        $params1['level'] = 'H'; //H=High
        $params1['size'] = 10;
        $params1['savename'] = FCPATH . $config['imagedir'] . $qr_code; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params1); // fungsi untuk generate QR CODE

        $params = array(
            'qr_code_benar' => $qr_code
        );

        $this->Jamaah_model->update_jamaah($id_jamaah, $params);
        redirect('jamaah/cetak_id_card/' . $id_jamaah);
    }

    function cetak_id_card($id_jamaah)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
        // check if the luasan exists before trying to edit it
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);

        if (isset($data['jamaah']['id_jamaah'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'qr_code' => $this->input->post('qr_code'),
                    'nama_jamaah' => $this->input->post('nama_jamaah'),
                );

                $this->Jamaah_model->update_jamaah($id_jamaah, $params);
                redirect('jamaah/index');
            } else {
                $data['_view'] = 'jamaah/cetak';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The jamaah you are trying to edit does not exist.');
        }
    }

    function cetak_label_koper($id_jamaah)
    {
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
        // check if the luasan exists before trying to edit it
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);
        $data['hotel'] = $this->Jamaah_model->get_hotel_from_record_keberangkatan($id_jamaah);

        if (isset($data['jamaah']['id_jamaah'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'qr_code' => $this->input->post('qr_code'),
                    'nama_jamaah' => $this->input->post('nama_jamaah'),
                );

                $this->Jamaah_model->update_jamaah($id_jamaah, $params);
                redirect('jamaah/index');
            } else {
                $data['_view'] = 'jamaah/cetak_label_koper';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The jamaah you are trying to edit does not exist.');
        }
    }

    function edit_kehadiran($id_jamaah)
    {
        // check if the luasan exists before trying to edit it
        $data['jamaah'] = $this->Jamaah_model->get_jamaah($id_jamaah);

        if (isset($data['jamaah']['id_jamaah'])) {
            if (isset($_POST) && count($_POST) > 0) {
                $params = array(
                    'kehadiran' => 'Tidak Hadir / Belum Hadir',
                );

                $this->Jamaah_model->update_jamaah($id_jamaah, $params);
                redirect('jamaah/index');
            } else {
                $data['_view'] = 'jamaah/index';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The jamaah you are trying to edit does not exist.');
    }

    /*
     * Deleting jamaah
     */
    function remove($id_jamaah)
    {
        $jamaah = $this->Jamaah_model->get_jamaah($id_jamaah);

        // Check if the jamaah exists and if it was created by the current user
        if (isset($jamaah['id_jamaah']) && $jamaah['created_by'] == $this->session->userdata('user_id')) {

            // Hapus data di database
            $this->Jamaah_model->delete_jamaah($id_jamaah);

            // Hapus file gambar jika ada
            $jamaah_img_path = FCPATH . 'assets/images/' . $jamaah['jamaah_img'];
            if (!empty($jamaah['jamaah_img']) && file_exists($jamaah_img_path)) {
                unlink($jamaah_img_path);
            }

            // Hapus file QR Code jika ada
            $qr_code_path = FCPATH . 'assets/images/qr_uuid/' . $jamaah['qr_code_benar'];
            if (!empty($jamaah['qr_code_benar']) && file_exists($qr_code_path)) {
                unlink($qr_code_path);
            }

            redirect('jamaah/index');
        } else {
            // Display a warning message using JavaScript
            echo '<script>';
            echo 'alert("Maaf, anda tidak dapat menghapus Jamaah ini karena bukan jamaah Anda");';
            echo 'window.history.back();'; // Redirect back to the previous page
            echo '</script>';
        }
    }

    // function remove($id_jamaah)
    // {
    //     $jamaah = $this->Jamaah_model->get_jamaah($id_jamaah);

    //     // check if the jamaah exists before trying to delete it
    //     if (isset($jamaah['id_jamaah'])) {
    //         $this->Jamaah_model->delete_jamaah($id_jamaah);
    //         unlink(FCPATH . 'assets/images/' . $jamaah['jamaah_img']);
    //         unlink(FCPATH . 'assets/images/qr_uuid/' . $jamaah['qr_code_benar']);
    //         redirect('jamaah/index');
    //     } else {
    //         show_error('The jamaah you are trying to delete does not exist.');
    //     }
    // }

    function remove_record_keberangkatan($id_record)
    {
        $record = $this->Jamaah_model->get_record_pure($id_record);

        // echo '<pre>';
        // print_r($record);
        // exit();

        // check if the paket exists before trying to delete it
        if (isset($record[0]['id_record'])) {
            $this->Jamaah_model->remove_record_keberangkatan($id_record);
            redirect('jamaah/index');
        } else
            show_error('The Record you are trying to delete does not exist.');
    }

    public function export()
    {
        // $jamaah = $this->Jamaah_model->get_all_jamaah_with_record();
        // echo '<pre>';
        // print_r($jamaah);
        // exit();
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Rosana Group')
            ->setLastModifiedBy('Rosana Group')
            ->setTitle("Data Jamaah")
            ->setSubject("Jamaah")
            ->setDescription("Laporan Semua Data Jamaah")
            ->setKeywords("Data Jamaah");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true),
            // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                // Set border top dengan garis tipis
                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                // Set border right dengan garis tipis
                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                // Set border bottom dengan garis tipis
                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                // Set border top dengan garis tipis
                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                // Set border right dengan garis tipis
                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                // Set border bottom dengan garis tipis
                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA JAMAAH"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "NIK"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NOMOR HP"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "GRUP KEBERANGKATAN"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "TANGGAL MANASIK"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "KEHADIRAN MANASIK"); // Set kolom E3 dengan tulisan "ALAMAT"


        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);


        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $jamaah = $this->Jamaah_model->get_all_jamaah_with_record();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($jamaah as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data['nik']);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data['nama_jamaah']);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data['nomor_telepon']);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data['tanggal_keberangkatan']);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data['tanggal_manasik']);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data['kehadiran']);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom E


        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Jamaah");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Jamaah.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function export_excel()
    {
        // Ambil data jamaah berdasarkan paket
        $data = $this->Jamaah_model->get_jamaah_by_pakett();

        // Load PHPExcel
        require_once APPPATH . '../vendor/autoload.php';

        // Jika data kosong, hentikan eksekusi
        if (!$data) {
            show_error('Data tidak ditemukan!', 404);
            return;
        }

        // Inisialisasi PhpSpreadsheet
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $row = 1; // Baris awal

        foreach ($data as $paket => $jamaah_list) {
            // Header Paket
            $sheet->setCellValue('A' . $row, "Paket: " . $paket);
            $sheet->mergeCells("A{$row}:H{$row}");
            $sheet->getStyle("A{$row}:H{$row}")->getFont()->setBold(true);
            $row++;

            // Header Kolom
            $headers = ['ID Paket', 'Nama Paket', 'ID Jamaah', 'Nama Jamaah', 'NIK', 'Nomor Telepon', 'Jenis Kelamin', 'Provinsi', 'Kabupaten/ Kota', 'Kecamatan', 'Kelurahan', 'Alamat', 'Nomor Paspor'];
            $col = 'A';

            foreach ($headers as $header) {
                $sheet->setCellValue($col . $row, $header);
                $sheet->getStyle($col . $row)->getFont()->setBold(true);
                $col++;
            }
            $row++;

            // Isi Data Jamaah
            foreach ($jamaah_list as $jamaah) {
                $col = 'A';
                $sheet->setCellValue($col++ . $row, $jamaah['id_paket']);
                $sheet->setCellValue($col++ . $row, $jamaah['nama_program']);
                $sheet->setCellValue($col++ . $row, $jamaah['id_jamaah']);
                $sheet->setCellValue($col++ . $row, $jamaah['nama_jamaah']);
                $sheet->setCellValue($col++ . $row, $jamaah['nik']);
                $sheet->setCellValue($col++ . $row, $jamaah['nomor_telepon']);
                $sheet->setCellValue($col++ . $row, $jamaah['jenis_kelamin']);
                $sheet->setCellValue($col++ . $row, $jamaah['provinsi']);
                $sheet->setCellValue($col++ . $row, $jamaah['kabupaten_kota']);
                $sheet->setCellValue($col++ . $row, $jamaah['kecamatan']);
                $sheet->setCellValue($col++ . $row, $jamaah['kelurahan']);
                $sheet->setCellValue($col++ . $row, $jamaah['alamat']);
                $sheet->setCellValue($col++ . $row, $jamaah['nomor_paspor']);
                $row++;
            }

            // Tambahkan baris kosong antar kategori paket
            $row++;
        }

        // Set Auto Width
        foreach (range('A', 'H') as $col) {
            $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        }

        // Simpan ke file
        $filename = 'Data_Jamaah_Berdasarkan_Paket.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    public function view_ultah()
    {
        $this->load->model('Jamaah_model');
        $jamaah = $this->Jamaah_model->get_ulang_tahun();

        header('Content-Type: application/json');
        echo json_encode($jamaah);
    }

    public function kirimhut($id_jamaah)
    {
        // Ambil data jamaah berdasarkan ID
        $jamaah = $this->Jamaah_model->kirimUcapanUltah($id_jamaah);

        if (!$jamaah) {
            echo json_encode(['status' => 'error', 'message' => 'Data jamaah tidak ditemukan!']);
            return;
        }

        // Debugging tambahan
        log_message('error', 'Data Jamaah: ' . json_encode($jamaah));

        // Data yang dikirim ke API
        $payload = [
            "to_number" => $jamaah['nomor_telepon'],
            "to_name" => $jamaah['nama_jamaah'],
            "message_template_id" => "826d7eb4-0d91-4891-a64f-7195690648bb",
            "channel_integration_id" => "407aa84e-8313-4689-b4cf-e4c484bc91ca",
            "language" => ["code" => "id"],
            "parameters" => [
                "body" => [
                    [
                        "key" => "1",
                        "value" => "full_name",
                        "value_text" => $jamaah['nama_jamaah'],
                    ]
                ]
            ]
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://service-chat.qontak.com/api/open/v1/broadcasts/whatsapp/direct");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: MAoNDjsWfrjCm827rdxpynaPLTsOdfwv6s7JxY5WhoM",
            "Content-Type: application/json"
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);

        $response_data = json_decode($response, true); // Decode JSON response
        log_message('error', 'Qontak API Response: ' . print_r($response_data, true));

        // Cek status pengiriman
        // if ($http_code == 200 && isset($response_data['status']) && $response_data['status'] == "success") {
        if (in_array($http_code, [200, 201]) && isset($response_data['status']) && $response_data['status'] == "success") {

            echo json_encode(['status' => 'success', 'message' => 'Pesan ulang tahun berhasil dikirim!']);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal mengirim pesan.',
                'api_response' => $response_data,
                'http_code' => $http_code,
                'curl_error' => $curl_error
            ]);
        }
    }
}
