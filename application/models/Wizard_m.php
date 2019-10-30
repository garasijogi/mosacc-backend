<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Wizard_m extends CI_Model {
    
    public function insertData($tabel, $data){
        //kosongkan tabel
        $this->db->truncate($tabel);
        
        //isi tabel
        foreach($data as $v){
            $this->db->insert($tabel, $v);
        }
    }
    
    
    
}

/* End of file wizard_m.php */

