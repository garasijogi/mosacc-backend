<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- head -->
		<?php $this->load->view("acc/_partials/head");?>
		<!-- /head -->
	</head>

	<body>




		<div id="landing-page-content">


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
								<a href="<?php echo base_url('wizard'); ?>"><span><i
											class="material-icons">assignment</i></span>Selamat
									Datang</a>
							</li>
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard/profil'); ?>"><span><i
											class="material-icons">equalizer</i></span>Profil Masjid</a></a>
							</li>
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard/dkm'); ?>"><span><i
											class="material-icons">cached</i></span>Profil
									DKM
								</a>
							</li>
							<li class="sidenav-item">
								<a href="<?php echo base_url('wizard/aset'); ?>" class="wizard-menu-on"><span><i
											class="material-icons">class</i></span>Aset</a>
							</li>
							<!-- <li class="sidenav-item">
                            <a href="wizard-akun.html"><span><i class="material-icons">class</i></span>Daftar
                                Akun
                            </a>
                        </li> -->
						</ul>
					</div>

				</div>
			</div>

				<div class="container">
				<div class="row">
					<div class="col s12 center teal-text">
						<h3>Pilih posisi untuk membuat password :</h3>
					</div>
				</div>
				<div class="row center">
					<div class="col s12 offset-s2">
						<div class="col s3 m3">
							<div class="card card1 teal darken-2 z-depth-4 card-homepage">
								<a href="#login-akuntan" class="modal-trigger">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator"
											src="<?php echo base_url('assets/images/icon/accountant-icon.png'); ?>">
									</div>
									<div class="card-content">
										<span class="card-title activator white-text text-darken-4"> <b> Akuntan
											</b></span>
									</div>
								</a>
							</div>
						</div>
						<div class="col s2"></div>
						<div class="col s3 offset-s2 m3">
							<div class="card card2 teal darken-2 z-depth-4 card-homepage">
								<a href="#login-manajer" class="modal-trigger">
									<div class="card-image waves-effect waves-block waves-light">
										<img class="activator"
											src="<?php echo base_url('assets/images/icon/manager-icon.jpg'); ?>">
									</div>
									<div class="card-content">
										<span class="card-title activator white-text text-darken-4"> <b> Manajer
											</b></span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

				<div id="login-manajer" class="modal">
					<div class="modal-content">
						<img src="assets/manager icon.png" alt="icon-manajer">
						<h4>Manajer</h4>
						<div class="input-field col s3">
							<input id="input-login-manajer" type="text" class="validate">
							<label for="input-login-manajer">Masukkan Password Baru</label>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#buat-akun-confirm"
							class="modal-close modal-trigger waves-effect waves-green btn-flat">BUAT</a>
					</div>
				</div>

				<div id="login-akuntan" class="modal">
					<div class="modal-content">
						<img src="assets/akuntan icon.png" alt="icon-akuntan">
						<h4>Akuntan</h4>
						<div class="input-field col s3">
							<input id="input-login-akuntan" type="text" class="validate">
							<label for="input-login-akuntan">Masukkan Password Baru</label>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#buat-akun-confirm"
							class="modal-close modal-trigger waves-effect waves-green btn-flat">BUAT</a>
					</div>
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
