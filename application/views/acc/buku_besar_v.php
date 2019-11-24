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
                <h5><b>Buku Besar</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>

        <!-- view -->
        <div class="row center" id="printed">
            <h6 class="center" id="title-view"><b><?php
                                                    if (date('Y') == $this->session->userdata('tahun')) {
                                                        echo $this->session->userdata('nama_masjid'); ?> <br>Buku Besar <br>Per <?php echo (date_generator(date('Y-m-d')));
                                                                                                                                } else {
                                                                                                                                    echo $this->session->userdata('nama_masjid'); ?> <br>Buku Besar <br>Per 31 Desember <?php echo $this->session->userdata('tahun');
                                                                                                                                                                                                                        }

                                                                                                                                                                                                                        ?></b></h6>

            <!-- KAS -->
            <h6 class="font-bold"><?php echo "Kas dan Bank (112)"; ?></h6>
            <table id='table-jurnal-umum-v'>
                <tr class="teal white-text">
                    <th style="width:20%">Tanggal</th>
                    <th style="width:20%">Transaksi</th>
                    <th style="width:20%">Debit</th>
                    <th style="width:20%">Kredit</th>
                    <th style="width:20%">Jumlah</th>
                </tr>
                <?php
                $total_kas = 0;
                //Penerimaan Terikat (KAS)
                foreach ($pt as $pt_r) : ?>
                    <tr>
                        <td><?php echo ($pt_r->tanggal); ?></td>
                        <td><?php echo ($pt_r->keterangan); ?></td>
                        <td><?php echo "Rp " . number_format($pt_r->nominal, 2, ',', '.');
                                $total_kas = $total_kas + $pt_r->nominal; ?></td>
                        <td></td>
                        <td><?php echo "Rp " . number_format($total_kas, 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach;

                //Penerimaan Tidak Terikat (KAS)
                foreach ($ptt as $pt_r) : ?>
                    <tr>
                        <td><?php echo ($pt_r->tanggal); ?></td>
                        <td><?php echo ($pt_r->keterangan); ?></td>
                        <td><?php echo "Rp " . number_format($pt_r->nominal, 2, ',', '.');
                                $total_kas = $total_kas + $pt_r->nominal; ?></td>
                        <td></td>
                        <td><?php echo "Rp " . number_format($total_kas, 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach;

                //Pembelian (KAS)
                foreach ($p as $pt_r) : ?>
                    <tr>
                        <td><?php echo ($pt_r->tanggal); ?></td>
                        <td><?php echo ($pt_r->keterangan); ?></td>
                        <td><?php echo "Rp " . number_format($pt_r->total_harga, 2, ',', '.');
                                $total_kas = $total_kas - $pt_r->total_harga; ?></td>
                        <td></td>
                        <td><?php echo "Rp " . number_format($total_kas, 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach;

                //Beban (KAS)
                foreach ($b as $pt_r) : ?>
                    <tr>
                        <td><?php echo ($pt_r->tanggal); ?></td>
                        <td><?php echo ($pt_r->keterangan); ?></td>
                        <td></td>
                        <td><?php echo "Rp " . number_format($pt_r->nominal, 2, ',', '.');
                                $total_kas = $total_kas - $pt_r->nominal; ?></td>
                        <td><?php echo "Rp " . number_format($total_kas, 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach;
                ?>
                <tr>
                    <td></td>
                    <td colspan="3" class="center">Total</td>
                    <td><?php echo "Rp " . number_format($total_kas, 2, ',', '.'); ?></td>
                </tr>
            </table>
            <br>

            <!-- END KAS -->

            <!-- SALDO AWAL ASET NETO TIDAK TERIKAT -->
            <h6 class="font-bold"><?php echo "Saldo Awal Aset Neto Tidak Terikat (311)"; ?></h6>
            <table id='table-jurnal-umum-v'>
                <tr class="teal white-text">
                    <th style="width:20%">Tanggal</th>
                    <th style="width:20%">Transaksi</th>
                    <th style="width:20%">Debit</th>
                    <th style="width:20%">Kredit</th>
                    <th style="width:20%">Jumlah</th>
                </tr>
                <!-- ASET KAS BANK -->
                <?php
                $aset = 0;
                foreach ($aset_kas_bank->result() as $ak) :
                    if ($ak->nominal != 0) : ?>
                        <tr>
                            <td><?php echo $ak->tanggal; ?></td>
                            <td><?php echo '(Kas/Bank)' ?></td>
                            <td><?php echo $ak->nominal;
                                        $aset += $ak->nominal; ?></td>
                            <td></td>
                            <td><?php echo $aset; ?></td>
                        </tr>
                <?php
                    endif;
                endforeach; ?>
                <!-- END ASET KAS BANK -->

                <!-- ASET KENDARAAN -->
                <?php
                foreach ($aset_kendaraan->result() as $ak) :
                    if ($ak->harga != 0) : ?>
                        <tr>
                            <td><?php echo $ak->tanggal; ?></td>
                            <td><?php echo  '(Kendaraan) ' . $ak->jumlah . ' ' . $ak->nama . ' ' . $ak->merek . ' ' . $ak->tipe; ?></td>
                            <td><?php echo $ak->harga;
                                        $aset += $ak->harga; ?></td>
                            <td></td>
                            <td><?php echo $aset; ?></td>
                        </tr>
                <?php
                    endif;
                endforeach; ?>
                <!-- END ASET KENDARAAN -->

                <!-- ASET PERALATAN -->
                <?php
                foreach ($aset_peralatan->result() as $ak) :
                    if ($ak->harga != 0) : ?>
                        <tr>
                            <td><?php echo $ak->tanggal; ?></td>
                            <td><?php echo  '(Peralatan) ' . $ak->jumlah . ' ' . $ak->nama . ' ' . $ak->merek; ?></td>
                            <td><?php echo $ak->harga;
                                        $aset += $ak->harga; ?></td>
                            <td></td>
                            <td><?php echo $aset; ?></td>
                        </tr>
                <?php endif;
                endforeach; ?>
                <!-- END ASET PERALATAN -->

                <!-- ASET PERLENGKAPAN -->
                <?php
                foreach ($aset_perlengkapan->result() as $ak) :
                    if ($ak->harga != 0) : ?>
                        <tr>
                            <td><?php echo $ak->tanggal; ?></td>
                            <td><?php echo  '(Perlengkapan) ' . $ak->jumlah . ' ' . $ak->nama . ' ' . $ak->merek; ?></td>
                            <td><?php echo $ak->harga;
                                        $aset += $ak->harga; ?></td>
                            <td></td>
                            <td><?php echo $aset; ?></td>
                        </tr>
                <?php endif;
                endforeach; ?>
                <!-- END ASET PERLENGKAPAN -->

                <!-- ASET BANGUNAN DAN TANAH -->
                <?php
                foreach ($aset_bangunan_tanah->result() as $ak) :
                    if ($ak->nilai != 0) : ?>
                        <tr>
                            <td><?php echo $ak->tanggal; ?></td>
                            <td><?php echo  '(Bangunan dan Tanah) ' . $ak->jumlah . ' ' . $ak->nama . ' ' . $ak->merek; ?></td>
                            <td><?php echo $ak->nilai;
                                        $aset += $ak->nilai; ?></td>
                            <td></td>
                            <td><?php echo $aset; ?></td>
                        </tr>
                <?php endif;
                endforeach; ?>
                <!-- END ASET BANGUNAN DAN TANAH -->

            </table>
            <br>
            <!-- END SALDO AWAL ASET NETO TIDAK TERIKAT -->

            <!-- DEBIT -->
            <!-- Penerimaan Terikat -->
            <?php
            foreach ($kdd as $xkdd) {
                $isset = 0;
                $total_kd = 0;
                foreach ($rules->result() as $r) {
                    if ($xkdd == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                        $kd_bagan = $r->kd_bagan;
                    }
                }
                for ($j = 0; $j < count($contain_DPT); $j++) {
                    foreach ($contain_DPT[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdd) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6 class="font-bold"><?php echo $nama_sub . " (" . $kd_bagan . ")"; ?></h6>
                    <table>
                        <tr class="teal white-text">
                            <th style="width:20%">Tanggal</th>
                            <th style="width:20%">Transaksi</th>
                            <th style="width:20%">Debit</th>
                            <th style="width:20%">Kredit</th>
                            <th style="width:20%">Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_DPT); $i++) {
                                    foreach ($contain_DPT[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdd) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td></td>
                                        <td><?php echo "Rp " . number_format($cdpt->nominal, 2, ',', '.');
                                                                $total_kd = $total_kd + $cdpt->nominal; ?></td>
                                        <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
                        <tr>
                            <td></td>
                            <td colspan="3" class="center">Total</td>
                            <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                        </tr>
                    </table>
                    <br>
                    <br>

            <?php
                endif;
            }
            ?>

            <!-- Penerimaan Tidak Teriakt -->
            <?php
            foreach ($kdd as $xkdd) {
                $isset = 0;
                $total_kd = 0;
                foreach ($rules->result() as $r) {
                    if ($xkdd == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                        $kd_bagan = $r->kd_bagan;
                    }
                }
                for ($j = 0; $j < count($contain_DPTT); $j++) {
                    foreach ($contain_DPTT[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdd) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6 class="font-bold"><?php echo $nama_sub . " (" . $kd_bagan . ")"; ?></h6>
                    <table>
                        <tr class="teal white-text">
                            <th style="width:20%">Tanggal</th>
                            <th style="width:20%">Transaksi</th>
                            <th style="width:20%">Debit</th>
                            <th style="width:20%">Kredit</th>
                            <th style="width:20%">Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_DPTT); $i++) {
                                    foreach ($contain_DPTT[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdd) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td></td>
                                        <td><?php echo "Rp " . number_format($cdpt->nominal, 2, ',', '.');
                                                                $total_kd = $total_kd + $cdpt->nominal; ?></td>
                                        <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
                        <tr>
                            <td></td>
                            <td colspan="3" class="center">Total</td>
                            <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                        </tr>
                    </table>
                    <br>
                    <br>

            <?php
                endif;
            }
            ?>

            <!-- KREDIT -->
            <!-- Pembelian -->
            <?php
            foreach ($kdk as $xkdk) {
                $total_kd = 0;
                $isset = 0;
                foreach ($rules->result() as $r) {
                    if ($xkdk == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                        $kd_bagan = $r->kd_bagan;
                    }
                }
                for ($j = 0; $j < count($contain_KP); $j++) {
                    foreach ($contain_KP[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdk) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6 class="font-bold"><?php echo $nama_sub . " (" . $kd_bagan . ")"; ?></h6>
                    <table>
                        <tr class="teal white-text">
                            <th style="width:20%">Tanggal</th>
                            <th style="width:20%">Transaksi</th>
                            <th style="width:20%">Debit</th>
                            <th style="width:20%">Kredit</th>
                            <th style="width:20%">Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_KP); $i++) {
                                    foreach ($contain_KP[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdk) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td><?php echo "Rp " . number_format($cdpt->total_harga, 2, ',', '.');
                                                                $total_kd = $total_kd + $cdpt->total_harga; ?></td>
                                        <td></td>
                                        <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
                        <tr>
                            <td></td>
                            <td colspan="3" class="center">Total</td>
                            <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                        </tr>
                    </table>
                    <br>
                    <br>

            <?php
                endif;
            }
            ?>

            <!-- Renovasi dan Pembangunan -->
            <?php
            foreach ($kdk as $xkdk) {
                $total_kd = 0;
                $isset = 0;
                foreach ($rules->result() as $r) {
                    if ($xkdk == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                        $kd_bagan = $r->kd_bagan;
                    }
                }
                for ($j = 0; $j < count($contain_KR); $j++) {
                    foreach ($contain_KR[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdk) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6 class="font-bold"><?php echo $nama_sub . " (" . $kd_bagan . ")"; ?></h6>
                    <table>
                        <tr class="teal white-text">
                            <th style="width:20%">Tanggal</th>
                            <th style="width:20%">Transaksi</th>
                            <th style="width:20%">Debit</th>
                            <th style="width:20%">Kredit</th>
                            <th style="width:20%">Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_KR); $i++) {
                                    foreach ($contain_KR[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdk) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td><?php echo "Rp " . number_format($cdpt->nominal, 2, ',', '.');
                                                                $total_kd = $total_kd + $cdpt->nominal; ?></td>
                                        <td></td>
                                        <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
                        <tr>
                            <td></td>
                            <td colspan="3" class="center">Total</td>
                            <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                        </tr>
                    </table>
                    <br>
                    <br>

            <?php
                endif;
            }
            ?>

            <!-- Beban -->
            <?php
            foreach ($kdk as $xkdk) {
                $isset = 0;
                $total_kd = 0;
                foreach ($rules->result() as $r) {
                    if ($xkdk == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                        $kd_bagan = $r->kd_bagan;
                    }
                }
                for ($j = 0; $j < count($contain_KB); $j++) {
                    foreach ($contain_KB[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdk) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6 class='font-bold'><?php echo $nama_sub . " (" . $kd_bagan . ")"; ?></h6>
                    <table>
                        <tr class="teal white-text">
                            <th style="width:20%">Tanggal</th>
                            <th style="width:20%">Transaksi</th>
                            <th style="width:20%">Debit</th>
                            <th style="width:20%">Kredit</th>
                            <th style="width:20%">Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_KB); $i++) {
                                    foreach ($contain_KB[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdk) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td><?php echo "Rp " . number_format($cdpt->nominal, 2, ',', '.');
                                                                $total_kd = $total_kd + $cdpt->nominal; ?></td>
                                        <td></td>
                                        <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
                        <tr>
                            <td></td>
                            <td colspan="3" class="center">Total</td>
                            <td><?php echo "Rp " . number_format($total_kd, 2, ',', '.'); ?></td>
                        </tr>
                    </table>
                    <br>
                    <br>

            <?php
                endif;
            }
            ?>


        </div>
        <!-- view -->


    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>