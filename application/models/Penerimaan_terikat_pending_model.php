<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Penerimaan_terikat_pending_model extends CI_Model
{

  //gunakan variabel ini untuk mengakses database ke 2
  public $app_db;

  function count($idtr)
  {
    $this->app_db->like('idtr', $idtr);
    return $this->app_db->count_all_results('tr12_penerimaan_terikat_pending');
  }

  function get($kode)
  {
    $result = $this->app_db->get_where('tr12_penerimaan_terikat_pending', array('kd_akun' => $kode));
    return $result;
  }

  function input_tr($idtr, $kd_akun, $tanggal, $nominal, $keterangan, $nama_pemberi)
  {
    $data = array(
      'idtr' => $idtr,
      'kd_akun' => $kd_akun,
      'tanggal' => $tanggal,
      'nominal' => $nominal,
      'keterangan' => $keterangan,
      'nama_pemberi' => $nama_pemberi
    );
    $this->app_db->insert('tr12_penerimaan_terikat_pending', $data);
  }

  function edit_tr($idtr, $idtr_new, $tanggal, $nominal, $keterangan, $nama_pemberi)
  {
    $data = array(
      'idtr' => $idtr_new,
      'tanggal' => $tanggal,
      'nominal' => $nominal,
      'keterangan' => $keterangan,
      'nama_pemberi' => $nama_pemberi
    );
    $this->app_db->where('idtr', $idtr);
    $this->app_db->update('tr12_penerimaan_terikat_pending', $data);
  }

  function delete_tr($idtr)
  {
    $this->app_db->where('idtr', $idtr);
    $this->app_db->delete('tr12_penerimaan_terikat_pending');
  }
}

/* End of file Penerimaan_terikat_pending_model.php */
/* Location: ./application/models/Penerimaan_terikat_pending_model.php */
