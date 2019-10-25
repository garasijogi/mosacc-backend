<!DOCTYPE html>
<html lang="en">

<head>
	<!-- head -->
	<?php $this->load->view("acc/_partials/head"); ?>
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
						<a href="<?php echo base_url('acc/profil'); ?>" class="menu-trigger profil-nav-active" id="profil-masjid">
							<li>Profil Masjid</li>
						</a>
						<a href="<?php echo base_url('acc/profil/dkm'); ?>" class="menu-trigger" id="struktur-dkm">
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
								<h5>Profil Masjid</h5>
								<h6>Informasi Dasar Masjid</h6>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">NAMA MASJID</div>
									<div class="profil-nilai"><?php echo $profil[0]['nama']; ?></div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">ALAMAT MASJID</div>
									<div class="profil-nilai"><?php echo $profil[0]['alamat']; ?></div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">TAHUN BERDIRI</div>
									<div class="profil-nilai"><?php echo $profil[0]['tahun']; ?></div>
								</div>
							</div>
						</div>
					</div>

					<div class="profil-contents-wrapper">
						<div class="row">
							<div class="col s12 head-content">
								<h5>Kontak dan Rekening</h5>
								<h6>Kontak Untuk Menghubungi Sekretariat Masjid</h6>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">NO. TELEPON SEKRETARIAT</div>
									<div class="profil-nilai"><?php echo $profil[0]['telepon']; ?></div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">REKENING MASJID</div>
									<div class="profil-nilai"><?php echo $profil[0]['rekening']; ?></div>
								</div>
							</div>
						</div>
					</div>

					<div class="profil-contents-wrapper">
						<div class="row">
							<div class="col s12 head-content">
								<h5>Dokumen</h5>
								<h6>Legalitas Masjid Dalam Bentuk Digital</h6>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">LUAS TANAH</div>
									<div class="profil-nilai"><?php echo $profil[0]['luas_tanah']; ?></div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">AD/ART</div>
									<div class="profil-nilai"><?php echo $profil[0]['ad_art']; ?></div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">BADAN HUKUM</div>
									<div class="profil-nilai"><?php echo $profil[0]['badan_hukum']; ?></div>
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