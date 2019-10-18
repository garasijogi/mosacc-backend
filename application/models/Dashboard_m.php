<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
    
    public function getDate(){
        $this->db->select('tanggal');
        $this->db->where('%%%%-09');
        $this->db->get()->result();
    }

    $this->db->select('nama_sub');
        $this->db->where('kd_akun', $kd_akun);
        $result = $this->db->get('rules')->result_array();
        return $result[0]['nama_sub'];
    
    
    
}

/* End of file dashboard.php */

