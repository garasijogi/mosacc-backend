<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_pembelian_m extends CI_Model {
    
    public function get(){
        return $this->db->get("books");
        
    }

    public function save($data){
        // print_r($data);
        $this->db->insert('tr201_pembelian_pending', $data);
    }
    
    
    
}

/* End of file form_pembelian_m.php */

