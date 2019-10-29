<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil_m extends CI_Model
{

    public function getProfil()
    {
        return $this->db->get('profil_masjid')->result_array();
    }

    public function getPegawai($posisi)
    {
        return $result = $this->db->get_where('profil_dkm', array('posisi' => $posisi));
    }

    public function edit_profil_masjid($nama_masjid, $alamat, $thn, $telepon, $rekening, $luas_tanah, $badan_hukum, $adart)
    {
        $data = array(
            'nama' => $nama_masjid,
            'alamat' => $alamat,
            'tahun' => $thn,
            'telepon' => $telepon,
            'rekening' => $rekening,
            'luas_tanah' => $luas_tanah,
            'badan_hukum' => $badan_hukum,
            'ad_art' => $adart
        );
        $this->db->where('id_profil', 1);
        $this->db->update('profil_masjid', $data);
    }

    public function edit_pegawai($id, $nama, $ttl, $alamat, $telepon, $pendidikan)
    {
        $data = array(
            'nama' => $nama,
            'ttl' => $ttl,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'telepon' => $telepon,
            'pendidikan' => $pendidikan
        );
        $this->db->where('id_pengurus', $id);
        $this->db->update('profil_dkm', $data);
    }

    public function get_aset($jenis_aset)
    {
        return $result = $this->db->get_where('aset', array('jenis_aset' => $jenis_aset));
    }
    
}

/* End of file profil.php */
