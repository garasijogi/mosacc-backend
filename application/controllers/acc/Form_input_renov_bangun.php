<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form_input_renov_bangun extends CI_Controller
{

    public $table = "tr23_renov_bangun_pending";

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

    //edit
    public function edit_r()
    {
        $data['idtr'] = $this->input->get('idtr');
        $data['kd_akun'] = $this->input->get('kd_akun');
        $data['tanggal'] = $this->input->get('tanggal');
        $data['nominal'] = $this->input->get('nominal');
        $data['keterangan'] = $this->input->get('keterangan');

        $data['nama_sub'] = $this->rules_model->get_nama_sub($data['kd_akun']);
        $data['menu'] = $this->rules_model->get_menu($data['kd_akun']);

        $this->load->view('acc/edit_renov_bangun_v.php', $data);
    }

    public function proses_edit_r()
    {
        $idtr = $this->input->post('idtr');
        $kd_akun = $this->input->post('kd_akun');
        $tanggal_new = $this->input->post('tanggal');
        $tanggal = $this->input->post('tanggal_old');
        $keterangan = $this->input->post('keterangan');
        $nominal = $this->input->post('nominal');

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

        $this->form_input_pengeluaran_m->edit_r($idtr, $idtr_new, $tanggal_new, $keterangan, $nominal, 'tr23_renov_bangun_pending');
        redirect('acc/form_input_renov_bangun?kd_akun=' . $kd_akun . '&&ubah=1');
    }

    //delete
    public function proses_delete()
    {
        $idtr = $this->input->get('idtr');
        $kd_akun = $this->input->get('controller');
        $this->form_input_pengeluaran_m->delete_tr($idtr, 'tr23_renov_bangun_pending');
        redirect('acc/form_input_renov_bangun?kd_akun=' . $kd_akun);
    }
}

/* End of file  form_input_renov_bangun.php */
