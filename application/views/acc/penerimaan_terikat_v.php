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
                        <img src="<?php echo site_url('assets/images/penerimaan Rutin/ilustrasi-peribadatan.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Peribadatan</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="#rutin1"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>Digunakan untuk mencatat penerimaan terikat yang berasal dari kegiatan peribadatan.</p>

                        <div id="rutin1" class="modal">
                            <div class="modal-content">
                                <h4>Peribadatan</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_kotak_jumat'); ?>">Infaq Kotak Jumat</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_PHBI'); ?>">Infaq PHBI</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_pengajian'); ?>">Infaq Pengajian</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_ramadhan'); ?>">Infaq Ramadhan</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan Rutin/ilustrasi-pendidikan.jpg'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Pendidikan</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin2"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>Digunakan untuk mencatat penerimaan terikat yang berasal dari kegiatan pendidikan.</p>

                        <div id="rutin2" class="modal">
                            <div class="modal-content">
                                <h4>Pendidikan</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_tpa_dan_tahfidz'); ?>">Infaq TPA dan Tahfidz</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan Rutin/ilustrasi-zakat.png'); ?>" width="400" height="270">
                        <span class="card-title card-title-text">Penyaluran Ziswaf</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin3"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>Digunakan untuk mencatat penerimaan terikat yang berasal dari Zakat, Infaq, Shodaqoh dan Wakaf.</p>

                        <div id="rutin3" class="modal">
                            <div class="modal-content">
                                <h4>Penyaluran ZISWAF</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_dari_donatur'); ?>">Infaq dari Donatur</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_kotak_dana_operasional'); ?>">Infaq Kotak Dana Operasional</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_kotak_dana_sosial'); ?>">Infaq Kotak Dana Sosial</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/zakat_fitrah'); ?>">Zakat Fitrah</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/fidyah'); ?>">Fidyah</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_untuk_baksos'); ?>">Infaq untuk Baksos</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/waqaf'); ?>">Wakaf</a></li>
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