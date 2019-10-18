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

    <!-- content -->
    <div class="container">
        <div class="sticky">
            <div class="row center">
                <h5><b>Jurnal Umum</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>

        <!-- view -->
        <div class="row center">
            <h6 class="center" id="title-view"><b>Masjid Al-Ishlah <br>Buku Besar <br>Per <?php echo date_generator(date('Y-m-d')); ?></b></h6> <br>

            <!-- DEBIT -->
            <!-- Penerimaan Terikat -->
            <?php
            foreach ($kdd as $xkdd) {
                $isset = 0;
                foreach ($rules->result() as $r) {
                    if ($xkdd == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                    }
                }
                for ($j = 0; $j < count($contain_DPT); $j++) {
                    foreach ($contain_DPT[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdd) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6><?php echo $nama_sub . " (" . $xkdd . ")"; ?></h6>
                    <table>
                        <tr>
                            <th style="width:25%">Tanggal</th>
                            <th style="width:30%">Transaksi</th>
                            <th style="width:10%">Debit</th>
                            <th style="width:10%">Kredit</th>
                            <th style="width:25%">Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_DPT); $i++) {
                                    foreach ($contain_DPT[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdd) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                        <td></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
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
                foreach ($rules->result() as $r) {
                    if ($xkdd == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                    }
                }
                for ($j = 0; $j < count($contain_DPT); $j++) {
                    foreach ($contain_DPT[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdd) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6 class="bold-font"><?php echo $nama_sub . " (" . $xkdd . ")"; ?></h6>
                    <table>
                        <tr>
                            <th>Tanggal</th>
                            <th>Transaksi</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_DPTT); $i++) {
                                    foreach ($contain_DPT[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdd) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                        <td></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
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
                $isset = 0;
                foreach ($rules->result() as $r) {
                    if ($xkdk == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                    }
                }
                for ($j = 0; $j < count($contain_KP); $j++) {
                    foreach ($contain_KP[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdk) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6><?php echo $nama_sub . " (" . $xkdk . ")"; ?></h6>
                    <table>
                        <tr>
                            <th>Tanggal</th>
                            <th>Transaksi</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_KP); $i++) {
                                    foreach ($contain_KP[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdk) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                        <td></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
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
                foreach ($rules->result() as $r) {
                    if ($xkdk == $r->kd_akun) {
                        $nama_sub = $r->nama_sub;
                    }
                }
                for ($j = 0; $j < count($contain_KB); $j++) {
                    foreach ($contain_KB[$j]->result() as $codpt) :
                        if ($codpt->kd_akun == $xkdk) : $isset = 1;
                        endif;
                    endforeach;
                }
                if ($isset != 0) : ?>
                    <h6><?php echo $nama_sub . " (" . $xkdk . ")"; ?></h6>
                    <table>
                        <tr>
                            <th>Tanggal</th>
                            <th>Transaksi</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Jumlah</th>
                        </tr>
                        <?php for ($i = 0; $i < count($contain_KB); $i++) {
                                    foreach ($contain_KB[$i]->result() as $cdpt) :
                                        if ($cdpt->kd_akun == $xkdk) : ?>
                                    <tr>
                                        <td><?php echo date_generator($cdpt->tanggal); ?></td>
                                        <td><?php echo $cdpt->keterangan; ?></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                        <td></td>
                                        <td><?php echo $cdpt->nominal; ?></td>
                                    </tr>
                        <?php endif;
                                    endforeach;
                                } ?>
                    </table>
                    <br>
                    <br>

            <?php
                endif;
            }
            ?>


        </div>
        <!-- view -->

        <!-- print -->
        <div class="row" style="display: none">
            <h6 class="center" id="title-print"><b>Masjid Al-Ishlah <br>Buku Besar <br>Per <?php echo date_generator(date('Y-m-d')); ?></b></h6>
            <table id='table-jurnal-umum' class="table-borderless centered">
                <thead>
                    <tr>
                        <th style="width:20%">Tanggal</th>
                        <th style="width:15%">Transaksi</th>
                        <th style="width:20%">Debit</th>
                        <th style="width:20%">Kredit</th>
                        <th style="width:25%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($h = 0; $h < 4; $h++) {
                        if ($h == 0) {
                            $contain = $contain_DPT;
                        } elseif ($h == 1) {
                            $contain = $contain_DPTT;
                        } elseif ($h == 2) {
                            $contain = $contain_KP;
                        } elseif ($h == 3) {
                            $contain = $contain_KB;
                        }
                        for ($i = 0; $i < count($contain_DPT); $i++) {
                            foreach ($contain[$i]->result() as $cdpt) :
                                ?>
                                <tr>
                                    <td><?php echo date_generator($cdpt->tanggal)  ?></td>
                                    <?php foreach ($rules->result() as $r) :
                                                    if ($r->kd_akun == $cdpt->kd_akun) :
                                                        ?>
                                            <td><?php echo $cdpt->keterangan; ?></td>
                                            <td><?php echo $r->debit . "<br><br>"; ?></td>
                                            <td><?php echo "<br><br>" . $r->kredit; ?></td>
                                            <?php if ($h == 2) { ?>
                                                <td><?php echo "-Rp " . number_format($cdpt->total_harga, 2, ',', '.');  ?></td>
                                            <?php } elseif ($h == 3) { ?>
                                                <td><?php echo "-Rp " . number_format($cdpt->nominal, 2, ',', '.'); ?></td>

                                            <?php } else { ?>
                                                <td><?php echo "Rp " . number_format($cdpt->nominal, 2, ',', '.'); ?></td>
                                            <?php } ?>
                                </tr>

                        <?php endif;
                                    endforeach; ?>
            <?php
                    endforeach;
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