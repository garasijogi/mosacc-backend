<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Wizard extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        
        // //sql kueri untuk membuat database master jika tidak ada di sistem
        // $this->db->trans_start();
        // $this->db->query("CREATE DATABASE IF NOT EXISTS 'mosacc_master';");
        // $this->db->query("USE 'mosacc_master';");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `aset-bangunan_tanah` (`id_aset` int(11) NOT NULL, `nama` varchar(256) DEFAULT NULL, `tanggal` date DEFAULT NULL, `luas` double DEFAULT NULL, `nilai` double DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `aset-kas_bank` (`norek` varchar(64) NOT NULL, `nama_pemilik` varchar(128) DEFAULT NULL, `nama_bank` varchar(128) DEFAULT NULL, `nominal` double DEFAULT NULL, `tanggal` date DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `aset-peralatan` (`id_aset` int(6) NOT NULL, `nama` varchar(128) DEFAULT NULL, `merek` varchar(64) DEFAULT NULL, `tanggal` date DEFAULT NULL, `kategori` varchar(64) DEFAULT NULL, `jumlah` varchar(3) DEFAULT NULL, `harga` double DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `files` (`id` int(11) NOT NULL, `nama` varchar(512) DEFAULT NULL, `jenis_file` varchar(24) DEFAULT NULL, `tipe_file` varchar(256) DEFAULT NULL, `ekstensi` varchar(8) DEFAULT NULL, `ukuran` double DEFAULT NULL, `tanggal` date DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `profil_dkm` (`id_pengurus` int(11) NOT NULL, `nama` varchar(256) DEFAULT NULL, `posisi` enum('bendahara','ketua','sekretaris','struktur_dkm') NOT NULL, `alamat` varchar(512) DEFAULT NULL, `telepon` varchar(15) DEFAULT NULL, `pendidikan` varchar(32) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `profil_masjid` (`id_profil` int(11) NOT NULL, `nama` varchar(256) DEFAULT NULL, `alamat` varchar(512) DEFAULT NULL, `tahun` varchar(4) DEFAULT NULL, `telepon` varchar(15) DEFAULT NULL, `rekening` varchar(32) DEFAULT NULL, `luas_tanah` varchar(16) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `rules` (`kd_akun` varchar(5) NOT NULL, `kd_bagan` varchar(5) NOT NULL, `menu` varchar(256) NOT NULL, `nama_sub` varchar(256) NOT NULL, `debit` varchar(256) NOT NULL, `kredit` varchar(256) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->query("CREATE TABLE IF NOT EXISTS `user` (`NIP` int(25) NOT NULL, `nama_user` varchar(256) NOT NULL, `jenis_user` enum('akuntan','manager') NOT NULL, `password` varchar(256) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
        // $this->db->trans_complete();

        //cek data user pada database, apakah tersedia
        if (!empty($this->db->get('user')->result())){
            redirect('homepage');//arahkan ke modul wizard
        }
        
        $this->load->helper('uploader'); //load helper uploader
        
        $this->load->model('wizard_m');

    }
    
    
    public function index()
    {
        //buat session files kosong  jika tidak ada
        if(!$this->session->userdata('files')) { //cek jika session files tidak tersedia
            $files = array('ad_art', 'badan_hukum', 'struktur_dkm');
            //buat session kosong
            foreach ($files as $v){
                $file_wizard['files'][$v] = array(
                    'nama'        => '',
                    'jenis_file'  => $v,
                    'tipe_file'   => '',
                    'ekstensi'    => '',
                    'ukuran'      => '',
                    'tanggal'     => ''
                );
            }
            
            $this->session->set_userdata($file_wizard);
        }
        
        $this->load->view('wizard/wizard_intro_v');
    }
    
    public function profil(){
        
        if($this->session->userdata('profil_form')) { //cek jika session profil_form sdh tersedia
            $data['profil_form'] = $this->session->userdata('profil_form'); //retrieve dan masukkan ke $data
        }else{
            //buat session kosong
            $profil_wizard['profil_form'] = array(
                'nama'       => '',
                'alamat'     => '',
                'tahun'      => '',
                'telepon'    => '',
                'rekening'   => '',
                'luas_tanah' => ''
            );
            $this->session->set_userdata($profil_wizard);
            
            $data['profil_form'] = $this->session->userdata('profil_form'); //retrieve dan masukkan ke $data
        }
        
        $data['files'] = $this->session->userdata('files'); //retrieve dan masukkan ke $data
        
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
        $ad_art = siapUnggah('ad_art', 'files'); //file ad/art (parameter post files, nama session)
        $badan_hukum = siapUnggah('badan_hukum', 'files'); //file badan_hukum (parameter post files, nama session)
        
        //ambil session files dan taruh di base
        $dasar = $this->session->userdata('files');
        //siapkan yg ingin direplace
        $pengganti = array(
            'ad_art'      => $ad_art,
            'badan_hukum' => $badan_hukum
        );
        //replace
        $files_wizard['files'] = array_replace(
            $dasar, $pengganti
        );
        
        
        $profil_wizard['profil_form'] = array(
            'nama'       => $this->input->post('nama'),
            'alamat'     => $this->input->post('alamat'),
            'tahun'      => $this->input->post('tahun'),
            'telepon'    => $this->input->post('telepon'),
            'rekening'   => $this->input->post('rekening'),
            'luas_tanah' => $this->input->post('luas_tanah')
        );
        
        $this->session->set_userdata($profil_wizard);// masukkan dalam session profil_wizard
        $this->session->set_userdata($files_wizard);// masukkan dalam session profil_wizard
        // $this->session->unset_userdata('nama'); // unset variabel session spesifik
        
        redirect('wizard/dkm');
    }
    
    public function dkm(){
        if($this->session->userdata('profil_dkm')) { //cek jika session profil_form sdh tersedia
            $data['profil_dkm'] = $this->session->userdata('profil_dkm'); //retrieve dan masukkan ke $data
        }else{
            //buat session kosong
            $jabatan = array('ketua', 'sekretaris', 'bendahara');
            //post semua value dan masukkan dalam wizard
            foreach($jabatan as $v){            
                $profil_wizard['profil_dkm'][$v] = array(
                    'nama'       => '',
                    'posisi'     => '',
                    'alamat'     => '',
                    'telepon'    => '',
                    'pendidikan' => ''
                );
            }
            
            $data['profil_dkm'] = $this->session->userdata('profil_dkm'); //retrieve dan masukkan ke $data
        }
        
        $data['files'] = $this->session->userdata('files'); //retrieve dan masukkan ke $data
        
        // print_r($data);
        // exit;
        
        $this->load->view('wizard/wizard_dkm_v', $data);
    }
    
    public function dkmProses(){
        //Upload file
        $struktur_dkm = siapUnggah('struktur_dkm', 'files'); //panggil struktur_dkm dengan mengambil nama file nya
        
        //ambil session files dan taruh di base
        $dasar = $this->session->userdata('files');
        //siapkan yg ingin direplace
        $pengganti = array(
            'struktur_dkm' => $struktur_dkm
        );
        //replace
        $files_wizard['files'] = array_replace(
            $dasar, $pengganti
        );
        
        //list nama jabatan
        $jabatan = array('ketua', 'sekretaris', 'bendahara');
        //post semua value dan masukkan dalam wizard
        foreach($jabatan as $v){
            $profil_wizard['profil_dkm'][$v] = array(
                'nama'       => $this->input->post('nama-'.$v),
                'posisi'     => $v,
                'alamat'     => $this->input->post('alamat-'.$v),
                'telepon'    => $this->input->post('telepon-'.$v),
                'pendidikan' => $this->input->post('pendidikan-'.$v)
            );
        }
        
        // $userfile = $this->session->userdata('profil_dkm')['struktur_dkm']['nama'];//memangggil nama file
        
        
        
        //masukkan dalam session
        $this->session->set_userdata($profil_wizard);// masukkan dalam session profil_wizard
        $this->session->set_userdata($files_wizard);// masukkan dalam session profil_wizard
        
        // print_r($this->session->userdata('files'));
        // exit;
        // $this->session->unset_userdata('nama'); // unset variabel session spesifik
        
        redirect('wizard/aset');
    }
    
    public function aset(){
        //cek session peralatan
        if($this->session->userdata('peralatan')) { //cek jika session profil_form sdh tersedia
            $data['peralatan'] = $this->session->userdata('peralatan'); //retrieve dan masukkan ke $data
        }else{
            $data['peralatan'] = $this->emptyArray('peralatan');
        }
        
        //cek session bangunan tanah
        if($this->session->userdata('bangunan_tanah')){
            $data['bangunan_tanah'] = $this->session->userdata('bangunan_tanah'); //retrieve dan masukkan ke $data
        }else{
            $data['bangunan_tanah'] = $this->emptyArray('bangunan_tanah');
        }
        
        //cek session kas bank
        if($this->session->userdata('kas_bank')){
            $data['kas_bank'] = $this->session->userdata('kas_bank'); //retrieve dan masukkan ke $data
        }else{
            $data['kas_bank'] = $this->emptyArray('kas_bank');
        }
        
        
        $this->load->view('wizard/wizard_aset_v', $data);
    }
    
    //function buat bikin array kosong di session aset
    public function emptyArray($section){
        if($section == 'peralatan'){
            //buat session kosong
            $data['peralatan'][0] = array(
                'nama'     => '',
                'merek'    => '',
                'tanggal'  => '',
                'kategori' => '',
                'jumlah'   => '',
                'harga'    => ''
            );
            
            $this->session->set_userdata($data);
            
            return $this->session->userdata('peralatan'); //retrieve dan masukkan ke $data
            
        }elseif($section == 'bangunan_tanah'){
            //buat session kosong
            $data['bangunan_tanah'][0] = array(
                'nama'    => '',
                'tanggal' => '',
                'luas'    => '',
                'nilai'   => ''
            );
            $this->session->set_userdata($data);
            
            return $this->session->userdata('bangunan_tanah');
            
        }elseif($section == 'kas_bank'){
            $data['kas_bank'][0] = array(
                'norek'        => '',
                'nama_bank'    => '',
                'nama_pemilik' => '',
                'nominal'      => '',
                'tanggal'      => ''
            );
            $this->session->set_userdata($data);
            
            return $this->session->userdata('kas_bank');
        }else{
            echo'ERROR';
            exit;
        }
    }
    
    public function asetPeralatan(){
        //hitung jumlah form input field dengan liat brp banyak yg dimasukkan ke dalam variabel $_POST lalu dibagi dengan jumlah inputnya
        $form_count = count($this->input->post())/6;
        
        //lakukan perulangan untuk mengepos ke dalam variabel
        for($x=0; $x<$form_count; $x++){
            //ambil masing2 nilai dari $_POST
            $data['peralatan'][$x] = array(
                'nama'     => $this->input->post('peralatan_'.$x.'-nama'),
                'merek'    => $this->input->post('peralatan_'.$x.'-merek'),
                'tanggal'  => $this->input->post('peralatan_'.$x.'-tanggal'),
                'kategori' => $this->input->post('peralatan_'.$x.'-kategori'),
                'jumlah'   => $this->input->post('peralatan_'.$x.'-jumlah'),
                'harga'    => $this->input->post('peralatan_'.$x.'-harga')
            );
        }
        
        //masukkan ke session
        $this->session->set_userdata($data);
        
        //refresh halaman
        redirect('wizard/aset');
    }
    
    public function asetBangunanTanah(){
        //hitung jumlah form input field dengan liat brp banyak yg dimasukkan ke dalam variabel $_POST lalu dibagi dengan jumlah inputnya
        $form_count = count($this->input->post())/4;
        
        //lakukan perulangan untuk mengepos ke dalam variabel
        for($x=0; $x<$form_count; $x++){
            //ambil masing2 nilai dari $_POST
            $data['bangunan_tanah'][$x] = array(
                'nama'      => $this->input->post('bangunan_tanah_'.$x.'-nama'),
                'tanggal'   => $this->input->post('bangunan_tanah_'.$x.'-tanggal'),
                'luas'      => $this->input->post('bangunan_tanah_'.$x.'-luas'),
                'nilai'     => $this->input->post('bangunan_tanah_'.$x.'-nilai')
            );
        }
        
        //masukkan ke session
        $this->session->set_userdata($data);
        
        //refresh halaman
        redirect('wizard/aset');
    }
    
    public function asetKasBank(){
        //hitung jumlah form input field dengan liat brp banyak yg dimasukkan ke dalam variabel $_POST lalu dibagi dengan jumlah inputnya
        $form_count = count($this->input->post())/5;
        
        //lakukan perulangan untuk mengepos ke dalam variabel
        for($x=0; $x<$form_count; $x++){
            //ambil masing2 nilai dari $_POST
            $data['kas_bank'][$x] = array(
                'norek' => $this->input->post('kas_bank_'.$x.'-norek'),
                'nama_bank' => $this->input->post('kas_bank_'.$x.'-nama_bank'),
                'nama_pemilik' => $this->input->post('kas_bank_'.$x.'-nama_pemilik'),
                'nominal' => $this->input->post('kas_bank_'.$x.'-nominal'),
                'tanggal' => $this->input->post('kas_bank_'.$x.'-tanggal'),
            );
        }
        
        //masukkan ke session
        $this->session->set_userdata($data);
        
        //refresh halaman
        redirect('wizard/aset');
    }
    
    public function akun_baru(){
        
        $ketua_dkm = $this->session->userdata('ketua_dkm');
        
        //cek session apa udh ada password apa belum
        if(!empty($ketua_dkm['nama_user'])){
            //bungkus password
            $data['ketua_dkm'] = $this->session->userdata('ketua_dkm');
            //beri flag password            
            $data['pw_ketua_dkm'] = 1;
        }else{
            //buat session kosong
            $data['ketua_dkm'] = array(
                'nama_user'  => '',
                'jenis_user' => '',
                'password'   => ''
            );
            //masukkan ke session
            $this->session->set_userdata($data);
            //beri flag password
            $data['pw_ketua_dkm'] = 0;
        }
        
        $bendahara = $this->session->userdata('bendahara');
        
        if(!empty($bendahara['nama_user'])){
            //bungkus password
            $data['bendahara'] = $this->session->userdata('bendahara');
            //beri flag password
            $data['pw_bendahara'] = 1;
        }else{
            //buat session kosong
            $data['bendahara'] = array(
                'nama_user'  => '',
                'jenis_user' => '',
                'password'   => ''
            );
            //masukkan ke session
            $this->session->set_userdata($data);
            //beri flag password
            $data['pw_bendahara'] = 0;
        }
        //ambil nilai TRUE or FALSE
        //kirim ke view
        $this->load->view('wizard/wizard_akun_baru_v', $data);
    }
    
    public function akun_baruProses(){
        //post password dari form
        $pw = $this->input->post('pw');
        
        $jabatan = $this->input->get('jabatan');
        
        if($jabatan == 'ketua_dkm'){
            $jenis_user = 'manager';
        }else{
            $jenis_user = 'akuntan';
        }
        
        //enkrip dengan AES
        //masukkan ke session
        $data[$jabatan] = array(
            'nama_user'  => $jabatan,
            'jenis_user' => $jenis_user,
            'password'   => $pw
        );
        
        $this->session->set_userdata($data);
        
        //balik ke halaman sebelumnya
        redirect('wizard/akun_baru');
    }
    
    public function wizardProses(){
        //ambil data profil masjid
        $profil_masjid[0] = $this->session->userdata('profil_form');
        
        //ambil data user akun
        $user[0] = $this->session->userdata('ketua_dkm');
        $user[1] = $this->session->userdata('bendahara');
        
        $profil_dkm = $this->session->userdata('profil_dkm');
        
        //ambil data peralatan
        $peralatan = $this->session->userdata('peralatan');
        
        //ambil data peralatan
        $bangunan_tanah = $this->session->userdata('bangunan_tanah');
        
        //ambil data peralatan
        $kas_bank = $this->session->userdata('kas_bank');
        
        //ambil data files
        $files = $this->session->userdata('files');
        
        //masukkan data profil ke dalam database
        $this->wizard_m->insertData('profil_masjid', $profil_masjid);
        
        //masukkan data user ke dalam database
        $this->wizard_m->insertData('user', $user);
        
        //masukkan data profil_dkm ke dalam database
        $this->wizard_m->insertData('profil_dkm', $profil_dkm);
        
        //masukkan data peralatan ke dalam database
        $this->wizard_m->insertData('aset-peralatan', $peralatan);
        
        //masukkan data peralatan ke dalam database
        $this->wizard_m->insertData('aset-bangunan_tanah', $bangunan_tanah);
        
        //masukkan data peralatan ke dalam database
        $this->wizard_m->insertData('aset-kas_bank', $kas_bank);
        
        //masukkan data peralatan ke dalam database
        $this->wizard_m->insertData('files', $files);
        
        //menghapus semua session di browser
        // $semuaSession = array_keys($this->session->all_userdata());
        // foreach($semuaSession as $v){
            //     print_r($v);
            //     $this->session->unset_userdata($v);
            // }        
            //ke halaman homepage
            redirect('homepage');
        }
        
    }
    
    /* End of file  wizard.php */
    
