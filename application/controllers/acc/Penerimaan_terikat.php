<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_terikat extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == NULL) {
      redirect('homepage');
    }
    
    //OLD LOADER ------------------------------------------------------
    // $this->load->model('penerimaan_terikat_pending_model');
    
    //NEW LOADER ------------------------------------------------------
    //ambil tahun dari sistem
    $dynamic_tahun = date("Y");
    //load settingan database dynamic ke fungsi di helper db dynamic switcher 
    $dynamic_db = switch_db_dynamic($dynamic_tahun);
    //load model yang akan digunakan
    $this->load->model('penerimaan_terikat_pending_model');
    //taruh settingan database dalam array
    $this->penerimaan_terikat_pending_model->app_db = $this->load->database($dynamic_db, TRUE);
  }
  
  public function index()
  {
    $this->load->view('acc/penerimaan_terikat_v.php');
  }
  
  
  //peribadatan
  function infaq_kotak_jumat()
  {
    $data['controller'] = 'infaq_kotak_jumat';
    $data['submenu'] = 'peribadatan';
    $data['kd_akun'] = 12610;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function infaq_PHBI()
  {
    $data['controller'] = 'infaq_PHBI';
    $data['submenu'] = 'peribadatan';
    $data['kd_akun'] = 12620;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function infaq_pengajian()
  {
    $data['controller'] = 'infaq_pengajian';
    $data['submenu'] = 'peribadatan';
    $data['kd_akun'] = 12630;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function infaq_ramadhan()
  {
    $data['controller'] = 'infaq_ramadhan';
    $data['submenu'] = 'peribadatan';
    $data['kd_akun'] = 12640;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  //pendidikan
  function infaq_tpa_dan_tahfidz()
  {
    $data['controller'] = 'infaq_tpa_dan_tahfidz';
    $data['submenu'] = 'pendidikan';
    $data['kd_akun'] = 12700;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  //ZISWAF
  function infaq_dari_donatur()
  {
    $data['controller'] = 'infaq_dari_donatur';
    $data['submenu'] = 'ZISWAF';
    $data['kd_akun'] = 12810;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function infaq_kotak_dana_operasional()
  {
    $data['controller'] = 'infaq_kotak_dana_operasional';
    $data['submenu'] = 'ZISWAF';
    $data['kd_akun'] = 12820;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function infaq_kotak_dana_sosial()
  {
    $data['controller'] = 'infaq_kotak_dana_sosial';
    $data['submenu'] = 'ZISWAF';
    $data['kd_akun'] = 12830;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function zakat_fitrah()
  {
    $data['controller'] = 'zakat_fitrah';
    $data['submenu'] = 'ZISWAF';
    $data['kd_akun'] = 12840;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function fidyah()
  {
    $data['controller'] = 'fidyah';
    $data['submenu'] = 'ZISWAF';
    $data['kd_akun'] = 12850;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function infaq_untuk_baksos()
  {
    $data['controller'] = 'infaq_untuk_baksos';
    $data['submenu'] = 'ZISWAF';
    $data['kd_akun'] = 12860;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  function waqaf()
  {
    $data['controller'] = 'waqaf';
    $data['submenu'] = 'ZISWAF';
    $data['kd_akun'] = 12870;
    $kd_akun = $data['kd_akun'];
    $data['PT'] = $this->penerimaan_terikat_pending_model->get($kd_akun);
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
  
  
  //input
  function proses_input()
  {
    $controller = $this->input->post('controller');
    $kd_akun = $this->input->post('kd_akun_PT');
    $tanggal = $this->input->post('tanggal_PT');
    $nominal = $this->input->post('nominal_PT');
    $keterangan = $this->input->post('keterangan_PT');
    $nama_pemberi = $this->input->post('nama_pemberi_PT');
    
    //generate idtr
    $tanggal = preg_replace('/\D/', '', $tanggal);
    $idtr_bak = $tanggal . $kd_akun;
    $result = $this->penerimaan_terikat_pending_model->count($idtr_bak);
    if ($result < 10) {
      $index = '00' . ($result + 1);
    } else if ($result < 100) {
      $index = '0' . ($result + 1);
    }
    $idtr = $idtr_bak . $index;
    
    $this->penerimaan_terikat_pending_model->input_tr($idtr, $kd_akun, $tanggal, $nominal, $keterangan, $nama_pemberi);
    redirect('acc/penerimaan_terikat/' . $controller);
  }
}


/* End of file Penerimaan_terikat.php */
/* Location: ./application/controllers/Penerimaan_terikat.php */
