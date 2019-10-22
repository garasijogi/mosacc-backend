<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rules_model extends CI_Model
{

  // gunakan $this->app_db instead $->db untuk mengakses database transaksi
  public $app_db;

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  function get_rules()
  {
    $result = $this->db->get('rules');
    return $result;
  }

  function get_rules_where($indikator, $dk)
  {
    $result = $this->db->get_where('rules', array($dk => $indikator));
    return $result;
  }

  function get_record_where($menu, $kd_akun)
  {
    $result = $this->app_db->get_where($menu, array('kd_akun' => $kd_akun));
    return $result;
  }

  function get_all_records()
  {
    $result = $this->app_db->select('*')
      ->from('tr11_penerimaan_tidak_terikat_pending as tr11, tr12_penerimaan_terikat_pending as tr12, tr21_pembelian_pending as tr21, tr22_beban_pending as tr22');
    return $result;
  }

  function get_penerimaan_terikat($kode)
  {
    $result = $this->app_db->get_where('tr12_penerimaan_terikat_pending', array('kd_akun' => $kode));
    return $result;
  }

  function get_penerimaan_tidak_terikat($kode)
  {
    $result = $this->app_db->get_where('tr11_penerimaan_tidak_terikat_pending', array('kd_akun' => $kode));
    return $result;
  }

  function letak_kas($nama_menu_kp, $nama_sub_kp, $nominal_sub_kp, $nama_menu_kb, $nama_sub_kb, $nominal_sub_kb, $nama_menu, $nama_sub, $nominal_sub, $nama_menu_dptt, $nama_sub_dptt, $nominal_sub_dptt)
  {
    // Menentukan letak kas
    $total_kredit = 0;
    $total_debit = 0;
    for ($h = 0; $h < 4; $h++) {
      if ($h == 0) {
        $nama_menu_simpan = $nama_menu_kp;
        $nama_sub_simpan = $nama_sub_kp;
        $nominal_sub_simpan = $nominal_sub_kp;
      } elseif ($h == 1) {
        $nama_menu_simpan = $nama_menu_kb;
        $nama_sub_simpan = $nama_sub_kb;
        $nominal_sub_simpan = $nominal_sub_kb;
      } elseif ($h == 2) {
        $nama_menu_simpan = $nama_menu;
        $nama_sub_simpan = $nama_sub;
        $nominal_sub_simpan = $nominal_sub;
      } elseif ($h == 3) {
        $nama_menu_simpan = $nama_menu_dptt;
        $nama_sub_simpan = $nama_sub_dptt;
        $nominal_sub_simpan = $nominal_sub_dptt;
      }
      for ($x = 0; $x < count($nama_menu_simpan); $x++) {

        for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
          if ($h == 0 || $h == 1) :
            $total_debit = $total_debit + $nominal_sub_simpan[$x][$y];
          endif;
          if ($h == 2 || $h == 3) :
            $total_kredit = $total_kredit + $nominal_sub_simpan[$x][$y];
          endif;
        }
      }
    }
    return $total_kredit - $total_debit;
  }

  function aset_neto_tidak_terikat(){
    
  }


  // ------------------------------------------------------------------------

}

/* End of file Rules_model.php */
/* Location: ./application/models/Rules_model.php */
