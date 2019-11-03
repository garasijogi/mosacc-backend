<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil_m extends CI_Model
{

    public function getProfil()
    {
        return $this->db->get('profil_masjid')->result_array();
    }
    
    public function getFiles($jenis_file){
        $this->db->select('nama, ukuran, ekstensi, tanggal');
        $this->db->where('jenis_file', $jenis_file);
        return $this->db->get('files')->result_array();
    }

    public function getPegawai($posisi)
    {
        return $result = $this->db->get_where('profil_dkm', array('posisi' => $posisi));
    }

    public function edit_profil_masjid($nama_masjid, $alamat, $thn, $telepon, $rekening, $luas_tanah)
    {
        $data = array(
            'nama' => $nama_masjid,
            'alamat' => $alamat,
            'tahun' => $thn,
            'telepon' => $telepon,
            'rekening' => $rekening,
            'luas_tanah' => $luas_tanah
        );
        $this->db->where('id_profil', 1);
        $this->db->update('profil_masjid', $data);
    }

    public function edit_pegawai($id, $nama, $alamat, $telepon, $pendidikan)
    {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'pendidikan' => $pendidikan
        );
        $this->db->where('id_pengurus', $id);
        $this->db->update('profil_dkm', $data);
    }

    public function get_aset($table){
        return $this->db->get($table)->result();
    }
    
    public function edit_file($file, $data){
        $this->db->where('jenis_file', $file);
        $this->db->update('files', $data);
    }
    
}

/* End of file profil.php */
