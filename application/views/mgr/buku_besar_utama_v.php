<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("mgr/_partials/head"); ?>
    <!-- /head -->
</head>

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

    <div class="content">

        <div class="row">
            <div class="col s12 m1"></div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-jurnal-umum.png'); ?>" width="400" height="250">
                        <span class="card-title card-title-text">Jurnal Umum</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('mgr/buku_besar_utama/jurnal_umum'); ?>"><i class="material-icons">launch</i></a>
                    </div>
                    <div class="card-content">
                        <p>Jurnal untuk melakukan pencatatan bagi segala jenis bukti transaksi keuangan yang muncul akibat terjadinya berbagai transaksi keuangan dalam suatu periode.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-buku-besar.png'); ?>" width="400" height="250">
                        <span class="card-title card-title-text">Buku Besar</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('mgr/buku_besar_utama/buku_besar'); ?>"><i class="material-icons">launch</i></a>
                    </div>
                    <div class="card-content">
                        <p>Buku utama pencatatan transaksi keuangan yang mengkonsolidasikan masukan dari semua jurnal akuntansi dan merupakan penggolongan rekening sejenis.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-neraca-saldo.png'); ?>" width="400" height="250">
                        <span class="card-title card-title-text">Neraca Saldo</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('mgr/buku_besar_utama/neraca_saldo'); ?>"><i class="material-icons">launch</i></a>
                    </div>
                    <div class="card-content">
                        <p>Pengelompokan saldo akhir di dalam buku besar atau daftar yang berisi kumpulan seluruh rekening/perkiraan buku besar untuk periode tertentu.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("mgr/_partials/js"); ?>
</body>