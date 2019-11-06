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
            <h6 class="center" id="title-view"><b>Masjid Al-Ishlah <br>Buku Besar <br>Per <?php echo date_generator(date('Y-m-d')); ?></b></h6> <br>

            <!-- KAS -->
            <h6 class="font-bold"><?php echo "Kas dan Bank (112)"; ?></h6>
            <table>
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
                        <td><?php echo date_generator($pt_r->tanggal); ?></td>
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
                        <td><?php echo date_generator($pt_r->tanggal); ?></td>
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
                        <td><?php echo date_generator($pt_r->tanggal); ?></td>
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
                        <td><?php echo date_generator($pt_r->tanggal); ?></td>
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