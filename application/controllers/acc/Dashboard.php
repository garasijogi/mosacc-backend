<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }
        //ambil tahun dari sistem
        $dynamic_tahun = date("Y");
        //load settingan database dynamic ke fungsi di helper db dynamic switcher 
        $dynamic_db = switch_db_dynamic($dynamic_tahun);
        //load model yang akan digunakan
        $this->load->model('dashboard_m');
        //taruh settingan database dalam array
        $this->dashboard_m->app_db = $this->load->database($dynamic_db, TRUE);

        //Helper Loader
        $this->load->helper('Ryu_helper');
    }

    public function index()
    {
        //hapus isi tabel
        $this->dashboard_m->truncate();
        //get nama tabel
        $tableList = tableList();
        // print_r($tableList);
        // exit();
        //ambil data dan count setiap bulan pada masing-masing table
        foreach ($tableList as $value) {
            if ($value == 'tr21_pembelian_pending') {
                $hasil[$value] =  $this->dashboard_m->getSumPerMonth2($value); //khusus buat tabel tr21 karena tabel nominal jadi total_harga
            } else {
                $hasil[$value] =  $this->dashboard_m->getSumPerMonth($value);
            }
        }

        //ambil kode akun dari table rules
        $kd_akun = $this->dashboard_m->getKdakun();
        //ambil data sum dari berbagai akun di tabel tertentu
        $x = 0;
        // print_r($kd_akun);
        // echo'<br>';
        // echo'<br>';
        // print_r($tableList);
        // echo'<br>';
        // echo'<br>';
        foreach ($tableList as $value) {
            foreach ($kd_akun as $v) {
                if ($value == 'tr21_pembelian_pending') {
                    $hasil2[$x] = $this->dashboard_m->getSumPerAkun2($value, $v['kd_akun']); //khusus buat tabel tr21 karena tabel nominal jadi total_harga
                } else {
                    $hasil2[$x] = $this->dashboard_m->getSumPerAkun($value, $v['kd_akun']);
                }
                $x++;
            }
        }

        $this->dashboard_m->insertSum($hasil);

        // exit();


        $this->load->view('acc/dashboard_v');
    }
}
        /* End of file  index.php */
