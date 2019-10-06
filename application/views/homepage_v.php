<!DOCTYPE html>
<html lang="en"" class="overflow-hidden">

<head>
    <title>Mosacc (Mosque Accounting)</title>
    <?php $this->load->view('_partials/head.php') ?> 
</head>

<body>

    <div>
        <!-- navbar&&sidebar -->

        <?php $this->load->view("_partials/navbar"); ?>
        <!-- /navbar&&sidebar -->
    </div>
<div class=" bg-mosque container" style="background: url('assets/images/mosque-vector.png') no-repeat center center fixed !important;object-fit: cover !important;margin:auto !important;height: 600px !important;">
<div class="row">
    <div class="col s12 center teal-text">
        <h6>Choose your position :</h6>
    </div>
</div>
<div class="row center">
    <div class="col s12 offset-s2">
        <div class="col s3 m3">
            <div class="card card1 teal darken-2 z-depth-4 card-homepage">
                <a href="<?php echo base_url('login?jenis_user=accountant'); ?>">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text text-darken-4"> <b> Accountant </b></span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col s2"></div>
        <div class="col s3 offset-s2 m3">
            <div class="card card2 teal darken-2 z-depth-4 card-homepage">
                <a href="<?php echo base_url('login?jenis_user=manager'); ?>">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator white-text text-darken-4"> <b> Manager </b></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- js -->
<?php $this->load->view('_partials/js.php') ?>
</body>

</html>