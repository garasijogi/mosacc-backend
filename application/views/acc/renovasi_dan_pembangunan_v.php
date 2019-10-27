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

	<div class="content">
		<div class="row">
			<div class="col s12 m4">
				<div class="card">
					<a href="<?php echo base_url('acc/form_input_renov_bangun'); ?>?kd_akun=23100">
						<div class="card-image">
							<img src="<?php echo base_url('assets/images/renovasi_pembangunan/renov-material-icon.png') ?>" width="200" height="300">
							<span class="card-title">Pembelian Material</span>
						</div>
						<div class="card-content">
							<p>Digunakan untuk mencatat pembelian yang berkaitan dengan material-material pembangunan.</p>
						</div>
					</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="card">
					<a href="<?php echo base_url('acc/form_input_renov_bangun'); ?>?kd_akun=23200">
						<div class="card-image">
							<img src="<?php echo base_url('assets/images/renovasi_pembangunan/renov-upah-icon.png') ?>" width="200" height="300">
							<span class="card-title">Upah Tukang</span>
						</div>
						<div class="card-content">
							<p>Digunakan untuk mencatat pengeluaran-pengeluaran yang berkaitan dengan upah tukang.</p>
						</div>
					</a>
				</div>
			</div>

		</div>

	</div>

	<!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
	<!-- /Javascript -->

</body>

</html>