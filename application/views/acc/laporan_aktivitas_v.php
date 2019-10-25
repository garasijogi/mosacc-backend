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
            <h6 class="center" id="title-view"><b>Masjid Al-Ishlah <br>Laporan Aktivitas <br>Per <?php echo month_generator($bulan); ?> 2019</b></h6>
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
                    foreach ($menu_ptt as $mpt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mpt; ?></td>
                            <td></td>
                        </tr>
                        <?php
                            foreach ($submenu_ptt[$mpt] as $subptt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subptt; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th colspan="2">Jumlah Penerimaan Tidak Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($total_menu, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="4">Beban Tidak Terikat</th>
                    </tr>
                    <?php
                    foreach ($menu_btt as $mbtt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mbtt; ?></td>
                            <td></td>
                        </tr>
                        <?php
                            foreach ($submenu_btt[$mbtt] as $subbtt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subbtt; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
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
                    <tr>
                        <th colspan="4">Penerimaan Terikat</th>
                    </tr>
                    <?php
                    foreach ($menu_pt as $mpt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mpt; ?></td>
                            <td></td>
                        </tr>
                        <?php
                            foreach ($submenu_pt[$mpt] as $subpt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subpt; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
                    ?>
                    <tr>
                        <th></th>
                        <th colspan="2">Jumlah Penerimaan Terikat</th>
                        <th class="tr-border-top"><?php echo "Rp " . number_format($total_menu, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="4">Beban Terikat</th>
                    </tr>
                    <?php
                    foreach ($menu_bt as $mbt) :
                        ?>
                        <tr>
                            <td colspan="3"><?php echo $mbt; ?></td>
                            <td></td>
                        </tr>
                        <?php
                            foreach ($submenu_bt[$mbt] as $subbt) :
                                ?>
                            <tr>
                                <td></td>
                                <td><?php echo $subbt; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                    <?php
                        endforeach;
                    endforeach;
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
                    <tr>
                        <td colspan="4">    </td>
                    </tr>
                    <tr>
                        <th colspan="3">KENAIKAN (PENURUNAN) ASET NETO</th>
                        <th><?php echo "Rp " . number_format($aset_neto_t + $aset_neto_tt, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3">ASET NETO AWAL BULAN</th>
                        <th><?php echo "Rp " . number_format($sa_aset_neto, 2, ',', '.'); ?></th>
                    </tr>
                    <tr>
                        <th colspan="3">ASET NETO AKHIR BULAN</th>
                        <th><?php echo "Rp " . number_format(($aset_neto_t + $aset_neto_tt) + $sa_aset_neto, 2, ',', '.'); ?></th>
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