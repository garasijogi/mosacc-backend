<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
    
    public function index()
    {
        $this->load->view('acc/profil_v');
    }

    public function akun(){
        $this->load->view('acc/profil-akun_v');
    }

    public function aset(){
        $this->load->view('acc/profil-aset_v');
    }

    public function dkm(){
        $this->load->view('acc/profil-dkm_v');
    }
    
}

/* End of file  profil.php */

