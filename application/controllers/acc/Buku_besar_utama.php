<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_besar_utama extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == NULL) {
      redirect('homepage');
    }
    $this->load->model('rules_model');
  }

  public function index()
  {
    $this->load->view('acc/buku_besar_utama_v.php');
  }

  function jurnal_umum()
  {
    //kas di debit
    $data['kd_akun_debit'] = $this->rules_model->get_rules_where('kas', 'debit');
    $indicator_d = 0;
    foreach ($data['kd_akun_debit']->result() as $kddebit) {
      $kdd['jml_kdd'][$indicator_d] = $kddebit->kd_akun;
      $indicator_d++;
    }

    for ($i = 0; $i < $indicator_d; $i++) {
      $contain['D_PT'][$i] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', $kdd['jml_kdd'][$i]);
      $contain['D_PTT'][$i] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', $kdd['jml_kdd'][$i]);
    }

    //kas di kredit
    $data['kd_akun_kredit'] = $this->rules_model->get_rules_where('kas', 'kredit');
    $indicator_k = 0;
    foreach ($data['kd_akun_kredit']->result() as $kdkredit) {
      $kdk['jml_kdk'][$indicator_k] = $kdkredit->kd_akun;
      $indicator_k++;
    }

    for ($j = 0; $j < $indicator_k; $j++) {
      $contain['K_P'][$j] = $this->rules_model->get_record_where('tr21_pembelian_pending', $kdk['jml_kdk'][$j]);
      $contain['K_B'][$j] = $this->rules_model->get_record_where('tr22_beban_pending', $kdk['jml_kdk'][$j]);
    }

    //KIRIM

    //debit
    $data['indicator_d'] = $indicator_d;
    $data['rules'] = $this->rules_model->get_rules();
    $data['kdd'] = $kdd['jml_kdd'];
    for ($i = 0; $i < $indicator_d; $i++) {
      $data['contain_DPT'][$i] = $contain['D_PT'][$i];
    }
    for ($i = 0; $i < $indicator_d; $i++) {
      $data['contain_DPTT'][$i] = $contain['D_PTT'][$i];
    }

    //kredit
    $data['indicator_k'] = $indicator_k;
    $data['kdk'] = $kdk['jml_kdk'];
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KP'][$i] = $contain['K_P'][$i];
    }
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KB'][$i] = $contain['K_B'][$i];
    }

    $this->load->view('acc/jurnal_umum_v.php', $data);
  }

  function buku_besar()
  {
    //kas di debit
    $data['kd_akun_debit'] = $this->rules_model->get_rules_where('kas', 'debit');
    $indicator_d = 0;
    foreach ($data['kd_akun_debit']->result() as $kddebit) {
      $kdd['jml_kdd'][$indicator_d] = $kddebit->kd_akun;
      $indicator_d++;
    }

    for ($i = 0; $i < $indicator_d; $i++) {
      $contain['D_PT'][$i] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', $kdd['jml_kdd'][$i]);
      $contain['D_PTT'][$i] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', $kdd['jml_kdd'][$i]);
    }

    //kas di kredit
    $data['kd_akun_kredit'] = $this->rules_model->get_rules_where('kas', 'kredit');
    $indicator_k = 0;
    foreach ($data['kd_akun_kredit']->result() as $kdkredit) {
      $kdk['jml_kdk'][$indicator_k] = $kdkredit->kd_akun;
      $indicator_k++;
    }

    for ($j = 0; $j < $indicator_k; $j++) {
      $contain['K_P'][$j] = $this->rules_model->get_record_where('tr21_pembelian_pending', $kdk['jml_kdk'][$j]);
      $contain['K_B'][$j] = $this->rules_model->get_record_where('tr22_beban_pending', $kdk['jml_kdk'][$j]);
    }

    //KIRIM

    //debit
    $data['indicator_d'] = $indicator_d;
    $data['rules'] = $this->rules_model->get_rules();
    $data['kdd'] = $kdd['jml_kdd'];
    for ($i = 0; $i < $indicator_d; $i++) {
      $data['contain_DPT'][$i] = $contain['D_PT'][$i];
    }
    for ($i = 0; $i < $indicator_d; $i++) {
      $data['contain_DPTT'][$i] = $contain['D_PTT'][$i];
    }

    //kredit
    $data['indicator_k'] = $indicator_k;
    $data['kdk'] = $kdk['jml_kdk'];
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KP'][$i] = $contain['K_P'][$i];
    }
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KB'][$i] = $contain['K_B'][$i];
    }
    $this->load->view('acc/buku_besar_v.php', $data);
  }

  function neraca_saldo()
  {
    $this->load->view('acc/neraca_saldo_v.php');
  }
}


/* End of file Buku_besar_utama.php */
/* Location: ./application/controllers/Buku_besar_utama.php */
