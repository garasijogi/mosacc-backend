<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  function get_user()
  {
    $result = $this->db->get('user');
    return $result;
  }

  function input_pegawai($nip, $nama_user, $divisi, $ruangan, $instalasi, $password)
  {
    $data = array(
      'NIP' => $nip,
      'nama_user' => $nama_user,
      'divisi' => $divisi,
      'ruangan' => $ruangan,
      'instalasi' => $instalasi,
      'password' => $password
    );
    $this->db->insert('user', $data);
  }

  function input_teknisi($nip, $nama_user, $divisi, $password)
  {
    $data = array(
      'NIP' => $nip,
      'nama_user' => $nama_user,
      'divisi' => $divisi,
      'password' => $password
    );
    $this->db->insert('user', $data);
  }

  // ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */