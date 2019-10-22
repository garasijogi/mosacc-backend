<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- head -->
		<?php $this->load->view("acc/_partials/head");?>
		<!-- /head -->
	</head>

	<body>

		<!-- sidebar -->
		<div class="container-fluid">
			<?php $this->load->view("acc/_partials/sidebar"); ?>
		</div>
		<!-- /sidebar -->

		<!-- navbar -->
		<div>
			<?php $this->load->view("acc/_partials/navbar"); ?>
		</div>
		<!-- /navbar -->

		<!-- preloader -->
		<?php $this->load->view('acc/_partials/preloader.php') ?>
		<!-- preloader -->

		<div class="content">
			<div class="container">

				<div class="profil-wrapper">
					<header class="profil-header valign-wrapper">
						<img src="<?php echo base_url('assets/images/background.jpg'); ?>" alt="profil image">
						<h4>Masjid Jami Al-Islah</h4>
					</header>
                    <div class="profil-nav">
						<ul>
							<a href="<?php echo base_url('acc/profil'); ?>" class="menu-trigger" id="profil-masjid">
								<li>Profil Masjid</li>
							</a>
							<a href="<?php echo base_url('acc/profil/dkm'); ?>" class="menu-trigger profil-nav-active" id="struktur-dkm">
								<li>Struktur DKM</li>
							</a>
							<a href="<?php echo base_url('acc/profil/akun'); ?>" class="menu-trigger" id="daftar-akun">
								<li>Daftar Akun</li>
							</a>
							<a href="<?php echo base_url('acc/profil/aset'); ?>" class="menu-trigger" id="aset-masjid">
								<li>Aset Masjid</li>
							</a>
						</ul>
					</div>
					<div class="profil-content">
						<div class="profil-contents-wrapper">
							<div class="row">
								<div class="col s12 head-content">
									<h5>Struktur DKM</h5>
									<h6>Informasi Dewan Kepengurusan Masjid</h6>
								</div>
								<div class="col s12">
									<div class="row header">
										<h5>KETUA DKM</h5>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">NAMA</div>
										<div class="profil-nilai">Rijuki Polapa</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">TEMPAT TANGGAL LAHIR</div>
										<div class="profil-nilai">30 September 1947</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">ALAMAT</div>
										<div class="profil-nilai">Jl. nin AJA DULU</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">NO. HP</div>
										<div class="profil-nilai">088988877XX</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">PENDIDIKAN</div>
										<div class="profil-nilai">STMIK Pasar Rebo</div>
									</div>
								</div>
							</div>
						</div>

						<div class="profil-contents-wrapper">
							<div class="row">
								<div class="col s12">
									<div class="row header">
										<h5>SEKRETARIS DKM</h5>
									</div>
									<div class="row">
										<div class="profil-properti">NAMA</div>
										<div class="profil-nilai">Rijuki Polapa</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">TEMPAT TANGGAL LAHIR</div>
										<div class="profil-nilai">30 September 1947</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">ALAMAT</div>
										<div class="profil-nilai">Jl. nin AJA DULU</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">NO. HP</div>
										<div class="profil-nilai">088988877XX</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">PENDIDIKAN</div>
										<div class="profil-nilai">STMIK Pasar Rebo</div>
									</div>
								</div>
							</div>
						</div>

						<div class="profil-contents-wrapper">
							<div class="row">
								<div class="col s12">
									<div class="row header">
										<h5>BENDAHARA DKM</h5>
									</div>
									<div class="row">
										<div class="profil-properti">NAMA</div>
										<div class="profil-nilai">Rijuki Polapa</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">TEMPAT TANGGAL LAHIR</div>
										<div class="profil-nilai">30 September 1947</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">ALAMAT</div>
										<div class="profil-nilai">Jl. nin AJA DULU</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">NO. HP</div>
										<div class="profil-nilai">088988877XX</div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">PENDIDIKAN</div>
										<div class="profil-nilai">STMIK Pasar Rebo</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>

		</div>



		<!-- Javascript -->
		<?php $this->load->view("acc/_partials/js"); ?>
		<!-- /Javascript -->
	</body>

</html>
