<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Wizard extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('uploader'); //load helper uploader
        
    }
    
    
    public function index()
    {
        $this->load->view('wizard/wizard_intro_v');
    }
    
    public function profil(){
        
        if($this->session->userdata('profil_form')) { //cek jika session profil_form sdh tersedia
            $data = $this->session->userdata('profil_form'); //retrieve dan masukkan ke $data
        }else{
            //buat session kosong
            $profil_wizard['profil_form'] = array(
                'nama'       => '',
                'alamat'     => '',
                'tahun'      => '',
                'telepon'    => '',
                'rekening'   => '',
                'luas_tanah' => '',
                'ad_art'     => '',
                'badan_hukum'=> ''
            );
            $this->session->set_userdata($profil_wizard);
            
            $data = $this->session->userdata('profil_form'); //retrieve dan masukkan ke $data
        }
        
        // print_r($data);
        // exit();
        $this->load->view('wizard/wizard_profil_v', $data);
    }
    
    //proses profil
    public function profilProses(){
        //cek user ngubah file dgn liat apa dia milih file
        //cek nama file tersedia di session
        
        //setelah selesai unset semua variabel session
        
        //upload file ke folder temp
        $ad_art = siapUnggah('ad_art'); //file ad/art
        $badan_hukum = siapUnggah('badan_hukum'); //file badan_hukum
        
        $profil_wizard['profil_form'] = array(
            'nama'       => $this->input->post('nama'),
            'alamat'     => $this->input->post('alamat'),
            'tahun'      => $this->input->post('tahun'),
            'telepon'    => $this->input->post('telepon'),
            'rekening'   => $this->input->post('rekening'),
            'luas_tanah' => $this->input->post('luas_tanah'),
            'ad_art'     => $ad_art,
            'badan_hukum'=> $badan_hukum
        );
        
        $this->session->set_userdata($profil_wizard);// masukkan dalam session profil_wizard
        // $this->session->unset_userdata('nama'); // unset variabel session spesifik
        
        redirect('wizard/dkm');
    }
    
    public function dkm(){
        
        if($this->session->userdata('profil_dkm')) { //cek jika session profil_form sdh tersedia
            $data = $this->session->userdata('profil_dkm'); //retrieve dan masukkan ke $data
        }else{
            //buat session kosong
            $jabatan = array('ketua', 'sekre', 'bendum');
            //post semua value dan masukkan dalam wizard
            for($x=0;$x<3; $x++){
                $profil_wizard['profil_dkm'][$jabatan[$x]] = array(
                    'nama'       => '',
                    'alamat'     => '',
                    'telepon'    => '',
                    'pendidikan' => ''
                );
            }
            $this->session->set_userdata($profil_wizard);
            
            $data = $this->session->userdata('profil_dkm'); //retrieve dan masukkan ke $data
        }

        // print_r($data);
        // exit;
        
        $this->load->view('wizard/wizard_dkm_v', $data);
    }
    
    public function dkmProses(){
        //list nama jabatan
        $jabatan = array('ketua', 'sekre', 'bendum');
        //post semua value dan masukkan dalam wizard
        for($x=0;$x<3; $x++){
            $profil_wizard['profil_dkm'][$jabatan[$x]] = array(
                'nama'       => $this->input->post('nama-'.$jabatan[$x]),
                'alamat'     => $this->input->post('alamat-'.$jabatan[$x]),
                'telepon'    => $this->input->post('telepon-'.$jabatan[$x]),
                'pendidikan' => $this->input->post('pendidikan-'.$jabatan[$x])
            );
        }
        
        // print_r($profil_wizard);
        //masukkan dalam session
        $this->session->set_userdata($profil_wizard);// masukkan dalam session profil_wizard
        // $this->session->unset_userdata('nama'); // unset variabel session spesifik

        // print_r($this->session->userdata());
        // exit;

        redirect('wizard/aset');
        
    }
    
    public function aset(){

        $this->load->view('wizard/wizard_aset_v');
    }

    public function asetProcess(){
        
    }
    
    public function akun_baru(){
        $this->load->view('wizard/wizard_akun_baru_v');
    }
    
}

/* End of file  wizard.php */

