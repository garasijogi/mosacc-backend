<!-- laporan aktivitas -->
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
    //*beban terikat
    $j = 0;
    $k = 0;
    for ($i = 0; $i < $indicator_k; $i++) {
      foreach ($contain['K_B_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r == $bulan) {
          if ($backup->kd_akun == 22231 || $backup->kd_akun == 22232 || $backup->kd_akun == 22233 || $backup->kd_akun == 22234 || $backup->kd_akun == 22235 || $backup->kd_akun == 22241 || $backup->kd_akun == 22242 || $backup->kd_akun == 22243 || $backup->kd_akun == 22251 || $backup->kd_akun == 22252 || $backup->kd_akun == 22253 || $backup->kd_akun == 22254 || $backup->kd_akun == 22255 || $backup->kd_akun == 22256 || $backup->kd_akun == 22257 || $backup->kd_akun == 22261 || $backup->kd_akun == 22262) {
            $contain['K_P'][$j] = $contain['K_B_backup'][$i];
            $j++;
          }
        }
      }

      //*beban tidak terikat
      foreach ($contain['K_B_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r == $bulan) {
          if ($backup->kd_akun == 22111 || $backup->kd_akun == 22112 || $backup->kd_akun == 22113 || $backup->kd_akun == 22114 || $backup->kd_akun == 22115 || $backup->kd_akun == 22116 || $backup->kd_akun == 22117 || $backup->kd_akun == 22120) {
            $contain['K_B'][$k] = $contain['K_B_backup'][$i];
            $k++;
          }
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

    //BULAN SEBELUMNYA
    //kas di debit sebelumnya
    //pilih bulan pada debit sebelumnya
    $j = 0;
    $k = 0;

    for ($i = 0; $i < $indicator_d; $i++) {
      foreach ($contain['D_PT_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r < $bulan) {
          $contain['D_PT_before'][$j] = $contain['D_PT_backup'][$i];
          $j++;
        }
      }
      foreach ($contain['D_PTT_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r < $bulan) {
          $contain['D_PTT_before'][$k] = $contain['D_PTT_backup'][$i];
          $k++;
        }
      }
    }
    for ($j = 0; $j < $indicator_d; $j++) {
      if (isset($contain['D_PT_before'][$j]) == FALSE) {
        $contain['D_PT_before'][$j] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', 69);
      }
      if (isset($contain['D_PTT_before'][$j]) == FALSE) {
        $contain['D_PTT_before'][$j] = $this->rules_model->get_record_where('tr11_penerimaan_tidak_terikat_pending', 69);
      }
    }
    //end pilih bulan sebelumnya

    //kas di kredit bulan sebelumnya
    //pilih bulan pada kredit bulan sebelumnya
    $j = 0;
    $k = 0;
    for ($i = 0; $i < $indicator_k; $i++) {
      foreach ($contain['K_B_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r < $bulan) {
          $contain['K_P_before'][$j] = $contain['K_B_backup'][$i];
          $j++;
        }
      }
      foreach ($contain['K_B_backup'][$i]->result() as $backup) {
        $bulan_r = intval(substr($backup->tanggal, 5, 2));
        if ($bulan_r < $bulan) {
          $contain['K_B_before'][$k] = $contain['K_B_backup'][$i];
          $k++;
        }
      }
    }
    for ($j = 0; $j < $indicator_k; $j++) {
      if (isset($contain['K_P_before'][$j]) == FALSE) {
        $contain['K_P_before'][$j] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', 69);
      }
      if (isset($contain['K_B_before'][$j]) == FALSE) {
        $contain['K_B_before'][$j] = $this->rules_model->get_record_where('tr12_penerimaan_terikat_pending', 69);
      }
    }

    //

    //menentukan saldo awal aset neto terikat
    $pt_before = 0;
    for ($x = 0; $x < count($contain['D_PT_before']); $x++) {
      foreach ($contain['D_PT_before'][$x]->result() as $cdt) {
        $pt_before = $pt_before + $cdt->nominal;
      }
    }
    $bt_before = 0;
    for ($x = 0; $x < count($contain['K_P_before']); $x++) {
      foreach ($contain['K_P_before'][$x]->result() as $record) {
        if ($record->kd_akun == 22231 || $record->kd_akun == 22232 || $record->kd_akun == 22233 || $record->kd_akun == 22234 || $record->kd_akun == 22235 || $record->kd_akun == 22241 || $record->kd_akun == 22242 || $record->kd_akun == 22243 || $record->kd_akun == 22251 || $record->kd_akun == 22252 || $record->kd_akun == 22253 || $record->kd_akun == 22254 || $record->kd_akun == 22255 || $record->kd_akun == 22256 || $record->kd_akun == 22257 || $record->kd_akun == 22261 || $record->kd_akun == 22262) {
          $bt_before = $bt_before + $record->nominal;
        }
      }
    }

    //menentukan saldo awal aset neto tidak terikat
    $ptt_before = 0;
    for ($x = 0; $x < count($contain['D_PTT_before']); $x++) {
      foreach ($contain['D_PTT_before'][$x]->result() as $cdt) {
        $ptt_before = $ptt_before + $cdt->nominal;
      }
    }
    $btt_before = 0;
    for ($x = 0; $x < count($contain['K_B_before']); $x++) {
      foreach ($contain['K_B_before'][$x]->result() as $record) {
        if ($record->kd_akun == 22111 || $record->kd_akun == 22112 || $record->kd_akun == 22113 || $record->kd_akun == 22114 || $record->kd_akun == 22115 || $record->kd_akun == 22116 || $record->kd_akun == 22117 || $record->kd_akun == 22120) {
          $btt_before = $btt_before + $record->nominal;
        }
      }
    }
    $data['sa_aset_neto_t'] = ($pt_before - $bt_before);
    $data['sa_aset_neto_tt'] = ($ptt_before - $btt_before);
    $data['sa_aset_neto'] = $data['sa_aset_neto_t'] + $data['sa_aset_neto_tt'];


    // end pilih bulan sebelumnya
    //END BULAN SEBELUMNYA

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
    //*beban terikat
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
                if ($xkdk != $kdk_temp) {
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
                  $data['nominal_sub_kp'][$x][$y] = $record->nominal;
                  $nominal_temp = $record->nominal;
                  $z = 1;
                } elseif ($z == 1) {
                  $data['nominal_sub_kp'][$x][$y] = $nominal_temp + $record->nominal;
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
        foreach ($contain['K_P_backup'][$i]->result() as $record) {
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
          foreach ($contain['K_P_backup'][$i]->result() as $record) {
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
          foreach ($contain['K_P_backup'][$i]->result() as $record) {
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
        foreach ($contain['K_B_backup'][$i]->result() as $record) {
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
          foreach ($contain['K_B_backup'][$i]->result() as $record) {
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
          foreach ($contain['K_B_backup'][$i]->result() as $record) {
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
    // //aset neto tidak terikat bulan ini
    // $data['asetneto_tt'] = 0;
    // for ($i = 0; $i < count($data['contain_DPTT']); $i++) {
    //   foreach ($data['contain_DPTT'][$i]->result() as $record) {
    //     $data['asetneto_tt'] = $data['asetneto_tt'] + $record->nominal;
    //   }
    // }
    // for ($i = 0; $i < count($data['contain_KB']); $i++) {
    //   foreach ($data['contain_KB'][$i]->result() as $record) {
    //     if ($record->kd_akun == 22111 || $record->kd_akun == 22112 || $record->kd_akun == 22113 || $record->kd_akun == 22114 || $record->kd_akun == 22115 || $record->kd_akun == 22116 || $record->kd_akun == 22117 || $record->kd_akun == 22120) {
    //       $data['asetneto_tt'] = $data['asetneto_tt'] - $record->nominal;
    //     }
    //   }
    // }

    // //aset neto tidak terikat bulan lalu
    // $data['asetneto_tt_blnlalu'] = 0;

    // //aset neto terikat bulan ini
    // $data['asetneto_t'] = 0;
    // for ($i = 0; $i < count($data['contain_DPT']); $i++) {
    //   foreach ($data['contain_DPT'][$i]->result() as $record) {
    //     $data['asetneto_t'] = $data['asetneto_t'] + $record->nominal;
    //   }
    // }
    // for ($i = 0; $i < count($data['contain_KB']); $i++) {
    //   foreach ($data['contain_KB'][$i]->result() as $record) {
    //     if ($record->kd_akun == 22231 || $record->kd_akun == 22232 || $record->kd_akun == 22233 || $record->kd_akun == 22234 || $record->kd_akun == 22235 || $record->kd_akun == 22241 || $record->kd_akun == 22242 || $record->kd_akun == 22243 || $record->kd_akun == 22251 || $record->kd_akun == 22252 || $record->kd_akun == 22253 || $record->kd_akun == 22254 || $record->kd_akun == 22255 || $record->kd_akun == 22256 || $record->kd_akun == 22257 || $record->kd_akun == 22261 || $record->kd_akun == 22262) {
    //       $data['asetneto_t'] = $data['asetneto_t'] - $record->nominal;
    //     }
    //   }
    // }

    //MENENTUKAN NOMINAL KAS
    $pt = $this->rules_model->get_pt($bulan);
    $ptt = $this->rules_model->get_ptt($bulan);
    $p = $this->rules_model->get_p($bulan);
    $b = $this->rules_model->get_b($bulan);

    $data['nominal_kas'] = $this->rules_model->nominal_kas($pt, $ptt, $p, $b);
    //END MENENTUKAN NOMINAL KAS

    //aset neto bulan lalu
    $data['asetneto_t_blnlalu'] = 0;
    $data['asetneto_blnlalu'] = $data['asetneto_t_blnlalu'] - $data['asetneto_tt_blnlalu'];

    //MENENTUKAN ASET NETO TERIKAT
    $bt = $this->rules_model->get_bt($bulan);
    $btt = $this->rules_model->get_btt($bulan);

    $data['asetneto_t'] = $this->rules_model->aset_neto_terikat($pt, $bt);
    $data['asetneto_tt'] = $this->rules_model->aset_neto_tidak_terikat($ptt, $btt);
    //END MENENTUKAN ASET NETO TERIKAT

<!-- end laporan aktivitas -->