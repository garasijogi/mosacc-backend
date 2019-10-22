<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_input_pengeluaran_m extends CI_Model {

    /* MENGAKSES DATABASE
    *   database pada aplikasi ini ada 2
    *   gunakan $this->db->QUERY_FUNCTION untuk melakukan kueri dengan database master
    *   gunakan $this->app_db->QUERY_FUNCTION untuk melakukan kueri dengan database kedua
    */

    //gunakan variabel ini untuk akses database yang kedua
    public $app_db;

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getSatuJenisAkun($kd_akun, $table){
        $this->app_db->where('kd_akun', $kd_akun);
        return $this->app_db->get($table);
    }

    public function save($data, $table){
        $this->app_db->insert($table, $data);
    }

    public function getNamaAkun($kd_akun){
        $this->db->select('nama_sub');
        $this->db->where('kd_akun', $kd_akun);
        $result = $this->db->get('rules')->result_array();
        return $result[0]['nama_sub'];
    }
}

/* End of file form_pembelian_m.php */

