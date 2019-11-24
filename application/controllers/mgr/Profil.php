<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }

        $this->load->helper('uploader'); //load helper uploader

        $this->load->model('profil_m');
        $this->load->model('rules_model');
    }


    public function index()
    {
        //ambil data file
        $jenis_file = array('ad_art', 'badan_hukum', 'foto_profil');
        foreach ($jenis_file as $v) {
            $data['files'][$v] = $this->profil_m->getFiles($v);
        }

        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();

        $this->load->view('mgr/profil_v', $data);
    }

    public function akun()
    {
        //ambil data file
        $jenis_file = array('foto_profil');
        foreach ($jenis_file as $v) {
            $data['files'][$v] = $this->profil_m->getFiles($v);
        }

        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        $data['rules'] = $this->rules_model->get_rules();

        $this->load->view('mgr/profil-akun_v', $data);
    }

    public function aset()
    {
        //ambil data file
        $jenis_file = array('foto_profil');
        foreach ($jenis_file as $v) {
            $data['files'][$v] = $this->profil_m->getFiles($v);
        }

        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        //get aset peralatan
        $data['aset_peralatan'] = $this->profil_m->get_aset('aset-peralatan');
        //get aset bangunan/tanah
        $data['aset_bt'] = $this->profil_m->get_aset('aset-bangunan_tanah');

        $this->load->view('mgr/profil-aset_v', $data);
    }

    public function dkm()
    {
        //ambil data file
        $jenis_file = array('struktur_dkm', 'foto_profil');
        foreach ($jenis_file as $v) {
            $data['files'][$v] = $this->profil_m->getFiles($v);
        }

        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        //get ketua
        $data['ketua'] = $this->profil_m->getPegawai('ketua');
        //get bendahara
        $data['bendahara'] = $this->profil_m->getPegawai('bendahara');
        //get sekretaris
        $data['sekretaris'] = $this->profil_m->getPegawai('sekretaris');

        $this->load->view('mgr/profil-dkm_v', $data);
    }

    public function edit_profil_masjid()
    {
        //buat session files & masukkan data untuk dibawa ke view
        $jenis_file = array('ad_art', 'badan_hukum', 'foto_profil'); //, 'foto_profil'
        foreach ($jenis_file as $v) {
            $data['files'][$v] = $this->profil_m->getFiles($v);
        }

        foreach ($data['files'] as $k => $v) {
            $file_session['files'][$k] = $v[0];
        }

        $this->session->set_userdata($file_session);

        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();

        $this->load->view('mgr/edit_profil_masjid_v', $data);
    }

    public function edit_struktur_dkm()
    {
        //ambil file
        $jenis_file = array('struktur_dkm', 'foto_profil');
        foreach ($jenis_file as $v) {
            $data['files'][$v] = $this->profil_m->getFiles($v);
        }

        foreach ($data['files'] as $k => $v) {
            $file_session['files'][$k] = $v[0];
        }

        $this->session->set_userdata($file_session);

        //data profil masjid
        $data['profil'] = $this->profil_m->getProfil();
        //get ketua
        $data['ketua'] = $this->profil_m->getPegawai('ketua');
        //get bendahara
        $data['bendahara'] = $this->profil_m->getPegawai('bendahara');
        //get sekretaris
        $data['sekretaris'] = $this->profil_m->getPegawai('sekretaris');

        $this->load->view('mgr/edit_struktur_dkm_v', $data);
    }

    public function proses_edit_profil_masjid()
    {
        //upload files
        $ad_art      = siapUnggah('ad_art', 'files'); //file ad/art (parameter post files, nama session)
        $badan_hukum = siapUnggah('badan_hukum', 'files'); //file badan_hukum (parameter post files, nama session)
        $foto_profil = siapUnggah('foto_profil', 'files'); //file badan_hukum (parameter post files, nama session)

        //ambil session files dan taruh di base
        $dasar = $this->session->userdata('files');
        //siapkan yg ingin direplace
        $pengganti = array(
            'ad_art'      => $ad_art,
            'badan_hukum' => $badan_hukum,
            'foto_profil' => $foto_profil
        );
        //replace
        $files = array_replace(
            $dasar,
            $pengganti
        );
        //hapus session
        $this->session->unset_userdata('files');
        //masukkan files ke database
        foreach ($files as $k => $v) {
            $this->profil_m->edit_file($k, $v);
        }

        //bungkus informasi file
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

        $this->profil_m->edit_profil_masjid($nama_masjid, $alamat, $thn, $telepon, $rekening, $luas_tanah);
        redirect('mgr/profil/');
    }

    public function proses_edit_struktur_dkm()
    {
        //upload files
        $struktur_dkm = siapUnggah('struktur_dkm', 'files'); //file badan_hukum (parameter post files, nama session)

        //ambil session files dan taruh di base
        $dasar = $this->session->userdata('files');
        //siapkan yg ingin direplace
        $pengganti = array(
            'struktur_dkm'  => $struktur_dkm
        );
        //replace
        $files = array_replace(
            $dasar,
            $pengganti
        );
        //hapus session
        $this->session->unset_userdata('files');
        //masukkan ke database
        foreach ($files as $k => $v) {
            $this->profil_m->edit_file($k, $v);
        }

        //ketua
        $id_ketua = $this->input->post('id_ketua');
        $nama_ketua = $this->input->post('nama_ketua');
        $alamat_ketua = $this->input->post('alamat_ketua');
        $telepon_ketua = $this->input->post('telepon_ketua');
        $pendidikan_ketua = $this->input->post('pendidikan_ketua');
        $this->profil_m->edit_pegawai($id_ketua, $nama_ketua, $alamat_ketua, $telepon_ketua, $pendidikan_ketua);

        //sekretaris
        $id_sekretaris = $this->input->post('id_sekretaris');
        $nama_sekretaris = $this->input->post('nama_sekretaris');
        $alamat_sekretaris = $this->input->post('alamat_sekretaris');
        $telepon_sekretaris = $this->input->post('telepon_sekretaris');
        $pendidikan_sekretaris = $this->input->post('pendidikan_sekretaris');
        $this->profil_m->edit_pegawai($id_sekretaris, $nama_sekretaris, $alamat_sekretaris, $telepon_sekretaris, $pendidikan_sekretaris);

        //bendahara
        $id_bendahara = $this->input->post('id_bendahara');
        $nama_bendahara = $this->input->post('nama_bendahara');
        $alamat_bendahara = $this->input->post('alamat_bendahara');
        $telepon_bendahara = $this->input->post('telepon_bendahara');
        $pendidikan_bendahara = $this->input->post('pendidikan_bendahara');
        $this->profil_m->edit_pegawai($id_bendahara, $nama_bendahara, $alamat_bendahara, $telepon_bendahara, $pendidikan_bendahara);
        redirect('mgr/profil/dkm');
    }
}

/* End of file  profil.php */
