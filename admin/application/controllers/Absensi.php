<?php

class Absensi extends CI_Controller
{
  function __construct()
  {
    date_default_timezone_set('Asia/Jakarta');

    parent::__construct();
    if ($this->session->userdata('logged_in') !== TRUE) {
      redirect('login');
    }
    $this->load->model('Absensi_model');
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
    $id_karyawan = $this->session->userdata('id_karyawan');
    if (!$id_karyawan) {
      show_error('ID Karyawan tidak ditemukan', 500);
    }
    $this->db->select('karyawan.*, kantor_cabang.kota');
    $this->db->from('karyawan');
    $this->db->join('kantor_cabang', 'karyawan.fk_id_kantor = kantor_cabang.id_kantor', 'left');
    $this->db->where('karyawan.id_karyawan', $id_karyawan);
    $query = $this->db->get();
    $karyawan = $query->row_array();

    $data['_view'] = 'absensikaryawan/karyawan/index';
    $data['karyawan'] = $karyawan; // Tambahkan ini
    $this->load->view('layouts/main', $data);
  }

  public function izin()
  {
    $data['_view'] = 'absensikaryawan/karyawan/izin';
    $this->load->view('layouts/main', $data);
  }

  public function proses_absen()
  {
    date_default_timezone_set('Asia/Jakarta');

    $fk_id_karyawan = $this->session->userdata('id_karyawan');
    $id_kantor = $this->session->userdata('id_kantor'); // Kantor karyawan
    $foto_absen = $this->input->post('foto_absen');
    $lokasi_lat = $this->input->post('lokasi_lat');
    $lokasi_lng = $this->input->post('lokasi_lng');
    $tipe_absen = $this->input->post('tipe_absen');
    $status_absen = $this->input->post('status_absen');
    $alasan = $this->input->post('alasan');

    if (empty($lokasi_lat) || empty($lokasi_lng)) {
      echo json_encode(["success" => false, "message" => "Lokasi tidak boleh kosong"]);
      return;
    }

    $this->load->model('Absensi_model');

    // Cek apakah karyawan absen dalam radius kantor
    if (!$this->Absensi_model->cek_radius_absensi($lokasi_lat, $lokasi_lng, $id_kantor)) {
      echo json_encode(["success" => false, "message" => "Anda berada di luar area kantor!"]);
      return;
    }

    // Simpan gambar di folder uploads/
    $image_path = "assets/absensi/absen_" . time() . ".png";
    $image = str_replace('data:image/png;base64,', '', $foto_absen);
    $image = base64_decode($image);
    file_put_contents($image_path, $image);

    // Simpan ke database
    $data = array(
      'fk_id_karyawan' => $fk_id_karyawan,
      'foto_absen' => $image_path,
      'lokasi_lat' => $lokasi_lat,
      'lokasi_lng' => $lokasi_lng,
      'waktu_absen' => date("Y-m-d H:i:s"),
      'tipe_absen' => $tipe_absen,
      'status_absen' => $status_absen,
      'alasan' => $alasan,
      'approved_by' => 0
    );

    $this->db->insert('absensi_karyawan', $data);

    echo json_encode(["success" => true, "message" => "Absensi berhasil!"]);
  }

  public function cek_absensi_hari_ini()
  {
    $id_karyawan = $this->input->get('id_karyawan');
    $tanggal_hari_ini = date('Y-m-d');

    $cek_absensi = $this->db->where('fk_id_karyawan', $id_karyawan)
      ->where('DATE(waktu_absen)', $tanggal_hari_ini)
      ->get('absensi_karyawan');

    if ($cek_absensi->num_rows() > 0) {
      echo json_encode(["sudah_absen" => true]);
    } else {
      echo json_encode(["sudah_absen" => false]);
    }
  }

  public function get_absensi()
  {
    $user_id = $this->session->userdata('id_karyawan'); // ID user yang login

    $this->db->select("DATE(waktu_absen) AS tanggal, 
                        MAX(CASE WHEN tipe_absen = 'masuk' THEN TIME(waktu_absen) END) AS masuk,
                        MAX(CASE WHEN tipe_absen = 'pulang' THEN TIME(waktu_absen) END) AS pulang,
                        status_absen");
    $this->db->from("absensi_karyawan");
    $this->db->where("fk_id_karyawan", $user_id); // Filter hanya untuk user yang sedang login
    $this->db->group_by("DATE(waktu_absen), status_absen");

    $query = $this->db->get();

    echo json_encode($query->result());
  }

  public function proses_absen_force()
  {
    date_default_timezone_set('Asia/Jakarta');

    $fk_id_karyawan = $this->session->userdata('id_karyawan');
    $foto_absen = $this->input->post('foto_absen');
    $lokasi_lat = $this->input->post('lokasi_lat');
    $lokasi_lng = $this->input->post('lokasi_lng');
    $tipe_absen = $this->input->post('tipe_absen');
    $status_absen = $this->input->post('status_absen');
    $alasan = $this->input->post('alasan');

    // Simpan gambar di folder uploads/
    $image_path = "assets/absensi/absen_" . time() . ".png";
    $image = str_replace('data:image/png;base64,', '', $foto_absen);
    $image = base64_decode($image);
    file_put_contents($image_path, $image);

    // Simpan ke database sebagai record baru
    $data = array(
      'fk_id_karyawan' => $fk_id_karyawan,
      'foto_absen' => $image_path,
      'lokasi_lat' => $lokasi_lat,
      'lokasi_lng' => $lokasi_lng,
      'waktu_absen' => date("Y-m-d H:i:s"),
      'tipe_absen' => $tipe_absen,
      'status_absen' => $status_absen,
      'alasan' => $alasan,
      'approved_by' => 0
    );

    $this->db->insert('absensi_karyawan', $data);

    echo json_encode(["success" => true, "message" => "Absensi force berhasil!"]);
  }

  public function cek_radius()
  {
    $postData = json_decode(file_get_contents("php://input"), true);
    $lokasi_lat = $postData['lokasi_lat'];
    $lokasi_lng = $postData['lokasi_lng'];
    $id_kantor = $this->session->userdata('id_kantor');

    $this->load->model('Absensi_model');
    $dalam_radius = $this->Absensi_model->cek_radius_absensi($lokasi_lat, $lokasi_lng, $id_kantor);

    echo json_encode(["dalam_radius" => $dalam_radius]);
  }

  public function ajukan_izin()
  {
    $config['upload_path']   = './assets/absensi/lampiran/';
    $config['allowed_types'] = 'jpg|jpeg|png|pdf|docx';
    $config['max_size']      = 2048; // Maksimum 2MB
    $config['encrypt_name']  = TRUE; // Nama file akan diacak untuk menghindari duplikat

    $this->upload->initialize($config);

    $lampiran = null;

    if (!empty($_FILES['lampiran']['name'])) {
      if ($this->upload->do_upload('lampiran')) {
        $lampiran = $this->upload->data('file_name');
      } else {
        echo $this->upload->display_errors();
        exit; // Debugging, hapus ini jika sudah berjalan
      }
    }

    $data = [
      'fk_id_karyawan' => $this->input->post('fk_id_karyawan'),
      'tanggal_pengajuan' => $this->input->post('tanggal_pengajuan'),
      'jenis_pengajuan' => $this->input->post('jenis_pengajuan'),
      'tanggal_mulai' => $this->input->post('tanggal_mulai'),
      'tanggal_selesai' => $this->input->post('tanggal_selesai') ?? null,
      'alasan' => $this->input->post('alasan'),
      'status_pengajuan' => 'Diajukan',
      'lampiran' => $lampiran
    ];

    $insert = $this->Absensi_model->ajukanIzin($data);

    if ($insert) {
      echo json_encode(['status' => 'success', 'message' => 'Pengajuan berhasil dikirim!']);
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Gagal mengajukan izin.']);
    }
  }



  private function _uploadLampiran()
  {
    $config['upload_path']   = './assets/absensi/lampiran/';
    $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    $config['max_size']      = 2048; // 2MB
    $config['encrypt_name']  = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('lampiran')) {
      return ['status' => true, 'file_name' => $this->upload->data('file_name')];
    } else {
      return ['status' => false, 'error' => $this->upload->display_errors()];
    }
  }
}
