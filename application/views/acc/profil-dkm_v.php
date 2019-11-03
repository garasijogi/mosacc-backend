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
							<?php foreach ($ketua->result() as $k) : ?>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">NAMA</div>
										<div class="profil-nilai"><?php echo $k->nama; ?></div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">ALAMAT</div>
										<div class="profil-nilai"><?php echo $k->alamat; ?></div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">NO. HP</div>
										<div class="profil-nilai"><?php echo $k->telepon; ?></div>
									</div>
								</div>
								<div class="col s12">
									<div class="row">
										<div class="profil-properti">PENDIDIKAN</div>
										<div class="profil-nilai"><?php echo $k->pendidikan; ?></div>
									</div>
								</div>
						</div>
					</div>
					<br>
				<?php endforeach; ?>

				<div class="profil-contents-wrapper">
					<div class="row">
						<div class="col s12">
							<div class="row header">
								<h5>SEKRETARIS DKM</h5>
							</div>
							<?php foreach ($sekretaris->result() as $s) : ?>
								<div class="row">
									<div class="profil-properti">NAMA</div>
									<div class="profil-nilai"><?php echo $s->nama; ?></div>
								</div>
						</div>
						<div class="col s12">
							<div class="row">
								<div class="profil-properti">ALAMAT</div>
								<div class="profil-nilai"><?php echo $s->alamat; ?></div>
							</div>
						</div>
						<div class="col s12">
							<div class="row">
								<div class="profil-properti">NO. HP</div>
								<div class="profil-nilai"><?php echo $s->telepon; ?></div>
							</div>
						</div>
						<div class="col s12">
							<div class="row">
								<div class="profil-properti">PENDIDIKAN</div>
								<div class="profil-nilai"><?php echo $s->pendidikan; ?></div>
							</div>
						</div>
					</div>
				</div>
				<br>
			<?php endforeach; ?>

			<div class="profil-contents-wrapper">
				<div class="row">
					<div class="col s12">
						<div class="row header">
							<h5>BENDAHARA DKM</h5>
						</div>
						<?php foreach ($bendahara->result() as $b) : ?>
							<div class="row">
								<div class="profil-properti">NAMA</div>
								<div class="profil-nilai"><?php echo $b->nama; ?></div>
							</div>
					</div>
					<div class="col s12">
						<div class="row">
							<div class="profil-properti">ALAMAT</div>
							<div class="profil-nilai"><?php echo $b->alamat; ?></div>
						</div>
					</div>
					<div class="col s12">
						<div class="row">
							<div class="profil-properti">NO. HP</div>
							<div class="profil-nilai"><?php echo $b->telepon; ?></div>
						</div>
					</div>
					<div class="col s12">
						<div class="row">
							<div class="profil-properti">PENDIDIKAN</div>
							<div class="profil-nilai"><?php echo $b->pendidikan; ?></div>
						</div>
					</div>
				</div>
			</div>
			<br/>
			<div class="profil-contents-wrapper">
				<div class="row">
					<div class="col s12 ">
						<div class="row header">
							<h5>Dokumen DKM</h5>
						</div>
					</div>
					<div class="col s12">
						<div class="row">
							<div class="profil-properti">Struktur DKM</div>
							<div class="profil-nilai"><a href="<?php echo base_url('document/').$files['struktur_dkm'][0]['nama']; ?>"><?php echo $files['struktur_dkm'][0]['nama']; ?></a></div>
						</div>
						<div class="row">
							<div class="col s4"><p>Ukuran</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['struktur_dkm'][0]['ukuran'] ?> KB</p></div>
							<div class="col s4"><p>Ekstensi File</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['struktur_dkm'][0]['ekstensi'] ?></p></div>
							<div class="col s4"><p>Tanggal Diupload</p></div> <div class="col s1"><p> : </p></div> <div class="col s7"><p><?php echo $files['struktur_dkm'][0]['tanggal'] ?></p></div>
						</div>
					</div>
				</div>
			</div>
			<br>
		<?php endforeach; ?>
		<a href="<?php echo base_url('acc/profil/edit_struktur_dkm') ?>" class="waves-effect waves-light btn btn-edit-profil">Edit
			Struktur</a>
				</div>

			</div>

		</div>

	</div>



	<!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
	<!-- /Javascript -->
</body>

</html>