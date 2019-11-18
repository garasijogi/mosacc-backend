<!DOCTYPE html>
<html lang="en">

<head>
	<!-- head -->
	<?php $this->load->view("acc/_partials/head"); ?>
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

	<!-- preloader -->
	<?php $this->load->view('acc/_partials/preloader.php') ?>
	<!-- preloader -->

	<section class="content">
		<div class="row">
			<div class="col s12 m4">
				<div class="card">
					<a href="<?php echo base_url('acc/form_input_pembelian'); ?>?kd_akun=21100">
						<div class="card-image">
							<img src="<?php echo base_url('assets/images/pembelian/pembelian-perlengkapan-icon.png') ?>" width='300' height='350'>
							<span class="card-title">Pembelian Perlengkapan</span>
						</div>
						<div class="card-content">
							<p>Digunakan untuk mencatat pembelian barang-barang yang berkaitan dengan perlengkapan.</p>
						</div>
					</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card">
					<a href="<?php echo base_url('acc/form_input_pembelian'); ?>?kd_akun=21200">
						<div class="card-image">
							<img src="<?php echo base_url('assets/images/pembelian/pembelian-peralatan-icon.png') ?>" width='300' height='350'>
							<span class="card-title">Pembelian peralatan</span>
						</div>
						<div class="card-content">
							<p>Digunakan untuk mencatat pembelian barang-barang yang berkaitan dengan peralatan.</p>
						</div>
					</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card">
					<a href="<?php echo base_url('acc/form_input_pembelian'); ?>?kd_akun=21300">
						<div class="card-image">
							<img src="<?php echo base_url('assets/images/pembelian/pembelian-kendaraan-icon.png') ?>" width='300' height='350'>
							<span class="card-title">Pembelian Kendaraan</span>
						</div>
						<div class="card-content">
							<p>Digunakan untuk mencatat pembelian kendaraan maupun yang berkaitan dengan kendaraan.</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>

	<!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
	<!-- /Javascript -->

</body>

</html>