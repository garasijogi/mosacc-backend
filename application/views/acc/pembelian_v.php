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
        <a href="<?php echo base_url('acc/form_input_pembelian');?>?kd_akun=21100">Pembelian Perlengkapan</a>
        <a href="#">Pembelian Peralatan</a>
        <a href="#">Pembelian Kendaraan</a>
    </div>
</section>
	
</body>

</html>
