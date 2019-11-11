<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form_input_pengeluaran_m extends CI_Model
{

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

    function count($idtr)
    {
        $this->app_db->like('idtr', $idtr);
        return $this->app_db->count_all_results('tr21_pembelian_pending');
    }

    public function getSatuJenisAkun($kd_akun, $table)
    {
        $this->app_db->where('kd_akun', $kd_akun);
        return $this->app_db->get($table);
    }

    public function save($data, $table)
    {
        $this->app_db->insert($table, $data);
    }

    public function getNamaAkun($kd_akun)
    {
        $this->db->select('nama_sub');
        $this->db->where('kd_akun', $kd_akun);
        $result = $this->db->get('rules')->result_array();
        return $result[0]['nama_sub'];
    }

    function edit_p($idtr, $idtr_new, $tanggal, $jenis, $merek, $nomor_seri, $jumlah, $keterangan, $harga_satuan, $total_harga, $tabel)
    {
        $data = array(
            'idtr' => $idtr_new,
            'tanggal' => $tanggal,
            'jenis' => $jenis,
            'merek' => $merek,
            'nomor_seri' => $nomor_seri,
            'jumlah' => $jumlah,
            'keterangan' => $keterangan,
            'harga_satuan' => $harga_satuan,
            'total_harga' => $total_harga
        );
        $this->app_db->where('idtr', $idtr);
        $this->app_db->update($tabel, $data);
    }

    function edit_b($idtr, $idtr_new, $tanggal, $keterangan, $nominal, $tabel)
    {
        $data = array(
            'idtr' => $idtr_new,
            'tanggal' => $tanggal,
            'nominal' => $nominal,
            'keterangan' => $keterangan
        );
        $this->app_db->where('idtr', $idtr);
        $this->app_db->update($tabel, $data);
    }

    function edit_r($idtr, $idtr_new, $tanggal, $keterangan, $nominal, $tabel)
    {
        $data = array(
            'idtr' => $idtr_new,
            'tanggal' => $tanggal,
            'nominal' => $nominal,
            'keterangan' => $keterangan
        );
        $this->app_db->where('idtr', $idtr);
        $this->app_db->update($tabel, $data);
    }

    function delete_tr($idtr, $tabel)
    {
        $this->app_db->where('idtr', $idtr);
        $this->app_db->delete($tabel);
    }
}

/* End of file form_pembelian_m.php */
