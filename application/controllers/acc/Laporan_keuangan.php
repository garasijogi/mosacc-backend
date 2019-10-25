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
    for ($x = 0; $x < count($b); $x++) {
      for ($y = 0; $y < count($b[$x]); $y++) {
        if ($b[$y]->kd_akun == 22114) {
          $total_perlengkapan = $total_perlengkapan + $b[$x]->nominal;
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
    $pt = $this->rules_model->get_pt($bulan);
    $ptt = $this->rules_model->get_ptt($bulan);
    $p = $this->rules_model->get_p($bulan);
    $b = $this->rules_model->get_b($bulan);

    $data['nominal_kas'] = $this->rules_model->nominal_kas($pt, $ptt, $p, $b);
    //END MENENTUKAN NOMINAL KAS

    $this->load->view('acc/laporan_neraca_v.php', $data);
  }

  function laporan_aktivitas()
  {
    //ERROR REPORTING
    // error_reporting(0);

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
      for ($x = 0; $x < count($ptt); $x++) {
        for ($y = 0; $y < count($ptt[$x]); $y++) {
          if ($r->kd_akun == $ptt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_ptt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_ptt[$z] = $r->menu;
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
      for ($x = 0; $x < count($pt); $x++) {
        for ($y = 0; $y < count($pt[$x]); $y++) {
          if ($r->kd_akun == $pt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_pt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_pt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $z++;
            }
          }
        }
      }
    }
    $data['menu_pt'] = $menu_pt;
    //END GET MENU PENERIMAAN TERIKAT

    //GET MENU PENERIMAAN TERIKAT
    $pt = $this->rules_model->get_pt_now($bulan);
    $z = 0;
    $menu_temp = '0';
    foreach ($rules->result() as $r) {
      for ($x = 0; $x < count($pt); $x++) {
        for ($y = 0; $y < count($pt[$x]); $y++) {
          if ($r->kd_akun == $pt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_pt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_pt[$z] = $r->menu;
              $menu_temp = $r->menu;
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
      for ($x = 0; $x < count($btt); $x++) {
        for ($y = 0; $y < count($btt[$x]); $y++) {
          if ($r->kd_akun == $btt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_btt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_btt[$z] = $r->menu;
              $menu_temp = $r->menu;
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
      for ($x = 0; $x < count($bt); $x++) {
        for ($y = 0; $y < count($bt[$x]); $y++) {
          if ($r->kd_akun == $bt[$x]->kd_akun) {
            if ($z == 0) {
              $menu_bt[$z] = $r->menu;
              $menu_temp = $r->menu;
              $z++;
            } elseif ($z > 0 && $r->menu != $menu_temp) {
              $menu_bt[$z] = $r->menu;
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

    //GET NOMINAL
    //GET NOMINAL PENERIMAAN TERIKAT
    foreach ($menu_pt as $mpt) {
      $data[$mpt]['n'] = 0;
      foreach ($submenu_pt[$mpt] as $sub) {
        for ($t = 0; $t < count($kd_akun); $t++) {
          $data[$mpt][$kd_akun[$sub]] = 0;
          for ($x = 0; $x < count($pt); $x++) {
            for ($y = 0; $y < count($pt[$x]); $y++) {
              if ($pt[$x]->kd_akun == $kd_akun[$sub]) {
                $data[$mpt][$kd_akun[$sub]] =  $data[$mpt][$kd_akun[$sub]] + $pt[$x]->nominal;
                $data[$mpt]['n'] = $data[$mpt]['n'] + $data[$mpt][$kd_akun[$sub]];
              }
            }
          }
        }
      }
    }
    //END GET NOMINAL PENERIMAAN TERIKAT

    //GET NOMINAL PENERIMAAN TIDAK TERIKAT
    foreach ($menu_ptt as $mptt) {
      $data[$mptt]['n'] = 0;
      foreach ($submenu_ptt[$mptt] as $sub) {
        for ($t = 0; $t < count($kd_akun); $t++) {
          $data[$mptt][$kd_akun[$sub]] = 0;
          for ($x = 0; $x < count($ptt); $x++) {
            for ($y = 0; $y < count($ptt[$x]); $y++) {
              if ($ptt[$x]->kd_akun == $kd_akun[$sub]) {
                $data[$mptt][$kd_akun[$sub]] =  $data[$mptt][$kd_akun[$sub]] + $ptt[$x]->nominal;
                $data[$mptt]['n'] = $data[$mptt]['n'] + $data[$mptt][$kd_akun[$sub]];
              }
            }
          }
        }
      }
    }
    //END GET NOMINAL PENERIMAAN TIDAK TERIKAT

    //GET NOMINAL BEBAN TIDAK TERIKAT
    foreach ($menu_btt as $mbtt) {
      $data[$mbtt]['n'] = 0;
      foreach ($submenu_btt[$mbtt] as $sub) {
        for ($t = 0; $t < count($kd_akun); $t++) {
          $data[$mbtt][$kd_akun[$sub]] = 0;
          for ($x = 0; $x < count($btt); $x++) {
            for ($y = 0; $y < count($btt[$x]); $y++) {
              if ($btt[$x]->kd_akun == $kd_akun[$sub]) {
                $data[$mbtt][$kd_akun[$sub]] =  $data[$mbtt][$kd_akun[$sub]] + $btt[$x]->nominal;
                $data[$mbtt]['n'] = $data[$mbtt]['n'] + $data[$mbtt][$kd_akun[$sub]];
              }
            }
          }
        }
      }
    }
    //END GET NOMINAL BEBAN TIDAK TERIKAT

    //GET NOMINAL BEBAN TIDAK TERIKAT
    foreach ($menu_bt as $mbt) {
      $data[$mbt]['n'] = 0;
      foreach ($submenu_bt[$mbt] as $sub) {
        for ($t = 0; $t < count($kd_akun); $t++) {
          $data[$mbt][$kd_akun[$sub]] = 0;
          for ($x = 0; $x < count($bt); $x++) {
            for ($y = 0; $y < count($bt[$x]); $y++) {
              if ($bt[$x]->kd_akun == $kd_akun[$sub]) {
                $data[$mbt][$kd_akun[$sub]] =  $data[$mbt][$kd_akun[$sub]] + $bt[$x]->nominal;
                $data[$mbt]['n'] = $data[$mbt]['n'] + $data[$mbt][$kd_akun[$sub]];
              }
            }
          }
        }
      }
    }
    //END GET NOMINAL BEBAN TIDAK TERIKAT

    $this->load->view('acc/laporan_aktivitas_v.php', $data);
  }

  function laporan_arus_kas()
  {
    error_reporting(0);
    //kas di debit
    $data['kd_akun_debit'] = $this->rules_model->get_rules_where('kas', 'debit');
    $indicator_d = 0;
    foreach ($data['kd_akun_debit']->result() as $kddebit) {
      $kdd['jml_kdd'][$indicator_d] = $kddebit->kd_akun;
      $indicator_d++;
    }
    for ($i = 0; $i < $indicator_d; $i++) {
      $contain['D_PT_backup'][$i] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', $kdd['jml_kdd'][$i]);
      $contain['D_PTT_backup'][$i] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', $kdd['jml_kdd'][$i]);
    }

    //pilih bulan pada debit
    $bulan = $this->input->get('bulan');
    if ($bulan == NULL) {
      $bulan = intval(date('m'));
    }
    $data['bulan'] = $bulan;
    $j = 0;
    $k = 0;

    for ($i = 0; $i < $indicator_d; $i++) {
      foreach ($contain['D_PT_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r == $bulan) {
          $contain['D_PT'][$j] = $contain['D_PT_backup'][$i];
          $j++;
        }
      }
      foreach ($contain['D_PTT_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r == $bulan) {
          $contain['D_PTT'][$k] = $contain['D_PTT_backup'][$i];
          $k++;
        }
      }
    }
    for ($j = 0; $j < $indicator_d; $j++) {
      if (isset($contain['D_PT'][$j]) == FALSE) {
        $contain['D_PT'][$j] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', 69);
      }
      if (isset($contain['D_PTT'][$j]) == FALSE) {
        $contain['D_PTT'][$j] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', 69);
      }
    }
    //end pilih bulan

    //kas di kredit
    $data['kd_akun_kredit'] = $this->rules_model->get_rules_where('kas', 'kredit');
    $indicator_k = 0;
    foreach ($data['kd_akun_kredit']->result() as $kdkredit) {
      $kdk['jml_kdk'][$indicator_k] = $kdkredit->kd_akun;
      $indicator_k++;
    }

    for ($j = 0; $j < $indicator_k; $j++) {
      $contain['K_P_backup'][$j] = $this->rules_model->get_record_where('tr21_pembelian_pending', $kdk['jml_kdk'][$j]);
      $contain['K_B_backup'][$j] = $this->rules_model->get_record_where('tr22_beban_pending', $kdk['jml_kdk'][$j]);
    }

    //pilih bulan pada kredit
    $j = 0;
    $k = 0;
    for ($i = 0; $i < $indicator_k; $i++) {
      foreach ($contain['K_P_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r == $bulan) {
          $contain['K_P'][$j] = $contain['K_P_backup'][$i];
          $j++;
        }
      }
      foreach ($contain['K_B_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r == $bulan) {
          $contain['K_B'][$k] = $contain['K_B_backup'][$i];
          $k++;
        }
      }
    }
    for ($j = 0; $j < $indicator_k; $j++) {
      if (isset($contain['K_P'][$j]) == FALSE) {
        $contain['K_P'][$j] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', 69);
      }
      if (isset($contain['K_B'][$j]) == FALSE) {
        $contain['K_B'][$j] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', 69);
      }
    }

    // end pilih bulan
    //KIRIM

    //debit
    $data['indicator_d'] = $indicator_d;
    $data['rules'] = $this->rules_model->get_rules();
    $data['kdd'] = $kdd['jml_kdd'];
    for ($i = 0; $i < $indicator_d; $i++) {
      $data['contain_DPT'][$i] = $contain['D_PT'][$i];
    }
    for ($i = 0; $i < $indicator_d; $i++) {
      $data['contain_DPTT'][$i] = $contain['D_PTT'][$i];
    }

    //kredit
    $data['indicator_k'] = $indicator_k;
    $data['kdk'] = $kdk['jml_kdk'];
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KP'][$i] = $contain['K_P'][$i];
    }
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KB'][$i] = $contain['K_B'][$i];
    }

    //GENERATING LAPORAN
    // DEBIT
    // DEBIT PADA PENERIMAAN TERIKAT
    $no = 0;
    $no2 = 0;
    $no3 = 0;
    $kda_temp = '0';
    $nama_menu_temp = '0';
    $jumlah_kdd = count($data['kdd']);

    //generate record DPT
    foreach ($data['kdd'] as $xkdd) {
      for ($i = 0; $i < $jumlah_kdd; $i++) {
        foreach ($data['contain_DPT'][$i]->result() as $record) {
          if ($record->kd_akun == $xkdd) {
            foreach ($data['rules']->result() as $r) {
              if ($xkdd == $r->kd_akun) {
                if ($xkdd != $kda_temp) {
                  if ($nama_menu_temp != $r->menu) {
                    $data['nama_menu'][$no3] = $r->menu;
                    $nama_menu_temp = $r->menu;
                    $no3++;
                  }
                }
                $no2++;
              }
            }
            $no++;
            $kda_temp = $xkdd;
          }
        }
      }
    }

    //generate nama sub
    $nama_sub_temp = '0';
    for ($x = 0; $x < count($data['nama_menu']); $x++) {
      $no = 0;
      foreach ($data['kdd'] as $xkdd) {
        for ($i = 0; $i < $jumlah_kdd; $i++) {
          foreach ($data['contain_DPT'][$i]->result() as $record) {
            if ($record->kd_akun == $xkdd) {
              foreach ($data['rules']->result() as $r) {
                if ($xkdd == $r->kd_akun) {
                  if ($r->nama_sub != $nama_sub_temp && $r->menu == $data['nama_menu'][$x]) {
                    $data['nama_sub'][$x][$no] = $r->nama_sub;
                    $nama_sub_temp = $r->nama_sub;
                    $no++;
                  }
                }
              }
            }
          }
        }
      }
    }

    //generate nominal per sub DPT
    for ($x = 0; $x < count($data['nama_menu']); $x++) {
      $z = 0;
      for ($y = 0; $y < count($data['nama_sub'][$x]); $y++) {
        $z = 0;
        for ($i = 0; $i < $jumlah_kdd; $i++) {
          foreach ($data['contain_DPT'][$i]->result() as $record) {
            foreach ($data['rules']->result() as $r) {
              if ($record->kd_akun == $r->kd_akun && $r->nama_sub == $data['nama_sub'][$x][$y]) {
                if ($z == 0) {
                  $data['nominal_sub'][$x][$y] = $record->nominal;
                  $nominal_temp = $record->nominal;
                  $z = 1;
                } elseif ($z == 1) {
                  $data['nominal_sub'][$x][$y] = $nominal_temp + $record->nominal;
                  $nominal_temp = $data['nominal_sub'][$x][$y];
                }
              }
            }
          }
        }
      }
    }

    // DEBIT PADA PENERIMAAN TIDAK TERIKAT
    $no = 0;
    $no2 = 0;
    $no3 = 0;
    $kda_temp = '0';
    $nama_menu_dptt_temp = '0';
    $jumlah_kdd = count($data['kdd']);

    //generate record DPTT
    foreach ($data['kdd'] as $xkdd) {
      for ($i = 0; $i < $jumlah_kdd; $i++) {
        foreach ($data['contain_DPTT'][$i]->result() as $record) {
          if ($record->kd_akun == $xkdd) {
            foreach ($data['rules']->result() as $r) {
              if ($xkdd == $r->kd_akun) {
                if ($xkdd != $kda_temp) {
                  if ($nama_menu_dptt_temp != $r->menu) {
                    $data['nama_menu_dptt'][$no3] = $r->menu;
                    $nama_menu_dptt_temp = $r->menu;
                    $no3++;
                  }
                }
                $no2++;
              }
            }
            $no++;
            $kda_temp = $xkdd;
          }
        }
      }
    }

    //generate nama sub
    $nama_sub_dptt_temp = '0';
    for ($x = 0; $x < count($data['nama_menu_dptt']); $x++) {
      $no = 0;
      foreach ($data['kdd'] as $xkdd) {
        for ($i = 0; $i < $jumlah_kdd; $i++) {
          foreach ($data['contain_DPTT'][$i]->result() as $record) {
            if ($record->kd_akun == $xkdd) {
              foreach ($data['rules']->result() as $r) {
                if ($xkdd == $r->kd_akun) {
                  if ($r->nama_sub != $nama_sub_temp && $r->menu == $data['nama_menu_dptt'][$x]) {
                    $data['nama_sub_dptt'][$x][$no] = $r->nama_sub;
                    $nama_sub_dptt_temp = $r->nama_sub;
                    $no++;
                  }
                }
              }
            }
          }
        }
      }
    }

    //generate nominal per sub DPTT
    for ($x = 0; $x < count($data['nama_menu_dptt']); $x++) {
      $z = 0;
      for ($y = 0; $y < count($data['nama_sub_dptt'][$x]); $y++) {
        $z = 0;
        for ($i = 0; $i < $jumlah_kdd; $i++) {
          foreach ($data['contain_DPTT'][$i]->result() as $record) {
            foreach ($data['rules']->result() as $r) {
              if ($record->kd_akun == $r->kd_akun && $r->nama_sub == $data['nama_sub_dptt'][$x][$y]) {
                if ($z == 0) {
                  $data['nominal_sub_dptt'][$x][$y] = $record->nominal;
                  $nominal_temp = $record->nominal;
                  $z = 1;
                } elseif ($z == 1) {
                  $data['nominal_sub_dptt'][$x][$y] = $nominal_temp + $record->nominal;
                  $nominal_temp = $data['nominal_sub_dptt'][$x][$y];
                }
              }
            }
          }
        }
      }
    }

    // KREDIT
    // KREDIT PADA PEMBELIAN
    $no = 0;
    $no2 = 0;
    $no3 = 0;
    $kdk_temp = '0';
    $nama_menu_temp = '0';
    $jumlah_kdk = count($data['kdk']);

    //generate record KP
    foreach ($data['kdk'] as $xkdk) {
      for ($i = 0; $i < $jumlah_kdk; $i++) {
        foreach ($data['contain_KP'][$i]->result() as $record) {
          if ($record->kd_akun == $xkdk) {
            foreach ($data['rules']->result() as $r) {
              if ($xkdk == $r->kd_akun) {
                if ($xkdk != $kda_temp) {
                  if ($nama_menu_temp != $r->menu) {
                    $data['nama_menu_kp'][$no3] = $r->menu;
                    $nama_menu_temp = $r->menu;
                    $no3++;
                  }
                }
                $no2++;
              }
            }
            $no++;
            $kdk_temp = $xkdk;
          }
        }
      }
    }

    //generate nama sub
    $nama_sub_temp = '0';
    for ($x = 0; $x < count($data['nama_menu_kp']); $x++) {
      $no = 0;
      foreach ($data['kdk'] as $xkdk) {
        for ($i = 0; $i < $jumlah_kdk; $i++) {
          foreach ($data['contain_KP'][$i]->result() as $record) {
            if ($record->kd_akun == $xkdk) {
              foreach ($data['rules']->result() as $r) {
                if ($xkdk == $r->kd_akun) {
                  if ($r->nama_sub != $nama_sub_temp && $r->menu == $data['nama_menu_kp'][$x]) {
                    $data['nama_sub_kp'][$x][$no] = $r->nama_sub;
                    $nama_sub_temp = $r->nama_sub;
                    $no++;
                  }
                }
              }
            }
          }
        }
      }
    }

    //generate nominal per sub KP
    for ($x = 0; $x < count($data['nama_menu_kp']); $x++) {
      $z = 0;
      for ($y = 0; $y < count($data['nama_sub_kp'][$x]); $y++) {
        $z = 0;
        for ($i = 0; $i < $jumlah_kdk; $i++) {
          foreach ($data['contain_KP'][$i]->result() as $record) {
            foreach ($data['rules']->result() as $r) {
              if ($record->kd_akun == $r->kd_akun && $r->nama_sub == $data['nama_sub_kp'][$x][$y]) {
                if ($z == 0) {
                  $data['nominal_sub_kp'][$x][$y] = $record->total_harga;
                  $nominal_temp = $record->total_harga;
                  $z = 1;
                } elseif ($z == 1) {
                  $data['nominal_sub_kp'][$x][$y] = $nominal_temp + $record->total_harga;
                  $nominal_temp = $data['nominal_sub_kp'][$x][$y];
                }
              }
            }
          }
        }
      }
    }

    // KREDIT PADA BEBAN
    $no = 0;
    $no2 = 0;
    $no3 = 0;
    $kdk_temp = '0';
    $nama_menu_temp = '0';
    $jumlah_kdk = count($data['kdk']);

    //generate record KB
    foreach ($data['kdk'] as $xkdk) {
      for ($i = 0; $i < $jumlah_kdk; $i++) {
        foreach ($data['contain_KB'][$i]->result() as $record) {
          if ($record->kd_akun == $xkdk) {
            foreach ($data['rules']->result() as $r) {
              if ($xkdk == $r->kd_akun) {
                if ($xkdk != $kda_temp) {
                  if ($nama_menu_temp != $r->menu) {
                    $data['nama_menu_kb'][$no3] = $r->menu;
                    $nama_menu_temp = $r->menu;
                    $no3++;
                  }
                }
                $no2++;
              }
            }
            $no++;
            $kdk_temp = $xkdk;
          }
        }
      }
    }

    //generate nama sub
    $nama_sub_temp = '0';
    for ($x = 0; $x < count($data['nama_menu_kb']); $x++) {
      $no = 0;
      foreach ($data['kdk'] as $xkdk) {
        for ($i = 0; $i < $jumlah_kdk; $i++) {
          foreach ($data['contain_KB'][$i]->result() as $record) {
            if ($record->kd_akun == $xkdk) {
              foreach ($data['rules']->result() as $r) {
                if ($xkdk == $r->kd_akun) {
                  if ($r->nama_sub != $nama_sub_temp && $r->menu == $data['nama_menu_kb'][$x]) {
                    $data['nama_sub_kb'][$x][$no] = $r->nama_sub;
                    $nama_sub_temp = $r->nama_sub;
                    $no++;
                  }
                }
              }
            }
          }
        }
      }
    }

    //generate nominal per sub KB
    for ($x = 0; $x < count($data['nama_menu_kb']); $x++) {
      $z = 0;
      for ($y = 0; $y < count($data['nama_sub_kb'][$x]); $y++) {
        $z = 0;
        for ($i = 0; $i < $jumlah_kdk; $i++) {
          foreach ($data['contain_KB'][$i]->result() as $record) {
            foreach ($data['rules']->result() as $r) {
              if ($record->kd_akun == $r->kd_akun && $r->nama_sub == $data['nama_sub_kb'][$x][$y]) {
                if ($z == 0) {
                  $data['nominal_sub_kb'][$x][$y] = $record->nominal;
                  $nominal_temp = $record->nominal;
                  $z = 1;
                } elseif ($z == 1) {
                  $data['nominal_sub_kb'][$x][$y] = $nominal_temp + $record->nominal;
                  $nominal_temp = $data['nominal_sub_kb'][$x][$y];
                }
              }
            }
          }
        }
      }
    }

    //aset neto tidak terikat bulan ini
    $data['asetneto_tt'] = 0;
    for ($i = 0; $i < count($data['contain_DPTT']); $i++) {
      foreach ($data['contain_DPTT'][$i]->result() as $record) {
        $data['asetneto_tt'] = $data['asetneto_tt'] + $record->nominal;
      }
    }
    for ($i = 0; $i < count($data['contain_KB']); $i++) {
      foreach ($data['contain_KB'][$i]->result() as $record) {
        if ($record->kd_akun == 22111 || $record->kd_akun == 22112 || $record->kd_akun == 22113 || $record->kd_akun == 22114 || $record->kd_akun == 22115 || $record->kd_akun == 22116 || $record->kd_akun == 22117 || $record->kd_akun == 22120) {
          $data['asetneto_tt'] = $data['asetneto_tt'] - $record->nominal;
        }
      }
    }

    //aset neto tidak terikat bulan lalu
    $data['asetneto_tt_blnlalu'] = 0;

    //aset neto terikat bulan ini
    $data['asetneto_t'] = 0;
    for ($i = 0; $i < count($data['contain_DPT']); $i++) {
      foreach ($data['contain_DPT'][$i]->result() as $record) {
        $data['asetneto_t'] = $data['asetneto_t'] + $record->nominal;
      }
    }
    for ($i = 0; $i < count($data['contain_KB']); $i++) {
      foreach ($data['contain_KB'][$i]->result() as $record) {
        if ($record->kd_akun == 22231 || $record->kd_akun == 22232 || $record->kd_akun == 22233 || $record->kd_akun == 22234 || $record->kd_akun == 22235 || $record->kd_akun == 22241 || $record->kd_akun == 22242 || $record->kd_akun == 22243 || $record->kd_akun == 22251 || $record->kd_akun == 22252 || $record->kd_akun == 22253 || $record->kd_akun == 22254 || $record->kd_akun == 22255 || $record->kd_akun == 22256 || $record->kd_akun == 22257 || $record->kd_akun == 22261 || $record->kd_akun == 22262) {
          $data['asetneto_t'] = $data['asetneto_t'] - $record->nominal;
        }
      }
    }

    //aset neto bulan lalu
    $data['asetneto_t_blnlalu'] = 0;
    $data['asetneto_blnlalu'] = $data['asetneto_t_blnlalu'] - $data['asetneto_tt_blnlalu'];

    //generate total nominal pembelian
    $data['total_pembelian_perlengkapan'] = 0;
    $data['total_pembelian_peralatan'] = 0;
    $data['total_pembelian_kendaraan'] = 0;
    for ($j = 0; $j < count($contain['K_P']); $j++) {
      foreach ($contain['K_P'][$j]->result() as $ckp) {
        if ($ckp->kd_akun == 21100) {
          $data['total_pembelian_perlengkapan'] = $data['total_pembelian_perlengkapan'] + $ckp->total_harga;
        } elseif ($ckp->kd_akun == 21200) {
          $data['total_pembelian_peralatan'] = $data['total_pembelian_peralatan'] + $ckp->total_harga;
        } elseif ($ckp->kd_akun == 21300) {
          $data['total_pembelian_kendaraan'] = $data['total_pembelian_kendaraan'] + $ckp->total_harga;
        }
      }
    }

    //MENENTUKAN NOMINAL KAS
    $pt = $this->rules_model->get_pt($bulan);
    $ptt = $this->rules_model->get_ptt($bulan);
    $p = $this->rules_model->get_p($bulan);
    $b = $this->rules_model->get_b($bulan);

    $data['nominal_kas'] = $this->rules_model->nominal_kas($pt, $ptt, $p, $b);
    //END MENENTUKAN NOMINAL KAS

    $this->load->view('acc/laporan_arus_kas_v.php', $data);
  }
}


/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */
