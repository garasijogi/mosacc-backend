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
        $this->load->view('acc/form_input_pembelian', $data);
    }
    
    public function proses(){
        $data = array(
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

    }
}

/* End of file  Form_input.php */

