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
                            <a href="<?php echo base_url('wizard/dkm'); ?>" class="wizard-menu-on"><span><i class="material-icons">cached</i></span>Profil
                                DKM
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/aset'); ?>" ><span><i
                                        class="material-icons">class</i></span>Aset</a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/akun_baru'); ?>"><span><i class="material-icons">account_box</i></span>Daftar Akun
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

                <div class="profil-content">
                    <form id="wizard-form-dkm" action="<?php echo base_url('wizard/dkmProses'); ?>" method="post" >
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
                                        <div class="input-field col s12 edit-profil"> <input id="rename-nama-ketua" name="nama-ketua" value="<?php echo($ketua['nama']) ?>"
                                            type="text" class="validate wizard-form-check" required><label
                                            for="rename-nama-ketua">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-alamat-ketua" name="alamat-ketua" value="<?php echo($ketua['alamat']) ?>"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-alamat-ketua">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-no-ketua" name="telepon-ketua" value="<?php echo($ketua['telepon']) ?>"
                                            type="number" class="validate wizard-form-check"><label
                                            for="rename-no-ketua">No. HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-pendidikan-ketua" name="pendidikan-ketua" value="<?php echo($ketua['pendidikan']) ?>"
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
                                        <div class="input-field col s12 edit-profil"> <input id="rename-nama-sekretaris" name="nama-sekre" value="<?php echo($sekre['nama']) ?>"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-nama-sekretaris">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-alamat-sekretaris" name="alamat-sekre" value="<?php echo($sekre['alamat']) ?>"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-alamat-sekretaris">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-no-sekretaris" name="telepon-sekre" value="<?php echo($sekre['telepon']) ?>"
                                            type="number" class="validate wizard-form-check"><label
                                            for="rename-no-sekretaris">No. HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-pendidikan-sekretaris" type="text" name="pendidikan-sekre" value="<?php echo($sekre['pendidikan']) ?>"
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
                                        <div class="input-field col s12 edit-profil"> <input id="rename-nama-bendahara" name="nama-bendum" value="<?php echo($bendum['nama']) ?>"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-nama-bendahara">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-alamat-bendahara" name="alamat-bendum" value="<?php echo($bendum['alamat']) ?>"
                                            type="text" class="validate wizard-form-check"><label
                                            for="rename-alamat-bendahara">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-no-bendahara" name="telepon-bendum" value="<?php echo($bendum['telepon']) ?>"
                                            type="number" class="validate wizard-form-check"><label
                                            for="rename-no-bendahara">No. HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input id="rename-pendidikan-bendahara" type="text" name="pendidikan-bendum" value="<?php echo($bendum['pendidikan']) ?>"
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
                                <a href="<?php echo base_url('wizard/aset'); ?>" class="modal-close waves-effect waves-green btn-flat">Yakin</a>
                            </div>
                        </div>
                    </form>
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