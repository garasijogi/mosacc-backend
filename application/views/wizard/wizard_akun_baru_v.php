<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- head -->
		<?php $this->load->view("acc/_partials/head");?>
		<!-- /head -->
	</head>

<body>
	<div id="landing-page-content">
    	<div class="wizard-wrapper">
			<!-- <ul id="slide-out" class="sidenav">
				<li><a href="#!" class="waves-effect">Tentang</a></li>
				<li>
					<div class="divider"></div>
				</li>
				<li><a href="#!" class="waves-effect">Kontak Kami</a></li>
				<li>
					<div class="divider"></div>
				</li>
				<li><a href="#!" class="waves-effect">Keluar</a></li>
			</ul>
			<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons medium">menu</i></a> -->

			<div class="wrapper-sidenav">
				<div id="sidenav">

					<div class="collapsible-boody">
						<ul class="collapsible">
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard'); ?>" ><span><i class="material-icons">assignment</i></span>Selamat Datang</a>
							</li>
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard/profil'); ?>"><span><i class="material-icons">equalizer</i></span>Profil Masjid</a></a>
							</li>
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard/dkm'); ?>"><span><i class="material-icons">cached</i></span>Profil DKM
								</a>
							</li>
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard/aset'); ?>"><span><i class="material-icons">class</i></span>Aset</a>
							</li>
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard/akun_baru'); ?>" class="wizard-menu-on" ><span><i class="material-icons">account_box</i></span>Daftar
									Akun
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<div class="navbar-fixed">
				<nav id="navigation" class="navbar-no-shadow">
					<div class="nav-wizard">
						<a href="index.html" class="brand-logo">Mosque Accounting</a>
					</div>
				</nav>
			</div>
		</div>

        <!-- preloader -->
        <?php $this->load->view('_partials/preloader.php') ?>
        <!-- preloader -->

				<div class="container">
				<div class="row">
					<div class="col s12 center teal-text">
						<h3>Pilih posisi untuk membuat password :</h3>
					</div>
				</div>
				<div class="row center">
					<div class="col s12 offset-s2">
						<div class="col s3 m3">
							<?php if($pw_bendahara == 1){
								echo '<div class="card card1 teal darken-2 z-depth-4 card-homepage waves-effect waves-block waves-light">';
							}else{
								echo '<div class="card card1 red darken-2 z-depth-4 card-homepage waves-effect waves-block waves-light">';
							} ?>
								<a href="#login-akuntan" class="modal-trigger">
									<div class="card-image">
										<img class="activator" src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>">
									</div>
									<div class="card-content">
										<span class="card-title activator white-text text-darken-4"> <b> Bendahara
											</b></span>
									</div>
								</a>
							</div>
							
						</div>
						<div class="col s2"></div>
						<div class="col s3 offset-s2 m3">
							<?php if($pw_ketua_dkm == 1){
								echo '<div class="card card1 teal darken-2 z-depth-4 card-homepage waves-effect waves-block waves-light">';
							}else{
								echo '<div class="card card1 red darken-2 z-depth-4 card-homepage waves-effect waves-block waves-light">';
							} ?>
								<a href="#login-manajer" class="modal-trigger">
									<div class="card-image">
										<img class="activator" src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>">
									</div>
									<div class="card-content">
										<span class="card-title activator white-text text-darken-4"> <b> Ketua DKM
											</b></span>
									</div>
								</a>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="row center">
				<?php 
				$url = base_url('wizard/wizardProses');
				
				if($pw_bendahara == 1 && $pw_ketua_dkm == 1){ 
					echo('<div class="row"> <div class="col s6 offset-s3"> <a href=' . $url . ' class="btn teal">SELESAIKAN</a> </div> </div>');
				}else{
					echo('<div class="row"></div>');
				} ?>
			</div>

				<div id="login-manajer" class="modal">
					<form action="<?php echo base_url('wizard/akun_baruProses'); ?>?jabatan=ketua_dkm" method="post">
						<div class="modal-content">
							<div class="wrapper-jabatan_photos">
								<img class="wizard-jabatan_photos" src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>" alt="icon-manajer">
							</div>
							<h4>Ketua DKM</h4>
							<div class="input-field col s3">
								<input id="input-login-manajer" type="password" class="validate" name="pw" value="<?php echo $ketua_dkm['password']; ?>">
								<label for="input-login-manajer">Masukkan Password Baru</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="waves-effect waves-green btn-flat">BUAT</button>
						</div>
					</form>
				</div>

				<div id="login-akuntan" class="modal">
					<form action="<?php echo base_url('wizard/akun_baruProses'); ?>?jabatan=bendahara" method="post">
						<div class="modal-content">
							<div class="wrapper-jabatan_photos">
								<img class="wizard-jabatan_photos" src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>" alt="icon-manajer">
							</div>
							<h4>Bendahara</h4>
							<div class="input-field col s3">
								<input id="input-login-akuntan" type="password" class="validate" name="pw" value="<?php echo $bendahara['password']; ?>">
								<label for="input-login-akuntan">Masukkan Password Baru</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="submit" class="waves-effect waves-green btn-flat">BUAT</button>
						</div>
					</form>
				</div>

				<div id="buat-akun-confirm" class="modal">
					<div class="modal-content">
						<h4>Berhasil</h4>
						<p class="input-field col s3">
							Selamat anda berhasil membuat akun!<br>Silahkan klik tombol "selesai" dibawah untuk masuk.
						</p>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url('homepage'); ?>"
							class="modal-close waves-effect waves-green btn-flat">SELESAI</a>
					</div>
				</div>
			</div>
		</div>


		<!-- Javascript -->
		<?php $this->load->view("acc/_partials/js"); ?>
		<!-- /Javascript -->
	</body>

</html>
