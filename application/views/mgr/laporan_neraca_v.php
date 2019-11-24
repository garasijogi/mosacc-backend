<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("mgr/_partials/head"); ?>
<!-- /head -->

<body>

    <div class="container-fluid">
        <?php $this->load->view("mgr/_partials/sidebar"); ?>
    </div>

    <div>
        <!-- navbar&&sidebar -->

        <?php $this->load->view("mgr/_partials/navbar"); ?>
        <!-- /navbar&&sidebar -->
    </div>

    <!-- preloader -->
    <?php $this->load->view('mgr/_partials/preloader.php') ?>
    <!-- preloader -->

    <!-- breadcrumb -->
    <div class="content">
        <div class="col s12 breadcrumb-wrapper valign-wrapper">
            <a href="<?php echo base_url('mgr/laporan_keuangan/'); ?>" class="breadcrumb">Laporan Keuangan</a>
            <a href="<?php echo base_url('mgr/laporan_keuangan/laporan_neraca'); ?>" class="breadcrumb">Laporan Posisi Keuangan</a>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- content -->
    <div class="container">
        <div class="sticky">
            <div class="row center">
                <h5><b>Laporan Posisi Keuangan (Neraca)</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('mgr/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>

        <!-- view -->
        <div class="row" id="printed">
            <h6 class="center"><b><?php echo $this->session->userdata('nama_masjid'); ?><br> Neraca <br> Per <?php echo month_generator($bulan);
                                                                                                                echo " " . ($this->session->userdata('tahun')); ?> </b></h6>
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
                    <td><?php echo "Rp " . number_format($nominal_kas + $aset_kas_bank, 2, ',', '.');
                        $jumlah_aset = 0;
                        $jumlah_aset = $jumlah_aset + $nominal_kas + $aset_kas_bank; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Perlengkapan</td>
                    <td><?php echo "Rp " . number_format($total_perlengkapan + $aset_perlengkapan, 2, ',', '.');
                        $jumlah_aset = $jumlah_aset + $total_perlengkapan + $aset_perlengkapan;  ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Kendaraan</td>
                    <td><?php echo "Rp " . number_format($total_kendaraan + $aset_kendaraan, 2, ',', '.');
                        $jumlah_aset = $jumlah_aset + $total_kendaraan + $aset_kendaraan;  ?></td>
                </tr>
                <tr>
                    <td colspan="3">Aset Tidak Lancar</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Peralatan</td>
                    <td><?php echo "Rp " . number_format($aset_peralatan + $total_peralatan, 2, ',', '.');
                        $jumlah_aset = $jumlah_aset + $aset_peralatan + $total_peralatan;  ?></td>
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
                    <td><?php
                        $aset_neto_tt_before += $aset_kas_bank + $aset_perlengkapan + $aset_peralatan + $aset_kendaraan + $aset_peralatan + $aset_bangunan_tanah;
                        echo "Rp " . number_format($aset_neto_tt_before, 2, ',', '.'); ?></td>
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
        <!-- end view -->

        <!-- print -->
        <div class="row" style="display:none">
            <h6 class="center" id="title-view"><b><?php echo $this->session->userdata('nama_masjid'); ?><br> Neraca <br> Per <?php echo month_generator($bulan); ?> 2019</b></h6>
            <h6 class="center"><b><?php echo $this->session->userdata('nama_masjid'); ?><br> Neraca <br> Per <?php echo month_generator($bulan);
                                                                                                                echo " " . ($this->session->userdata('tahun')); ?> </b></h6>
            <table id='table-excel'>
                <thead>
                    <tr>
                        <th>Keterangan</th>
                        <th></th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-bold">Aset</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Aset Lancar</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kas dan Bank</td>
                        <td><?php echo "Rp " . number_format($nominal_kas + $aset_kas_bank, 2, ',', '.');
                            $jumlah_aset = 0;
                            $jumlah_aset = $jumlah_aset + $nominal_kas + $aset_kas_bank; ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Perlengkapan</td>
                        <td><?php echo "Rp " . number_format($total_perlengkapan + $aset_perlengkapan, 2, ',', '.');
                            $jumlah_aset = $jumlah_aset + $total_perlengkapan + $aset_perlengkapan;  ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kendaraan</td>
                        <td><?php echo "Rp " . number_format($total_kendaraan + $aset_kendaraan, 2, ',', '.');
                            $jumlah_aset = $jumlah_aset + $total_kendaraan + $aset_kendaraan;  ?></td>
                    </tr>
                    <tr>
                        <td>Aset Tidak Lancar</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Peralatan</td>
                        <td><?php echo "Rp " . number_format($aset_peralatan + $total_peralatan, 2, ',', '.');
                            $jumlah_aset = $jumlah_aset + $aset_peralatan + $total_peralatan;  ?></td>
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
                        <td class="font-bold">Aset Neto</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Aset Neto Tidak Terikat</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Saldo Awal Aset Neto Tidak Terikat</td>
                        <td><?php
                            $aset_neto_tt_before += $aset_kas_bank + $aset_perlengkapan + $aset_peralatan + $aset_kendaraan + $aset_peralatan + $aset_bangunan_tanah;
                            echo "Rp " . number_format($aset_neto_tt_before, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Kenaikan (Penurunan) Aset Neto Tidak Terikat</td>
                        <td><?php echo "Rp " . number_format($aset_neto_tt_now, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="font-bold">Saldo Akhir Aset Neto Tidak Terikat</td>
                        <td class="tr-border-top font-bold"><?php echo "Rp " . number_format($aset_neto_tt_before + $aset_neto_tt_now, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td>Aset Neto Terikat</td>
                        <td></td>
                        <td></td>
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
                        <td></td>
                        <td class="font-bold">Saldo Akhir Aset Neto Terikat</td>
                        <td class="tr-border-top font-bold"><?php echo "Rp " . number_format($aset_neto_t_before + $aset_neto_t_now, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td class="font-bold">Jumlah Aset Neto</td>
                        <td></td>
                        <td class="tr-border-top font-bold"><?php echo "Rp " . number_format(($aset_neto_t_before +  $aset_neto_t_now) + ($aset_neto_tt_before + $aset_neto_tt_now), 2, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- end print -->
    </div>
    <!-- content -->

    <?php $this->load->view("mgr/_partials/js"); ?>
</body>

</html>