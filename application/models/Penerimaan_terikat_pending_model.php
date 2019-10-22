<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Penerimaan_terikat_pending_model extends CI_Model {

  //gunakan variabel ini untuk mengakses database ke 2
  public $app_db;

  function count($idtr){
    $this->app_db->like('idtr', $idtr);
    return $this->app_db->count_all_results('tr12_penerimaan_terikat_pending');
  }

  function get($kode)
  {
    $result = $this->app_db->get_where('tr12_penerimaan_terikat_pending', array('kd_akun'=>$kode));
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

  // function update_tr($id_pelanggan, $nama_pelanggan, $tipe_customer, $wilayah, $email, $password)
  // {
  //   $data = array(
  //     'nama_pelanggan' => $nama_pelanggan,
  //     'tipe_customer' => $tipe_customer,
  //     'wilayah' => $wilayah,
  //     'email' => $email,
  //     'password' => $password
  //   );
  //   $this->app_db->where('id_pelanggan', $id_pelanggan);
  //   $this->app_db->update('customer', $data);
  // }

  // function delete_Tr($id_pelanggan)
  // {
  //   $this->app_db->where('id_pelanggan', $id_pelanggan);
  //   $this->app_db->delete('customer');
  // }

}

/* End of file Penerimaan_terikat_pending_model.php */
/* Location: ./application/models/Penerimaan_terikat_pending_model.php */