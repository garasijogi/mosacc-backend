<!DOCTYPE html>
<html lang="en" class="teal darken-3">

<head>
    <title>Mosacc - Login User</title>
    <?php $this->load->view('_partials/head.php') ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col s12 white-text center">
                <h4>Login <?php echo ucfirst($jenis_user); ?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div id="rcorners1" class="col s6 offset-s3 white z-depth-4" style="padding:35px;">
                    <form action="<?php echo base_url('login/login_user?jenis_user=' . $jenis_user); ?>" method="POST" class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="jenis_user" value="<?php echo $jenis_user; ?>" hidden>
                                <input id="username" type="number" class="validate" name="username" required>
                                <label for="username">NIP (Nomor Induk Pegawai)</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label>
                                    <input type="checkbox" onclick="showPass()" />
                                    <span>Show Password</span>
                                </label>
                            </div>
                        </div>
                        <?php
                        $masuk = $this->input->get('masuk');
                        ?>
                        <h6 class="<?php if ($masuk != NULL) {
                                        echo "red-text";
                                    } else {
                                        echo "white-text";
                                    } ?>">Invalid username or password. Please try again.</h6> <br>

                        <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect teal'>Login</button>

                        <div class="row">
                            <div class="col s12">
                                <p>Belum memiliki akun? <a href="<?php echo base_url('login/register?jenis_user=' . $jenis_user); ?>"> Daftar Sekarang.</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($daftar == 1) : ?>
        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Akun Berhasil Di Daftarkan!</h4>
                <p>Silahkan login.</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
            </div>
        </div>
    <?php endif; ?>

    <!-- js -->
    <?php $this->load->view('_partials/js.php') ?>
    <script>
        <?php if ($daftar == 1) : ?>
            modalSucesssRegister();
        <?php endif; ?>
    </script>
</body>

</html>