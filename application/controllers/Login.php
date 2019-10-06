<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index()
  {
    if ($this->session->userdata('status') == NULL) {
      $data['daftar'] = $this->input->get('daftar');
      $data['jenis_user'] = $this->input->get('jenis_user');
      $this->load->view('loginpage_v.php', $data);
    } else {
      redirect('acc/dashboard');
    }
  }

  function login_user()
  {

    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $jenis_user = $this->input->get('jenis_user');
    $jenis_user_tested = $this->input->post('jenis_user');
    $status = 'online';
    $data['user'] = $this->user_model->get_user();
    $masuk = 0;
    foreach ($data['user']->result() as $user) :
      if ($user->NIP == $username && $user->password == $password && $user->jenis_user == $jenis_user_tested) {
        $masuk = 1;
        $arraydata = array(
          'nip' => $user->NIP,
          'jenis_user' => $user->jenis_user,
          'nama_user' => $user->nama_user,
          'status' => $status
        );
        $this->session->set_userdata($arraydata);
      }
    endforeach;

    if ($masuk == 1 && $jenis_user_tested == 'accountant') {
      redirect('acc/dashboard');
    } else {
      // redirect('welcome/login');
      redirect('login?jenis_user=' . $jenis_user_tested . '&&masuk=0');
    }
  }

  function log_out()
  {
    $arraydata = array(
      'nip',
      'jenis_user',
      'nama_user',
      'status'
    );
    $this->session->unset_userdata($arraydata);
    redirect('homepage');
  }

  function register()
  {
    $data['divisi'] = $this->input->get('divisi');
    $this->load->view('register_v.php', $data);
  }

  function register_user()
  {
    $nip = $this->input->post('nip');
    $nama_user = $this->input->post('nama');
    $divisi = $this->input->post('divisi');
    if ($divisi == 'pegawai') {
      $ruangan = $this->input->post('ruangan');
      $instalasi = $this->input->post('instalasi');
    }
    $password = $this->input->post('password');
    if ($divisi == "pegawai") {
      $this->user_model->input_pegawai($nip, $nama_user, $divisi, $ruangan, $instalasi, $password);
    }
    if ($divisi == "teknisi") {
      $this->user_model->input_teknisi($nip, $nama_user, $divisi, $password);
    }

    redirect('login?divisi=' . $divisi . '&&daftar=1');
  }
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
