<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Rules_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Rules_model extends CI_Model
{

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
    $result = $this->db->get_where($menu, array('kd_akun' => $kd_akun));
    return $result;
  }

  function get_all_records()
  {
    $result = $this->db->select('*')
      ->from('tr11_penerimaan_tidak_terikat_pending as tr11, tr12_penerimaan_terikat_pending as tr12, tr21_pembelian_pending as tr21, tr22_beban_pending as tr22');
    return $result;
  }

  function get_penerimaan_terikat($kode)
  {
    $result = $this->db->get_where('tr12_penerimaan_terikat_pending', array('kd_akun' => $kode));
    return $result;
  }

  function get_penerimaan_tidak_terikat($kode)
  {
    $result = $this->db->get_where('tr11_penerimaan_tidak_terikat_pending', array('kd_akun' => $kode));
    return $result;
  }


  // ------------------------------------------------------------------------

}

/* End of file Rules_model.php */
/* Location: ./application/models/Rules_model.php */
