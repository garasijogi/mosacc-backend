<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }
    }

    public function index()
    {
        $this->load->view('acc/pembelian_v');
        
    }
    
}

/* End of file  Pembelian.php */

