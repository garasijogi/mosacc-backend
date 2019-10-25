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

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-sewa.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Pendapatan Sewa</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="#rutin1"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin1" class="modal">
                            <div class="modal-content">
                                <h4>Pendapatan Sewa</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_tidak_terikat/infaq_peminjaman_peralatan'); ?>">Infaq Peminjaman Peralatan</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_tidak_terikat/infaq_pemakaian_ruangan'); ?>">Infaq Pemakaian Ruangan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-parkir.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Pendapatan Parkir</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin2"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin2" class="modal">
                            <div class="modal-content">
                                <h4>Pendapatan Parkir</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_tidak_terikat/pendapatan_parkir'); ?>">Pendapatan Parkir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-infaq-pengurusan-jenazah.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Infaq Pengurusan Jenazah</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin3"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin3" class="modal">
                            <div class="modal-content">
                                <h4>Infaq Pengurusan Jenazah</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_tidak_terikat/infaq_pengurusan_jenazah'); ?>">Infaq Pengurusan Jenazah</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-nonhalal.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Pendapatan Non-Halal</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin4"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin4" class="modal">
                            <div class="modal-content">
                                <h4>Pendapatan Non-Halal</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_tidak_terikat/pendapatan_non_halal'); ?>">Pendapatan Non-Halal</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan tidak rutin/ilustrasi-pendapatan-lainnya.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Pendapatan Lainnya</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin5"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin5" class="modal">
                            <div class="modal-content">
                                <h4>Pendapatan Lainnya</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_tidak_terikat/pendapatan_lainnya'); ?>">Pendapatan Lainnya</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php $this->load->view("acc/_partials/js"); ?>
</body>