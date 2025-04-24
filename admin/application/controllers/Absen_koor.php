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
    public function koordinator()
    {
        $data['_view'] = 'absensikaryawan/koordinator/index';
        $this->load->view('layouts/main', $data);
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
                $company = $this->session->userdata('company');
                $user_id = $this->AbsenKoor_model->insert_user($userData);
                if ($user_id) {
                    $karyawanData = [
                        'fk_id_user'  => $user_id,
                        'fk_id_kantor' => $this->input->post('fk_id_kantor', true),
                        'nomor_hp'    => $this->input->post('nomor_hp', true),
                        'company'      => $company,
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
            // $this->AbsenKoor_model->reorder_karyawan_ids();
            $this->session->set_flashdata('success', 'Data karyawan berhasil dihapus!');
            redirect('absen_koor/index');
        } else {
            show_404();
        }
    }
    public function logabsen()
    {
        $tanggal = $this->input->get('tanggal');
        $kota = $this->input->get('kota');
        $nama_pegawai = $this->input->get('nama_pegawai');
        $data['presensi'] = $this->AbsenKoor_model->get_all_presensi([], $tanggal, $kota, $nama_pegawai);
        $data['cabang'] = $this->AbsenKoor_model->get_all_cabang();
        $data['pegawai'] = $this->AbsenKoor_model->get_all_karyawan_log();
        $data['_view'] = 'absensikaryawan/koordinator/logabsen';
        $this->load->view('layouts/main', $data);
    }
    public function get_filtered_absen()
    {
        $company = $this->session->userdata('company');
        $tanggal = $this->input->post('tanggal');
        $cabang = $this->input->post('cabang');
        $nama_pegawai = $this->input->post('nama_pegawai');

        $tanggal_awal = null;
        $tanggal_akhir = null;
        if (!empty($tanggal)) {
            $tanggal_range = explode(' s.d. ', $tanggal);
            if (isset($tanggal_range[0])) {
                $tanggal_awal = date('Y-m-d', strtotime(str_replace('-', '/', trim($tanggal_range[0]))));
            }
            if (isset($tanggal_range[1])) {
                $tanggal_akhir = date('Y-m-d', strtotime(str_replace('-', '/', trim($tanggal_range[1]))));
            }
        }

        $result = $this->AbsenKoor_model->get_filtered_absen($company, $tanggal_awal, $tanggal_akhir, $cabang, $nama_pegawai);
        $totalData = $this->AbsenKoor_model->get_all_presensi_count();
        $totalFiltered = count($result);

        echo json_encode([
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $result
        ]);
    }
    public function get_pegawai()
    {
        $search = $this->input->get("search");
        $company = $this->session->userdata('company');
        $this->db->select("id_karyawan, nama_karyawan");
        $this->db->from("karyawan");
        $this->db->order_by("id_karyawan", "DESC");
        if (!empty($search)) {
            $this->db->like("nama_karyawan", $search);
        }
        if (!empty($company)) {
            $this->db->where('company', $company);
        }
        $query = $this->db->get();
        $result = $query->result_array();

        echo json_encode($result);
    }
    public function download_absen()
    {
        require_once APPPATH . '../vendor/autoload.php';
        $company = $this->session->userdata('company');
        $tanggal = $this->input->get('tanggal');
        $cabang = $this->input->get('cabang');
        $nama_pegawai = $this->input->get('nama_pegawai');

        $tanggal_awal = null;
        $tanggal_akhir = null;

        if (!empty($tanggal)) {
            $tanggal_range = explode(' s.d. ', $tanggal);
            if (isset($tanggal_range[0])) {
                $tanggal_awal = date('Y-m-d', strtotime(trim($tanggal_range[0])));
            }
            if (isset($tanggal_range[1])) {
                $tanggal_akhir = date('Y-m-d', strtotime(trim($tanggal_range[1])));
            }
        }

        $data = $this->AbsenKoor_model->get_filtered_absen($company, $tanggal_awal, $tanggal_akhir, $cabang, $nama_pegawai);
        if (!$data) {
            show_error('Data tidak ditemukan!', 404);
            return;
        }

        $grouped_data = [];
        foreach ($data as $absen) {
            $id_karyawan = $absen['id_karyawan'];
            if (!isset($grouped_data[$id_karyawan])) {
                $grouped_data[$id_karyawan] = [
                    'nama_karyawan' => $absen['nama_karyawan'],
                    'cabang' => $absen['cabang'],
                    'presensi' => []
                ];
            }
            $tanggal_str = $absen['tanggal'];
            $grouped_data[$id_karyawan]['presensi'][$tanggal_str] = [
                'masuk' => $absen['masuk'] ?? '',
                'pulang' => $absen['pulang'] ?? ''
            ];
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Periode:');
        $sheet->setCellValue('B1', "$tanggal_awal ~ $tanggal_akhir (ROSANA GROUP)");
        $sheet->getStyle('A1:B1')->getFont()->setBold(true)->setName('Arial');
        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Cabang');
        $sheet->getStyle('A3:C3')->getFont()->setBold(true)->setName('Times New Roman');

        $dateColumnIndex = 'D';
        $period = new DatePeriod(
            new DateTime($tanggal_awal),
            new DateInterval('P1D'),
            (new DateTime($tanggal_akhir))->modify('+1 day')
        );
        foreach ($period as $date) {
            $sheet->setCellValue($dateColumnIndex . '3', $date->format('d'));
            $hari_indonesia = [
                'Sunday' => 'Minggu',
                'Monday' => 'Senin',
                'Tuesday' => 'Selasa',
                'Wednesday' => 'Rabu',
                'Thursday' => 'Kamis',
                'Friday' => 'Jumat',
                'Saturday' => 'Sabtu'
            ];
            $sheet->setCellValue($dateColumnIndex . '4', ucfirst($hari_indonesia[$date->format('l')]));
            $dateColumnIndex++;
        }

        $row = 5;
        $nomor = 1;
        foreach ($grouped_data as $id_karyawan => $absen) {
            $col = 'D';

            foreach ($period as $date) {
                $tanggal_str = $date->format('Y-m-d');
                $masuk = !empty($absen['presensi'][$tanggal_str]['masuk']) ? date('H:i:s', strtotime($absen['presensi'][$tanggal_str]['masuk'])) : '-';
                $pulang = !empty($absen['presensi'][$tanggal_str]['pulang']) ? date('H:i:s', strtotime($absen['presensi'][$tanggal_str]['pulang'])) : '-';
                $cellValue = ($masuk !== '-' || $pulang !== '-') ? trim($masuk . "\n" . $pulang) : "-";
                $sheet->setCellValue($col . $row, $cellValue);
                $sheet->getStyle($col . $row)->getAlignment()->setWrapText(true);
                $col++;
            }
            $sheet->setCellValue('A' . $row, $nomor);
            $sheet->setCellValue('B' . $row, $absen['nama_karyawan']);
            $sheet->setCellValue('C' . $row, $absen['cabang']);
            $sheet->mergeCells("A3:A4");
            $sheet->mergeCells("B3:B4");
            $sheet->mergeCells("C3:C4");
            if ($nomor % 2 == 1) {
                $sheet->getStyle("A$row:$col$row")->applyFromArray([
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'D9D9D9']
                    ]
                ]);
            }
            $nomor++;
            $row++;
        }
        foreach (range('A', $col) as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }
        $lastColumn = $col;
        $lastRow = $row - 1;
        $sheet->getStyle("A3:$lastColumn$lastRow")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ]
        ]);
        $sheet->getStyle("A3:$lastColumn$lastRow")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("A3:$lastColumn$lastRow")->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $bulanTahun = date('F_Y', strtotime($tanggal_akhir));
        $filename = "Absensi_" . $bulanTahun . ".xlsx";

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function logizin()
    {
        $tanggal = $this->input->get('tanggal');
        $kota = $this->input->get('kota');
        $nama_pegawai = $this->input->get('nama_pegawai');
        $data['izin'] = $this->AbsenKoor_model->getIzin([], $tanggal, $kota, $nama_pegawai);
        $data['cabang'] = $this->AbsenKoor_model->get_all_cabang();
        $data['pegawai'] = $this->AbsenKoor_model->get_all_karyawan_log();
        $data['_view'] = 'absensikaryawan/koordinator/logizin';
        $this->load->view('layouts/main', $data);
    }
    public function update_status()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        if ($id && $status) {
            $this->load->model('AbsenKoor_model');
            $update = $this->AbsenKoor_model->updateStatus($id, $status);
            if ($update) {
                $this->session->set_flashdata('success', 'Status berhasil diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui status.');
            }
        } else {
            $this->session->set_flashdata('error', 'Data tidak valid.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
