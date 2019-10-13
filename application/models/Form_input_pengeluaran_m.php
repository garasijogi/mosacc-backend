<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_input_pengeluaran_m extends CI_Model {
    
    public function getSatuJenisAkun($kd_akun, $table){
        $this->db->where('kd_akun', $kd_akun);
        return $this->db->get($table);
    }

    public function save($data, $table){
        $this->db->insert($table, $data);
    }

    public function getNamaAkun($kd_akun){
        $this->db->select('nama_sub');
        $this->db->where('kd_akun', $kd_akun);
        $result = $this->db->get('rules')->result_array();
        return $result[0]['nama_sub'];
    }
}

/* End of file form_pembelian_m.php */

