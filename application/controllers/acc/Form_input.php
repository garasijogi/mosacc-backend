<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_input extends CI_Controller {
    
    public function index()
    {
        $data['kd_akun'] = $this->input->get('kd_akun');
        $this->load->view('acc/form_input', $data);
    }
    
}

/* End of file  Form_input.php */

