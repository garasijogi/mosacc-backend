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
        $this->load->model('rules_model');
    }
    
    
    public function index()
    {
        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        
        $this->load->view('acc/profil_v', $data);
    }

    public function akun(){
        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        $data['rules'] = $this->rules_model->get_rules();

        $this->load->view('acc/profil-akun_v', $data);
    }

    public function aset(){
        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        //get aset peralatan
        $data['aset_peralatan'] = $this->profil_m->get_aset('peralatan');
        //get aset bangunan/tanah
        $data['aset_bt'] = $this->profil_m->get_aset('bangunan/tanah');

        $this->load->view('acc/profil-aset_v', $data);
    }

    public function dkm(){
        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        //get ketua
        $data['ketua'] = $this->profil_m->getPegawai('ketua');
        //get bendahara
        $data['bendahara'] = $this->profil_m->getPegawai('bendahara');
        //get sekretaris
        $data['sekretaris'] = $this->profil_m->getPegawai('sekretaris');

        $this->load->view('acc/profil-dkm_v', $data);
    }

    public function edit_profil_masjid(){
          //data profil masjid
          $data['profil'] = $this->profil_m->getProfil();
          //get ketua
          $data['ketua'] = $this->profil_m->getPegawai('ketua');
          //get bendahara
          $data['bendahara'] = $this->profil_m->getPegawai('bendahara');
          //get sekretaris
          $data['sekretaris'] = $this->profil_m->getPegawai('sekretaris');

        $this->load->view('acc/edit_profil_masjid_v', $data);
    }

    public function edit_struktur_dkm(){
        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        //get ketua
        $data['ketua'] = $this->profil_m->getPegawai('ketua');
        //get bendahara
        $data['bendahara'] = $this->profil_m->getPegawai('bendahara');
        //get sekretaris
        $data['sekretaris'] = $this->profil_m->getPegawai('sekretaris');

        $this->load->view('acc/edit_struktur_dkm_v', $data);
    }

    public function proses_edit_profil_masjid()
    {
        $nama_masjid = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $thn = $this->input->post('tahun');
        $telepon = $this->input->post('telepon');
        $rekening = $this->input->post('rekening');
        $luas_tanah = $this->input->post('luas_tanah');
        $badan_hukum = $this->input->post('badan_hukum');
        $adart = $this->input->post('ad-art');

        $arraydata = array(
            'nama_masjid' => $nama_masjid
          );
          $this->session->set_userdata($arraydata);
        
        $this->profil_m->edit_profil_masjid($nama_masjid, $alamat, $thn, $telepon, $rekening, $luas_tanah, $badan_hukum, $adart);
        redirect('acc/profil/');
    }

    public function proses_edit_struktur_dkm()
    {
        //ketua
        $id_ketua = $this->input->post('id_ketua');
        $nama_ketua = $this->input->post('nama_ketua');
        $ttl_ketua = $this->input->post('ttl_ketua');
        $alamat_ketua = $this->input->post('alamat_ketua');
        $telepon_ketua = $this->input->post('telepon_ketua');
        $pendidikan_ketua = $this->input->post('pendidikan_ketua');
        $this->profil_m->edit_pegawai($id_ketua, $nama_ketua, $ttl_ketua, $alamat_ketua, $telepon_ketua, $pendidikan_ketua);

        //sekretaris
        $id_sekretaris = $this->input->post('id_sekretaris');
        $nama_sekretaris = $this->input->post('nama_sekretaris');
        $ttl_sekretaris = $this->input->post('ttl_sekretaris');
        $alamat_sekretaris = $this->input->post('alamat_sekretaris');
        $telepon_sekretaris = $this->input->post('telepon_sekretaris');
        $pendidikan_sekretaris = $this->input->post('pendidikan_sekretaris');
        $this->profil_m->edit_pegawai($id_sekretaris, $nama_sekretaris, $ttl_sekretaris, $alamat_sekretaris, $telepon_sekretaris, $pendidikan_sekretaris);
        
        //bendahara
        $id_bendahara = $this->input->post('id_bendahara');
        $nama_bendahara = $this->input->post('nama_bendahara');
        $ttl_bendahara = $this->input->post('ttl_bendahara');
        $alamat_bendahara = $this->input->post('alamat_bendahara');
        $telepon_bendahara = $this->input->post('telepon_bendahara');
        $pendidikan_bendahara = $this->input->post('pendidikan_bendahara');
        $this->profil_m->edit_pegawai($id_bendahara, $nama_bendahara, $ttl_bendahara, $alamat_bendahara, $telepon_bendahara, $pendidikan_bendahara);
        redirect('acc/profil/dkm');
    }
    
}

/* End of file  profil.php */

