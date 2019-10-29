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
        // //ambil tahun dari sistem
        // $dynamic_tahun = date("Y");
        // //load settingan database dynamic ke fungsi di helper db dynamic switcher 
        // $dynamic_db = switch_db_dynamic($dynamic_tahun);
        // //load model yang akan digunakan
        // $this->load->model('dashboard_m');
        // //taruh settingan database dalam array
        // $this->dashboard_m->app_db = $this->load->database($dynamic_db, TRUE);

        //Helper Loader
        $this->load->helper('Ryu_helper');
    }

    public function index()
    {
        $this->load->view('acc/dashboard_v');
    }
}
        /* End of file  index.php */
