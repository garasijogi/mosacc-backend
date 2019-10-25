<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Just_trying extends CI_Controller
{
  
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == NULL) {
      redirect('homepage');
    }
  }

  public function index()
  {
    $this->load->view('acc/just_trying_v.php');
    
  }

}


/* End of file Just_Trying.php */
/* Location: ./application/controllers/Just_Trying.php */