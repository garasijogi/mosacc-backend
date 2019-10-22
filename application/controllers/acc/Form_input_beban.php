<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_input_beban extends CI_Controller {

    public $table = "tr22_beban_pending";

    function __construct() {
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
    
    public function index() {
        $data['kd_akun'] = $this->input->get('kd_akun');
        $data['judul'] = $this->form_input_pengeluaran_m->getNamaAkun($this->input->get('kd_akun'));
        $data['transaksi'] = $this->form_input_pengeluaran_m->getSatuJenisAkun($data['kd_akun'], $this->table);
        $this->load->view('acc/form_input_beban_v', $data);
    }
    
    public function proses() {
        //membuat id
        $tanggal = $this->input->post('tanggal');
        $tgl_temp = explode("-", $tanggal);
        $tanggal = $tgl_temp[0].$tgl_temp[1].$tgl_temp[2];// output yyyymmdd

        //buat format tanggal + kd_akun
        $kd_temp = $tanggal.$this->input->post('kd_akun');       
        /*kueri ambil jumlah row yang sama dari database ke dua yg seharusnya pakai
            $this->db->query untuk mengakses database 1
            $this->form_input_pengeluaran_m->app_db->query untuk gunain database ke 2
        */
        $cari = $this->form_input_pengeluaran_m->app_db->query("SELECT idtr FROM $this->table WHERE idtr=(SELECT MAX(idtr) FROM $this->table WHERE idtr LIKE '$kd_temp%%%')")->result();
        foreach($last_row as $key => $v){
            $last_row = $v->idtr;
        }
        
        if(empty($last_row)){
            $idtr = $this->generateNewId($kd_temp);
        }else{
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

        $ke_halaman = "acc/form_input_beban?kd_akun=".$data['kd_akun'];

        redirect($ke_halaman,'refresh');
    }
    
    public function generateNewId($kd_temp){
        // tambahkan digit 001 di akhir kd_temp
        return $kd_temp . "001";
    }

    public function generateExistId($last_row){
        //pisahin 13 karakter dan 3 increment
        $increment = substr($last_row, -3);
        $id_temp = substr($last_row, 0, -3);

        //ubah jadi int dan increment tambah 1 
        $increment = (int) $increment + 1;

        //susun $idtr dan balikkan nilai
        return $id_temp . str_pad($increment, 3, '0', STR_PAD_LEFT);
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

