<?php

        //hapus isi tabel
        $this->dashboard_m->truncate();
        //get nama tabel
        $tableList = tableList();
        // print_r($tableList);
        // exit();
        //ambil data dan count setiap bulan pada masing-masing table
        foreach($tableList as $value){
            if($value == 'tr21_pembelian_pending'){
                $hasil[$value] =  $this->dashboard_m->getSumPerMonth2($value);//khusus buat tabel tr21 karena tabel nominal jadi total_harga
            }else{
                $hasil[$value] =  $this->dashboard_m->getSumPerMonth($value);
            }
        }
        
        //ambil kode akun dari table rules
        $kd_akun = $this->dashboard_m->getKdakun();
        //ambil data sum dari berbagai akun di tabel tertentu
        $x=0;
        print_r($kd_akun);
        echo'<br>';
        echo'<br>';
        print_r($tableList);
        echo'<br>';
        echo'<br>';
        foreach($tableList as $value){
            foreach($kd_akun as $v){
                if($value == 'tr21_pembelian_pending'){
                    $hasil2[$x] = $this->dashboard_m->getSumPerAkun2($value, $v['kd_akun']);//khusus buat tabel tr21 karena tabel nominal jadi total_harga
                }else{
                    $hasil2[$x] = $this->dashboard_m->getSumPerAkun($value, $v['kd_akun']);
                }
                $x++;
            }
        }
        print_r($hasil2);
        exit();
        
        
        
        // if($value == 'tr21_pembelian_pending'){
            //     $hasil[$value] =  $this->dashboard_m->getSumPerMonth2($value);//khusus buat tabel tr21 karena tabel nominal jadi total_harga
            // }else{
                //     $hasil[$value] =  $this->dashboard_m->getSumPerMonth($value);
                // }        
                
                $this->dashboard_m->insertSum($hasil);
                
?>