<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }

        $this->load->model('profil_m');
    }
    
    
    public function index()
    {
        $data['profil'] = $this->profil_m->getProfil();
        
        $this->load->view('acc/profil_v', $data);
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

    public function editProfil(){
        $data['profil'] = $this->profil_m->getProfil();

        $this->load->view('acc/edit_profil_masjid_v', $data);
        
    }
    
}

/* End of file  profil.php */

