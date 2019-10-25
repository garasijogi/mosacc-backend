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
                            <a href="<?php echo base_url('wizard/profil'); ?>"><span><i
                                        class="material-icons">equalizer</i></span>Profil Masjid</a></a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/dkm'); ?>"><span><i class="material-icons">cached</i></span>Profil
                                DKM
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/aset'); ?>" class="wizard-menu-on"><span><i
                                        class="material-icons">class</i></span>Aset</a>
                        </li>
                        <!-- <li class="sidenav-item">
                            <a href="wizard-akun.html"><span><i class="material-icons">class</i></span>Daftar
                                Akun
                            </a>
                        </li> -->
                    </ul>
                </div>


            </div>
        </div>

        <div class="content-wizard">

            <div class="form-wizard">

                <div class="profil-content">
                    <div class="profil-contents-wrapper">
                        <div class="row">
                            <div class="col s12 head-content">
                                <h5>Struktur DKM</h5>
                                <h6>Informasi Dewan Kepengurusan Masjid</h6>
                            </div>
                            <div class="col s12">
                                <div class="row header">
                                    <h5>KETUA DKM</h5>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-nama-ketua"
                                            type="text" class="validate wizard-form-check" required><label
                                            for="rename-nama-ketua">Nama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-ttl-ketua"
                                            type="text" class="datepicker wizard-form-check"><label
                                            for="rename-ttl-ketua">Tempat, Tanggal Lahir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-alamat-ketua"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-alamat-ketua">Alamat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-no-ketua"
                                            type="number" class="validate wizard-form-check"><label
                                            for="rename-no-ketua">No. HP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-pendidikan-ketua"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-pendidikan-ketua">Pendidikan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profil-contents-wrapper">
                        <div class="row">
                            <div class="col s12">
                                <div class="row header">
                                    <h5>SEKRETARIS DKM</h5>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-nama-sekretaris"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-nama-sekretaris">Nama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-ttl-sekretaris"
                                            type="text" class="datepicker wizard-form-check"><label
                                            for="rename-ttl-sekretaris">Tempat, Tanggal Lahir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-alamat-sekretaris"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-alamat-sekretaris">Alamat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-no-sekretaris"
                                            type="number" class="validate wizard-form-check"><label
                                            for="rename-no-sekretaris">No.
                                            HP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input
                                            id="rename-pendidikan-sekretaris" type="text"
                                            class="validate wizard-form-check"><label
                                            for="rename-pendidikan-sekretaris">Pendidikan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="profil-contents-wrapper">
                        <div class="row">
                            <div class="col s12">
                                <div class="row header">
                                    <h5>BENDAHARA DKM</h5>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-nama-bendahara"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-nama-bendahara">Nama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-ttl-bendahara"
                                            type="text" class="datepicker wizard-form-check"><label
                                            for="rename-ttl-bendahara">Tempat, Tanggal Lahir</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-alamat-bendahara"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-alamat-bendahara">Alamat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input id="rename-no-bendahara"
                                            type="number" class="validate wizard-form-check"><label
                                            for="rename-no-bendahara">No.
                                            HP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s12 edit-profil"> <input
                                            id="rename-pendidikan-bendahara" type="text"
                                            class="validate wizard-form-check"><label
                                            for="rename-pendidikan-bendahara">Pendidikan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-form-wrapper">
                        <a href="#wizard-struktur-dkm-simpan" onclick="wizardFormChecker()"
                            class="waves-effect btn-wizard-checker waves-light btn btn-edit-profil wizard-struktur-dkm-simpan btn-success">Simpan</a>
                    </div>

                    <div id="wizard-struktur-dkm-simpan" class="modal">
                        <div class="modal-content">
                            <h4>Apa anda yakin?</h4>
                            <p>Masih ada kolom yang belum diisi.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="modal-close waves-effect waves-green btn-flat">Kembali</a>
                            <a href="wizard-aset.html" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
                        </div>
                    </div>

                </div>

            </div>

            <div class="form-addition">
                <span class="wizard-section-name">Struktur DKM</span>
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