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
        error_reporting(0);
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
        $x = 0;
        $y = 0;

        $bulan = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
        foreach ($kd_akun as $v) { //setiap perulangan kd_akun
            foreach ($bulan as $b) {
                foreach ($tableList as $value) { //setiap perulangan table
                    if ($value == 'tr21_pembelian_pending') {
                        $hasil2[$x] = $this->dashboard_m->getSumPerAkun2($value, $v['kd_akun'], $b); //khusus buat tabel tr21 karena tabel nominal jadi total_harga
                    } else {
                        $hasil2[$x] = $this->dashboard_m->getSumPerAkun($value, $v['kd_akun'], $b);
                    }
                    if (!empty($hasil2[$x])) {
                        $hasil3[$y] = $hasil2[$x];
                        $y++;
                    }
                    $x++;
                }
            }
        }

        // foreach($hasil as $v){
        //     print_r($v);
        //     echo"<br>";
        // }

        // echo"<br>";
        // echo"<br>";

        // print_r($hasil3);

        // exit;

        $this->dashboard_m->insertSum($hasil);

        // exit();


        $this->load->view('mgr/dashboard_v');
    }

    function exit_mosacc()
    {
        function execInBackground($cmd)
        {
            if (substr(php_uname(), 0, 7) == "Windows") {
                pclose(popen("start /B " . $cmd, "r"));
            } else {
                exec($cmd . " > /dev/null &");
            }
        }
        execInBackground('start cmd.exe @cmd /k "taskkill /IM chrome.exe"');
        execInBackground('start cmd.exe @cmd /k ""C:\xampp1\xampp_stop.exe""');
        execInBackground('cmd.exe @cmd /k "taskkill /F /IM cmd.exe"');
    }
}
        /* End of file  index.php */
