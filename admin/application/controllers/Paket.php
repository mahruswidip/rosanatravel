<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */

class Paket extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Paket_model');
    }

    /*
     * Listing of luasan
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('paket/index?');
        $config['total_rows'] = $this->Paket_model->get_all_paket_count();
        $this->pagination->initialize($config);

        $user_level = $this->session->userdata('user_level');
        $user_id = $this->session->userdata('user_id');

        $data['paket'] = $this->Paket_model->get_all_paket($params);

        $data['_view'] = 'paket/index';
        $this->load->view('layouts/main', $data);
    }

    function view()
    {
        $data = $this->Paket_model->get_all_paket(); // Call a method from your model to get data from the database
        echo json_encode($data);
    }

    function bukatambah()
    {
        $data['_view'] = 'paket/add';
        $data['keberangkatan'] = $this->Paket_model->get_tanggal_keberangkatan();
        // var_dump( $data['keberangkatan']);
        // exit();
        $this->load->view('layouts/main', $data);
    }

    function add()
    {

        $config['upload_path'] = './assets/images/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
        $user_id = $this->session->userdata('user_id');

        $isi_artikel = $this->input->post('konten');

        $this->upload->initialize($config);
        if (!empty($_FILES['paket_img']['name'])) {
            if ($this->upload->do_upload('paket_img')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '60%';
                $config['width'] = '20%';
                $config['max_size'] = '5000';
                $config['new_image'] = './assets/images/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $gambar = $gbr['file_name'];

                $params = array(
                    'travel' => $this->input->post('travel'),
                    'nama_program' => $this->input->post('nama_program'),
                    'kategori' => $this->input->post('kategori'),
                    'fk_id_keberangkatan' => $this->input->post('fk_id_keberangkatan'),
                    'lama_hari' => $this->input->post('lama_hari'),
                    'paket' => $this->input->post('paket'),
                    'hotel_mekkah' => $this->input->post('hotel_mekkah'),
                    'hotel_madinah' => $this->input->post('hotel_madinah'),
                    'bintang_mekkah' => $this->input->post('bintang_mekkah'),
                    'bintang_madinah' => $this->input->post('bintang_madinah'),
                    'matauang' => $this->input->post('matauang'),
                    'uang_muka' => $this->input->post('uang_muka'),
                    'matauangall' => $this->input->post('matauangall'),
                    'harga_paket' => $this->input->post('harga_paket'),
                    'nomor_guide' => $this->input->post('nomor_guide'),
                    'sudah_termasuk' => 'Tiket Pesawat Economy Class • Asuransi perjalanan & Covid-19 (mengcover resiko Covid-19) • Akomodasi Hotel di Mekkah & Medinah(Sesuai Pilihan Paket Umroh) • 2 kali Umrah, 1x city tour di Mekkah & Medinah (kondisional) • Makan prasmanan 3x sehari (Full Board Hotel / Box). • Transportasi Bus AC. • Muthawif / Pembimbing Ibadah.  Catatan : • Membawa Air Zam-Zam (Liquid) per 18 Mei 2022 sudah tidak diijinkan oleh semua Airlines (mengikuti peraturan dari GACA).',
                    'belum_termasuk' => 'Biaya Handling Bandara, Fasilitas Ibadah, Manasik • Biaya PCR di Saudi  • Biaya Pengurusan Paspor (Jika belum punya/sudah tidak berlaku) • Biaya Suntik Meningitis. • Biaya Surat Mahram (Bagi wanita usia dibawah 45 Tahun yang berangkat sendirian) • Biaya Pajak Saudi (municipility 5% & VAT 15%) & Biaya Pajak Indonesia (PPN11%).. Jika sudah diberlakukan • Biaya Tour / Makan / Minum diluar program. • Biaya lain-lain yang bersifat pribadi : Telepon, Laundry, Tips, Kelebihan Bagasi, dll.',
                    'tampilan' => 'Uang Muka',
                    'publish' => ($this->input->post('publish') === 'on') ? 1 : 0,
                    'konten' => $isi_artikel,
                    'created_by' => $user_id,
                );

                $this->Paket_model->add_paket($params, $gambar);
                redirect('paket/index');
            } else {
                echo "else";
                exit();
                redirect('paket/index');
            }
        } else {
            $this->session->set_flashdata('error', 'Ukuran Tidak boleh lebih dari 5 MB');
            redirect('paket/add');
        }
    }

    function edit($id_paket)
    {
        // Check if the paket exists before trying to edit it
        $data['paket'] = $this->Paket_model->get_paket($id_paket);
        $data['keberangkatan'] = $this->Paket_model->get_tanggal_keberangkatan();

        if (isset($data['paket']['id_paket'])) {
            $config['upload_path'] = './assets/images/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
            $user_id = $this->session->userdata('user_id');

            $isi_artikel = $this->input->post('konten');

            $this->upload->initialize($config);

            if (isset($_POST) && count($_POST) > 0) {
                if (!empty($_FILES['paket_img']['name'])) {
                    if ($this->upload->do_upload('paket_img')) {
                        // Delete existing image if any
                        $existing_paket = $this->Paket_model->get_paket($id_paket);
                        $existing_image_path = './assets/images/' . $existing_paket['paket_img'];
                        if (file_exists($existing_image_path)) {
                            unlink($existing_image_path);
                        }

                        $gbr = $this->upload->data();

                        // Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/' . $gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '60%';
                        $config['width'] = '20%';
                        $config['max_size'] = '5000';
                        $config['new_image'] = './assets/images/' . $gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $gambar = $gbr['file_name'];
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('paket/index');
                    }
                } else {
                    // No new image uploaded, use the existing one
                    $gambar = $this->input->post('paket_img');
                }

                $params = array(
                    'fk_id_keberangkatan' => $this->input->post('fk_id_keberangkatan'),
                    'nama_program' => $this->input->post('nama_program'),
                    'lama_hari' => $this->input->post('lama_hari'),
                    'kategori' => $this->input->post('kategori'),
                    'travel' => $this->input->post('travel'),
                    'paket' => $this->input->post('paket'),
                    'hotel_mekkah' => $this->input->post('hotel_mekkah'),
                    'hotel_madinah' => $this->input->post('hotel_madinah'),
                    'bintang_mekkah' => $this->input->post('bintang_mekkah'),
                    'bintang_madinah' => $this->input->post('bintang_madinah'),
                    'matauang' => $this->input->post('matauang'),
                    'uang_muka' => $this->input->post('uang_muka'),
                    'matauangall' => $this->input->post('matauangall'),
                    'harga_paket' => $this->input->post('harga_paket'),
                    'nomor_guide' => $this->input->post('nomor_guide'),
                    'sudah_termasuk' => $this->input->post('sudah_termasuk'),
                    'belum_termasuk' => $this->input->post('belum_termasuk'),
                    'tampilan' => $this->input->post('tampilan'),
                    'publish' => ($this->input->post('publish') === 'on') ? 1 : 0,
                    'konten' => $isi_artikel,
                    'paket_img' => $gambar,
                );

                $this->Paket_model->update_paket($id_paket, $params);
                redirect('paket/index');
            } else {
                $data['_view'] = 'paket/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('The paket you are trying to edit does not exist.');
        }
    }



    function detail($id_paket)
    {
        $data['paket'] = $this->Paket_model->get_tanggal_keberangkatan_for_detail($id_paket);
        $data['record'] = $this->Paket_model->get_record_with_this_paket($id_paket);

        if ($this->session->userdata('link') == null) {
            $this->session->set_userdata('link', $this->input->post('link_grup_whatsapp'));
        } else {
            $this->session->set_userdata('link', '');
            $this->session->set_userdata('link', $this->input->post('link_grup_whatsapp'));
        }
        // echo '<pre>';
        // print_r($data['record']);
        // exit();
        $data['_view'] = 'paket/detail';
        $this->load->view('layouts/main', $data);
    }



    public function tetapkan_bus($id_paket)
    {
        // Load the necessary model
        $this->load->model('Paket_model');

        // Get the bus value from POST data
        $bus = $this->input->post('bus');

        // Update the bus value in the database
        $params = array('bus' => $bus);
        $this->Paket_model->update_paket($id_paket, $params);
        $this->session->set_flashdata('setbis', 'Bus berhasil ditetapkan');

        // Redirect to the detail page or wherever appropriate
        redirect('paket/detail/' . $id_paket);
    }

    public function cetak_label_koper($id_paket)
    {
        $data['label'] = $this->Paket_model->get_record_with_this_paket($id_paket);
        $data['paket'] = $this->Paket_model->get_tanggal_keberangkatan_for_detail($id_paket);

        // echo '<pre>';
        // print_r($data['paket']);
        // exit();

        $data['_view'] = 'paket/cetak_label_koper'; // Change this to the view file for printing labels
        $this->load->view('layouts/main', $data);
    }

    public function cetak_label_koper_haji($id_paket)
    {
        $data['label'] = $this->Paket_model->get_record_with_this_paket($id_paket);
        $data['paket'] = $this->Paket_model->get_tanggal_keberangkatan_for_detail($id_paket);

        // echo '<pre>';
        // print_r($data['paket']);
        // exit();

        $data['_view'] = 'paket/cetak_label_koper_haji'; // Change this to the view file for printing labels
        $this->load->view('layouts/main', $data);
    }

    /*
     * Deleting paket
     */
    function remove($id_paket)
    {
        $paket = $this->Paket_model->get_paket($id_paket);

        $this->Paket_model->delete_paket($id_paket);
        unlink(FCPATH . 'assets/images/' . $paket['paket_img']);
        redirect('paket/index');
    }

    public function export_excel($id_paket) {
        // Load library PHPSpreadsheet
        require_once APPPATH . '../vendor/autoload.php';
    
        // Pastikan model telah dimuat
        $this->load->model('Paket_model');
    
        // Ambil data dari model
        $data = $this->Paket_model->get_paket_data($id_paket);
    
        // Jika data kosong, hentikan eksekusi
        if (!$data) {
            show_error('Data tidak ditemukan!', 404);
            return;
        }
    
        // Inisialisasi spreadsheet
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Set header kolom
        $headers = [
            'A1' => 'ID Paket',
            'B1' => 'Nama Paket',
            'C1' => 'Nama Jamaah',
            'D1' => 'Nomor Telepon',
            'E1' => 'Jenis Kelamin',
            'F1' => 'Alamat',
            'G1' => 'Tanggal Keberangkatan'
        ];
    
        // Menetapkan header dan membuatnya bold
        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
            $sheet->getStyle($cell)->getFont()->setBold(true);
        }
    
        // Isi data ke dalam spreadsheet
        $row = 2;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['id_paket']);
            $sheet->setCellValue('B' . $row, $item['nama_program']);
            $sheet->setCellValue('C' . $row, $item['nama_jamaah']);
            $sheet->setCellValue('D' . $row, $item['nomor_telepon']);
            $sheet->setCellValue('E' . $row, $item['jenis_kelamin']);
            $sheet->setCellValue('F' . $row, $item['alamat']);
            $sheet->setCellValue('G' . $row, $item['tanggal_keberangkatan']);
            $row++;
        }
    
        // Simpan output ke file Excel
        $filename = 'data_paket_' . $id_paket . '.xlsx';
    
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
    
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }    
}
