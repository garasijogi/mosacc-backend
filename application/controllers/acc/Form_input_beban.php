<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form_input_beban extends CI_Controller
{

    public $table = "tr22_beban_pending";

    function __construct()
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
        $this->load->view('acc/form_input_beban_v', $data);
    }

    public function proses()
    {
        //membuat id
        $tanggal = $this->input->post('tanggal');
        $tgl_temp = explode("-", $tanggal);
        $tanggal = $tgl_temp[0] . $tgl_temp[1] . $tgl_temp[2]; // output yyyymmdd

        //buat format tanggal + kd_akun
        $kd_temp = $tanggal . $this->input->post('kd_akun');
        /*kueri ambil jumlah row yang sama dari database ke dua yg seharusnya pakai
            $this->db->query untuk mengakses database 1
            $this->form_input_pengeluaran_m->app_db->query untuk gunain database ke 2
        */
        $cari = $this->form_input_pengeluaran_m->app_db->query("SELECT idtr FROM $this->table WHERE idtr=(SELECT MAX(idtr) FROM $this->table WHERE idtr LIKE '$kd_temp%%%')")->result();
        foreach ($cari as $key => $v) {
            $last_row = $v->idtr;
        }

        if (empty($last_row)) {
            $idtr = $this->generateNewId($kd_temp);
        } else {
            $idtr = $this->generateExistId($last_row);
        }

        $data = array(
            'idtr' => $idtr,
            'kd_akun' => $this->input->post('kd_akun'),
            'tanggal' => $this->input->post('tanggal'),
            'nominal' => $this->input->post('nominal'),
            'keterangan' => $this->input->post('keterangan')
        );

        $this->form_input_pengeluaran_m->save($data, $this->table);

        $ke_halaman = "acc/form_input_beban?kd_akun=" . $data['kd_akun'];

        redirect($ke_halaman, 'refresh');
    }

    public function generateNewId($kd_temp)
    {
        // tambahkan digit 001 di akhir kd_temp
        return $kd_temp . "001";
    }

    public function generateExistId($last_row)
    {
        //pisahin 13 karakter dan 3 increment
        $increment = substr($last_row, -3);
        $id_temp = substr($last_row, 0, -3);

        //ubah jadi int dan increment tambah 1 
        $increment = (int) $increment + 1;

        //susun $idtr dan balikkan nilai
        return $id_temp . str_pad($increment, 3, '0', STR_PAD_LEFT);
    }

    //edit
    public function edit_b()
    {
        $data['idtr'] = $this->input->get('idtr');
        $data['kd_akun'] = $this->input->get('kd_akun');
        $data['tanggal'] = $this->input->get('tanggal');
        $data['nominal'] = $this->input->get('nominal');
        $data['keterangan'] = $this->input->get('keterangan');

        $data['nama_sub'] = $this->rules_model->get_nama_sub($data['kd_akun']);
        $data['menu'] = $this->rules_model->get_menu($data['kd_akun']);

        $this->load->view('acc/edit_beban_v.php', $data);
    }

    public function proses_edit_b()
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

        $this->form_input_pengeluaran_m->edit_b($idtr, $idtr_new, $tanggal_new, $keterangan, $nominal, 'tr22_beban_pending');
        redirect('acc/form_input_beban?kd_akun=' . $kd_akun . '&&ubah=1');
    }

    //delete
    public function proses_delete()
    {
        $idtr = $this->input->get('idtr');
        $kd_akun = $this->input->get('controller');
        $this->form_input_pengeluaran_m->delete_tr($idtr, 'tr22_beban_pending');
        redirect('acc/form_input_beban?kd_akun=' . $kd_akun);
    }

    // take last row variable
    // $increment = substr the last 3 digit '''substr($last_row, 3);```
    // $id_temp = substr the first 13 digit '''substr($last_row, 13)'''

    // $num_increment = (int)$increment. "\n"; //change string to int
    // $increment = $num_increment + 1;

    // $strpad add '0' prefix with 3 digit

    // $id_temp . $increment

    // RETURN
}

/* End of file  form_input_beban.php */
