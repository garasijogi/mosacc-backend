<!DOCTYPE html>
<html lang="en">

    <head>
		<!-- head -->
		<?php $this->load->view("acc/_partials/head");?>
		<!-- /head -->
	</head>

<body style="background-color: teal;">

    <!-- preloader -->
    <?php $this->load->view('_partials/preloader.php') ?>
    <!-- preloader -->
    
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
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/akun_baru'); ?>"><span><i class="material-icons">account_box</i></span>Daftar Akun
                            </a>
                        </li>
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
                                <!-- Wizard Aset Form Tab -->
                                <div class="col s12 marbot">
                                    <ul class="tabs">
                                        <li class="tab col s3"><a href="#aset-peralatan">Peralatan</a></li>
                                        <li class="tab col s3" style="width: 195px;"><a href="#aset-bangunan_tanah">Bangunan & Tanah</a></li>
                                        <li class="tab col s3"><a href="#aset-kas_bank">Kas</a></li>
                                    </ul>
                                </div>
                                <!-- /Wizard Aset Form Tab -->

                                <!-- Form Aset Peralatan -->
                                <div id="aset-peralatan" class="s12" style="overflow-y: auto;">
                                    <form class="s12" action="<?php echo base_url('wizard/asetPeralatan') ?>" method="post">
                                        <div class="row">
                                            <div class="col s4">
                                                <button type="submit" class="waves-effect waves-light btn btn-success">Tambah Aset
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                            <div class="col s1 offset-s6">
                                                <a href="#" id="peralatan-add_button" class="waves-effect waves-light btn green"><i class="material-icons">add</i></a>
                                            </div>
                                        </div>
                                        <div class="row center">
                                            <div class="multiform-template row z-depth-1" data-prefix="peralatan">
                                                <div class="col s11">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" id="nama" name="nama">
                                                            <label for="nama">Nama</label>
                                                        </div>
                                                        
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" id="merek" name="merek">
                                                            <label for="merek">Merek</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="tanggal" type="text" class="datepicker validate" name="tanggal">
                                                            <label for="tanggal">Tanggal</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="kategori" type="text" class="validate" name="kategori">
                                                            <label for="kategori">Kategori</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="jumlah" type="text" class="validate" name="jumlah">
                                                            <label for="jumlah">Jumlah</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input type="number" class="validate" id="harga" name="harga">
                                                            <label for="harga">Harga</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="centered remove-container input-field col s1">
                                                    <div class="remove-button btn btn-small waves-effect waves-light red">
                                                        X
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /Form Aset Peralatan -->

                                <!-- Form Aset Bangunan -->
                                <div id="aset-bangunan_tanah" class="s12" style="overflow-y: auto;">
                                    <form class="s12" action="<?php echo base_url('wizard/asetBangunanTanah'); ?>" method="post">
                                        <div class="row">
                                            <div class="col s4">
                                                <button type="submit" class="waves-effect waves-light btn btn-success">Tambah Aset
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                            <div class="col s1 offset-s6">
                                                <a href="#" id="bangunan_tanah-add_button" class="waves-effect waves-light btn green"><i
                                                        class="material-icons">add</i></a>
                                            </div>
                                        </div>
                                
                                        <div class="row center">
                                            <div class="multiform-template row z-depth-1" data-prefix="bangunan_tanah">
                                                <div class="col s11">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" id="nama" name="nama">
                                                            <label for="nama">Nama</label>
                                                        </div>
                                
                                                        <div class="input-field col s6">
                                                            <input type="text" class="datepicker validate" id="tanggal" name="tanggal">
                                                            <label for="tanggal">Tanggal</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input type="number" class="validate" id="luas" name="luas">
                                                            <label for="luas">Luas</label>
                                                        </div>

                                                        <div class="input-field col s6">
                                                            <input id="nilai" type="number" class="validate" name="nilai">
                                                            <label for="nilai">Nilai</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="centered remove-container input-field col s1">
                                                    <div class="remove-button btn btn-small waves-effect waves-light red">
                                                        X
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /Form Aset Bangunan -->

                                <!-- Form Aset Kas_Bank -->
                                <div id="aset-kas_bank" class="s12" style="overflow-y: auto;">
                                    <form class="s12" action="<?php echo base_url('wizard/asetKasBank'); ?>" method="post">
                                        <div class="row">
                                            <div class="col s4">
                                                <button type="submit" class="waves-effect waves-light btn btn-success">Tambah Aset
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                            <div class="col s1 offset-s6">
                                                <a href="#" id="kas_bank-add_button"
                                                class="waves-effect waves-light btn green"><i
                                                class="material-icons">add</i></a>
                                            </div>
                                        </div>
                                        
                                        <div class="row center">
                                            <div class="multiform-template row z-depth-1" data-prefix="kas_bank">
                                                <div class="col s11">
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" id="norek" name="norek">
                                                            <label for="norek">Nomor Rekening</label>
                                                        </div>
                                                        
                                                        <div class="input-field col s6">
                                                            <input type="text" class="validate" id="nama_bank" name="nama_bank">
                                                            <label for="nama_bank">Nama Bank</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="nama_pemilik" type="text" class="validate" name="nama_pemilik">
                                                            <label for="nama_pemilik">Nama Pemilik</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <input id="nominal" type="number" class="validate" name="nominal">
                                                            <label for="nominal">Nominal</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s6">
                                                            <input id="tanggal" type="text" class="validate datepicker" name="tanggal">
                                                            <label for="tanggal">Tanggal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="centered remove-container input-field col s1">
                                                    <div class="remove-button btn btn-small waves-effect waves-light red">
                                                        X
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /Form Aset Kas_Bank -->

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
                                        <th>NO.</th>
                                        <th>NAMA</th>
                                        <th>MEREK</th>
                                        <th>TANGGAL</th>
                                        <th>KATEGORI</th>
                                        <th>JUMLAH</th>
                                        <th>HARGA</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($peralatan as $k => $v): ?>
                                        <tr>
                                            <td><?php echo($k+1); ?></td>                                            
                                            <td><?php echo($v['nama']) ?></td>
                                            <td><?php echo($v['merek']) ?></td>
                                            <td><?php echo($v['tanggal']) ?></td>
                                            <td><?php echo($v['kategori']) ?></td>
                                            <td><?php echo($v['jumlah']) ?></td>
                                            <td><?php echo($v['harga']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
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
                                    <th>NO.</th>
                                    <th>NAMA</th>
                                    <th>TANGGAL</th>
                                    <th>LUAS</th>
                                    <th>NILAI</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($bangunan_tanah as $k => $v): ?>
                                    <tr>
                                        <td><?php echo($k+1); ?></td>                                        
                                        <td><?php echo($v['nama']) ?></td>
                                        <td><?php echo($v['tanggal']) ?></td>
                                        <td><?php echo($v['luas']) ?></td>
                                        <td><?php echo($v['nilai']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
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
                                    <th>NO.</th>
                                    <th>No. REKENING</th>
                                    <th>NAMA PEMILIK</th>
                                    <th>NAMA BANK</th>
                                    <th>NOMINAL</th>
                                    <th>TANGGAL</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($kas_bank as $k=> $v): ?>
                                    <tr>
                                        <td><?php echo($k+1); ?></td>
                                        <td><?php echo($v['norek']) ?></td>
                                        <td><?php echo($v['nama_pemilik']) ?></td>
                                        <td><?php echo($v['nama_bank']) ?></td>
                                        <td><?php echo($v['nominal']) ?></td>
                                        <td><?php echo($v['tanggal']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
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