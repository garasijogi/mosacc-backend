<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Wizard extends CI_Controller {
    
    public function index()
    {
        $this->load->view('wizard/intro_v');
    }

    public function profil(){
        $this->load->view('wizard/profil_v');
    }

    public function dkm(){
        $this->load->view('wizard/dkm_v');
    }

    public function aset(){
        $this->load->view('wizard/aset_v');
    }

    public function akun_baru(){
        $this->load->view('wizard/akun_baru_v');
    }
    
}

/* End of file  wizard.php */

