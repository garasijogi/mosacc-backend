<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('status') == NULL) {
      $this->load->view('homepage_v.php');
    }
    elseif($this->session->userdata('jenis_user') == 'manajer'){
      redirect('mgr/dashboard');
    }
    elseif($this->session->userdata('jenis_user') == 'akuntan'){
      redirect('acc/dashboard');
    }
  }
}


/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */
