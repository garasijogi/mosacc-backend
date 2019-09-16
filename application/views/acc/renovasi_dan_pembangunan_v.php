<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head");?>
    <!-- /head -->
</head>

<body>

<div class="wrapper">
    <?php $this->load->view("acc/_partials/sidebar"); ?>
</div>

    <div>
        <!-- navbar&&sidebar -->
        
        <?php $this->load->view("acc/_partials/navbar"); ?>
        <!-- /navbar&&sidebar -->
    </div>
    
<section class="container">
    <div class="row">
        <h2>Beban Tidak Terikat</h2>
        <h6>Beban Operasional</h6>
        <a href="<?php echo base_url('acc/form_input_renov_bangun');?>?kd_akun=23100">Pembelian Material</a>
        <a href="<?php echo base_url('acc/form_input_renov_bangun');?>?kd_akun=23200">Upah Tukang</a>
    </div>
</section>

<!-- Javascript -->
<?php $this->load->view("acc/_partials/js"); ?>
<!-- /Javascript -->

</body>

</html>
