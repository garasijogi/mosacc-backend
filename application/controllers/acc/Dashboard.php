<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }
        // $this->load->model('dashboard_m');
    }
    
    public function index()
    {
        // echo $this->dashboard_m->getDate();
        // exit();

        // $data['controller'] = 'Dashboard';
        $this->load->view('acc/dashboard_v.php');
    }
};
/* End of file  index.php */
