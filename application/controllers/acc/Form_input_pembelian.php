<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_input_pembelian extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('form_pembelian_m');
    }
    
    public function index()
    {
        $data['kd_akun'] = $this->input->get('kd_akun');
        $data['transaksi'] = $this->form_pembelian_m->getSatuJenisAkun($data['kd_akun']);
        $this->load->view('acc/form_input_pembelian_v', $data);
    }
    
    public function proses(){
        //membuat id
        //buat format tanggal
        $kd_temp = date("Ymd").$this->input->post('kd_akun');       
        //kueri ambil jumlah row yang sama
        $cari = $this->db->query("SELECT * FROM tr201_pembelian_pending WHERE idtr LIKE '$kd_temp%%%'");
        //ambil jumlah row
        $hasil = $cari->num_rows();
        //generate id
        $hasil2 = $hasil + 1;
        //tambah prefix '0' ke increment
        // masukkan increment ke id_barang
        $idtr = $kd_temp . str_pad($hasil2, 3, '0', STR_PAD_LEFT);

        $data = array(
            'idtr' => $idtr,
            'kd_akun' => $this->input->post('kd_akun'),
            'tanggal' => $this->input->post('tanggal'),
            'jenis' => $this->input->post('jenis'),
            'merek' => $this->input->post('merek'),
            'nomor_seri' => $this->input->post('nomor_seri'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'total_harga' => $this->input->post('total_harga')
        );

        $this->form_pembelian_m->save($data);

        $ke_halaman = 'acc/form_input_pembelian?kd_akun='.$data['kd_akun'];

        redirect($ke_halaman,'refresh');
    }
}

/* End of file  Form_input.php */

