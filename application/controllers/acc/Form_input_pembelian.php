<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Form_input_pembelian extends CI_Controller
{

    public $table = "tr21_pembelian_pending";

    public function __construct()
    {
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
        $this->load->model('rules_model');
        //taruh settingan database dalam array
        $this->form_input_pengeluaran_m->app_db = $this->load->database($dynamic_db, TRUE);
    }

    public function index()
    {
        $data['kd_akun'] = $this->input->get('kd_akun');
        $data['judul'] = $this->form_input_pengeluaran_m->getNamaAkun($this->input->get('kd_akun'));
        $data['transaksi'] = $this->form_input_pengeluaran_m->getSatuJenisAkun($data['kd_akun'], $this->table);
        $this->load->view('acc/form_input_pembelian_v', $data);
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
            'jenis' => $this->input->post('jenis'),
            'merek' => $this->input->post('merek'),
            'nomor_seri' => $this->input->post('nomor_seri'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'harga_satuan' => $this->input->post('harga_satuan'),
            'total_harga' => $this->input->post('total_harga')
        );

        $this->form_input_pengeluaran_m->save($data, $this->table);

        $ke_halaman = 'acc/form_input_pembelian?kd_akun=' . $data['kd_akun'];

        redirect($ke_halaman, 'refresh');
    }

    //edit
    public function edit_p()
    {
        $data['idtr'] = $this->input->get('idtr');
        $data['kd_akun'] = $this->input->get('kd_akun');
        $data['tanggal'] = $this->input->get('tanggal');
        $data['jenis'] = $this->input->get('jenis');
        $data['merek'] = $this->input->get('merek');
        $data['nomor_seri'] = $this->input->get('nomor_seri');
        $data['keterangan'] = $this->input->get('keterangan');
        $data['jumlah'] = $this->input->get('jumlah');
        $data['harga_satuan'] = $this->input->get('harga_satuan');
        $data['total_harga'] = $this->input->get('total_harga');

        $data['nama_sub'] = $this->rules_model->get_nama_sub($data['kd_akun']);
        $data['menu'] = $this->rules_model->get_menu($data['kd_akun']);

        $this->load->view('acc/edit_pembelian_v.php', $data);
    }

    public function proses_edit_p()
    {
        $idtr = $this->input->post('idtr');
        $kd_akun = $this->input->post('kd_akun');
        $tanggal_new = $this->input->post('tanggal');
        $tanggal = $this->input->post('tanggal_old');
        $jenis = $this->input->post('jenis');
        $merek = $this->input->post('merek');
        $nomor_seri = $this->input->post('nomor_seri');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
        $harga_satuan = $this->input->post('harga_satuan');
        $total_harga = $this->input->post('total_harga');

        if ($tanggal_new != $tanggal) {
            //generate idtr
            $tanggalreplace = preg_replace('/\D/', '', $tanggal_new);
            $idtr_bak = $tanggalreplace . $kd_akun;
            $result = $this->form_input_pengeluaran_m->count($idtr_bak);
            $result = $result;
            if ($result < 10) {
                $index = '00' . ($result + 1);
            } else if ($result < 100) {
                $index = '0' . ($result + 1);
            }
            $idtr_new = $idtr_bak . $index;
        } else {
            $idtr_new = $idtr;
        }

        $this->form_input_pengeluaran_m->edit_p($idtr, $idtr_new, $tanggal_new, $jenis, $merek, $nomor_seri, $jumlah, $keterangan, $harga_satuan, $total_harga, 'tr21_pembelian_pending');
        redirect('acc/form_input_pembelian?kd_akun=' . $kd_akun . '&&ubah=1');
    }

    //delete
    public function proses_delete()
    {
        $idtr = $this->input->get('idtr');
        $kd_akun = $this->input->get('controller');
        $this->form_input_pengeluaran_m->delete_tr($idtr, 'tr21_pembelian_pending');
        redirect('acc/form_input_pembelian?kd_akun=' . $kd_akun);
    }
}

/* End of file  Form_input.php */
