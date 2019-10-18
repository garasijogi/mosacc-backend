<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['controller'] = 'Dashboard';
        $this->load->view('acc/dashboard_v.php', $data);
    }
};
/* End of file  index.php */
