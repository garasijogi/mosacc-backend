<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("mgr/_partials/head"); ?>
    <!-- /head -->
</head>

<body>

    <!-- sidebar -->
    <div class="container-fluid">
        <?php $this->load->view("mgr/_partials/sidebar"); ?>
    </div>
    <!-- /sidebar -->

    <!-- navbar -->
    <div>
        <?php $this->load->view("mgr/_partials/navbar"); ?>
    </div>
    <!-- /navbar -->

    <!-- preloader -->
    <?php $this->load->view('mgr/_partials/preloader.php') ?>
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
                        <a href="<?php echo base_url('mgr/profil'); ?>" class="menu-trigger profil-nav-active" id="profil-masjid">
                            <li>Profil Masjid</li>
                        </a>
                        <a href="<?php echo base_url('mgr/profil/dkm'); ?>" class="menu-trigger" id="struktur-dkm">
                            <li>Struktur DKM</li>
                        </a>
                        <a href="<?php echo base_url('mgr/profil/akun'); ?>" class="menu-trigger" id="daftar-akun">
                            <li>Daftar Akun</li>
                        </a>
                        <a href="<?php echo base_url('mgr/profil/aset'); ?>" class="menu-trigger" id="aset-masjid">
                            <li>Aset Masjid</li>
                        </a>
                    </ul>
                </div>
                <div class="profil-content">
                    <form name="form_edit_profil_masjid" id="form_edit_profil_masjid" action="<?php echo base_url('mgr/profil/proses_edit_profil_masjid'); ?>" method="post" enctype="multipart/form-data">
                        <div class="profil-contents-wrapper">
                            <div class="row">
                                <div class="col s12 head-content">
                                    <h5>Profil Masjid</h5>
                                    <h6>Informasi Dasar Masjid</h6>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="namamasjid">
                                        <div class="input-field col s12 edit-profil">
                                            <input name="nama" id="rename-nama-masjid" type="text" class="validate" value="<?php echo $profil[0]['nama']; ?>">
                                            <label for="rename-nama-masjid">Nama Masjid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="alamat-masjid">
                                        <div class="input-field col s12 edit-profil">
                                            <input name="alamat" id="rename-alamat-masjid" type="text" class="validate" value="<?php echo $profil[0]['alamat']; ?>">
                                            <label for="rename-alamat-masjid">Alamat Masjid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="tahun-berdiri">
                                        <div class="input-field col s12 edit-profil">
                                            <input name="tahun" id="rename-tahun-berdiri" type="text" class="validate" value="<?php echo $profil[0]['tahun']; ?>">
                                            <label for="rename-tahun-berdiri">Tahun Berdiri</label>
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
                                        <div class="input-field col s12 edit-profil"> <input name="telepon" id="rename-telepon-sekretariat" type="text" class="validate" value="<?php echo $profil[0]['telepon']; ?>"><label for="rename-telepon-sekretariat">No. Telepon Sekretariat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="rekening-masjid">
                                        <div class="input-field col s12 edit-profil"> <input name="rekening" id="rename-rekening-masjid" type="text" class="validate" value="<?php echo $profil[0]['rekening']; ?>"><label for="rename-rekening-masjid">Rekening Masjid</label>
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
                                        <div class="input-field col s12 edit-profil"> <input name="luas_tanah" id="rename-luas-tanah" type="text" class="validate" value="<?php echo $profil[0]['luas_tanah']; ?>"><label for="rename-luas-tanah">Luas Tanah</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="ad-art">
                                        <div class="file-field input-field">
                                            <div class="btn btn-small">
                                                <span>ad/art</span>
                                                <input name="ad_art" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Tambahkan File" value="<?php echo $files['ad_art'][0]['nama']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row" id="badan-hukum">
                                        <div class="file-field input-field">
                                            <div class="btn btn-small">
                                                <span>Badan Hukum</span>
                                                <input name="badan_hukum" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Tambahkan File" value="<?php echo $files['badan_hukum'][0]['nama']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn waves-effect waves-light teal" type="submit" name="action">SImpan
                            </button>
                            <a href="<?php echo base_url('mgr/profil') ?>" class="btn red">Batal</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>



    <!-- Javascript -->
    <?php $this->load->view("mgr/_partials/js"); ?>
    <!-- /Javascript -->

    <!-- <script>
        // $('.masjid').on('mouseover', function () {
            //     var value = $('.profil-properti .icon-edit').attr('data-icon');
            //     console.log(value);
            // });
            $('#namamasjid').hover(() => {
                $('.icon-namamasjid').toggle().click(() => {
                    $('#namamasjid').html(
                    '<div class="input-field col s12 edit-profil"> <input id="rename-nama-masjid" type="text" class="validate" autofocus value="Masjid Jami Al-Islah"><label for="rename-nama-masjid">Nama Masjid</label><div><a id="btn-nama-masjid" class="waves-effect waves-light btn" click>Simpan</a></div></div>'
                    );
                });
            })
            
            tombol = () => {
                console.log('hwaaa')
            }
            
            $('#alamat-masjid').hover(() => {
                $('.icon-alamat-masjid').toggle().click(() => {
                    $('#alamat-masjid').html(
                    '<div class="input-field col s12 edit-profil"><input id="rename-alamat-masjid" type="text" class="validate" autofocus value="Jl. Otonom RT/RW 04/01 ds. Talaga Sari"><label for="rename-alamat-masjid">Alamat Masjid</label><div><a id="btn-alamat-masjid" class="waves-effect waves-light btn">Simpan</a></div></div>'
                    );
                });
            })
            
            $('#tahun-berdiri').hover(() => {
                $('.icon-tahun-berdiri').toggle();
            })
            
            $('#telepon-sekretariat').hover(() => {
                $('.icon-telepon-sekretariat').toggle();
            })
            
            $('#nama-masjid').hover(() => {
                $('.icon-nama-masjid').toggle();
            })
            
            $('#rekening-masjid').hover(() => {
                $('.icon-rekening-masjid').toggle();
            })
            
            $('#luas-tanah').hover(() => {
                $('.icon-luas-tanah').toggle();
            })
            
            $('#badan-hukum').hover(() => {
                $('.icon-badan-hukum').toggle();
            })
            
            $('#ad-art').hover(() => {
                $('.icon-ad-art').toggle();
            })
            
            // $('.profil-properti').mouseleave(() => {
                //     $('.profil-icon').hide();
                // })
            </script> -->
</body>

</html>