<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Wizard extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('uploader'); //load helper uploader
        
        $this->load->model('wizard_m');
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
                'nama'  => '',
                'merek' => '',
                'jenis' => '',
                'harga' => ''
            );
            $this->session->set_userdata($data);
            
            return $this->session->userdata('peralatan'); //retrieve dan masukkan ke $data

        }elseif($section == 'bangunan_tanah'){
            //buat session kosong
            $data['bangunan_tanah'][0] = array(
                'nama'  => '',
                'luas'  => '',
                'nilai' => ''
            );
            $this->session->set_userdata($data);

            return $this->session->userdata('bangunan_tanah');

        }elseif($section == 'kas_bank'){
            $data['kas_bank'][0] = array(
                'norek' => '',
                'nama_bank' => '',
                'nama_pemilik' => '',
                'nominal' => ''
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
        $form_count = count($this->input->post())/4;

        //lakukan perulangan untuk mengepos ke dalam variabel
        for($x=0; $x<$form_count; $x++){
            //ambil masing2 nilai dari $_POST
            $data['peralatan'][$x] = array(
                'nama'  => $this->input->post('peralatan_'.$x.'-nama'),
                'merek' => $this->input->post('peralatan_'.$x.'-merek'),
                'jenis' => $this->input->post('peralatan_'.$x.'-jenis'),
                'harga' => $this->input->post('peralatan_'.$x.'-harga')
            );
        }

        //masukkan ke session
        $this->session->set_userdata($data);

        //refresh halaman
        redirect('wizard/aset');
    }

    public function asetBangunanTanah(){
        //hitung jumlah form input field dengan liat brp banyak yg dimasukkan ke dalam variabel $_POST lalu dibagi dengan jumlah inputnya
        $form_count = count($this->input->post())/3;

        //lakukan perulangan untuk mengepos ke dalam variabel
        for($x=0; $x<$form_count; $x++){
            //ambil masing2 nilai dari $_POST
            $data['bangunan_tanah'][$x] = array(
                'nama' => $this->input->post('bangunan_tanah_'.$x.'-nama'),
                'luas' => $this->input->post('bangunan_tanah_'.$x.'-luas'),
                'nilai' => $this->input->post('bangunan_tanah_'.$x.'-nilai')
            );
        }

        //masukkan ke session
        $this->session->set_userdata($data);

        //refresh halaman
        redirect('wizard/aset');
    }

    public function asetKasBank(){
         //hitung jumlah form input field dengan liat brp banyak yg dimasukkan ke dalam variabel $_POST lalu dibagi dengan jumlah inputnya
        $form_count = count($this->input->post())/4;

        //lakukan perulangan untuk mengepos ke dalam variabel
        for($x=0; $x<$form_count; $x++){
            //ambil masing2 nilai dari $_POST
            $data['kas_bank'][$x] = array(
                'norek' => $this->input->post('kas_bank_'.$x.'-norek'),
                'nama_bank' => $this->input->post('kas_bank_'.$x.'-nama_bank'),
                'nama_pemilik' => $this->input->post('kas_bank_'.$x.'-nama_pemilik'),
                'nominal' => $this->input->post('kas_bank_'.$x.'-nominal')
            );
        }

        //masukkan ke session
        $this->session->set_userdata($data);

        //refresh halaman
        redirect('wizard/aset');
    }
    
    public function akun_baru(){
        //cek session apa udh ada password apa belum
        if($this->session->userdata('ketua_dkm')){
            //bungkus password
            $data['ketua_dkm'] = $this->session->userdata('ketua_dkm');
            //beri flag password            
            $data['pw_ketua_dkm'] = TRUE;
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
            $data['pw_ketua_dkm'] = FALSE;
        }

        if($this->session->userdata('bendahara')){
            //bungkus password
            $data['bendahara'] = $this->session->userdata('bendahara');
            //beri flag password
            $data['pw_bendahara'] = TRUE;
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
            $data['pw_bendahara'] = FALSE;
        }
        //ambil nilai TRUE or FALSE
        //kirim ke view
        $this->load->view('wizard/wizard_akun_baru_v', $data);
    }

    public function akun_baruProses(){
        echo $this->input->post('pw');

        echo '<br><br>';

        echo $this->input->get('jabatan');

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
        //ambil data masukkin ke array
        print_r($this->session->userdata());

        echo '<br><br>';
        //ambil data profil masjid
        $profil_masjid[0] = $this->session->userdata('profil_form');

        //ambil data user akun
        $user[0] = $this->session->userdata('ketua_dkm');
        $user[1] = $this->session->userdata('bendahara');

        //ambil data profil_dkm
        $profil_dkm = $this->session->userdata('profil_dkm');

        //ambil data peralatan
        $peralatan = $this->session->userdata('peralatan');

        //ambil data peralatan
        $bangunan_tanah = $this->session->userdata('bangunan_tanah');

        //ambil data peralatan
        $kas_bank = $this->session->userdata('kas_bank');
        
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

        //ke halaman homepage
        redirect('homepage');
    }
    
}

/* End of file  wizard.php */

