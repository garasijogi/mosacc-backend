<!DOCTYPE html>
<html lang="en"" class=" overflow-hidden">

<head>
    <title>Mosacc (Mosque Accounting)</title>
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

    <div class="container">
        <div class="row">
            <div class="col s12 center teal-text">
                <h6>Pilih posisi anda :</h6>
            </div>
        </div>
        <div class="row center">
            <div class="col s12 offset-s2">
                <div class="col s3 m3">
                    <div class="card card1 teal darken-2 z-depth-4 card-homepage">
                        <a href="#login-akuntan" class="modal-trigger">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator white-text text-darken-4"> <b> Akuntan </b></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col s2"></div>
                <div class="col s3 offset-s2 m3">
                    <div class="card card2 teal darken-2 z-depth-4 card-homepage">
                        <a href="#login-manajer" class="modal-trigger">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img class="activator" src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator white-text text-darken-4"> <b> Manajer </b></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modals -->
    <?php $jenis_user = $this->input->get('jenis_user'); ?>
    <div id="login-akuntan" class="modal">
        <div class="modal-content center">
            <img src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>" alt="icon-akuntan" width="200px" height="200px">
            <h4>Akuntan</h4>
            <form action="<?php echo base_url('login/login_user?jenis_user=akuntan'); ?>" method="post" id="form-login-akuntan">
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
            <h4>Manajer</h4>
            <form action="<?php echo base_url('login/login_user?jenis_user=manajer'); ?>" method="post" id="form-login-manajer">
                <div class="input-field col s3">
                    <input id="password2" type="password" autofocus required>
                    <label for="password2">Masukkan Password</label>
                </div>
                <label>
                    <input type="checkbox" onclick="showPass()" />
                    <span>Show Password</span>
                </label>
                <?php
                $masuk = $this->input->get('masuk');
                if ($masuk != NULL && $jenis_user == 'manajer') :
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
        if ($masuk != NULL && $jenis_user == 'manajer') {
            ?>
            modalSalahPasswordManajer();
        <?php } ?>
    </script>
</body>

</html>
