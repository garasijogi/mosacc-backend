<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku_besar_utama extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == NULL) {
      redirect('homepage');
    }

    //OLD LOADER -------------------------------------------------------------------
    // $this->load->model('rules_model');

    //NEW LOADER -------------------------------------------------------------------
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
    $this->load->view('acc/buku_besar_utama_v.php');
  }

  function jurnal_umum()
  {
    //kas di debit
    $data['kd_akun_debit'] = $this->rules_model->get_rules_where('kas', 'debit');
    $indicator_d = 0;
    foreach ($data['kd_akun_debit']->result() as $kddebit) {
      $kdd['jml_kdd'][$indicator_d] = $kddebit->kd_akun;
      $indicator_d++;
    }

    for ($i = 0; $i < $indicator_d; $i++) {
      $contain['D_PT'][$i] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', $kdd['jml_kdd'][$i]);
      $contain['D_PTT'][$i] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', $kdd['jml_kdd'][$i]);
    }

    //kas di kredit
    $data['kd_akun_kredit'] = $this->rules_model->get_rules_where('kas', 'kredit');
    $indicator_k = 0;
    foreach ($data['kd_akun_kredit']->result() as $kdkredit) {
      $kdk['jml_kdk'][$indicator_k] = $kdkredit->kd_akun;
      $indicator_k++;
    }

    for ($j = 0; $j < $indicator_k; $j++) {
      $contain['K_P'][$j] = $this->rules_model->get_record_where('tr21_pembelian_pending', $kdk['jml_kdk'][$j]);
      $contain['K_B'][$j] = $this->rules_model->get_record_where('tr22_beban_pending', $kdk['jml_kdk'][$j]);
      $contain['K_R'][$j] = $this->rules_model->get_record_where('tr23_renov_bangun_pending', $kdk['jml_kdk'][$j]);
    }

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
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KR'][$i] = $contain['K_R'][$i];
    }

    $this->load->view('acc/jurnal_umum_v.php', $data);
  }
  function buku_besar()
  {
    //kas di debit
    $data['kd_akun_debit'] = $this->rules_model->get_rules_where('kas', 'debit');
    $indicator_d = 0;
    foreach ($data['kd_akun_debit']->result() as $kddebit) {
      $kdd['jml_kdd'][$indicator_d] = $kddebit->kd_akun;
      $indicator_d++;
    }

    for ($i = 0; $i < $indicator_d; $i++) {
      $contain['D_PT'][$i] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', $kdd['jml_kdd'][$i]);
      $contain['D_PTT'][$i] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', $kdd['jml_kdd'][$i]);
    }

    //kas di kredit
    $data['kd_akun_kredit'] = $this->rules_model->get_rules_where('kas', 'kredit');
    $indicator_k = 0;
    foreach ($data['kd_akun_kredit']->result() as $kdkredit) {
      $kdk['jml_kdk'][$indicator_k] = $kdkredit->kd_akun;
      $indicator_k++;
    }

    for ($j = 0; $j < $indicator_k; $j++) {
      $contain['K_P'][$j] = $this->rules_model->get_record_where('tr21_pembelian_pending', $kdk['jml_kdk'][$j]);
      $contain['K_B'][$j] = $this->rules_model->get_record_where('tr22_beban_pending', $kdk['jml_kdk'][$j]);
      $contain['K_R'][$j] = $this->rules_model->get_record_where('tr23_renov_bangun_pending', $kdk['jml_kdk'][$j]);
    }

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
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KR'][$i] = $contain['K_R'][$i];
    }

    //MENENTUKAN TABEL KAS
    $bulan = 12;
    $data['pt'] = $this->rules_model->get_pt($bulan);
    $data['ptt'] = $this->rules_model->get_ptt($bulan);
    $data['p'] = $this->rules_model->get_p($bulan);
    $data['b'] = $this->rules_model->get_b($bulan);
    //END MENENTUKAN TABEL KAS

    $this->load->view('acc/buku_besar_v.php', $data);
  }

  function neraca_saldo()
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
      $contain['D_PT'][$i] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', $kdd['jml_kdd'][$i]);
      $contain['D_PTT'][$i] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', $kdd['jml_kdd'][$i]);
    }

    //kas di kredit
    $data['kd_akun_kredit'] = $this->rules_model->get_rules_where('kas', 'kredit');
    $indicator_k = 0;
    foreach ($data['kd_akun_kredit']->result() as $kdkredit) {
      $kdk['jml_kdk'][$indicator_k] = $kdkredit->kd_akun;
      $indicator_k++;
    }

    for ($j = 0; $j < $indicator_k; $j++) {
      $contain['K_P'][$j] = $this->rules_model->get_record_where('tr21_pembelian_pending', $kdk['jml_kdk'][$j]);
      $contain['K_B'][$j] = $this->rules_model->get_record_where('tr22_beban_pending', $kdk['jml_kdk'][$j]);
      $contain['K_R'][$j] = $this->rules_model->get_record_where('tr23_renov_bangun_pending', $kdk['jml_kdk'][$j]);
    }

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
    for ($i = 0; $i < $indicator_k; $i++) {
      $data['contain_KR'][$i] = $contain['K_R'][$i];
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

    // KREDIT PADA RENOVASI DAN PEMBANGUNAN
    $no = 0;
    $no2 = 0;
    $no3 = 0;
    $kdk_temp = '0';
    $nama_menu_temp = '0';
    $jumlah_kdk = count($data['kdk']);

    //generate record KR
    foreach ($data['kdk'] as $xkdk) {
      for ($i = 0; $i < $jumlah_kdk; $i++) {
        foreach ($data['contain_KR'][$i]->result() as $record) {
          if ($record->kd_akun == $xkdk) {
            foreach ($data['rules']->result() as $r) {
              if ($xkdk == $r->kd_akun) {
                if ($xkdk != $kda_temp) {
                  if ($nama_menu_temp != $r->menu) {
                    $data['nama_menu_kr'][$no3] = $r->menu;
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
    for ($x = 0; $x < count($data['nama_menu_kr']); $x++) {
      $no = 0;
      foreach ($data['kdk'] as $xkdk) {
        for ($i = 0; $i < $jumlah_kdk; $i++) {
          foreach ($data['contain_KR'][$i]->result() as $record) {
            if ($record->kd_akun == $xkdk) {
              foreach ($data['rules']->result() as $r) {
                if ($xkdk == $r->kd_akun) {
                  if ($r->nama_sub != $nama_sub_temp && $r->menu == $data['nama_menu_kr'][$x]) {
                    $data['nama_sub_kr'][$x][$no] = $r->nama_sub;
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
    for ($x = 0; $x < count($data['nama_menu_kr']); $x++) {
      $z = 0;
      for ($y = 0; $y < count($data['nama_sub_kr'][$x]); $y++) {
        $z = 0;
        for ($i = 0; $i < $jumlah_kdk; $i++) {
          foreach ($data['contain_KR'][$i]->result() as $record) {
            foreach ($data['rules']->result() as $r) {
              if ($record->kd_akun == $r->kd_akun && $r->nama_sub == $data['nama_sub_kr'][$x][$y]) {
                if ($z == 0) {
                  $data['nominal_sub_kr'][$x][$y] = $record->nominal;
                  $nominal_temp = $record->nominal;
                  $z = 1;
                } elseif ($z == 1) {
                  $data['nominal_sub_kr'][$x][$y] = $nominal_temp + $record->nominal;
                  $nominal_temp = $data['nominal_sub_kr'][$x][$y];
                }
              }
            }
          }
        }
      }
    }


    $data['nominal_kas'] = $this->rules_model->letak_kas($data['nama_menu_kp'], $data['nama_sub_kp'], $data['nominal_sub_kp'], $data['nama_menu_kb'], $data['nama_sub_kb'], $data['nominal_sub_kb'], $data['nama_menu'], $data['nama_sub'], $data['nominal_sub'], $data['nama_menu_dptt'], $data['nama_sub_dptt'], $data['nominal_sub_dptt'], $data['nama_menu_kr'], $data['nama_sub_kr'], $data['nominal_sub_kr']);
    $this->load->view('acc/neraca_saldo_v.php', $data);
  }
}


/* End of file Buku_besar_utama.php */
/* Location: ./application/controllers/Buku_besar_utama.php */
