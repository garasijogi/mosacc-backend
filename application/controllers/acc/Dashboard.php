<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function index()
    {
        $data['controller'] = 'Dashboard';
        $this->load->view('acc/dashboard_v.php', $data);
    }
    
}
;
/* End of file  index.php */