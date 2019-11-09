<!DOCTYPE html>
<html lang="en"" class=" overflow-hidden">

<head>
    <title>MosAcc (Mosque Accounting)</title>
    <?php $this->load->view('_partials/head.php') ?>
</head>

<body style="background: url('assets/images/mosque-vector.png') no-repeat center center fixed;margin:auto;background-size:cover;">

    <div>
        <!-- navbar&&sidebar -->
        <?php $this->load->view("_partials/navbar.php"); ?>
        <!-- /navbar&&sidebar -->
    </div>
    <!-- preloader -->
    <?php $this->load->view('_partials/preloader.php') ?>
    <!-- preloader -->


    <div class="row">
        <div class="col s3 offset-s9 teal-text left-align">
            <h6>Pilih posisi anda :</h6>
        </div>

    </div>
    <div class="row">

        <!-- BENDAHARA CARD -->
        <!-- <div class="col s12 offset-s2">
                <div class="col s3 m3">
                    <div class="card card1 teal darken-2 z-depth-4 card-homepage">
                        <a href="#login-akuntan" class="modal-trigger">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="<?php //echo base_url('assets/images/icon/accountant-icon.png'); 
                                                            ?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator white-text text-darken-4"> <b> Bendahara </b></span>
                            </div>
                        </a>
                    </div>
                </div> -->
        <a href="#login-akuntan" class="modal-trigger">
            <div class="col s3 offset-s9">
                <div class="card card1 horizontal teal white-text">
                    <div class="card-image valign-wrapper card-edit" style="margin:auto">
                        <img src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content left-align card-home  valign-wrapper">
                            <h4>Bendahara</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <!-- END BENDAHARA CARD -->

    </div>

    <!-- KETUA DKM CARD -->
    <!-- <div class="col s2"></div>
            <div class="col s3 offset-s2 m3">
                <div class="card card2 teal darken-2 z-depth-4 card-homepage">
                    <a href="#login-manajer" class="modal-trigger">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator white-text text-darken-4"> <b> Ketua DKM </b></span>
                        </div>
                    </a>
                </div>
            </div> -->

    <div class="row">
        <a href="#login-manajer" class="modal-trigger">
            <div class="col s3 offset-s9">
                <div class="card card1 horizontal teal white-text">
                    <div class="card-image valign-wrapper card-edit" style="margin:auto">
                        <img src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content left-align card-home  valign-wrapper">
                            <h4>Ketua DKM</h4>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- END KETUA DKM CARD -->

    </div>

    <!-- modals -->
    <?php $jenis_user = $this->input->get('jenis_user'); ?>
    <div id="login-akuntan" class="modal">
        <div class="modal-content center">
            <img src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>" alt="icon-akuntan" width="200px" height="200px">
            <h4>Bendahara</h4>
            <form action="<?php echo base_url('login/login_user?jenis_user=akuntan'); ?>" method="post" id="form-login-akuntan" class="left-align">
                <div class="input-field col s3">
                    <input id="password" type="password" name="password" required autofocus>
                    <label for="password">Masukkan Password</label>
                </div>
                <label>
                    <input type="checkbox" onclick="showPass()" />
                    <span>Show Password</span>
                </label>
                <?php
                $masuk = $this->input->get('masuk');
                if ($masuk != NULL && $jenis_user == 'akuntan') :
                    ?>
                    <h6 class="red-text">Invalid password. Please try again.</h6>
                <?php
                endif;
                ?>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#" id="login-akuntan-btn" class="modal-close waves-effect waves-green btn-flat">LOGIN</a>
        </div>
    </div>

    <div id="login-manajer" class="modal">
        <div class="modal-content center">
            <img src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>" alt="icon-manajer" width="200px" height="200px">
            <h4>Ketua DKM</h4>
            <form action="<?php echo base_url('login/login_user?jenis_user=manager'); ?>" method="post" id="form-login-manajer" class="left-align">
                <div class="input-field col s3">
                    <input id="password2" type="password" name='password' autofocus required>
                    <label for="password2">Masukkan Password</label>
                </div>
                <label>
                    <input type="checkbox" onclick="showPass()" />
                    <span>Show Password</span>
                </label>
                <?php
                $masuk = $this->input->get('masuk');
                if ($masuk != NULL && $jenis_user == 'manager') :
                    ?>
                    <h6 class="red-text">Invalid password. Please try again.</h6>
                <?php
                endif;
                ?>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" id="login-manajer-btn" class="modal-close waves-effect waves-green btn-flat">LOGIN</a>
        </div>
    </div>
    <!-- end modals -->

    <!-- js -->
    <?php $this->load->view('_partials/js.php') ?>
    <script>
        <?php
        if ($masuk != NULL && $jenis_user == 'akuntan') {
            ?>
            modalSalahPasswordAkuntan();
        <?php }
        if ($masuk != NULL && $jenis_user == 'manager') {
            ?>
            modalSalahPasswordManajer();
        <?php } ?>
    </script>
</body>

<!-- footer -->
<footer class="page-footer">
    <div class="container center">
        <div class="row">
            <div class="col s12 valign-wrapper sponsored-icon">
                <img src="<?php echo base_url('assets/images/icon/uin-icon3.png'); ?>" alt="icon-uin" width="140px" height="80px">
                <img src="<?php echo base_url('assets/images/icon/scope_logo.png'); ?>" alt="icon-scope" width="140px" height="50px">
            </div>
        </div>
    </div>
    <div class="footer-copyright center">
        <div class="container">
            <h6>UIN Syarif Hidayatullah Jakarta © Copyright 2019. All rights reserved.</h6>
        </div>
    </div>
</footer>
<!-- end footer -->

</html>