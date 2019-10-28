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
                <h5><b>Jurnal Umum</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>

        <!-- view -->
        <div class="row" id="printed">
            <h6 class="center" id="title-view"><b>Masjid Al-Ishlah <br>Jurnal Umum <br>Per <?php echo (date('Y-m-d')); ?></b></h6>
            <table id='table-jurnal-umum-v' class="">
                <thead>
                    <tr class="teal white-text">
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
                                    <td><?php echo ($cdpt->tanggal)  ?></td>
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
        <!-- view -->

        <!-- print -->
        <!-- <div class="row" style="display: none">
            <h6 class="center" id="title-print"><b>Masjid Al-Ishlah <br>Jurnal Umum <br>Per <?php echo (date('Y-m-d')); ?></b></h6>
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
        </div> -->
        <!-- print -->

    </div>
    <!-- content -->
    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>