<?php

class Absensi extends CI_Controller
{
  function __construct()
  {
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

  public function proses_absen()
  {
    $fk_id_karyawan = $this->session->userdata('id_karyawan');
    $foto_absen = $this->input->post('foto_absen');
    $lokasi_lat = $this->input->post('lokasi_lat');
    $lokasi_lng = $this->input->post('lokasi_lng');
    $tipe_absen = $this->input->post('tipe_absen');
    $status_absen = $this->input->post('status_absen');
    $alasan = $this->input->post('alasan');

    error_log("LAT: " . $lokasi_lat);
    error_log("LNG: " . $lokasi_lng);

    if (empty($lokasi_lat) || empty($lokasi_lng)) {
      echo json_encode(["success" => false, "message" => "Lokasi tidak boleh kosong"]);
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
    error_log("QUERY: " . $this->db->last_query());

    echo json_encode(["success" => true]);
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
}
