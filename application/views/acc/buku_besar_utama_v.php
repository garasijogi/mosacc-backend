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

    <div class="content">

        <div class="row">

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-sewa.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Jurnal Umum</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/buku_besar_utama/jurnal_umum'); ?>"><i class="material-icons">menu_open</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-parkir.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Buku Besar</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/buku_besar_utama/buku_besar'); ?>"><i class="material-icons">menu_open</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-infaq-pengurusan-jenazah.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Neraca Saldo</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/buku_besar_utama/neraca_saldo'); ?>"><i class="material-icons">menu_open</i></a>
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