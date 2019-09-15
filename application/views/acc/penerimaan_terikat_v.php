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
                        <img src="<?php echo site_url('assets/images/penerimaan Rutin/1.jpg'); ?>">
                        <span class="card-title">Peribadatan</span>
                        <a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="#rutin1"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin1" class="modal">
                            <div class="modal-content">
                                <h4>Peribadatan</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_kotak_jumat'); ?>">Infaq Kotak Jumat</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_phbi'); ?>">Infaq PHBI</a></li>
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
                        <img src="<?php echo site_url('assets/images/penerimaan Rutin/1.jpg'); ?>">
                        <span class="card-title">Pendidikan</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin2"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin2" class="modal">
                            <div class="modal-content">
                                <h4>Pendidikan</h4>
                                <ul>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_dari_donatur'); ?>">Infaq dari Donatur</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_phbi'); ?>">Infaq Kotak Dana Operasional</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_pengajian'); ?>">Zakat Fitrah</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_ramadhan'); ?>">Fidyah</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_ramadhan'); ?>">Infaq untuk Baksos</a></li>
                                    <li><a href="<?php echo base_url('acc/penerimaan_terikat/infaq_ramadhan'); ?>">Wakaf</a></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/penerimaan Rutin/1.jpg'); ?>">
                        <span class="card-title">Penyaluran Ziswaf</span>
                        <a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin3"><i class="material-icons">add</i></a>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information. I am convenient
                            because I require little markup to use effectively.</p>

                        <div id="rutin3" class="modal">
                            <div class="modal-content">
                                <h4>Penyaluran ZISWAF</h4>
                                <p>A bunch of text</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php $this->load->view("acc/_partials/js"); ?>
</body>