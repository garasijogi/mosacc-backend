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
                        <a href="<?php echo base_url('acc/profil/dkm'); ?>" class="menu-trigger profil-nav-active" id="struktur-dkm">
                            <li>Struktur DKM</li>
                        </a>
                        <a href="<?php echo base_url('acc/profil/akun'); ?>" class="menu-trigger" id="daftar-akun">
                            <li>Daftar Akun</li>
                        </a>
                        <a href="<?php echo base_url('acc/profil/aset'); ?>" class="menu-trigger" id="aset-masjid">
                            <li>Aset Masjid</li>
                        </a>
                    </ul>
                </div>
                <div class="profil-content">
                    <form name="form_edit_struktur_dkm" id="form_edit_struktur_dkm" action="<?php echo base_url('acc/profil/proses_edit_struktur_dkm'); ?>" method="post" enctype="multipart/form-data">
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
                                        <?php foreach ($ketua->result() as $k) : ?>
                                        <div class="input-field col s12 edit-profil">
                                            <input type="text" name="id_ketua" value="<?php echo $k->id_pengurus; ?>" hidden>
                                            <input name="nama_ketua" id="rename-nama-ketua" type="text" class="validate" value="<?php echo $k->nama; ?>">
                                            <label for="rename-nama-ketua">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="alamat_ketua" id="rename-alamat-ketua" type="text" class="validate" value="<?php echo $k->alamat; ?>"><label for="rename-alamat-ketua">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="telepon_ketua" id="rename-no-ketua" type="number" class="validate" value="<?php echo $k->telepon; ?>"><label for="rename-no-ketua">No. HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="pendidikan_ketua" id="rename-pendidikan-ketua" type="text" class="validate" value="<?php echo $k->pendidikan; ?>"><label for="rename-pendidikan-ketua">Pendidikan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="profil-contents-wrapper">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row header">
                                        <h5>SEKRETARIS DKM</h5>
                                    </div>
                                </div>
                                <?php foreach ($sekretaris->result() as $s) : ?>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil">
                                            <input type="text" name="id_sekretaris" value="<?php echo $s->id_pengurus; ?>" hidden>
                                            <input name="nama_sekretaris" id="rename-nama-sekretaris" type="text" class="validate" value="<?php echo $s->nama; ?>"><label for="rename-nama-sekretaris">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="alamat_sekretaris" id="rename-alamat-sekretaris" type="text" class="validate" value="<?php echo $s->alamat; ?>"><label for="rename-alamat-sekretaris">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="telepon_sekretaris" id="rename-no-sekretaris" type="number" class="validate" value="<?php echo $s->telepon; ?>"><label for="rename-no-sekretaris">No. HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="pendidikan_sekretaris" id="rename-pendidikan-sekretaris" type="text" class="validate" value="<?php echo $s->pendidikan; ?>"><label for="rename-pendidikan-sekretaris">Pendidikan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="profil-contents-wrapper">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row header">
                                        <h5>BENDAHARA DKM</h5>
                                    </div>
                                </div>
                                <?php foreach ($bendahara->result() as $b) : ?>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil">
                                            <input type="text" name="id_bendahara" value="<?php echo $b->id_pengurus; ?>" hidden>
                                            <input name="nama_bendahara" id="rename-nama-bendahara" type="text" class="validate" value="<?php echo $b->nama; ?>"><label for="rename-nama-bendahara">Nama</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="alamat_bendahara" id="rename-alamat-bendahara" type="text" class="validate" value="<?php echo $b->alamat; ?>"><label for="rename-alamat-bendahara">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="telepon_bendahara" id="rename-no-bendahara" type="number" class="validate" value="<?php echo $b->telepon; ?>"><label for="rename-no-bendahara">No. HP</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 edit-profil"> <input name="pendidikan_bendahara" id="rename-pendidikan-bendahara" type="text" class="validate" value="<?php echo $b->pendidikan; ?>"><label for="rename-pendidikan-bendahara">Pendidikan</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="profil-contents-wrapper">
                            <div class="row">
                                <div class="col s12 ">
                                    <div class="row header">
                                        <h5>Dokumen DKM</h5>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="file-field input-field">
                                            <div class="btn btn-small">
                                                <span>Struktur DKM</span>
                                                <input name="struktur_dkm" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" placeholder="Tambahkan File"
                                                    value="<?php echo $files['struktur_dkm'][0]['nama']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="row">
                            <button class="btn waves-effect waves-light teal" type="submit" name="action">SImpan
                            </button>
                            <a href="<?php echo base_url('acc/profil/dkm') ?>" class="btn red">Batal</a>
                        </div>
                    </form>
                    
                </div>
            </div>
            
        </div>
        
    </div>
    
    
    
    <!-- Javascript -->
    <?php $this->load->view("acc/_partials/js"); ?>
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