<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head"); ?>
    <!-- /head -->
</head>

<body style="overflow:hidden">

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
                        <a href="<?php echo base_url('acc/profil/akun'); ?>" class="menu-trigger profil-nav-active" id="daftar-akun">
                            <li>Daftar Akun</li>
                        </a>
                        <a href="<?php echo base_url('acc/profil/aset'); ?>" class="menu-trigger" id="aset-masjid">
                            <li>Aset Masjid</li>
                        </a>
                    </ul>
                </div>
                <div class="profil-content">
                    <div class="profil-contents-wrapper">
                        <div class="row">
                            <div class="col s12 head-content">
                                <h5>Daftar Akun</h5>
                                <h6>Akun-akun Akuntansi yang Digunakan pada Masjid</h6>
                            </div>
                            <div class="col s12" style="overflow:auto;height:30rem;">
                                <table id="tabel-akun" class="display centered striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>KODE AKUN</th>
                                            <th>NAMA AKUN</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($rules->result() as $r) :
                                            if ($r->kd_bagan != NULL) : ?>
                                                <tr>
                                                    <td><?php echo $r->kd_bagan; ?></td>
                                                    <td><?php echo $r->nama_sub; ?></td>
                                                </tr>
                                        <?php endif;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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