<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head"); ?>
    <!-- /head -->
</head>

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

    <div class="content">

        <div class="row">
            <div class="col s12 m1"></div>
            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-jurnal-umum.png'); ?>" width="400" height="250">
                        <span class="card-title card-title-text">Jurnal Umum</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/buku_besar_utama/jurnal_umum'); ?>"><i class="material-icons">launch</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-buku-besar.jpg'); ?>" width="400" height="250">
                        <span class="card-title card-title-text">Buku Besar</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/buku_besar_utama/buku_besar'); ?>"><i class="material-icons">launch</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-neraca-saldo.jpg'); ?>" width="400" height="250">
                        <span class="card-title card-title-text">Neraca Saldo</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/buku_besar_utama/neraca_saldo'); ?>"><i class="material-icons">launch</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("acc/_partials/js"); ?>
</body>