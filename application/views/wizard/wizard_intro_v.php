<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head"); ?>
    <!-- /head -->
</head>

<body style="background-color: teal;">
    <div class="wizard-wrapper">

        <div class="wrapper-sidenav">
            <div id="sidenav">

                <div class="collapsible-boody">
                    <ul class="collapsible">
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard'); ?>" class="wizard-menu-on"><span><i class="material-icons">assignment</i></span>Selamat
                                Datang</a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/profil'); ?>"><span><i class="material-icons">equalizer</i></span>Profil Masjid</a></a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/dkm'); ?>"><span><i class="material-icons">cached</i></span>Profil
                                DKM
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <a href="<?php echo base_url('wizard/aset'); ?>" class="wizard-menu-on"><span><i class="material-icons">class</i></span>Aset</a>
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

        <div class="navbar-fixed">
            <nav id="navigation" class="navbar-no-shadow">
                <div class="nav-wizard">
                    <a href="index.html" class="brand-logo">Mosque Accounting</a>
                </div>
            </nav>
        </div>

        <!-- preloader -->
        <?php $this->load->view('_partials/preloader.php') ?>
        <!-- preloader -->

        <div class="content-wizard">
            <div class="form-wizard">
                <h3>Selamat Datang</h3>
                <p class="wizard-introduce">MosAcc (Mosque Accounting) adalah aplikasi perangkat lunak yang dikembangkan
                    untuk membantu para pengurus
                    masjid dalam membuat laporan keuangan.</p>
                <p class="wizard-introduce">Silahkan lengkapi formulir pada halaman selanjutnya untuk mulai menggunakan
                    aplikasi.</p>
                <p>this is form content</p>
                
                <a class="btn waves-effect waves-light teal right" href="<?php echo base_url('wizard/profil'); ?>" >Selanjutnya<i class="material-icons right">send</i>
                </a>        
            </div>
        </div>
    </div>

    <!-- Javascript -->
    <?php $this->load->view("acc/_partials/js"); ?>
    <!-- /Javascript -->

</body>

</html>