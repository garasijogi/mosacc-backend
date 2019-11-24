<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('profil_m');
    $this->load->model('tr_database_model');

    //cek data user pada database, apakah tersedia
    if (empty($this->db->get('user')->result())) {
      redirect('wizard'); //arahkan ke modul wizard
    }

    //ambil tahun dan taruh di session
    $db_dynamic = 'mosacc_tr_' . date('Y');

    //load fungsi dforge
    // $this->load->dbforge();

    // $this->dbforge->create_database($db_dynamic, TRUE);

    //sql kueri untuk membuat database ke 2 kalau database tidak ada di system

    $this->db->trans_start();
    $this->db->query("CREATE DATABASE IF NOT EXISTS $db_dynamic;");
    $this->tr_database_model->create_tr_db(date('Y'));
    $this->db->query("USE $db_dynamic;");
    $this->db->query("CREATE TABLE IF NOT EXISTS `sum-kd_akun` (`kd_sum` double NOT NULL AUTO_INCREMENT, `kd_akun` varchar(5) DEFAULT NULL, `bulan` varchar(2) DEFAULT NULL, `jumlah` double DEFAULT NULL, `nama_sub` varchar(64) DEFAULT NULL, PRIMARY KEY (`kd_sum`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    $this->db->query("CREATE TABLE IF NOT EXISTS `sum-tabel` (`kd_sum` double NOT NULL AUTO_INCREMENT, `tabel` varchar(128) NOT NULL, `bulan` varchar(2) DEFAULT NULL, `jumlah` double DEFAULT NULL, PRIMARY KEY (`kd_sum`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    $this->db->query("CREATE TABLE IF NOT EXISTS `tr11_penerimaan_tidak_terikat_pending` (`idtr` varchar(16) NOT NULL, `kd_akun` varchar(5) NOT NULL, `tanggal` date NOT NULL, `nominal` double NOT NULL, `nama_pemberi` varchar(256) NOT NULL, `keterangan` text NOT NULL, PRIMARY KEY (`idtr`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    $this->db->query("CREATE TABLE IF NOT EXISTS `tr12_penerimaan_terikat_pending` (`idtr` varchar(16) NOT NULL, `kd_akun` varchar(5) NOT NULL, `tanggal` date NOT NULL, `nominal` double NOT NULL, `nama_pemberi` varchar(256) NOT NULL, `keterangan` text NOT NULL, PRIMARY KEY (`idtr`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    $this->db->query("CREATE TABLE IF NOT EXISTS `tr21_pembelian_pending` (`idtr` varchar(16) NOT NULL, `kd_akun` varchar(5) NOT NULL, `tanggal` date NOT NULL, `jenis` varchar(32) NOT NULL, `merek` varchar(112) NOT NULL, `nomor_seri` varchar(112) NOT NULL, `jumlah` int(11) NOT NULL, `keterangan` text NOT NULL, `harga_satuan` int(11) NOT NULL, `total_harga` int(11) NOT NULL, PRIMARY KEY (`idtr`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    $this->db->query("CREATE TABLE IF NOT EXISTS `tr22_beban_pending` (`idtr` varchar(16) NOT NULL, `kd_akun` varchar(5) DEFAULT NULL, `tanggal` date DEFAULT NULL, `nominal` int(11) DEFAULT NULL, `keterangan` text, PRIMARY KEY (`idtr`)) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    $this->db->query("CREATE TABLE IF NOT EXISTS `tr23_renov_bangun_pending` (`idtr` varchar(16) DEFAULT NULL, `kd_akun` varchar(5) DEFAULT NULL, `tanggal` date DEFAULT NULL, `nominal` float DEFAULT NULL, `keterangan` text) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
    $this->db->trans_complete();
  }

  public function index()
  {
    if ($this->session->userdata('status') == NULL) {
      $this->load->view('homepage_v.php');
    } elseif ($this->session->userdata('jenis_user') == 'manager') {
      redirect('mgr/dashboard');
    } elseif ($this->session->userdata('jenis_user') == 'akuntan') {
      redirect('acc/dashboard');
    }
  }

  public function about_us()
  {
    $this->load->view('about_us_v.php');
  }

  function exit_mosacc()
  {
    $this->execInBackground('start cmd.exe @cmd /k "taskkill /IM chrome.exe"');
    $this->execInBackground('start cmd.exe @cmd /k ""C:\mosacc\xampp\xampp_stop.exe""');
    $this->execInBackground('cmd.exe @cmd /k "taskkill /F /IM cmd.exe"');
  }

  function execInBackground($cmd)
  {
    if (substr(php_uname(), 0, 7) == "Windows") {
      pclose(popen("start /B " . $cmd, "r"));
    } else {
      exec($cmd . " > /dev/null &");
    }
  }
}


/* End of file Homepage.php */
/* Location: ./application/controllers/Homepage.php */
