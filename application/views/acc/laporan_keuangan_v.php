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
                        <span class="card-title card-title-text">Posisi Keuangan (Neraca)</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/laporan_keuangan/laporan_neraca'); ?>"><i class="material-icons">menu_open</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin1" class="modal">
                            <div class="modal-content">
                                <h4>Posisi Keuangan (Neraca)</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-parkir.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Perubahan Dana</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/laporan_keuangan/laporan_perubahan_dana'); ?>"><i class="material-icons">menu_open</i></a>
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
                        <span class="card-title card-title-text">Aset Kelolaan</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/laporan_keuangan/laporan_aset_kelolaan'); ?>"><i class="material-icons">menu_open</i></a>
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
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-nonhalal.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Arus Kas</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="<?php echo base_url('acc/laporan_keuangan/laporan_arus_kas'); ?>"><i class="material-icons">menu_open</i></a>
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