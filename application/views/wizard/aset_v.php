<!DOCTYPE html>
<html lang="en">

    <head>
		<!-- head -->
		<?php $this->load->view("acc/_partials/head");?>
		<!-- /head -->
	</head>

<body style="background-color: teal;">
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
                        <div class="row header">
                            <h5>Tambah Aset</h5>
                        </div>

                        <div class="edit-aset-wrapper">
                            <div class="row">
                                <div class="col s12 marbot">
                                    <ul class="tabs">
                                        <li class="tab col s3"><a href="#aset-peralatan">Peralatan</a></li>
                                        <li class="tab col s3"><a href="#aset-bangunan">Bangunan</a></li>
                                        <li class="tab col s3"><a href="#aset-tanah">Tanah</a></li>
                                    </ul>
                                </div>
                                <div id="aset-peralatan" class="s12">
                                    <form class="s12">
                                        <div class="row">
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" id="rename-nama-peralatan">
                                                <label for="rename-nama-peralatan">Masukkan Nama Peralatan</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input id="rename-jumlah-peralatan" type="number" class="validate">
                                                <label for="rename-jumlah-peralatan">Masukkan Jumlah</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input id="rename-nilai-peralatan" type="number" class="validate">
                                                <label for="rename-nilai-peralatan">Masukkan Nilai Peralatan</label>
                                            </div>
                                        </div>
                                        <div class="col s5">
                                            <a class="waves-effect waves-light btn">Tambah Aset
                                                <i class="material-icons right">send</i>
                                            </a>
                                        </div>
                                    </form>
                                </div>

                                <div id="aset-bangunan" class="s12">
                                    <form class=" s12">
                                        <div class="row">
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" id="rename-nama-bangunan">
                                                <label for="rename-nama-bangunan">Masukkan Nama Bangunan</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input id="rename-luas-bangunan" type="number" class="validate">
                                                <label for="rename-luas-bangunan">Masukkan Luas</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input id="rename-nilai-bangunan" type="number" class="validate">
                                                <label for="rename-nilai-bangunan">Masukkan Nilai Bangunan</label>
                                            </div>
                                        </div>
                                        <div class="col s5">
                                            <a class="waves-effect waves-light btn">Tambah Aset
                                                <i class="material-icons right">send</i>
                                            </a>
                                        </div>
                                    </form>
                                </div>

                                <div id="aset-tanah" class="s12">
                                    <form class=" s12">
                                        <div class="row">
                                            <div class="input-field col s4">
                                                <input type="text" class="validate" id="rename-nama-tanah">
                                                <label for="rename-nama-tanah">Masukkan Nama</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input id="rename-luas-tanah" type="number" class="validate">
                                                <label for="rename-luas-tanah">Masukkan Luas</label>
                                            </div>

                                            <div class="input-field col s4">
                                                <input id="rename-nilai-tanah" type="number" class="validate">
                                                <label for="rename-nilai-tanah">Masukkan Nilai Bangunan</label>
                                            </div>
                                        </div>
                                        <div class="col s5">
                                            <a class="waves-effect waves-light btn">Tambah Aset
                                                <i class="material-icons right">send</i>
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-wizard">
                <div class="profil-content">
                    <div class="profil-contents-wrapper">
                        <div class="col s12">
                            <div class="row header">
                                <h5>DAFTAR ASET PERALATAN</h5>
                                <h6>Aset yang diperlukan untuk mendukung kegiatan operasional</h6>
                            </div>
                        </div>
                        <div class="col s12">
                            <table id="tabel-akun" class="display centered striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NOMOR</th>
                                        <th>NAMA PERALATAN</th>
                                        <th>JUMLAH</th>
                                        <th>NILAI PERALATAN</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>...</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="profil-contents-wrapper">
                    <div class="col s12">
                        <div class="row header">
                            <h5>DAFTAR ASET BANGUNAN</h5>
                            <h6>Aset bangunan yang dimiliki masjid</h6>
                        </div>
                    </div>
                    <div class="col s12">
                        <table id="tabel-akun" class="display centered striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NOMOR</th>
                                    <th>NAMA BANGUNAN</th>
                                    <th>LUAS</th>
                                    <th>NILAI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>...</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="profil-contents-wrapper">
                    <div class="col s12">
                        <div class="row header">
                            <h5>DAFTAR ASET PERALATAN</h5>
                            <h6>Aset yang diperlukan untuk mendukung kegiatan operasional</h6>
                        </div>
                    </div>
                    <div class="col s12">
                        <table id="tabel-akun" class="display centered striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>NOMOR</th>
                                    <th>NAMA</th>
                                    <th>LUAS</th>
                                    <th>NILAI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>...</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a href="#wizard-modal-aset"
                        class="waves-effect waves-light modal-trigger btn btn-edit-profil btn-success">Selesai</a>

                    <div id="wizard-modal-aset" class="modal">
                        <div class="modal-content">
                            <h4>Terima Kasih</h4>
                            <p>Silahkan buat akun untuk dapat menggunakan aplikasi.</p>
                        </div>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('wizard/akun_baru'); ?>"
                                class="modal-close waves-effect waves-green btn-flat">Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-addition">
                <span class="wizard-section-name">Daftar Aset</span>
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