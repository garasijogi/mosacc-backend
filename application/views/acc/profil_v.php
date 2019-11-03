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
					<h4><?php echo $profil[0]['nama']; ?></h4>
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
									<div class="profil-nilai"><a href="<?php echo base_url('document/').$files['ad_art'][0]['nama']; ?>"><?php echo $files['ad_art'][0]['nama']; ?></a></div>
								</div>
								<div class="row">
									<div class="col s4"><p>Ukuran</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['ad_art'][0]['ukuran'] ?> KB</p></div>
									<div class="col s4"><p>Ekstensi File</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['ad_art'][0]['ekstensi'] ?></p></div>
									<div class="col s4"><p>Tanggal Diupload</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['ad_art'][0]['tanggal'] ?></p></div>
								</div>
							</div>
							<div class="col s12">
								<div class="row">
									<div class="profil-properti">BADAN HUKUM</div>
									<div class="profil-nilai"><a href="<?php echo base_url('document/').$files['badan_hukum'][0]['nama']; ?>"><?php echo $files['badan_hukum'][0]['nama']; ?></a></div>
								</div>
								<div class="row">
									<div class="col s4"><p>Ukuran</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['badan_hukum'][0]['ukuran'] ?> KB</p></div>
									<div class="col s4"><p>Ekstensi File</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['badan_hukum'][0]['ekstensi'] ?></p></div>
									<div class="col s4"><p>Tanggal Diupload</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['badan_hukum'][0]['tanggal'] ?></p></div>
								</div>
							</div>
						</div>
					</div>

					<a href="<?php echo base_url('acc/profil/edit_profil_masjid'); ?>" class="waves-effect waves-light btn btn-edit-profil">Edit
                        Profil</a>
						

				</div>
			</div>
		</div>
	</div>

	<!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
	<!-- /Javascript -->
</body>

</html>