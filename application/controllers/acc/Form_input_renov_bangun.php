<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form_input_renov_bangun extends CI_Controller
{

    public $table = "tr23_renov_bangun_pending";

    public function __construct(){
        parent::__construct();
        if ($this->session->userdata('status') == NULL) {
            redirect('homepage');
        }
        
        //ambil tahun dari sistem
        $dynamic_tahun = date("Y");
        //load settingan database dynamic ke fungsi di helper db dynamic switcher 
        $dynamic_db = switch_db_dynamic($dynamic_tahun);
        //load model yang akan digunakan
        $this->load->model('form_input_pengeluaran_m');
        //taruh settingan database dalam array
        $this->form_input_pengeluaran_m->app_db = $this->load->database($dynamic_db, TRUE);
    }

    public function index()
    {
        $data['kd_akun'] = $this->input->get('kd_akun');
        $data['judul'] = $this->form_input_pengeluaran_m->getNamaAkun($this->input->get('kd_akun'));
        $data['transaksi'] = $this->form_input_pengeluaran_m->getSatuJenisAkun($data['kd_akun'], $this->table);
        $this->load->view('acc/form_input_renov_bangun_v', $data);
    }

    public function proses()
    {
        //membuat id
        //buat format tanggal
        $kd_temp = date("Ymd") . $this->input->post('kd_akun');
        /*kueri ambil jumlah row yang sama dari database ke dua yg seharusnya pakai
            $this->db->query untuk mengakses database 1
            $this->form_input_pengeluaran_m->app_db->query untuk gunain database ke 2
        */
        $cari = $this->form_input_pengeluaran_m->app_db->query("SELECT * FROM $this->table WHERE idtr LIKE '$kd_temp%%%'");
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
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan')
        );

        $this->form_input_pengeluaran_m->save($data, $this->table);

        $ke_halaman = 'acc/form_input_renov_bangun?kd_akun=' . $data['kd_akun'];

        redirect($ke_halaman, 'refresh');
    }
}

/* End of file  form_input_renov_bangun.php */
