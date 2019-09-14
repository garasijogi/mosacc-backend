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
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22111">Beban Listrik, Air, dan Telepon</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22112">Beban Pemeliharaan</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22113">Beban Administrasi</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22114">Beban Perlengkapan</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22115">Beban Kerusakan dan Kehilangan</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22116">Beban Transportasi</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22117">Insentif Pengurus Masjid</a>
        <h6>Beban Lainnya</h6>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22120">Beban Lainnya</a>
    </div>
    <div class="divider" ></div>
    <div class="row">
        <h2>Beban Terikat</h2>
        <h6>Peribadatan</h6>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22231">Insentif Penceramah/Khatib</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22232">Insentif Marbot</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22233">Beban Perayaan Hari Besar Islam</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22234">Beban Buletin Dakwah</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22235">Peribadatan Lainnya</a>
        <h6>Ramadhan</h6>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22241">Salat Tarawih</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22242">Konsumsi Buka Puasa dan Sahur</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22243">Peringatan Nuzulul Qur'an</a>
        <h6>Penyaluran Ziswaf</h6>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22251">Penyaluran Zakat Fitrah dan Fidyah</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22252">Penyaluran untuk Beasiswa</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22253">Penyaluran untuk Besuk Orang Sakit</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22254">Penyaluran untuk Aktivitas Kepemudaan</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22255">Sumbangan untuk Anak Yatim</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22256">Sumbangan Ta'ziyah</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22257">Sumbangan untuk Bencana Alam</a>
        <h6>Pendidikan</h6>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22261">Penyaluran untuk TPA dan Tahfidz</a>
        <a href="<?php echo base_url('acc/form_input_beban');?>?kd_akun=22262">Beban Pelatihan</a>
    </div>
</section>

<!-- Javascript -->
<?php $this->load->view("acc/_partials/js"); ?>
<!-- /Javascript -->

</body>

</html>
