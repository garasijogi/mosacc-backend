<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == NULL) {
      redirect('homepage');
    }
    //OLD LOADER --------------------------------------------------------------
    // $this->load->model('rules_model');

    //NEW LOADER --------------------------------------------------------------
    //ambil tahun dari sistem
    $dynamic_tahun = date("Y");
    //load settingan database dynamic ke fungsi di helper db dynamic switcher
    $dynamic_db = switch_db_dynamic($dynamic_tahun);
    //load model yang akan digunakan
    $this->load->model('rules_model');
    //taruh settingan database dalam array
    $this->rules_model->app_db = $this->load->database($dynamic_db, TRUE);
  }

  public function index()
  {
    $this->load->view('acc/laporan_keuangan_v.php');
  }

  function laporan_neraca()
  {
    //ERROR REPORTING
    error_reporting(0);

    //MENENTUKAN BULAN
    $bulan = $this->input->get('bulan');
    if ($bulan == NULL) {
      $bulan = intval(date('m'));
    }
    $data['bulan'] = $bulan;
    //END MENENTUKAN BULAN

    //GET TOTAL NOMINAL PERLENGKAPAN
    $total_perlengkapan = 0;
    $b = $this->rules_model->get_b_now($bulan);
    $p = $this->rules_model->get_p_now($bulan);
    for ($x = 0; $x < count($p); $x++) {
      for ($y = 0; $y < count($p[$x]); $y++) {
        if ($p[$x]->kd_akun == 21100) {
          $total_perlengkapan = $total_perlengkapan + $p[$x]->total_harga;
        }
      }
    }
    $data['total_perlengkapan'] = $total_perlengkapan;
    //END GET TOTAL NOMINAL PERLENGKAPAN

    //GET PERALATAN
    //END GET PERLATAN

    //GET MENARA
    //END GET MENARA

    //GET BANGUNAN
    //END GET BANGUNAN

    //GET LAHAN PARKIR
    //END GET LAHAN PARKIR

    //GET TANAH
    //END GET TANAH

    //GET KENDARAAN
    //END GET KENDARAAN

    //GET ASET NETO TERIKAT  BEFORE
    $pt = $this->rules_model->get_pt_before($bulan);
    $bt = $this->rules_model->get_bt_before($bulan);
    $total_pt = 0;
    $total_bt = 0;
    for ($x = 0; $x < count($pt); $x++) {
      for ($y = 0; $y < count($pt[$x]); $y++) {
        $total_pt = $total_pt + $pt[$x]->nominal;
      }
    }
    for ($x = 0; $x < count($bt); $x++) {
      for ($y = 0; $y < count($bt[$x]); $y++) {
        $total_bt = $total_bt + $bt[$x]->nominal;
      }
    }
    $aset_neto_t = $total_pt - $total_bt;
    $data['aset_neto_t_before'] = $aset_neto_t;
    // END GET ASET NETO TERIKAT BEFORE

    //GET ASET NETO TERIKAT NOW
    $pt = $this->rules_model->get_pt_now($bulan);
    $bt = $this->rules_model->get_bt_now($bulan);
    $total_pt = 0;
    $total_bt = 0;
    for ($x = 0; $x < count($pt); $x++) {
      for ($y = 0; $y < count($pt[$x]); $y++) {
        $total_pt = $total_pt + $pt[$x]->nominal;
      }
    }
    for ($x = 0; $x < count($bt); $x++) {
      for ($y = 0; $y < count($bt[$x]); $y++) {
        $total_bt = $total_bt + $bt[$x]->nominal;
      }
    }
    $aset_neto_t = $total_pt - $total_bt;
    $data['aset_neto_t_now'] = $aset_neto_t;
    //END GET ASET NETO TERIKAT NOW

    //GET ASET NETO TIDAK TERIKAT  BEFORE
    $ptt = $this->rules_model->get_ptt_before($bulan);
    $btt = $this->rules_model->get_btt_before($bulan);
    $total_ptt = 0;
    $total_btt = 0;
    for ($x = 0; $x < count($ptt); $x++) {
      for ($y = 0; $y < count($ptt[$x]); $y++) {
        $total_ptt = $total_ptt + $ptt[$x]->nominal;
      }
    }
    for ($x = 0; $x < count($btt); $x++) {
      for ($y = 0; $y < count($btt[$x]); $y++) {
        $total_btt = $total_btt + $btt[$x]->nominal;
      }
    }
    $aset_neto_tt = $total_ptt - $total_btt;
    $data['aset_neto_tt_before'] = $aset_neto_tt;
    // END GET ASET NETO TIDAK TERIKAT BEFORE

    //GET ASET NETO TIDAK TERIKAT NOW
    $ptt = $this->rules_model->get_ptt_now($bulan);
    $btt = $this->rules_model->get_btt_now($bulan);
    $total_ptt = 0;
    $total_btt = 0;
    for ($x = 0; $x < count($ptt); $x++) {
      for ($y = 0; $y < count($ptt[$x]); $y++) {
        $total_ptt = $total_ptt + $ptt[$x]->nominal;
      }
    }
    for ($x = 0; $x < count($btt); $x++) {
      for ($y = 0; $y < count($btt[$x]); $y++) {
        $total_btt = $total_btt + $btt[$x]->nominal;
      }
    }
    $aset_neto_tt = $total_ptt - $total_btt;
    $data['aset_neto_tt_now'] = $aset_neto_tt;
    //END GET ASET NETO TERIKAT NOW

    //MENENTUKAN NOMINAL KAS
    $pt = $this->rules_model->get_pt_now($bulan);
    $ptt = $this->rules_model->get_ptt_now($bulan);
    $p = $this->rules_model->get_p_now($bulan);
    $b = $this->rules_model->get_b_now($bulan);

    $data['nominal_kas'] = $this->rules_model->nominal_kas($pt, $ptt, $p, $b);
    //END MENENTUKAN NOMINAL KAS

    $this->load->view('acc/laporan_neraca_v.php', $data);
  }

  function laporan_aktivitas()
  {
    //ERROR REPORTING
    error_reporting(0);

    //MENENTUKAN BULAN
    $bulan = $this->input->get('bulan');
    if ($bulan == NULL) {
      $bulan = intval(date('m'));
    }
    $data['bulan'] = $bulan;
    //END MENENTUKAN BULAN

    //GET NAMA MENU
    //GET MENU PENERIMAAN TIDAK TERIKAT
    $ptt = $this->rules_model->get_ptt_now($bulan);
    $rules = $this->rules_model->get_rules();
    $z = 0;
    $menu_temp = '0';

    foreach ($rules->result() as $r) {
      $kd = substr($r->kd_akun, 0, 3);
      for ($x = 0; $x < count($ptt); $x++) {
        for ($y = 0; $y < count($ptt[$x]); $y++) {
          if ($r->kd_akun == $ptt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_ptt[$z] = $r->menu;
              $kd_menu[$r->menu] = $kd;
              $menu_temp = $r->menu;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_ptt[$z] = $r->menu;
              $kd_menu[$r->menu] = $kd;
              $menu_temp = $r->menu;
              $z++;
            }
          }
        }
      }
    }
    $data['menu_ptt'] = $menu_ptt;
    //END GET MENU PENERIMAAN TIDAK TERIKAT

    //GET MENU PENERIMAAN TERIKAT
    $pt = $this->rules_model->get_pt_now($bulan);
    $z = 0;
    $menu_temp = '0';
    foreach ($rules->result() as $r) {
      $kd = substr($r->kd_akun, 0, 3);
      for ($x = 0; $x < count($pt); $x++) {
        for ($y = 0; $y < count($pt[$x]); $y++) {
          if ($r->kd_akun == $pt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_pt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $kd_menu[$r->menu] = $kd;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_pt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $kd_menu[$r->menu] = $kd;
              $z++;
            }
          }
        }
      }
    }
    $data['menu_pt'] = $menu_pt;
    //END GET MENU PENERIMAAN TERIKAT

    //GET MENU BEBAN TIDAK TERIKAT
    $btt = $this->rules_model->get_btt_now($bulan);
    $z = 0;
    $menu_temp = '0';
    foreach ($rules->result() as $r) {
      $kd = substr($r->kd_akun, 0, 3);
      for ($x = 0; $x < count($btt); $x++) {
        for ($y = 0; $y < count($btt[$x]); $y++) {
          if ($r->kd_akun == $btt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_btt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $kd_menu_b[$r->menu] = $kd;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_btt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $kd_menu_b[$r->menu] = $kd;
              $z++;
            }
          }
        }
      }
    }
    $data['menu_btt'] = $menu_btt;
    //END GET MENU BEBAN TIDAK TERIKAT

    //GET MENU BEBAN TERIKAT
    $bt = $this->rules_model->get_bt_now($bulan);
    $z = 0;
    $menu_temp = '0';
    foreach ($rules->result() as $r) {
      $kd = substr($r->kd_akun, 0, 3);
      for ($x = 0; $x < count($bt); $x++) {
        for ($y = 0; $y < count($bt[$x]); $y++) {
          if ($r->kd_akun == $bt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_bt[$z] = $r->menu;
              $kd_menu_b[$r->menu] = $kd;
              $menu_temp = $r->menu;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_bt[$z] = $r->menu;
              $kd_menu_b[$r->menu] = $kd;
              $menu_temp = $r->menu;
              $z++;
            }
          }
        }
      }
    }
    $data['menu_bt'] = $menu_bt;
    //END GET MENU BEBAN TERIKAT

    //GET NAMA SUB
    //GET SUB MENU PENERIMAAN TERIKAT
    $submenu_temp = '0';
    foreach ($menu_pt as $mpt) {
      $z = 0;
      foreach ($rules->result() as $r) {
        for ($x = 0; $x < count($pt); $x++) {
          for ($y = 0; $y < count($pt[$x]); $y++) {
            if ($r->kd_akun == $pt[$x]->kd_akun && $r->menu == $mpt) {
              if ($z == 0) {
                $submenu_pt[$mpt][$z] = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $submenu_temp = $r->nama_sub;
                $z++;
              } elseif ($z > 0 && $r->nama_sub != $submenu_temp) {
                $submenu_pt[$mpt][$z] = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $submenu_temp = $r->nama_sub;
                $z++;
              }
            }
          }
        }
      }
    }
    $data['submenu_pt'] = $submenu_pt;
    //END GET SUB MENU PENERIMAAN TERIKAT

    //GET SUB MENU PENERIMAAN TIDAK TERIKAT
    $submenu_temp = '0';
    foreach ($menu_ptt as $mptt) {
      $z = 0;
      foreach ($rules->result() as $r) {
        for ($x = 0; $x < count($ptt); $x++) {
          for ($y = 0; $y < count($ptt[$x]); $y++) {
            if ($r->kd_akun == $ptt[$x]->kd_akun && $r->menu == $mptt) {
              if ($z == 0) {
                $submenu_ptt[$mptt][$z] = $r->nama_sub;
                $submenu_temp = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $z++;
              } elseif ($z > 0 && $r->nama_sub != $submenu_temp) {
                $submenu_ptt[$mptt][$z] = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $submenu_temp = $r->nama_sub;
                $z++;
              }
            }
          }
        }
      }
    }
    $data['submenu_ptt'] = $submenu_ptt;

    //GET SUB MENU BEBAN TIDAK TERIKAT
    $submenu_temp = '0';
    foreach ($menu_btt as $mbtt) {
      $z = 0;
      foreach ($rules->result() as $r) {
        for ($x = 0; $x < count($btt); $x++) {
          for ($y = 0; $y < count($btt[$x]); $y++) {
            if ($r->kd_akun == $btt[$x]->kd_akun && $r->menu == $mbtt) {
              if ($z == 0) {
                $submenu_btt[$mbtt][$z] = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $submenu_temp = $r->nama_sub;
                $z++;
              } elseif ($z > 0 && $r->nama_sub != $submenu_temp) {
                $submenu_btt[$mbtt][$z] = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $submenu_temp = $r->nama_sub;
                $z++;
              }
            }
          }
        }
      }
    }
    $data['submenu_btt'] = $submenu_btt;
    //END GET SUB MENU BEBAN TIDAK TERIKAT

    //GET SUB MENU BEBAN TERIKAT
    $submenu_temp = '0';
    foreach ($menu_bt as $mbt) {
      $z = 0;
      foreach ($rules->result() as $r) {
        for ($x = 0; $x < count($bt); $x++) {
          for ($y = 0; $y < count($bt[$x]); $y++) {
            if ($r->kd_akun == $bt[$x]->kd_akun && $r->menu == $mbt) {
              if ($z == 0) {
                $submenu_bt[$mbt][$z] = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $submenu_temp = $r->nama_sub;
                $z++;
              } elseif ($z > 0 && $r->nama_sub != $submenu_temp) {
                $submenu_bt[$mbt][$z] = $r->nama_sub;
                $kd_akun[$r->nama_sub] = $r->kd_akun;
                $submenu_temp = $r->nama_sub;
                $z++;
              }
            }
          }
        }
      }
    }
    $data['submenu_bt'] = $submenu_bt;
    //END GET SUB MENU BEBAN TERIKAT

    //GET NOMINAL PER SUB
    //GET NOMINAL PENERIMAAN TERIKAT
    foreach ($rules->result() as $r) {
      $nominal[$r->nama_sub] = 0;

      //GET NOMINAL PER SUB PENERIMAAN TERIKAT
      for ($x = 0; $x < count($pt); $x++) {
        for ($y = 0; $y < count($pt[$x]); $y++) {
          if ($r->kd_akun == $pt[$x]->kd_akun) {
            $nominal[$r->nama_sub] = $nominal[$r->nama_sub] + $pt[$x]->nominal;
          }
        }
      }
      //END GET NOMINAL PER SUB PENERIMAAN TERIKAT

      //GET NOMINAL PER SUB PENERIMAAN TIDAK TERIKAT
      for ($x = 0; $x < count($ptt); $x++) {
        for ($y = 0; $y < count($ptt[$x]); $y++) {
          if ($r->kd_akun == $ptt[$x]->kd_akun) {
            $nominal[$r->nama_sub] = $nominal[$r->nama_sub] + $ptt[$x]->nominal;
          }
        }
      }
      //END GET NOMINAL PER SUB PENERIMAAN TIDAK TERIKAT

      //GET NOMINAL PER SUB BEBAN TERIKAT
      for ($x = 0; $x < count($bt); $x++) {
        for ($y = 0; $y < count($bt[$x]); $y++) {
          if ($r->kd_akun == $bt[$x]->kd_akun) {
            $nominal[$r->nama_sub] = $nominal[$r->nama_sub] + $bt[$x]->nominal;
          }
        }
      }
      //END GET NOMINAL PER SUB BEBAN TERIKAT

      //GET NOMINAL PER SUB BEBAN TIDAK TERIKAT
      for ($x = 0; $x < count($btt); $x++) {
        for ($y = 0; $y < count($btt[$x]); $y++) {
          if ($r->kd_akun == $btt[$x]->kd_akun) {
            $nominal[$r->nama_sub] = $nominal[$r->nama_sub] + $btt[$x]->nominal;
          }
        }
      }
      //END GET NOMINAL PER SUB BEBAN TIDAK TERIKAT
    }
    //END GET NOMINAL PER SUB

    //GET NOMINAL PER MENU
    //GET NOMINAL PER MENU PENERIMAAN TERIKAT
    foreach ($rules->result() as $r) {
      $kd = substr($r->kd_akun, 0, 3);

      foreach ($menu_pt as $mpt) {
        for ($x = 0; $x < count($pt); $x++) {
          for ($y = 0; $y < count($pt[$x]); $y++) {
            if (isset($tanda[$kd]) == FALSE && $r->kd_akun == $pt[$x]->kd_akun && $r->menu == $mpt) {
              $nominal_menu[$kd][$mpt] = 0 + $pt[$x]->nominal;
              $tanda[$kd] = 1;
            } elseif ($r->kd_akun == $pt[$x]->kd_akun && $r->menu == $mpt && $tanda[$kd] == 1) {
              $nominal_menu[$kd][$mpt] = $nominal_menu[$kd][$mpt] + $pt[$x]->nominal;
            }
          }
        }
      }
      //END GET NOMINAL PER MENU PENERIMAAN  TERIKAT

      //GET NOMINAL PER MENU PENERIMAAN TIDAK TERIKAT
      foreach ($menu_ptt as $mptt) {
        for ($x = 0; $x < count($ptt); $x++) {
          for ($y = 0; $y < count($ptt[$x]); $y++) {
            if (isset($tanda[$kd]) == FALSE && $r->kd_akun == $ptt[$x]->kd_akun && $r->menu == $mptt) {
              $nominal_menu[$kd][$mptt] = 0 + $ptt[$x]->nominal;
              $tanda[$kd] = 1;
            } elseif ($r->kd_akun == $ptt[$x]->kd_akun && $r->menu == $mptt && $tanda[$kd] == 1) {
              $nominal_menu[$kd][$mptt] = $nominal_menu[$kd][$mptt] + $ptt[$x]->nominal;
            }
          }
        }
      }
      //END GET NOMINAL PER MENU PENERIMAAN TIDAK TERIKAT

      //GET NOMINAL PER MENU BEBAN  TERIKAT
      foreach ($menu_bt as $mbt) {
        for ($x = 0; $x < count($bt); $x++) {
          for ($y = 0; $y < count($bt[$x]); $y++) {
            if (isset($tanda[$kd]) == FALSE && $r->kd_akun == $bt[$x]->kd_akun && $r->menu == $mbt) {
              $nominal_menu[$kd][$mbt] = 0 + $bt[$x]->nominal;
              $tanda[$kd] = 1;
            } elseif ($r->kd_akun == $bt[$x]->kd_akun && $r->menu == $mbt && $tanda[$kd] == 1) {
              $nominal_menu[$kd][$mbt] = $nominal_menu[$kd][$mbt] + $bt[$x]->nominal;
            }
          }
        }
      }
      //END GET NOMINAL PER MENU BEBEN TERIKAT

      //GET NOMINAL PER MENU BEBAN TIDAK TERIKAT
      foreach ($menu_btt as $mbtt) {
        for ($x = 0; $x < count($btt); $x++) {
          for ($y = 0; $y < count($btt[$x]); $y++) {
            if (isset($tanda[$kd]) == FALSE && $r->kd_akun == $btt[$x]->kd_akun && $r->menu == $mbtt) {
              $nominal_menu[$kd][$mbtt] = 0 + $btt[$x]->nominal;
              $tanda[$kd] = 1;
            } elseif ($r->kd_akun == $btt[$x]->kd_akun && $r->menu == $mbtt && $tanda[$kd] == 1) {
              $nominal_menu[$kd][$mbtt] = $nominal_menu[$kd][$mbtt] + $btt[$x]->nominal;
            }
          }
        }
      }
      //END GET NOMINAL PER MENU PENERIMAAN TIDAK TERIKAT
    }

    //END GET NOMINAL PER MENU
    $data['nominal_per_sub'] = $nominal;
    $data['nominal_menu'] = $nominal_menu;
    $data['kd_menu'] = $kd_menu;
    $data['kd_menu_b'] = $kd_menu_b;

    $this->load->view('acc/laporan_aktivitas_v.php', $data);
  }

  function laporan_arus_kas()
  {
    //ERROR REPORTING
    error_reporting(0);

    //MENENTUKAN BULAN
    $bulan = $this->input->get('bulan');
    if ($bulan == NULL) {
      $bulan = intval(date('m'));
    }
    $data['bulan'] = $bulan;
    //END MENENTUKAN BULAN

    //GET ASET NETO TERIKAT NOW
    $pt = $this->rules_model->get_pt_now($bulan);
    $bt = $this->rules_model->get_bt_now($bulan);
    $total_pt = 0;
    $total_bt = 0;
    for ($x = 0; $x < count($pt); $x++) {
      for ($y = 0; $y < count($pt[$x]); $y++) {
        $total_pt = $total_pt + $pt[$x]->nominal;
      }
    }
    for ($x = 0; $x < count($bt); $x++) {
      for ($y = 0; $y < count($bt[$x]); $y++) {
        $total_bt = $total_bt + $bt[$x]->nominal;
      }
    }
    $aset_neto_t = $total_pt - $total_bt;
    $data['aset_neto_t_now'] = $aset_neto_t;
    //END GET ASET NETO TERIKAT NOW

    //GET ASET NETO TIDAK TERIKAT NOW
    $ptt = $this->rules_model->get_ptt_now($bulan);
    $btt = $this->rules_model->get_btt_now($bulan);
    $total_ptt = 0;
    $total_btt = 0;
    for ($x = 0; $x < count($ptt); $x++) {
      for ($y = 0; $y < count($ptt[$x]); $y++) {
        $total_ptt = $total_ptt + $ptt[$x]->nominal;
      }
    }
    for ($x = 0; $x < count($btt); $x++) {
      for ($y = 0; $y < count($btt[$x]); $y++) {
        $total_btt = $total_btt + $btt[$x]->nominal;
      }
    }
    $aset_neto_tt = $total_ptt - $total_btt;
    $data['aset_neto_tt_now'] = $aset_neto_tt;
    //END GET ASET NETO TERIKAT NOW

    //MENENTUKAN NOMINAL KAS
    $pt = $this->rules_model->get_pt_now($bulan);
    $ptt = $this->rules_model->get_ptt_now($bulan);
    $p = $this->rules_model->get_p_now($bulan);
    $b = $this->rules_model->get_b_now($bulan);

    $data['nominal_kas'] = $this->rules_model->nominal_kas($pt, $ptt, $p, $b);
    //END MENENTUKAN NOMINAL KAS

    //MENENTUKAN NOMINAL KAS BEFORE
    $pt = $this->rules_model->get_pt_before($bulan);
    $ptt = $this->rules_model->get_ptt_before($bulan);
    $p = $this->rules_model->get_p_before($bulan);
    $b = $this->rules_model->get_b_before($bulan);

    $data['nominal_kas_before'] = $this->rules_model->nominal_kas($pt, $ptt, $p, $b);
    //END MENENTUKAN NOMINAL KAS BEFORE

    //MENENTUKAN PEMBELIAN PERLENGKAPAN
    $total_perlengkapan = 0;
    $p = $this->rules_model->get_p_now($bulan);
    for ($x = 0; $x < count($p); $x++) {
      for ($y = 0; $y < count($p[$x]); $y++) {
        if ($p[$x]->kd_akun == 21100) {
          $total_perlengkapan = $total_perlengkapan + $p[$x]->total_harga;
        }
      }
    }
    $data['total_perlengkapan'] = $total_perlengkapan;
    //END MENENTUKAN PEMBELIAN PERLENGKAPAN

    //MENENTUKAN PEMBELIAN PERALATAN
    $total_peralatan = 0;
    for ($x = 0; $x < count($p); $x++) {
      for ($y = 0; $y < count($p[$x]); $y++) {
        if ($p[$x]->kd_akun == 21200) {
          $total_peralatan = $total_peralatan + $p[$x]->total_harga;
        }
      }
    }
    $data['total_peralatan'] = $total_peralatan;
    //END MENENTUKAN PEMBELIAN PERALATAN

    //MENENTUKAN PEMBELIAN KENDARAAN
    $total_kendaraan = 0;
    for ($x = 0; $x < count($p); $x++) {
      for ($y = 0; $y < count($p[$x]); $y++) {
        if ($p[$x]->kd_akun == 21300) {
          $total_kendaraan = $total_kendaraan + $p[$x]->total_harga;
        }
      }
    }
    $data['total_kendaraan'] = $total_kendaraan;
    //END MENENTUKAN PEMBELIAN KENDARAAN
    $this->load->view('acc/laporan_arus_kas_v.php', $data);
  }
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
