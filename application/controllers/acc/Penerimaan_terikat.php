<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaan_terikat extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('acc/penerimaan_terikat_v.php');
  }

  function infaq_kotak_jumat()
  {
    $data['kd_akun'] = $this->input->get('kd_akun');
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }

  function infaq_phbi()
  {
    $data['kd_akun'] = $this->input->get('kd_akun');
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }

  function infaq_pengajian()
  {
    $data['kd_akun'] = $this->input->get('kd_akun');
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }

  function infaq_ramadhan()
  {
    $data['kd_akun'] = $this->input->get('kd_akun');
    $this->load->view('acc/form_input_penerimaan_terikat_v', $data);
  }
}


/* End of file Penerimaan_terikat.php */
/* Location: ./application/controllers/Penerimaan_terikat.php */
