<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php error_reporting(0);
$table = 'table-neraca-saldo-v';
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
                <h5><b>Neraca Saldo</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>

        <!-- view -->
        <div class="row" id="printed">
            <h6 class="center" id="title-view"><b><?php echo $this->session->userdata('nama_masjid'); ?> <br>Neraca Saldo<br>Per <?php echo date_generator(date('Y-m-d')); ?></b></h6>
            <table id='table-neraca-saldo-v' class="table-borderless">
                <thead>
                    <tr class="teal white-text">
                        <th style="width:70%">Keterangan</th>
                        <th style="width:30%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_kredit = 0;
                    $total_debit = 0;
                    for ($h = 0; $h < 5; $h++) {
                        if ($h == 0) {
                            $nama_menu_simpan = $nama_menu_kp;
                            $nama_sub_simpan = $nama_sub_kp;
                            $nominal_sub_simpan = $nominal_sub_kp;
                        } elseif ($h == 1) {
                            $nama_menu_simpan = $nama_menu_kb;
                            $nama_sub_simpan = $nama_sub_kb;
                            $nominal_sub_simpan = $nominal_sub_kb;
                        } elseif ($h == 2) {
                            $nama_menu_simpan = $nama_menu_kr;
                            $nama_sub_simpan = $nama_sub_kr;
                            $nominal_sub_simpan = $nominal_sub_kr;
                        } elseif ($h == 3) {
                            $nama_menu_simpan = $nama_menu;
                            $nama_sub_simpan = $nama_sub;
                            $nominal_sub_simpan = $nominal_sub;
                        } elseif ($h == 4) {
                            $nama_menu_simpan = $nama_menu_dptt;
                            $nama_sub_simpan = $nama_sub_dptt;
                            $nominal_sub_simpan = $nominal_sub_dptt;
                        }
                        if ($h == 0) : ?>
                            <tr class="font-bold">
                                <td colspan="2">Debit</td>
                            </tr>
                        <?php endif;
                            if ($h == 0 && $nominal_kas > 0) : ?>
                            <tr>
                                <td>Kas</td>
                                <td><?php echo "Rp " . number_format($nominal_kas, 2, ',', '.');
                                            $total_debit = $total_debit + $nominal_kas; ?></td>
                            </tr>
                        <?php endif;
                            if ($h == 3) : ?>
                            <tr class="font-bold">
                                <td></td>
                                <td class="tr-border-top"> <?php echo "Rp " . number_format($total_debit, 2, ',', '.'); ?></td>
                            </tr>
                            <tr class="font-bold">
                                <td colspan="2">Kredit</td>
                            </tr>
                        <?php endif;

                            for ($x = 0; $x < count($nama_menu_simpan); $x++) {
                                ?>
                            <?php
                                    for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
                                        ?>
                                <tr>
                                    <td><?php echo $nama_sub_simpan[$x][$y]; ?></td>
                                    <td><?php echo "Rp " . number_format($nominal_sub_simpan[$x][$y], 2, ',', '.');
                                                    if ($h == 0 || $h == 1 || $h == 2) :
                                                        $total_debit = $total_debit + $nominal_sub_simpan[$x][$y];
                                                    endif;
                                                    if ($h == 3 || $h == 4) :
                                                        $total_kredit = $total_kredit + $nominal_sub_simpan[$x][$y];
                                                    endif;
                                                    ?></td>
                                <?php
                                        }
                                        ?>
                            <?php
                                }
                                if ($h == 4 && $nominal_kas < 0) : ?>
                                <tr>
                                    <td>Kas</td>
                                    <td><?php echo "Rp " . number_format(abs($nominal_kas), 2, ',', '.');
                                                $total_kredit = $total_kredit + abs($nominal_kas); ?></td>
                                </tr>
                            <?php endif;
                                if ($h == 4) : ?>
                                <tr class="font-bold">
                                    <td></td>
                                    <td class="tr-border-top"><?php echo "Rp " . number_format($total_kredit, 2, ',', '.'); ?></td>
                                </tr> <?php endif;
                                        } ?>
                </tbody>
            </table>
        </div>
        <!-- view -->

        <!-- print -->
        <div class="row" style="display:none">
            <h6 class="center" id="title-view"><b><?php echo $this->session->userdata('nama_masjid'); ?> <br>Neraca Saldo<br>Per <?php echo date_generator(date('Y-m-d')); ?></b></h6>
            <h6 id="title-laporan">Neraca Saldo Per <?php echo (date_generator(date('Y-m-d'))); ?> <?php echo $this->session->userdata('nama_masjid'); ?></h6>
            <table id='table-excel' class="table-borderless">
                <thead>
                    <tr class="teal white-text">
                        <th style="width:70%">Keterangan</th>
                        <th style="width:30%">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_kredit = 0;
                    $total_debit = 0;
                    for ($h = 0; $h < 5; $h++) {
                        if ($h == 0) {
                            $nama_menu_simpan = $nama_menu_kp;
                            $nama_sub_simpan = $nama_sub_kp;
                            $nominal_sub_simpan = $nominal_sub_kp;
                        } elseif ($h == 1) {
                            $nama_menu_simpan = $nama_menu_kb;
                            $nama_sub_simpan = $nama_sub_kb;
                            $nominal_sub_simpan = $nominal_sub_kb;
                        } elseif ($h == 2) {
                            $nama_menu_simpan = $nama_menu_kr;
                            $nama_sub_simpan = $nama_sub_kr;
                            $nominal_sub_simpan = $nominal_sub_kr;
                        } elseif ($h == 3) {
                            $nama_menu_simpan = $nama_menu;
                            $nama_sub_simpan = $nama_sub;
                            $nominal_sub_simpan = $nominal_sub;
                        } elseif ($h == 4) {
                            $nama_menu_simpan = $nama_menu_dptt;
                            $nama_sub_simpan = $nama_sub_dptt;
                            $nominal_sub_simpan = $nominal_sub_dptt;
                        }
                        if ($h == 0) : ?>
                            <tr class="font-bold">
                                <td>Debit</td>
                                <td></td>
                            </tr>
                        <?php endif;
                            if ($h == 0 && $nominal_kas > 0) : ?>
                            <tr>
                                <td>Kas</td>
                                <td><?php echo "Rp " . number_format($nominal_kas, 2, ',', '.');
                                            $total_debit = $total_debit + $nominal_kas; ?></td>
                            </tr>
                        <?php endif;
                            if ($h == 3) : ?>
                            <tr class="font-bold">
                                <td></td>
                                <td class="tr-border-top"> <?php echo "Rp " . number_format($total_debit, 2, ',', '.'); ?></td>
                            </tr>
                            <tr class="font-bold">
                                <td>Kredit</td>
                                <td></td>
                            </tr>
                        <?php endif;

                            for ($x = 0; $x < count($nama_menu_simpan); $x++) {
                                ?>
                            <?php
                                    for ($y = 0; $y < count($nama_sub_simpan[$x]); $y++) {
                                        ?>
                                <tr>
                                    <td><?php echo $nama_sub_simpan[$x][$y]; ?></td>
                                    <td><?php echo "Rp " . number_format($nominal_sub_simpan[$x][$y], 2, ',', '.');
                                                    if ($h == 0 || $h == 1 || $h == 2) :
                                                        $total_debit = $total_debit + $nominal_sub_simpan[$x][$y];
                                                    endif;
                                                    if ($h == 3 || $h == 4) :
                                                        $total_kredit = $total_kredit + $nominal_sub_simpan[$x][$y];
                                                    endif;
                                                    ?></td>
                                <?php
                                        }
                                        ?>
                            <?php
                                }
                                if ($h == 4 && $nominal_kas < 0) : ?>
                                <tr>
                                    <td>Kas</td>
                                    <td><?php echo "Rp " . number_format(abs($nominal_kas), 2, ',', '.');
                                                $total_kredit = $total_kredit + abs($nominal_kas); ?></td>
                                </tr>
                            <?php endif;
                                if ($h == 4) : ?>
                                <tr class="font-bold">
                                    <td></td>
                                    <td class="tr-border-top"><?php echo "Rp " . number_format($total_kredit, 2, ',', '.'); ?></td>
                                </tr> <?php endif;
                                        } ?>
                </tbody>
            </table>
        </div>
        <!-- end print -->

    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>