<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rules_model extends CI_Model
{

  // gunakan $this->app_db instead $->db untuk mengakses database transaksi
  public $app_db;

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  function get_rules()
  {
    $result = $this->db->get('rules');
    return $result;
  }

  function get_rules_where($indikator, $dk)
  {
    $result = $this->db->get_where('rules', array($dk => $indikator));
    return $result;
  }

  function get_record_where($menu, $kd_akun)
  {
    $result = $this->app_db->get_where($menu, array('kd_akun' => $kd_akun));
    return $result;
  }

  function get_nama_sub($kd_akun)
  {
    $result = $this->db->get_where('rules', array('kd_akun' => $kd_akun))->result();
    return $result[0]->nama_sub;
  }

  function get_menu($kd_akun)
  {
    $result = $this->db->get_where('rules', array('kd_akun' => $kd_akun))->result();
    return $result[0]->menu;
  }

  function get_all_records()
  {
    $result = $this->app_db->select('*')
      ->from('tr11_penerimaan_tidak_terikat_pending as tr11, tr12_penerimaan_terikat_pending as tr12, tr21_pembelian_pending as tr21, tr22_beban_pending as tr22');
    return $result;
  }

  function get_penerimaan_terikat($kode)
  {
    $result = $this->app_db->get_where('tr12_penerimaan_terikat_pending', array('kd_akun' => $kode));
    return $result;
  }

  function get_penerimaan_tidak_terikat($kode)
  {
    $result = $this->app_db->get_where('tr11_penerimaan_tidak_terikat_pending', array('kd_akun' => $kode));
    return $result;
  }

  function letak_kas($nama_menu_kp, $nama_sub_kp, $nominal_sub_kp, $nama_menu_kb, $nama_sub_kb, $nominal_sub_kb, $nama_menu, $nama_sub, $nominal_sub, $nama_menu_dptt, $nama_sub_dptt, $nominal_sub_dptt, $nama_menu_kr, $nama_sub_kr, $nominal_sub_kr)
  {
    // Menentukan letak kas
    $total_kredit = 0;
    $total_debit = 0;
    for ($h = 0; $h < 5; $h++) {
      if ($h == 0) {
        $nama_menu_simpan = $nama_menu_kp;
        $nama_sub_simpan = $nama_sub_kp;
        $nominal_sub_simpan = $nominal_sub_kp;
      } elseif ($h == 1) {
        $nama_menu_simpan = $nama_menu_kb;
        $nama_sub_simpan = $nama_sub_kb;
        $nominal_sub_simpan = $nominal_sub_kb;
      } elseif ($h == 2) {
        $nama_menu_simpan = $nama_menu_kr;
        $nama_sub_simpan = $nama_sub_kr;
        $nominal_sub_simpan = $nominal_sub_kr;
      } elseif ($h == 3) {
        $nama_menu_simpan = $nama_menu;
        $nama_sub_simpan = $nama_sub;
        $nominal_sub_simpan = $nominal_sub;
      } elseif ($h == 4) {
        $nama_menu_simpan = $nama_menu_dptt;
        $nama_sub_simpan = $nama_sub_dptt;
        $nominal_sub_simpan = $nominal_sub_dptt;
      }
      for ($x = 0; $x < count($nama_menu_simpan); $x++) {

        for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
          if ($h == 0 || $h == 1 || $h == 2) :
            $total_debit = $total_debit + $nominal_sub_simpan[$x][$y];
          endif;
          if ($h == 3 || $h == 4) :
            $total_kredit = $total_kredit + $nominal_sub_simpan[$x][$y];
          endif;
        }
      }
    }
    return $total_kredit - $total_debit;
  }

  //GET RECORD DARI BULAN SEKARANG DAN BULAN SEBELUMNYA
  function get_ptt($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr11_penerimaan_tidak_terikat_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_pt($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr12_penerimaan_terikat_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_p($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr21_pembelian_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_b($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_bt($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->where('tanggal <= ', $givenDate)
      ->where("(kd_akun = 22231 OR kd_akun = 22232 OR kd_akun = 22233 OR kd_akun = 22234 OR kd_akun = 22235 OR kd_akun = 22241 OR kd_akun = 22242 OR kd_akun = 22243 OR kd_akun = 22251 OR kd_akun = 22252 OR kd_akun = 22253 OR kd_akun = 22254 OR kd_akun = 22255 OR kd_akun = 22256 OR kd_akun = 22257 OR kd_akun = 22261 OR kd_akun = 22262)")
      ->get()
      ->result();
    return $result;
  }

  function get_btt($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';

    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->where('tanggal <= ', $givenDate)
      // ->where("(FirstName='Tove' OR FirstName='Ola' OR Gender='M' OR Country='India')")
      ->where("( kd_akun = 22111 OR kd_akun = 22112 OR kd_akun = 22113 OR kd_akun = 22114 OR kd_akun = 22115 OR kd_akun = 22116 OR kd_akun = 22117 OR kd_akun = 22120)")
      ->get()
      ->result();
    return $result;
  }
  //END GET DATA DARI RECORD BULAN INI DAN SEBELUMNYA

  //GET DATA DARI RECORD BULAN INI
  function get_ptt_now($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-';
    $result = $this->app_db
      ->select('*')
      ->from('tr11_penerimaan_tidak_terikat_pending')
      ->like('tanggal', $givenDate, 'after')
      ->get()
      ->result();
    return $result;
  }

  function get_pt_now($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-';
    $result = $this->app_db
      ->select('*')
      ->from('tr12_penerimaan_terikat_pending')
      ->like('tanggal', $givenDate, 'after')
      ->get()
      ->result();
    return $result;
  }

  function get_p_now($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-';
    $result = $this->app_db
      ->select('*')
      ->from('tr21_pembelian_pending')
      ->like('tanggal', $givenDate, 'after')
      ->get()
      ->result();
    return $result;
  }

  function get_b_now($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-';
    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->like('tanggal', $givenDate, 'after')
      ->get()
      ->result();
    return $result;
  }

  function get_bt_now($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-';
    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->like('tanggal', $givenDate, 'after')
      ->where("(kd_akun = 22231 OR kd_akun = 22232 OR kd_akun = 22233 OR kd_akun = 22234 OR kd_akun = 22235 OR kd_akun = 22241 OR kd_akun = 22242 OR kd_akun = 22243 OR kd_akun = 22251 OR kd_akun = 22252 OR kd_akun = 22253 OR kd_akun = 22254 OR kd_akun = 22255 OR kd_akun = 22256 OR kd_akun = 22257 OR kd_akun = 22261 OR kd_akun = 22262)")
      ->get()
      ->result();
    return $result;
  }

  function get_btt_now($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-';

    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->like('tanggal', $givenDate, 'after')
      // ->where("(FirstName='Tove' OR FirstName='Ola' OR Gender='M' OR Country='India')")
      ->where("( kd_akun = 22111 OR kd_akun = 22112 OR kd_akun = 22113 OR kd_akun = 22114 OR kd_akun = 22115 OR kd_akun = 22116 OR kd_akun = 22117 OR kd_akun = 22120)")
      ->get()
      ->result();
    return $result;
  }
  //END GET DATA RECORD DARI BULAN INI

  //GET DATA RECORD DARI BULAN SEBELUMNYA
  function get_ptt_before($bulan)
  {
    $bulan = sprintf('%02d', $bulan - 1);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr11_penerimaan_tidak_terikat_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_pt_before($bulan)
  {
    $bulan = sprintf('%02d', $bulan - 1);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr12_penerimaan_terikat_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_p_before($bulan)
  {
    $bulan = sprintf('%02d', $bulan - 1);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr21_pembelian_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_b_before($bulan)
  {
    $bulan = sprintf('%02d', $bulan - 1);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    return $result;
  }

  function get_bt_before($bulan)
  {
    $bulan = sprintf('%02d', $bulan - 1);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->where('tanggal <= ', $givenDate)
      ->where("(kd_akun = 22231 OR kd_akun = 22232 OR kd_akun = 22233 OR kd_akun = 22234 OR kd_akun = 22235 OR kd_akun = 22241 OR kd_akun = 22242 OR kd_akun = 22243 OR kd_akun = 22251 OR kd_akun = 22252 OR kd_akun = 22253 OR kd_akun = 22254 OR kd_akun = 22255 OR kd_akun = 22256 OR kd_akun = 22257 OR kd_akun = 22261 OR kd_akun = 22262)")
      ->get()
      ->result();
    return $result;
  }

  function get_btt_before($bulan)
  {
    $bulan = sprintf('%02d', $bulan - 1);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';

    $result = $this->app_db
      ->select('*')
      ->from('tr22_beban_pending')
      ->where('tanggal <= ', $givenDate)
      // ->where("(FirstName='Tove' OR FirstName='Ola' OR Gender='M' OR Country='India')")
      ->where("( kd_akun = 22111 OR kd_akun = 22112 OR kd_akun = 22113 OR kd_akun = 22114 OR kd_akun = 22115 OR kd_akun = 22116 OR kd_akun = 22117 OR kd_akun = 22120)")
      ->get()
      ->result();
    return $result;
  }
  //END GET DATA REOCRDA DARI BULAN SEBELUMNYA

  function nominal_kas($pt, $ptt, $p, $b)
  {
    $total_pt = 0;
    $total_ptt = 0;
    $total_p = 0;
    $total_b = 0;

    //pt
    for ($x = 0; $x < count($pt); $x++) {
      for ($y = 0; $y < count($pt[$x]); $y++) {
        $total_pt = $total_pt + $pt[$x]->nominal;
      }
    }

    //ptt
    for ($x = 0; $x < count($ptt); $x++) {
      for ($y = 0; $y < count($ptt[$x]); $y++) {
        $total_ptt = $total_ptt + $ptt[$x]->nominal;
      }
    }

    //p
    for ($x = 0; $x < count($p); $x++) {
      for ($y = 0; $y < count($p[$x]); $y++) {
        $total_p = $total_p + $p[$x]->total_harga;
      }
    }

    //b
    for ($x = 0; $x < count($b); $x++) {
      for ($y = 0; $y < count($b[$x]); $y++) {
        $total_b = $total_b + $b[$x]->nominal;
      }
    }

    //kas
    $nominal_kas = $total_pt + $total_ptt - $total_p - $total_b;
    return $nominal_kas;
  }

  function aset_neto_terikat($pt, $bt)
  {
    $total_pt = 0;
    $total_bt = 0;

    //pt
    for ($x = 0; $x < count($pt); $x++) {
      for ($y = 0; $y < count($pt[$x]); $y++) {
        $total_pt = $total_pt + $pt[$x]->nominal;
      }
    }

    //bt
    for ($x = 0; $x < count($bt); $x++) {
      for ($y = 0; $y < count($bt[$x]); $y++) {
        $total_bt = $total_bt + $bt[$x]->nominal;
      }
    }

    //aset neto terikat
    $aset_neto_t = $total_pt - $total_bt;
    return $aset_neto_t;
  }

  function aset_neto_tidak_terikat($ptt, $btt)
  {
    $total_ptt = 0;
    $total_btt = 0;

    //ptt
    for ($x = 0; $x < count($ptt); $x++) {
      for ($y = 0; $y < count($ptt[$x]); $y++) {
        $total_ptt = $total_ptt + $ptt[$x]->nominal;
      }
    }

    //btt
    for ($x = 0; $x < count($btt); $x++) {
      for ($y = 0; $y < count($btt[$x]); $y++) {
        $total_btt = $total_btt + $btt[$x]->nominal;
      }
    }

    //aset neto terikat
    $aset_neto_tt = $total_ptt - $total_btt;
    return $aset_neto_tt;
  }

  function get_aset_kas($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->db
      ->select_sum('nominal')
      ->from('aset-kas_bank')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    $result = $result[0]->nominal;
    return $result;
  }

  function get_aset_bangunan_tanah($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->db
      ->select_sum('nilai')
      ->from('aset-bangunan_tanah')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    $result = $result[0]->nilai;
    return $result;
  }

  function get_aset_peralatan($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->db
      ->select_sum('harga')
      ->from('aset-peralatan')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    $result = $result[0]->harga;
    return $result;
  }

  function get_aset_kendaraan($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->db
      ->select_sum('harga')
      ->from('aset-kendaraan')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    $result = $result[0]->harga;
    return $result;
  }

  function get_aset_perlengkapan($bulan)
  {
    $bulan = sprintf('%02d', $bulan);
    $givenDate = $this->session->userdata('tahun') . '-' . $bulan . '-31';
    $result = $this->db
      ->select_sum('harga')
      ->from('aset-perlengkapan')
      ->where('tanggal <= ', $givenDate)
      ->get()
      ->result();
    $result = $result[0]->harga;
    return $result;
  }

  //GET ASET SELURUHNYA
  function get_aset_kas_all()
  {
    $result = $this->db->get('aset-kas_bank');
    return $result;
  }

  function get_aset_bangunan_tanah_all()
  {
    $result = $this->db->get('aset-bangunan_tanah');
    return $result;
  }

  function get_aset_peralatan_all()
  {
    $result = $this->db->get('aset-peralatan');
    return $result;
  }

  function get_aset_kendaraan_all()
  {
    $result = $this->db->get('aset-kendaraan');
    return $result;
  }

  function get_aset_perlengkapan_all()
  {
    $result = $this->db->get('aset-perlengkapan');
    return $result;
  }
  //END GET ASET SELURUHNYA

  //GET BAGAN AKUN
  function get_bagan_akun()
  {
    $result = $this->db->get('bagan_akun');
    return $result;
  }
  //END GET BAGAN AKUN
  // ------------------------------------------------------------------------

}

/* End of file Rules_model.php */
/* Location: ./application/models/Rules_model.php */
