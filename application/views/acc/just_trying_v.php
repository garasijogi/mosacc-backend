 <!-- DEBIT -->
                    <!-- DPT -->
                    <!-- logical -->
                    <?php
                    $kas_akhir = 0;
                    $x = 0;
                    $menu_temp = '0';
                    $nominal_temp = 0;
                    foreach ($kdd as $jml_kdd) {
                        ?>
                            <?php
                                for ($i = 0; $i < $indicator_d; $i++) {
                                    foreach ($contain_DPT[$i]->result() as $y) {
                                        if ($y->kd_akun == $jml_kdd) {
                                            if ($x == 0) {
                                                foreach ($rules->result() as $na) {
                                                    if ($y->kd_akun == $na->kd_akun) {
                                                        $nama_sub = $na->nama_sub;
                                                        $nama_menu = $na->menu;
                                                    }
                                                }
                                                if ($nama_menu != $menu_temp) {
                                                    if ($nominal_temp != 0) {
                                                        ?>
                        <tr>
                            <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
                            <td></td>
                            <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir+$nominal_temp;
                                                            $nominal_temp = 0; ?></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                    <td colspan="4" class="font-bold"><?php
                                                                                echo $nama_menu;
                                                                                ?></td>
                    </tr>
                    <tr>
                    <?php $menu_temp = $nama_menu;
                                            $nominal_temp = 0;
                                        }
                                        ?>
                    <td></td>
                    <td><?php echo $nama_sub; ?></td>
                    <td><?php echo "Rp " . number_format($y->nominal, 2, ',', '.');
                                            $nominal_temp = $nominal_temp + $y->nominal; ?></td>
                    <td></td>
                    </tr>

                <?php
                                    // echo "Arus Kas dari " . $nama_sub . " ";
                                    // echo $y->idtr . " kode akun = " . $y->kd_akun . "<br>";
                                    $x = 1;
                                } elseif ($x == 1) {
                                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php echo "Rp " . number_format($y->nominal, 2, ',', '.');
                                                $nominal_temp = $nominal_temp + $y->nominal; ?></td>
                        <td></td>
                    </tr>
        <?php
                        }
                        // echo $y->nominal;
                    }
                } ?>

    <?php
            $x = 0;
        } ?>
    </tr>
<?php
}
?>
<?php if($menu_temp != '0'):?>
<tr>
    <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
    <td></td>
    <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir+$nominal_temp;
        $nominal_temp = 0; ?></td>
    <td></td>
</tr>
<?php endif ?>

<!-- logical -->

<!-- DPTT -->
<!-- logical -->
<?php
$x = 0;
$menu_temp = '0';
$nominal_temp = 0;
foreach ($kdd as $jml_kdd) {
    ?>
        <?php
            for ($i = 0; $i < $indicator_d; $i++) {
                foreach ($contain_DPTT[$i]->result() as $z) {
                    if ($z->kd_akun == $jml_kdd) {
                        if ($x == 0) {
                            foreach ($rules->result() as $na) {
                                if ($z->kd_akun == $na->kd_akun) {
                                    $nama_sub = $na->nama_sub;
                                    $nama_menu = $na->menu;
                                }
                            }
                            if ($nama_menu != $menu_temp) {
                                if ($nominal_temp != 0) {
                                    ?>
    <tr>
        <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
        <td></td>
        <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir+$nominal_temp;
                                        $nominal_temp = 0; ?></td>
        <td></td>
    </tr>
<?php } ?>
<td colspan="4" class="font-bold"><?php
                                                            echo $nama_menu;
                                                            ?></td>
</tr>
<tr>
<?php $menu_temp = $nama_menu;
                        $nominal_temp = 0;
                    }
                    ?>
<td></td>
<td><?php echo $nama_sub; ?></td>
<td><?php echo "Rp " . number_format($z->nominal, 2, ',', '.');
                        $nominal_temp = $nominal_temp + $z->nominal; ?></td>
<td></td>
</tr>

<?php
                    // echo "Arus Kas dari " . $nama_sub . " ";
                    // echo $z->idtr . " kode akun = " . $z->kd_akun . "<br>";
                    $x = 1;
                } elseif ($x == 1) {
                    ?>
    <tr>
        <td></td>
        <td></td>
        <td><?php echo "Rp " . number_format($z->nominal, 2, ',', '.');
                                $nominal_temp = $nominal_temp + $z->nominal; ?></td>
        <td></td>
    </tr>
<?php
                }
                // echo $z->nominal;
            }
        } ?>

<?php
        $x = 0;
    } ?>
</tr>
<?php
}
?>
<?php if($menu_temp != '0'):?>
<tr>
    <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
    <td></td>
    <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir+$nominal_temp;
        $nominal_temp = 0; ?></td>
    <td></td>
</tr>
<?php endif; ?>
<!-- logical -->

<!-- KREDIT -->
<!-- DPT -->
<!-- logical -->
<?php
$x = 0;
$menu_temp = '0';
$nominal_temp = 0;
foreach ($kdk as $jml_kdk) {
    ?>
        <?php
            for ($i = 0; $i < $indicator_k; $i++) {
                foreach ($contain_KPT[$i]->result() as $a) {
                    if ($a->kd_akun == $jml_kdk) {
                        if ($x == 0) {
                            foreach ($rules->result() as $na) {
                                if ($a->kd_akun == $na->kd_akun) {
                                    $nama_sub = $na->nama_sub;
                                    $nama_menu = $na->menu;
                                }
                            }
                            if ($nama_menu != $menu_temp) {
                                if ($nominal_temp != 0) {
                                    ?>
    <tr>
        <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
        <td></td>
        <td></td>
        <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir-$nominal_temp;
                                        $nominal_temp = 0; ?></td>
    </tr>
<?php } ?>
<td colspan="4" class="font-bold"><?php
                                                            echo $nama_menu;
                                                            ?></td>
</tr>
<tr>
<?php $menu_temp = $nama_menu;
                        $nominal_temp = 0;
                    }
                    ?>
<td></td>
<td><?php echo $nama_sub; ?></td>
<td></td>
<td><?php echo "Rp " . number_format($a->nominal, 2, ',', '.');
                        $nominal_temp = $nominal_temp + $a->nominal; ?></td>
</tr>

<?php
                    // echo "Arus Kas dari " . $nama_sub . " ";
                    // echo $a->idtr . " kode akun = " . $a->kd_akun . "<br>";
                    $x = 1;
                } elseif ($x == 1) {
                    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo "Rp " . number_format($a->nominal, 2, ',', '.');
                                $nominal_temp = $nominal_temp + $a->nominal; ?></td>
    </tr>
<?php
                }
                // echo $a->nominal;
            }
        } ?>

<?php
        $x = 0;
    } ?>
</tr>
<?php
}
?>
<?php if($menu_temp != '0'):?>
<tr>
    <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
    <td></td>
    <td></td>
    <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir-$nominal_temp;
        $nominal_temp = 0; ?></td>
</tr>
<?php endif; ?>
<!-- logical -->

<!-- DPTT -->
<!-- logical -->
<?php
$x = 0;
$menu_temp = '0';
$nominal_temp = 0;
foreach ($kdk as $jml_kdk) {
    ?>
        <?php
            for ($i = 0; $i < $indicator_k; $i++) {
                foreach ($contain_KPTT[$i]->result() as $b) {
                    if ($b->kd_akun == $jml_kdk) {
                        if ($x == 0) {
                            foreach ($rules->result() as $na) {
                                if ($b->kd_akun == $na->kd_akun) {
                                    $nama_sub = $na->nama_sub;
                                    $nama_menu = $na->menu;
                                }
                            }
                            if ($nama_menu != $menu_temp) {
                                if ($nominal_temp != 0) {
                                    ?>
    <tr>
        <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
        <td></td>
        <td></td>
        <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir-$nominal_temp;
                                        $nominal_temp = 0; ?></td>
    </tr>
<?php } ?>
<td colspan="4" class="font-bold"><?php
                                                            echo $nama_menu;
                                                            ?></td>
</tr>
<tr>
<?php $menu_temp = $nama_menu;
                        $nominal_temp = 0;
                    }
                    ?>
<td></td>
<td><?php echo $nama_sub; ?></td>
<td></td>
<td><?php echo "Rp " . number_format($b->nominal, 2, ',', '.');
                        $nominal_temp = $nominal_temp + $b->nominal; ?></td>
</tr>

<?php
                    // echo "Arus Kas dari " . $nama_sub . " ";
                    // echo $b->idtr . " kode akun = " . $b->kd_akun . "<br>";
                    $x = 1;
                } elseif ($x == 1) {
                    ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo "Rp " . number_format($b->nominal, 2, ',', '.');
                                $nominal_temp = $nominal_temp + $b->nominal; ?></td>
    </tr>
<?php
                }
                // echo $b->nominal;
            }
        } ?>

<?php
        $x = 0;
    } ?>
</tr>
<?php
}
?>
<?php if($menu_temp != '0'):?>
<tr>
    <td class="font-bold"><?php echo "Arus Kas untuk " . $menu_temp; ?></td>
    <td></td>
    <td></td>
    <td><?php echo "Rp " . number_format($nominal_temp, 2, ',', '.');$kas_akhir=$kas_akhir-$nominal_temp;
        $nominal_temp = 0; ?></td>
</tr>
<?php endif; ?>
<tr>
    <td colspan="2" class="font-bold">Kas dan setara kas akhir periode</td>
    <?php if($kas_akhir >= 0) : ?>
    <td><?php echo "Rp " . number_format($kas_akhir, 2, ',', '.'); ?></td>
    <td></td>
<?php endif;
    if($kas_akhir<0) :
?>
<td></td>
<td><?php echo "Rp " . number_format($kas_akhir, 2, ',', '.'); ?></td>
    <?php endif; ?>
</tr>

<!-- logical -->

<!-- LOGIKA BARU -->

<!-- DEBIT -->
                    <!-- DPT -->
                    <?php
                    $no = 0;
                    $no2 = 0;
                    $kda_temp = '0';
                    $nama_menu_temp = '0';
                    $jumlah_kdd = count($kdd);

                    //generate record DPT
                    foreach ($kdd as $xkdd) {
                        for ($i = 0; $i < $jumlah_kdd; $i++) {
                            foreach ($contain_DPT[$i]->result() as $record) {
                                if ($record->kd_akun == $xkdd) {
                                    foreach ($rules->result() as $r) {
                                        if ($xkdd == $r->kd_akun) {
                                            if ($xkdd != $kda_temp) {
                                                if ($nama_menu_temp != $r->menu) {
                                                    $nama_menu[$no2] = $r->menu;
                                                    $nama_menu_temp = $r->menu;
                                                }
                                                $kdakun[$no2] = $r->kd_akun;
                                                $no2++;
                                            }
                                            $kda[$no] = $xkdd;
                                            $nama_sub[$no2][$no] = $r->nama_sub;
                                        }
                                    }
                                    $nominal[$no] = $record->nominal;
                                    $no++;
                                    $kda_temp = $xkdd;
                                }
                            }
                        }
                    }

                    //generate nominal per sub DPT
                    $count = 0;
                    $count2 = 0;
                    for ($ii = 0; $ii < count($nominal); $ii++) {
                        if ($count2 == 0) {
                            $nominal_sub[$count] = $nominal[$ii];
                            $count2 = 1;
                        } elseif ($kda[$ii] == $kda[$ii - 1]) {
                            $nominal_sub[$count] = $nominal_sub[$count] + $nominal[$ii];
                            $count2 = 1;
                        } elseif ($kda[$ii] != $kda[$ii - 1]) {
                            $count++;
                            $nominal_sub[$count] = $nominal[$ii];
                        }
                    }
                    ?>

                    <!-- TAMPILAN DPT -->
                    <?php
                    echo count($nama_menu);
                    for ($x = 0; $x < (count($nama_menu)) - 1; $x++) {
                        ?>
                        <tr>
                            <td colspan="4"><?php echo $nama_menu[$x]; ?></td>
                        </tr>
                    <?php

                    }
                    ?>


<!-- //BACKUP LAGI -->

 <!-- DEBIT -->
                        <!-- Debit Penerimaan Terikat -->
                        <?php
                        for ($x = 0; $x < count($nama_menu); $x++) {
                            ?>
                                <tr>
                                    <td colspan="4"><?php echo $nama_menu[$x]; ?></td>
                                </tr>
                                <?php
                                    for ($y = 0; $y < count($nama_sub[$x]); $y++) {
                                        ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $nama_sub[$x][$y]; ?></td>
                                        <td><?php echo "Rp " . number_format($nominal_sub[$x][$y], 2, ',', '.'); ?></td>
                                        <td></td>
                                    <?php
                                        }
                                        ?>

                                <?php
                                }
                                ?>
                                <!-- Debit Penerimaan Tidak Terikat -->
                                <?php
                                for ($x = 0; $x < count($nama_menu_dptt); $x++) {
                                    ?>
                                    <tr>
                                        <td colspan="4"><?php echo $nama_menu_dptt[$x]; ?></td>
                                    </tr>
                                    <?php
                                        for ($y = 0; $y < count($nama_sub_dptt[$x]); $y++) {
                                            ?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $nama_sub_dptt[$x][$y]; ?></td>
                                            <td><?php echo "Rp " . number_format($nominal_sub_dptt[$x][$y], 2, ',', '.'); ?></td>
                                            <td></td>
                                        <?php
                                            }
                                            ?>

                                    <?php
                                    }
                                    ?>


                                    <!-- KREDIT -->
                                    <!-- Kredit Pembelian -->
                                    <?php
                                    for ($x = 0; $x < count($nama_menu_kp); $x++) {
                                        ?>
                                        <tr>
                                            <td colspan="4"><?php echo $nama_menu_kp[$x]; ?></td>
                                        </tr>
                                        <?php
                                            for ($y = 0; $y < count($nama_sub_kp[$x]); $y++) {
                                                ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo $nama_sub_kp[$x][$y]; ?></td>
                                                <td></td>
                                                <td><?php echo "Rp " . number_format($nominal_sub_kp[$x][$y], 2, ',', '.'); ?></td>
                                            <?php
                                                }
                                                ?>

                                        <?php
                                        }
                                        ?>

                                        <!-- Kredit Beban -->
                                        <?php
                                        for ($x = 0; $x < count($nama_menu_kb); $x++) {
                                            ?>
                                            <tr>
                                                <td colspan="4"><?php echo $nama_menu_kb[$x]; ?></td>
                                            </tr>
                                            <?php
                                                for ($y = 0; $y < count($nama_sub_kb[$x]); $y++) {
                                                    ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?php echo $nama_sub_kb[$x][$y]; ?></td>
                                                    <td></td>
                                                    <td><?php echo "Rp " . number_format($nominal_sub_kb[$x][$y], 2, ',', '.'); ?></td>
                                                <?php
                                                    }
                                                    ?>

                                            <?php
                                            }
                                            ?>

                                            <!-- backup -->
                                            <div class="row" style="display:none;">
            <h6 class="center" id="title-view"><b>Masjid Al-Ishlah <br>Laporan Arus Kas <br>Per 31 Desember 2019</b></h6>
            <table id='table-arus-kas' class="table-borderless">
                <thead>
                    <tr>
                        <th style="width:30%"></th>
                        <th style="width:40%"></th>
                        <th style="width:15%"></th>
                        <th style="width:15%"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php for ($h = 0; $h < 4; $h++) {
                        if ($h == 0) {
                            $nama_menu_simpan = $nama_menu;
                            $nama_sub_simpan = $nama_sub;
                            $nominal_sub_simpan = $nominal_sub;
                        } elseif ($h == 1) {
                            $nama_menu_simpan = $nama_menu_dptt;
                            $nama_sub_simpan = $nama_sub_dptt;
                            $nominal_sub_simpan = $nominal_sub_dptt;
                        } elseif ($h == 2) {
                            $nama_menu_simpan = $nama_menu_kp;
                            $nama_sub_simpan = $nama_sub_kp;
                            $nominal_sub_simpan = $nominal_sub_kp;
                        } elseif ($h == 3) {
                            $nama_menu_simpan = $nama_menu_kb;
                            $nama_sub_simpan = $nama_sub_kb;
                            $nominal_sub_simpan = $nominal_sub_kb;
                        }

                        for ($x = 0; $x < count($nama_menu_simpan); $x++) {
                            ?>
                            <tr>
                                <td colspan="4" class="font-bold"><?php echo $nama_menu_simpan[$x]; ?></td>
                            </tr>
                            <?php
                                    for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
                                        ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $nama_sub_simpan[$x][$y]; ?></td>
                                    <td><?php if ($h == 0 || $h == 1) {
                                                        echo "Rp " . number_format($nominal_sub_simpan[$x][$y], 2, ',', '.');
                                                    } ?></td>
                                    <td><?php if ($h == 2 || $h == 3) {
                                                        echo "Rp " . number_format($nominal_sub_simpan[$x][$y], 2, ',', '.');
                                                    } ?></td>
                                <?php
                                        }
                                        ?>
                        <?php
                            }
                        } ?>
                </tbody>
            </table>
        </div>