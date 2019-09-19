<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Beban extends CI_Controller {
    
    public function index()
    {
        $this->load->view('acc/beban_v');
    }
    
}

/* End of file  beban.php */

