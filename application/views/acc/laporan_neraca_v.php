<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("acc/_partials/head"); ?>
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
                <h5><b>Laporan Posisi Keuangan (Neraca)</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>
        <div class="row" id="printed">

            <h6 class="center"><b>Masjid Al-Ishlah <br> Neraca <br> Per <?php echo month_generator($bulan); ?> 2019</b></h6>
            <table>
                <tr>
                    <th colspan="2">Keterangan</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td colspan="3" class="font-bold">Aset</td>
                </tr>
                <tr>
                    <td colspan="3">Aset Lancar</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kas dan Bank</td>
                    <td><?php echo "Rp " . number_format($nominal_kas, 2, ',', '.');
                        $jumlah_aset = 0;
                        $jumlah_aset = $jumlah_aset + $nominal_kas; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Perlengkapan</td>
                    <td><?php echo "Rp " . number_format($total_perlengkapan, 2, ',', '.');
                        $jumlah_aset = $jumlah_aset + $total_perlengkapan;  ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kendaraan</td>
                    <td><?php echo "Rp " . number_format($total_kendaraan, 2, ',', '.');
                        $jumlah_aset = $jumlah_aset + $total_kendaraan;  ?></td>
                </tr>
                <tr>
                    <td colspan="3">Aset Tidak Lancar</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Peralatan</td>
                    <td><?php echo "Rp " . number_format($aset_peralatan, 2, ',', '.');
                        $jumlah_aset = $jumlah_aset + $aset_peralatan;  ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bangunan, Tanah, dan Lahan Parkir</td>
                    <td><?php echo "Rp " . number_format($aset_bangunan_tanah, 2, ',', '.');
                        $jumlah_aset = $jumlah_aset + $aset_bangunan_tanah; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Aset</td>
                    <td></td>
                    <td><?php echo "Rp " . number_format($jumlah_aset, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th colspan="3">Aset Neto</th>
                </tr>
                <tr>
                    <td colspan="3">Aset Neto Tidak Terikat</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Saldo Awal Aset Neto Tidak Terikat</td>
                    <td><?php echo "Rp " . number_format($aset_neto_tt_before, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kenaikan (Penurunan) Aset Neto Tidak Terikat</td>
                    <td><?php echo "Rp " . number_format($aset_neto_tt_now, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th></th>
                    <th>Saldo Akhir Aset Neto Tidak Terikat</th>
                    <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_tt_before + $aset_neto_tt_now, 2, ',', '.'); ?></th>
                </tr>
                <tr>
                    <td colspan="3">Aset Neto Terikat</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Saldo Awal Aset Neto Terikat</td>
                    <td><?php echo "Rp " . number_format($aset_neto_t_before, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kenaikan (Penurunan) Aset Neto Terikat</td>
                    <td><?php echo "Rp " . number_format($aset_neto_t_now, 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <th></th>
                    <th>Saldo Akhir Aset Neto Terikat</th>
                    <th class="tr-border-top"><?php echo "Rp " . number_format($aset_neto_t_before + $aset_neto_t_now, 2, ',', '.'); ?></th>
                </tr>
                <tr>
                    <th colspan="2">Jumlah Aset Neto</th>
                    <th class="tr-border-top"><?php echo "Rp " . number_format(($aset_neto_t_before +  $aset_neto_t_now) + ($aset_neto_tt_before + $aset_neto_tt_now), 2, ',', '.'); ?></th>
                </tr>
            </table>
        </div>
    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>