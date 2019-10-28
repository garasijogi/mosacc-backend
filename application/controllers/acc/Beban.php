<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beban extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }
        $this->load->model('form_input_pengeluaran_m');
    }

    public function index()
    {
        $this->load->view('acc/beban_v');
    }

}

/* End of file  beban.php */
