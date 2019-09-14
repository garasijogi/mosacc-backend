<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_pembelian_m extends CI_Model {
    
    public function getSatuJenisAkun($kd_akun){
        $this->db->where('kd_akun', $kd_akun);
        return $this->db->get("tr201_pembelian_pending");
        
    }

    public function save($data){
        $this->db->insert('tr201_pembelian_pending', $data);
    }
    
    
    
}

/* End of file form_pembelian_m.php */

