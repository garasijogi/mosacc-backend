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

    <!-- breadcrumb -->
    <div class="content">
        <div class="col s12 breadcrumb-wrapper valign-wrapper">
            <a href="<?php echo base_url('acc/laporan_keuangan/'); ?>" class="breadcrumb">Laporan Keuangan</a>
            <a href="<?php echo base_url('acc/laporan_keuangan/laporan_aktivitas'); ?>" class="breadcrumb">Laporan Aktivitas</a>
        </div>
    </div>
    <!-- breadcrumb -->

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
        <!-- initiaton process -->
        <?php
        $j_ptt = 0;
        $j_btt = 0;
        $j_pt = 0;
        $j_bt = 0;
        $k_aset_neto_t = 0;
        $k_aset_neto_tt = 0;
        ?>
        <div class="row" id="printed">
            <h6 class="center" id="title-view"><b><?php echo $this->session->userdata('nama_masjid'); ?><br>Laporan Aktivitas <br>Per <?php echo month_generator($bulan) . " " . $this->session->userdata('tahun'); ?></b></h6>
            <table id='table-arus-kas-v' class="table-borderless">
                <thead>
                    <tr class="teal white-text">
                        <th colspan="2" style="width:60%">Keterangan</th>
                        <th colspan="2" style="width:40%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="4">Perubahan Aset Tidak Terikat</th>
                    </tr>
                    <tr>
                        <th colspan="4">Penerimaan Tidak Terikat</th>
                    </tr>
                    <?php
                    foreach ($menu_ptt as $mptt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mptt; ?></td>
                            <td><?php echo "Rp " . number_format($nominal_menu[$kd_menu[$mptt]][$mptt], 2, ',', '.');
                                    $j_ptt = $j_ptt + $nominal_menu[$kd_menu[$mptt]][$mptt];  ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_ptt[$mptt] as $subptt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subptt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subptt], 2, ',', '.'); ?></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th colspan="2">Jumlah Penerimaan Tidak Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($j_ptt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="4">Beban Tidak Terikat</th>
                    </tr>
                    <?php
                    foreach ($menu_btt as $mbtt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mbtt; ?></td>
                            <td><?php echo "-Rp " . number_format($nominal_menu[$kd_menu_b[$mbtt]][$mbtt], 2, ',', '.');
                                    $j_btt = $j_btt + $nominal_menu[$kd_menu_b[$mbtt]][$mbtt]; ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_btt[$mbtt] as $subbtt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subbtt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subbtt], 2, ',', '.'); ?></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th colspan="2">Jumlah Beban Tidak Terikat</th>
                        <th class="tr-border-top"><?php echo "(Rp " . number_format($j_btt, 2, ',', '.') . ')'; ?></th>
                    </tr>
                    <tr>
                        <th colspan="3">Kenaikan (Penurunan) Aset Neto Tidak Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_tt = $j_ptt - $j_btt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="4">Penerimaan Terikat</th>
                    </tr>
                    <?php
                    foreach ($menu_pt as $mpt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mpt; ?></td>
                            <td><?php echo "Rp " . number_format($nominal_menu[$kd_menu[$mpt]][$mpt], 2, ',', '.');
                                    $j_pt = $j_pt + $nominal_menu[$kd_menu[$mpt]][$mpt]; ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_pt[$mpt] as $subpt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subpt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subpt], 2, ',', '.'); ?></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th colspan="2">Jumlah Penerimaan Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($j_pt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="4">Beban Terikat</th>
                    </tr>
                    <?php
                    foreach ($menu_bt as $mbt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mbt; ?></td>
                            <td><?php echo "Rp " . number_format($nominal_menu[$kd_menu_b[$mbt]][$mbt], 2, ',', '.');
                                    $j_bt = $j_bt + $nominal_menu[$kd_menu_b[$mbt]][$mbt];  ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_bt[$mbt] as $subbt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subbt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subbt], 2, ',', '.'); ?></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th colspan="2">Jumlah Beban Terikat</th>
                        <th class="tr-border-top"><?php echo "(Rp " . number_format($j_bt, 2, ',', '.') . ')'; ?></th>
                    </tr>
                    <tr>
                        <th colspan="3">Kenaikan (Penurunan) Aset Neto Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_t = $j_pt - $j_bt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <td colspan="4"> </td>
                    </tr>
                    <tr>
                        <th colspan="3">KENAIKAN (PENURUNAN) ASET NETO</th>
                        <th><?php echo "Rp " . number_format($aset_neto_t + $aset_neto_tt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3">ASET NETO AWAL BULAN</th>
                        <th><?php echo "Rp " . number_format($aset_neto_ab + $aset_neto_awal, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3">ASET NETO AKHIR BULAN</th>
                        <th><?php echo "Rp " . number_format(($aset_neto_t + $aset_neto_tt + $aset_neto_awal) + $aset_neto_ab, 2, ',', '.'); ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- view -->

        <!-- print -->
        <!-- initiaton process -->
        <?php
        $j_ptt = 0;
        $j_btt = 0;
        $j_pt = 0;
        $j_bt = 0;
        $k_aset_neto_t = 0;
        $k_aset_neto_tt = 0;
        ?>
        <div class="row" style="display:none">
            <h6 class="center" id="title-laporan"><b><?php echo $this->session->userdata('nama_masjid'); ?><br>Laporan Aktivitas <br>Per <?php echo month_generator($bulan) . " " . $this->session->userdata('tahun'); ?></b></h6>
            <table id='table-excel' class="table-borderless">
                <thead>
                    <tr class="teal white-text">
                        <th style="width:30%">Keterangan</th>
                        <th style="width:30%"></th>
                        <th style="width:40%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Perubahan Aset Tidak Terikat</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Penerimaan Tidak Terikat</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($menu_ptt as $mptt) :
                        ?>
                        <tr>
                            <td><?php echo $mptt; ?></td>
                            <td></td>
                            <td><?php echo "Rp " . number_format($nominal_menu[$kd_menu[$mptt]][$mptt], 2, ',', '.');
                                    $j_ptt = $j_ptt + $nominal_menu[$kd_menu[$mptt]][$mptt];  ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_ptt[$mptt] as $subptt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subptt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subptt], 2, ',', '.'); ?></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th>Jumlah Penerimaan Tidak Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($j_ptt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>Beban Tidak Terikat</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($menu_btt as $mbtt) :
                        ?>
                        <tr>
                            <td><?php echo $mbtt; ?></td>
                            <td></td>
                            <td><?php echo "-Rp " . number_format($nominal_menu[$kd_menu_b[$mbtt]][$mbtt], 2, ',', '.');
                                    $j_btt = $j_btt + $nominal_menu[$kd_menu_b[$mbtt]][$mbtt]; ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_btt[$mbtt] as $subbtt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subbtt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subbtt], 2, ',', '.'); ?></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th>Jumlah Beban Tidak Terikat</th>
                        <th class="tr-border-top"><?php echo "(Rp " . number_format($j_btt, 2, ',', '.') . ')'; ?></th>
                    </tr>
                    <tr>
                        <th>Kenaikan (Penurunan) Aset Neto Tidak Terikat</th>
                        <th></th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_tt = $j_ptt - $j_btt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>Penerimaan Terikat</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($menu_pt as $mpt) :
                        ?>
                        <tr>
                            <td><?php echo $mpt; ?></td>
                            <td></td>
                            <td><?php echo "Rp " . number_format($nominal_menu[$kd_menu[$mpt]][$mpt], 2, ',', '.');
                                    $j_pt = $j_pt + $nominal_menu[$kd_menu[$mpt]][$mpt]; ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_pt[$mpt] as $subpt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subpt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subpt], 2, ',', '.'); ?></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th>Jumlah Penerimaan Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($j_pt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>Beban Terikat</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($menu_bt as $mbt) :
                        ?>
                        <tr>
                            <td><?php echo $mbt; ?></td>
                            <td></td>
                            <td><?php echo "Rp " . number_format($nominal_menu[$kd_menu_b[$mbt]][$mbt], 2, ',', '.');
                                    $j_bt = $j_bt + $nominal_menu[$kd_menu_b[$mbt]][$mbt];  ?></td>
                        </tr>
                        <?php
                            foreach ($submenu_bt[$mbt] as $subbt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subbt; ?></td>
                                <td><?php echo "Rp " . number_format($nominal_per_sub[$subbt], 2, ',', '.'); ?></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th>Jumlah Beban Terikat</th>
                        <th class="tr-border-top"><?php echo "(Rp " . number_format($j_bt, 2, ',', '.') . ')'; ?></th>
                    </tr>
                    <tr>
                        <th>Kenaikan (Penurunan) Aset Neto Terikat</th>
                        <th></th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_t = $j_pt - $j_bt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <td> </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>KENAIKAN (PENURUNAN) ASET NETO</th>
                        <th></th>
                        <th><?php echo "Rp " . number_format($aset_neto_t + $aset_neto_tt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>ASET NETO AWAL BULAN</th>
                        <th></th>
                        <th><?php echo "Rp " . number_format($aset_neto_ab + $aset_neto_awal, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th>ASET NETO AKHIR BULAN</th>
                        <th></th>
                        <th><?php echo "Rp " . number_format(($aset_neto_t + $aset_neto_tt + $aset_neto_awal) + $aset_neto_ab, 2, ',', '.'); ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- end print -->

    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>