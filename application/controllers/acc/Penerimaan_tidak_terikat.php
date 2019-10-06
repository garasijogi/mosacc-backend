<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_tidak_terikat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == NULL) {
      redirect('homepage');
    }
    $this->load->model('penerimaan_tidak_terikat_pending_model');
  }

  public function index()
  {
    $this->load->view('acc/penerimaan_tidak_terikat_v.php');
  }

  //pendapatan sewa
  function infaq_peminjaman_peralatan()
  {
    $data['controller'] = 'infaq_peminjaman_peralatan';
    $data['submenu'] = 'pendapatan sewa';
    $data['kd_akun'] = 11110;
    $kd_akun = $data['kd_akun'];
    $data['PTT'] = $this->penerimaan_tidak_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_tidak_terikat_v', $data);
  }

  function infaq_pemakaian_ruangan()
  {
    $data['controller'] = 'infaq_pemakaian_ruangan';
    $data['submenu'] = 'pendapatan sewa';
    $data['kd_akun'] = 11120;
    $kd_akun = $data['kd_akun'];
    $data['PTT'] = $this->penerimaan_tidak_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_tidak_terikat_v', $data);
  }

  //pendapatan parkir
  function pendapatan_parkir()
  {
    $data['controller'] = 'pendapatan_parkir';
    $data['submenu'] = 'pendapatan parkir';
    $data['kd_akun'] = 11200;
    $kd_akun = $data['kd_akun'];
    $data['PTT'] = $this->penerimaan_tidak_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_tidak_terikat_v', $data);
  }

  //infaq pengurusan jenazah
  function infaq_pengurusan_jenazah()
  {
    $data['controller'] = 'infaq_pengurusan_jenazah';
    $data['submenu'] = 'infaq pengurusan jenazah';
    $data['kd_akun'] = 11300;
    $kd_akun = $data['kd_akun'];
    $data['PTT'] = $this->penerimaan_tidak_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_tidak_terikat_v', $data);
  }
  //pendapatan non halal
  function pendapatan_non_halal()
  {
    $data['controller'] = 'pendapatan_non_halal';
    $data['submenu'] = 'pendapatan non halal';
    $data['kd_akun'] = 11400;
    $kd_akun = $data['kd_akun'];
    $data['PTT'] = $this->penerimaan_tidak_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_tidak_terikat_v', $data);
  }
  //pendapatan lainnya
  function pendapatan_lainnya()
  {
    $data['controller'] = 'pendapatan_lainnya';
    $data['submenu'] = 'pendapatan lainnya';
    $data['kd_akun'] = 11500;
    $kd_akun = $data['kd_akun'];
    $data['PTT'] = $this->penerimaan_tidak_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_tidak_terikat_v', $data);
  }


  //input
  function proses_input()
  {
    $controller = $this->input->post('controller');
    $kd_akun = $this->input->post('kd_akun_PTT');
    $tanggal = $this->input->post('tanggal_PTT');
    $nominal = $this->input->post('nominal_PTT');
    $keterangan = $this->input->post('keterangan_PTT');
    $nama_pemberi = $this->input->post('nama_pemberi_PTT');

    //generate idtr
    $tanggal = preg_replace('/\D/', '', $tanggal);
    $idtr_bak = $tanggal . $kd_akun;
    $result = $this->penerimaan_tidak_terikat_pending_model->count($idtr_bak);
    if ($result < 10) {
      $index = '00' . ($result + 1);
    } else if ($result < 100) {
      $index = '0' . ($result + 1);
    }
    $idtr = $idtr_bak . $index;

    $this->penerimaan_tidak_terikat_pending_model->input_tr($idtr, $kd_akun, $tanggal, $nominal, $keterangan, $nama_pemberi);
    redirect('acc/penerimaan_tidak_terikat/' . $controller);
  }
}


/* End of file Penerimaan_tidak_terikat.php */
/* Location: ./application/controllers/Penerimaan_tidak_terikat.php */
