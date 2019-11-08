<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public $app_db;

    public function getSumPerMonth($tabel)
    {
        //kueri SUM Table trus di gup dalam bulan
        $result = $this->app_db->query("SELECT MONTH(tanggal), SUM(nominal) FROM $tabel GROUP BY MONTH(tanggal)")->result_array();

        $hasil = array();
        //ubah format bulan jadi 2 digit di semua bulan
        foreach ($result as $k => $v) {
            if (!empty($result)) {
                $hasil[$k]['tabel'] = $tabel;
                $hasil[$k]['bulan'] = str_pad($v['MONTH(tanggal)'], 2, '0', STR_PAD_LEFT);
                $hasil[$k]['jumlah'] = $v['SUM(nominal)'];
            }
        }

        if (empty($result)) {
            $hasil[0]['tabel'] = $tabel;
            $hasil[0]['bulan'] = '';
            $hasil[0]['jumlah'] = '';
        }

        //kembalikan nilai
        return $hasil;
    }

    public function getSumPerMonth2($tabel)
    {
        //kueri SUM Table trus di gup dalam bulan
        $result = $this->app_db->query("SELECT MONTH(tanggal), SUM(total_harga) FROM $tabel GROUP BY MONTH(tanggal)")->result_array();

        $hasil = array();
        //ubah format bulan jadi 2 digit di semua bulan
        foreach ($result as $k => $v) {
            if (!empty($result)) {
                $hasil[$k]['tabel'] = $tabel;
                $hasil[$k]['bulan'] = str_pad($v['MONTH(tanggal)'], 2, '0', STR_PAD_LEFT);
                $hasil[$k]['jumlah'] = $v['SUM(total_harga)'];
            }
        }

        if (empty($result)) {
            $hasil[0]['tabel'] = $tabel;
            $hasil[0]['bulan'] = '';
            $hasil[0]['jumlah'] = '';
        }

        //kembalikan nilai
        return $hasil;
    }

    public function insertSum($data)
    {
        // print_r($data);
        // echo'<br><br>'
        $increment = 1;
        foreach ($data as $value) {
            foreach ($value as $v) {
                $v['kd_sum'] = $increment;
                // print_r($v);
                // echo'<br>';
                // echo'<br>';
                $increment++;

                $this->app_db->insert('sum_table', $v);
            }
        }
    }

    public function truncate()
    {
        $this->app_db->from('sum_table');
        $this->app_db->truncate();
    }

    public function getKdakun()
    {
        $this->db->select('kd_akun');
        $this->db->from('rules');
        return $this->db->get()->result_array();
    }

    public function getSumPerAkun($tabel, $kd_akun)
    {
        $result = $this->app_db->query("SELECT MONTH(tanggal), SUM(nominal) FROM $tabel WHERE kd_akun=$kd_akun GROUP BY MONTH(tanggal)")->result_array();

        if (empty($result)) {
            $hasil[0]['tabel'] = $tabel;
            $hasil[0]['bulan'] = '';
            $hasil[0]['jumlah'] = '';
        }

        return $result;
    }

    public function getSumPerAkun2($tabel, $kd_akun)
    {
        $result = $this->app_db->query("SELECT MONTH(tanggal), SUM(total_harga) FROM $tabel WHERE kd_akun=$kd_akun GROUP BY MONTH(tanggal)")->result_array();
        $result['kd_akun'] = $kd_akun;

        return $result;
    }
}

/* End of file dashboard.php */
