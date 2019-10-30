<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- head -->
		<?php $this->load->view("acc/_partials/head");?>
		<!-- /head -->
	</head>

<body>
    <div class="wizard-wrapper">

        <div class="wrapper-sidenav">
            <div id="sidenav">
                <div class="collapsible-boody">
                    <ul class="collapsible">
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard'); ?>"><span><i class="material-icons">assignment</i></span>Selamat
                                Datang</a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/profil'); ?>" class="wizard-menu-on"><span><i
                                        class="material-icons">equalizer</i></span>Profil Masjid</a></a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/dkm'); ?>"><span><i class="material-icons">cached</i></span>Profil
                                DKM
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/aset'); ?>" ><span><i
                                        class="material-icons">class</i></span>Aset</a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/akun_baru'); ?>"><span><i class="material-icons">account_box</i></span>Daftar
                                Akun
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>

        <!-- preloader -->
        <?php $this->load->view('_partials/preloader.php') ?>
        <!-- preloader -->

        <div class="content-wizard">

            <div class="form-wizard">
                <form id="wizard-form-profil" action="<?php echo base_url('wizard/profilProses'); ?>" method="post" enctype="multipart/form-data">
                    <div class="profil-content">
                        <div class="profil-contents-wrapper">
                            <div class="row">
                                <div class="col s12 head-content">
                                    <h5>Profil Masjid</h5>
                                    <h6>Informasi Dasar Masjid</h6>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="namamasjid">
                                        <div class="input-field col s12 edit-profil">
                                            <input name="nama" id="rename-nama-masjid" type="text" class="validate wizard-form-check" value="<?php echo $nama; ?>" required>
                                            <label for="rename-nama-masjid">Nama Masjid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="alamat-masjid">
                                        <div class="input-field col s12 edit-profil"> <input name="alamat" id="rename-alamat-masjid" value="<?php echo $alamat; ?>"
                                                type="text" class="wizard-form-check validate"><label
                                                for="rename-alamat-masjid">Alamat Masjid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="tahun-berdiri">
                                        <div class="input-field col s12 edit-profil"> <input name="tahun" id="rename-tahun-berdiri" value="<?php echo $tahun; ?>"
                                                type="number" class="validate wizard-form-check"><label
                                                for="rename-tahun-berdiri">Tahun Berdiri</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="profil-contents-wrapper">
                            <div class="row">
                                <div class="col s12 head-content">
                                    <h5>Kontak dan Rekening</h5>
                                    <h6>Kontak Untuk Menghubungi Sekretariat Masjid</h6>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="telepon-sekretariat">
                                        <div class="input-field col s12 edit-profil">
                                            <input name="telepon" id="rename-telepon-sekretariat" type="number" value="<?php echo $telepon; ?>"
                                                class="wizard-form-check validate" required><label
                                                for="rename-telepon-sekretariat">No. Telepon Sekretariat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="rekening-masjid">
                                        <div class="input-field col s12 edit-profil"> <input name="rekening" id="rename-rekening-masjid" value="<?php echo $rekening; ?>"
                                                type="number" class="validate wizard-form-check"><label
                                                for="rename-rekening-masjid">Rekening
                                                Masjid</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="profil-contents-wrapper">
                            <div class="row">
                                <div class="col s12 head-content">
                                    <h5>Dokumen</h5>
                                    <h6>Legalitas Masjid Dalam Bentuk Digital</h6>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="luas-tanah">
                                        <div class="input-field col s12 edit-profil"> <input name="luas_tanah" id="rename-luas-tanah" value="<?php echo $luas_tanah; ?>"
                                                type="text" class="validate wizard-form-check"><label
                                                for="rename-luas-tanah">Luas
                                                Tanah</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="ad-art">
                                        <div class="file-field input-field">
                                            <div class="btn btn-small">
                                                <span>ad/art</span>
                                                <input name="ad_art" accept=".pdf,.doc,.docx,.ppt,.pptx,.xps,.odt,.xls,.xlsx,.wps" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate wizard-form-check" type="text" value="<?php echo $ad_art; ?>"
                                                    placeholder="Tambahkan File">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="badan-hukum">
                                        <div class="file-field input-field">
                                            <div class="btn btn-small">
                                                <span>Badan Hukum</span>
                                                <input name="badan_hukum" accept=".pdf,.doc,.docx,.ppt,.pptx,.xps,.odt,.xls,.xlsx,.wps" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate wizard-form-check" type="text" value="<?php echo $badan_hukum; ?>"
                                                    placeholder="Tambahkan File">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-form-wrapper">
                                <a href="#wizard-profil-masjid-simpan"
                                    class="waves-effect waves-light wizard-profil-masjid-simpan btn btn-edit-profil btn-success btn-wizard-checker"
                                    onclick="wizardFormChecker()">Simpan</a>
                            </div>

                            <div id="wizard-profil-masjid-simpan" class="modal">
                                <div class="modal-content">
                                    <h4>Apa anda yakin?</h4>
                                    <p>Masih ada kolom yang belum diisi.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="modal-close waves-effect waves-green btn-flat">Kembali</a>
                                    <a href="<?php echo base_url('wizard/dkm'); ?>"
                                    class="modal-close waves-effect waves-green btn-flat">Yakin</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="form-addition">
                <span class="wizard-section-name">Profil Masjid</span>
                <h5 class="logo-sideways">MOSQUE<br>ACCOUNTING</h5>
                <div class="some-rectangle"></div>

            </div>
            
        </div>
    </div>

    <!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
    <!-- /Javascript -->

</body>

</html>