<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public $app_db;
    
    //ambil sum per bulan di tiap tabel
    public function getSumPerMonth($tabel, $b)
    {
        // Select SUM dari atibut nominal
        $where = "MONTH(tanggal)=$b";
        $result = $this->app_db->query("SELECT SUM(nominal) FROM $tabel WHERE MONTH(tanggal)=$b")->result_array();
        // $result = $this->app_db->select('SUM(nominal)')
        //                        ->from($tabel)
        //                        ->where($where)
        //                        ->result_array();
        
        // bungkus hasil kueri dan tambahkan bahan pelengkap
        $result2 = array(
            'bulan'   => $b,
            'jumlah'  => $result[0]['SUM(nominal)'],
            'tabel'   => $tabel
        );

        //jika variabel jumlah kosong
        if ($result2['jumlah'] == NULL) {
            $result2['jumlah'] = 0;
        }
        
        //kembalikan nilai
        return $result2;
    }
    
    //ambil sum per bulan di tabel dengan atribut total harga
    public function getSumPerMonth2($tabel, $b)
    {
        // Select SUM dari atibut nominal
        $result = $this->app_db->query("SELECT SUM(total_harga) FROM $tabel WHERE MONTH(tanggal)=$b")->result_array();
        // $result = $this->app_db->select('SUM(total_harga)')
        //                        ->from($tabel)
        //                        ->where($where)
        //                        ->result_array();


        
        
        // bungkus hasil kueri dan tambahkan bahan pelengkap
        $result2 = array(
            'bulan'   => $b,
            'jumlah'  => $result[0]['SUM(total_harga)'],
            'tabel'   => $tabel
            
        );

        //jika variabel jumlah kosong
        if ($result2['jumlah'] == NULL) {
            $result2['jumlah'] = 0;
        }
        
        //kembalikan nilai
        return $result2;
    }
    
    public function insertSum($tabel, $data, $increment)
    {
        //initial increment
        
        // masukkan data
        foreach ($data as $value) {
            //buat increment
            $value['kd_sum'] = $increment;
            $increment++;
            //masukkan ke database
            $this->app_db->insert($tabel, $value);
        }

        return $increment;
    }
    //untuk menghapus data pada tabel
    public function truncate($tabel)
    {
        $this->app_db->from($tabel);
        $this->app_db->truncate();
    }
    
    public function getOneKdAkun($match){
        $this->db->like('kd_akun', $match, 'after');
        return $this->db->get('rules')->result_array();
    }

    //untuk ngambil list akun dari tabel rules
    public function getKdakun()
    {
        $this->db->select('kd_akun');
        $this->db->from('rules');
        return $this->db->get()->result_array();
    }
    
    //ambil sum per bulan di tiap tabel per akun
    public function getSumPerAkun($tabel, $kd_akun, $nama_sub, $b) {
        $where = "kd_akun=$kd_akun AND MONTH(tanggal)=$b";
        //lakukan select 
        $result = $this->app_db->query("SELECT SUM(nominal) FROM $tabel WHERE kd_akun=$kd_akun AND MONTH(tanggal)=$b")->result_array();
        // $result = $this->app_db->select('SUM(nominal)')
        //                        ->from($tabel)
        //                        ->where($where)
        //                        ->result_array();

        
        $result2 = array(
            'bulan'          => $b,
            'jumlah'         => $result[0]['SUM(nominal)'],
            'kd_akun'        => $kd_akun,
            'nama_sub'       => $nama_sub
        );
        
        //jika variabel jumlah kosong
        if ($result2['jumlah'] == NULL) {
            $result2['jumlah'] = 0;
        }

        return $result2;
    }
    
    //ambil sum per bulan di tiap tabel per akun dengan atribut total_harga
    public function getSumPerAkun2($tabel, $kd_akun, $nama_sub, $b) {
        $result = $this->app_db->query("SELECT SUM(total_harga) FROM $tabel WHERE kd_akun=$kd_akun AND MONTH(tanggal)=$b")->result_array();
        // $result = $this->app_db->select('SUM(total_harga)')
        //                        ->from($tabel)
        //                        ->where($where)
        //                        ->result_array();
        $result2 = array(
            'bulan'          => $b,
            'jumlah'         => $result[0]['SUM(total_harga)'],
            'kd_akun'        => $kd_akun,
            'nama_sub'       => $nama_sub
        );

        //jika variabel jumlah kosong
        if ($result2['jumlah'] == NULL) {
            $result2['jumlah'] = 0;
        }
        
        return $result2;
    }
}

/* End of file dashboard.php */
