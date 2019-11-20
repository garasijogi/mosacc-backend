<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->model('profil_m');
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
    $password = $this->input->post('password');
    $jenis_user = $this->input->get('jenis_user');
    $status = 'online';
    $data['user'] = $this->user_model->get_user();
    $masuk = 0;
    foreach ($data['user']->result() as $user) :
      if ($user->password == $password && $user->jenis_user == $jenis_user) {
        $masuk = 1;
        $this->load->model('profil_m');
        $profil = $this->profil_m->getProfil();
        $arraydata = array(
          'jenis_user' => $user->jenis_user,
          'nama_user' => $user->nama_user,
          'status' => $status,
          'nama_masjid' => $profil[0]['nama'],
          'tahun' => date('Y')
        );
        $this->session->set_userdata($arraydata);
      }
    endforeach;

    if ($masuk == 1 && $jenis_user == 'akuntan') {
      redirect('acc/dashboard');
    }
    if ($masuk == 1 && $jenis_user == 'manager') {
      redirect('mgr/dashboard');
    }
    if ($masuk == 0 && $jenis_user == 'akuntan') {
      redirect('homepage?masuk=0&&jenis_user=akuntan');
    }
    if ($masuk == 0 && $jenis_user == 'manager') {
      redirect('homepage?masuk=0&&jenis_user=manager');
    }
  }

  function log_out()
  {
    $arraydata = array(
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
