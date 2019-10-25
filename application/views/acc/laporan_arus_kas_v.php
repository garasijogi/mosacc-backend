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
                <h5><b>Laporan Arus Kas</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>

        <!-- view -->
        <div class="row" id="printed">
            <h6 class="center" id="title-view"><b>Masjid Al-Ishlah <br>Laporan Arus Kas <br>Per <?php echo month_generator($bulan); ?> 2019</b></h6>
            <table id='table-arus-kas-v' class="table-borderless">
                <thead>
                    <tr class="teal white-text">
                        <th style="width:70%">Keterangan</th>
                        <th style="width:30%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- logical process -->
                    <?php for ($h = 0; $h < 4; $h++) {
                        if ($h == 0) {
                            $nama_menu_simpan = $nama_menu_dptt;
                            $nama_sub_simpan = $nama_sub_dptt;
                            $nominal_sub_simpan = $nominal_sub_dptt;
                            $total_menu = 0;
                        } elseif ($h == 1) {
                            $jumlah_ptt = $total_menu;
                            $nama_menu_simpan = $nama_menu_kb;
                            $nama_sub_simpan = $nama_sub_kb;
                            $nominal_sub_simpan = $nominal_sub_kb;
                            $total_menu = 0;
                        } elseif ($h == 2) {
                            $jumlah_btt = $total_menu;
                            $nama_menu_simpan = $nama_menu;
                            $nama_sub_simpan = $nama_sub;
                            $nominal_sub_simpan = $nominal_sub;
                            $total_menu = 0;
                        } elseif ($h == 3) {
                            $jumlah_pt = $total_menu;
                            $nama_menu_simpan = $nama_menu_kb;
                            $nama_sub_simpan = $nama_sub_kb;
                            $nominal_sub_simpan = $nominal_sub_kb;
                            $total_menu = 0;
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
                            $total_menu = $total_menu + $total[$nama_menu_simpan[$x]];
                            for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) { }
                        }
                        if ($h == 3) :
                            $jumlah_bt = $total_menu;
                        endif;
                        $aset_neto_t = $jumlah_pt - $jumlah_bt;
                        $aset_neto_tt = $jumlah_ptt - $jumlah_btt;
                        $total_aset_neto = $aset_neto_t + $aset_neto_tt;
                    } ?>
                    <!-- end logical process -->

                    <tr>
                        <th colspan="2">Aktivitas Operasi</th>
                    </tr>
                    <tr>
                        <td>Kenaikan (Penurunan) Aset Neto</td>
                        <td><?php echo "Rp " . number_format($total_aset_neto, 2, ',', '.');
                            $neto_kas = $total_aset_neto; ?> </td>
                    </tr>
                    <tr>
                        <td>Pembelian Perlengkapan</td>
                        <td><?php echo "Rp -" . number_format($total_pembelian_perlengkapan, 2, ',', '.');
                            $neto_kas = $neto_kas - $total_pembelian_perlengkapan; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th colspan="2">Aktivitas Investasi</th>
                    </tr>
                    <tr>
                        <td>Pembelian Peralatan</td>
                        <td><?php echo "Rp " . number_format($total_pembelian_peralatan, 2, ',', '.');
                            $neto_kas = $neto_kas - $total_pembelian_peralatan; ?></td>
                    </tr>
                    <tr>
                        <td>Pembelian Kendaraan</td>
                        <td><?php echo "Rp " . number_format($total_pembelian_kendaraan, 2, ',', '.');
                            $neto_kas = $neto_kas - $total_pembelian_kendaraan; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>KENAIKAN (PENURUNAN) NETO DALAM KAS</th>
                        <th><?php echo "Rp " . number_format($neto_kas, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>KAS PADA AWAL BULAN</th>
                        <th><?php echo "Rp " . number_format($nominal_kas_awalbln, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>KAS PADA AKHIR BULAN</th>
                        <th><?php echo "Rp " . number_format($nominal_kas + $neto_kas + $nominal_kas_awalbln, 2, ',', '.'); ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- view -->

        <!-- print -->
        <div class="row" style="display: none">
            <h6 class="center" id="title-print"><b>Masjid Al-Ishlah <br>Laporan Arus Kas <br>Per <?php echo date_generator(date('Y-m-d')); ?></b></h6>
            <table id='table-arus-kas' class="table-borderless">
                <thead>
                    <tr>
                        <td style="display: none;"></td>
                        <td style="display: none;"> </td>
                        <td style="display: none;"> </td>
                        <td style="display: none;"> </td>
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
                                <td class="font-bold"><?php echo $nama_menu_simpan[$x]; ?></td>
                                <td style="display: none;"></td>
                                <td style="display: none;"></td>
                                <td style="display: none;"></td>
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
        <!-- print -->

    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>