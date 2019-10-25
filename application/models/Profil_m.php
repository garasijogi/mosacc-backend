<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_m extends CI_Model {
    
    public function getProfil(){
        return $this->db->get('profil_masjid')->result_array();
    }
    
    
    
}

/* End of file profil.php */

