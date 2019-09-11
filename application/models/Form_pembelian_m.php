<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_pembelian_m_model extends CI_Model {
    
    public function get(){
        return $this->db->get("books");
        
    }
    
    
    
}

/* End of file form_pembelian_m.php */

