<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php error_reporting(0);
$this->load->view("acc/_partials/head"); ?>
<!-- /head -->

<body>

    <div class="container-fluid">
        <?php $this->load->view("acc/_partials/sidebar"); ?>
    </div>

    <div>
        <!-- navbar&&sidebar -->

        <?php $this->load->view("acc/_partials/navbar"); ?>
        <!-- /navbar&&sidebar -->
    </div>

    <!-- preloader -->
    <?php $this->load->view('acc/_partials/preloader.php') ?>
    <!-- preloader -->

    <!-- content -->
    <div class="container">
        <div class="sticky">
            <div class="row center">
                <h5><b>Laporan Aktivitas</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>

        <!-- view -->
        <div class="row" id="printed">
            <h6 class="center" id="title-view"><b>Masjid Al-Ishlah <br>Laporan Aktivitas <br>Per <?php echo date_generator(date('Y-m-d')); ?></b></h6>
            <table id='table-arus-kas-v' class="table-borderless">
                <thead>
                    <tr class="teal white-text">
                        <th colspan="2" style="width:60%">Keterangan</th>
                        <th colspan="2" style="width:40%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>

                    <?php for ($h = 0; $h < 4; $h++) {
                        if ($h == 0) {
                            $nama_menu_simpan = $nama_menu_dptt;
                            $nama_sub_simpan = $nama_sub_dptt;
                            $nominal_sub_simpan = $nominal_sub_dptt;
                            $total_menu = 0;

                            ?>
                            <tr>
                                <th colspan="4">Perubahan Aset Tidak Terikat</th>
                            </tr>
                            <tr>
                                <th colspan="4">Penerimaan Tidak Terikat</th>
                            </tr>
                        <?php
                            } elseif ($h == 1) {
                                $jumlah_ptt = $total_menu;
                                ?>
                            <tr>
                                <th></th>
                                <th colspan="2">Jumlah Penerimaan Tidak Terikat</th>
                                <th class="tr-border-top"><?php echo "Rp " . number_format($total_menu, 2, ',', '.'); ?></th>
                            </tr>
                            <?php
                                    $nama_menu_simpan = $nama_menu_kb;
                                    $nama_sub_simpan = $nama_sub_kb;
                                    $nominal_sub_simpan = $nominal_sub_kb;
                                    $total_menu = 0;
                                    ?>
                            <tr>
                                <th colspan="4">Beban Tidak Terikat</th>
                            </tr>
                        <?php
                            } elseif ($h == 2) {
                                $jumlah_btt = $total_menu;
                                ?>
                            <tr>
                                <th></th>
                                <th colspan="2">Jumlah Beban Tidak Terikat</th>
                                <th class="tr-border-top"><?php echo "Rp " . number_format($total_menu, 2, ',', '.'); ?></th>
                            </tr>
                            <tr>
                                <th colspan="3">Kenaikan (Penurunan) Aset Neto Tidak Terikat</th>
                                <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_tt = $jumlah_ptt - $jumlah_btt, 2, ',', '.'); ?></th>
                            </tr>
                            <?php
                                    $nama_menu_simpan = $nama_menu;
                                    $nama_sub_simpan = $nama_sub;
                                    $nominal_sub_simpan = $nominal_sub;
                                    $total_menu = 0;
                                    ?>
                            <tr>
                                <th colspan="4">Penerimaan Terikat</th>
                            </tr>
                        <?php
                            } elseif ($h == 3) {
                                $jumlah_pt = $total_menu;
                                ?>
                            <tr>
                                <th></th>
                                <th colspan="2">Jumlah Penerimaan Terikat</th>
                                <th class="tr-border-top"><?php echo "Rp " . number_format($total_menu, 2, ',', '.'); ?></th>
                            </tr>
                            <?php
                                    $nama_menu_simpan = $nama_menu_kb;
                                    $nama_sub_simpan = $nama_sub_kb;
                                    $nominal_sub_simpan = $nominal_sub_kb;
                                    $total_menu = 0;
                                    ?>
                            <tr>
                                <th colspan="4">Beban Terikat</th>
                            </tr>
                        <?php
                            }

                            //menentukan total nominal setiap sub

                            for ($x = 0; $x < count($nama_menu_simpan); $x++) {
                                $total[$nama_menu_simpan[$x]] = 0;
                                for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
                                    $total[$nama_menu_simpan[$x]] = $total[$nama_menu_simpan[$x]] + $nominal_sub_simpan[$x][$y];
                                }
                            }

                            //view
                            for ($x = 0; $x < count($nama_menu_simpan); $x++) {
                                ?>
                            <tr>
                                <td colspan="3"><?php echo $nama_menu_simpan[$x]; ?></td>
                                <td><?php echo "Rp " . number_format($total[$nama_menu_simpan[$x]], 2, ',', '.');
                                            $total_menu = $total_menu + $total[$nama_menu_simpan[$x]]; ?></td>
                            </tr>
                            <?php
                                    for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
                                        ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $nama_sub_simpan[$x][$y]; ?></td>
                                    <td><?php echo "Rp " . number_format($nominal_sub_simpan[$x][$y], 2, ',', '.'); ?></td>
                                    <td></td>
                                <?php
                                        }
                                        ?>
                            <?php
                                }
                                if ($h == 3) :
                                    $jumlah_bt = $total_menu;
                                    ?>
                                <tr>
                                    <th></th>
                                    <th colspan="2">Jumlah Beban Terikat</th>
                                    <th class="tr-border-top"><?php echo "Rp " . number_format($total_menu, 2, ',', '.'); ?></th>
                                </tr>
                                <tr>
                                    <th colspan="3">Kenaikan (Penurunan) Aset Neto Terikat</th>
                                    <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_t = $jumlah_pt - $jumlah_bt, 2, ',', '.'); ?></th>
                                </tr>
                        <?php endif;
                        } ?>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <th colspan="3">KENAIKAN (PENURUNAN) ASET NETO</th>
                            <th><?php echo "Rp " . number_format($aset_neto_t + $aset_neto_tt, 2, ',', '.'); ?></th>
                        </tr>
                        <tr>
                            <th colspan="3">ASET NETO AWAL BULAN</th>
                            <th><?php echo "Rp " . number_format($asetneto_blnlalu, 2, ',', '.'); ?></th>
                        </tr>
                        <tr>
                            <th colspan="3">ASET NETO AKHIR BULAN</th>
                            <th><?php echo "Rp " . number_format(($aset_neto_t + $aset_neto_tt) - $asetneto_blnlalu, 2, ',', '.'); ?></th>
                        </tr>
                </tbody>
            </table>
        </div>
        <!-- view -->

    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>