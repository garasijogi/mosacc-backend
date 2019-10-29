<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head"); ?>
    <!-- /head -->
</head>

<body>

    <!-- sidebar -->
    <div class="container-fluid">
        <?php $this->load->view("acc/_partials/sidebar"); ?>
    </div>
    <!-- /sidebar -->

    <!-- navbar -->
    <div>
        <?php $this->load->view("acc/_partials/navbar"); ?>
    </div>
    <!-- /navbar -->

    <!-- preloader -->
    <?php $this->load->view('acc/_partials/preloader.php') ?>
    <!-- preloader -->

    <div class="content">
        <div class="container">

            <div class="profil-wrapper">
                <header class="profil-header valign-wrapper">
                    <img src="<?php echo base_url('assets/images/background.jpg'); ?>" alt="profil image">
                    <h4><?php echo $profil[0]['nama']; ?></h4>
                </header>
                <div class="profil-nav">
                    <ul>
                        <a href="<?php echo base_url('acc/profil'); ?>" class="menu-trigger" id="profil-masjid">
                            <li>Profil Masjid</li>
                        </a>
                        <a href="<?php echo base_url('acc/profil/dkm'); ?>" class="menu-trigger" id="struktur-dkm">
                            <li>Struktur DKM</li>
                        </a>
                        <a href="<?php echo base_url('acc/profil/akun'); ?>" class="menu-trigger" id="daftar-akun">
                            <li>Daftar Akun</li>
                        </a>
                        <a href="<?php echo base_url('acc/profil/aset'); ?>" class="menu-trigger  profil-nav-active" id="aset-masjid">
                            <li>Aset Masjid</li>
                        </a>
                    </ul>
                </div>
                <div class="profil-content">
                    <div class="profil-contents-wrapper">
                        <div class="row">
                            <div class="col s12 head-content">
                                <h5>Daftar Aset</h5>
                                <h6>Akun-akun Masjid seperti Peralatan, Tanah, dan Bangunan</h6>
                            </div>
                            <div class="col s12">
                                <div class="row header">
                                    <h5>ASET PERALATAN</h5>
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
                                        <?php 
                                        $no = 1;
                                        foreach ($aset_peralatan->result() as $ar) : ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo  $ar->nama; ?></td>
                                                <td><?php echo $ar->merek_luas ?></td>
                                                <td><?php echo $ar->harga ?></td>
                                            </tr>
                                        <?php
                                    $no++;
                                    endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="profil-contents-wrapper">
                        <div class="row">
                            <div class="col s12">
                                <div class="row header">
                                    <h5>ASET BANGUNAN DAN TANAH</h5>
                                    <h6>Aset bangunan dan tanah yang dimiliki masjid</h6>
                                </div>
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
                                    <?php
                                    $no = 1;
                                    foreach ($aset_bt->result() as $ar) : ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo  $ar->nama; ?></td>
                                                <td><?php echo $ar->merek_luas ?></td>
                                                <td><?php echo $ar->harga ?></td>
                                            </tr>
                                        <?php
                                    $no++;
                                    endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row header">
                        <h5>Tambah Aset</h5>
                    </div> -->

                    <!-- <div class="edit-aset-wrapper">
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
                    </div> -->

                </div>
            </div>
        </div>
    </div>


    </div>

    </div>



    <!-- Javascript -->
    <?php $this->load->view("acc/_partials/js"); ?>
    <!-- /Javascript -->
</body>

</html>