<!DOCTYPE html>
<html lang="en">

<head>
	<!-- head -->
	<?php $this->load->view("acc/_partials/head"); ?>
	<!-- /head -->
</head>

<body>

	<!-- Sidebar -->
	<div class="wrapper">
		<?php $this->load->view("acc/_partials/sidebar"); ?>
	</div>
	<!-- /Sidebar -->
	<!-- navbar -->
	<div>
		<?php $this->load->view("acc/_partials/navbar"); ?>
	</div>
	<!-- /navbar -->

	<!-- preloader -->
	<?php $this->load->view('acc/_partials/preloader.php') ?>
	<!-- preloader -->

	<section class="content">
		<div class="row">
			<h2>Beban Terikat</h2>
			<div class="">
				<div class="row">

					<div class="col s12 m4">
						<div class="card">
							<div class="card-image">
								<img src="<?php echo base_url('assets/images/beban/beban-peribadatan-icon.png') ?>" width="200" height="300">
								<span class="card-title">Peribadatan</span>
								<a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="#rutin1"><i class="material-icons">add</i></a>
							</div>
							<div class="card-content">
								<p>
									Digunakan untuk mencatat pengeluaran yang dikeluarkan untuk kegiatan peribadatan.
								</p>
								<div id="rutin1" class="modal">
									<div class="modal-content">
										<h4>Peribadatan</h4>
										<ul>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22231">
												<li>Insentif Penceramah/Khatib</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22232">
												<li>Insentif Marbot</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22233">
												<li>Beban PHBI</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22234">
												<li>Beban Buletin Dakwah</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22235">
												<li>Peribadatan Lainnya</li>
											</a>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col s12 m4">
						<div class="card">
							<div class="card-image">
								<img src="<?php echo base_url('assets/images/beban/beban-ramadhan-icon.png') ?>" width="200" height="300">
								<span class="card-title">Ramadhan</span>
								<a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin2"><i class="material-icons">add</i></a>
							</div>
							<div class="card-content">
								<p>Digunakan untuk mencatat pengeluaran yang dikeluarkan untuk kegiatan Ramadan.</p>

								<div id="rutin2" class="modal">
									<div class="modal-content">
										<h4>Ramadhan</h4>
										<ul>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22241">
												<li>Sholat Tarawih</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22242">
												<li>Konsumsi Buka Puasa dan Sahur</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22243">
												<li>Peringatan Nuzulul Quran</li>
											</a>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col s12 m4">
						<div class="card">
							<div class="card-image">
								<img src="<?php echo base_url('assets/images/beban/beban-ziswaf-icon.png') ?>" width="200" height="300">
								<span class="card-title">Penyaluran Ziswaf</span>
								<a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin3"><i class="material-icons">add</i></a>
							</div>
							<div class="card-content">
								<p>Digunakan untuk mencatat pengeluaran penyaluran ZISWAF.</p>

								<div id="rutin3" class="modal">
									<div class="modal-content">
										<h4>Penyaluran Ziswaf</h4>
										<ul>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22251">
												<li>Penyaluran Zakat Fitrah dan Fidyah</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22252">
												<li>Penyaluran untuk Beasiswa</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22253">
												<li>Penyaluran untuk Besuk Orang Sakit</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22254">
												<li>Penyaluran untuk Aktivitas Kepemudaan</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22255">
												<li>Sumbangan untuk Anak Yatim</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22256">
												<li>Sumbangan Ta'ziyah</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22257">
												<li>Sumbangan untuk Bencana Alam</li>
											</a>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="row">
					<div class="col s12 m4 ">
						<div class="card">
							<div class="card-image">
								<img src="<?php echo base_url('assets/images/beban/beban-pendidikan-icon.png') ?>" width="200" height="300">
								<span class="card-title">Pendidikan</span>
								<a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#rutin4"><i class="material-icons">add</i></a>
							</div>
							<div class="card-content">
								<p>Digunakan untuk mencatat pengeluaran yang dikeluarkan untuk kegiatan pendidikan.
								</p>

								<div id="rutin4" class="modal">
									<div class="modal-content">
										<h4>Pendidikan</h4>
										<ul>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22261">
												<li>Penyaluran untuk TPA dan Tahfidz</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22262">
												<li>Beban Pelatihan</li>
											</a>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="divider"></div>
		<div class="row">
			<h2>Beban Tidak Terikat</h2>

			<div class="">
				<div class="row">
					<div class="col s12 m4">
						<div class="card">
							<div class="card-image">
								<img src="<?php echo base_url('assets/images/beban/beban-operasional-icon.png') ?>" width="200" height="300">
								<span class="card-title">Beban Operasional</span>
								<a class="btn-floating halfway-fab btn-large waves-effect waves-light red modal-trigger" href="#tdk_rutin1"><i class="material-icons">add</i></a>
							</div>
							<div class="card-content">
								<p>Digunakan untuk mencatat pengeluaran yang dikeluarkan untuk beban operasional.
								</p>

								<div id="tdk_rutin1" class="modal">
									<div class="modal-content">
										<h4>Beban Operasional</h4>
										<ul>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22111">
												<li>Beban Air, Listrik, dan Telepon</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22112">
												<li>Beban Pemeliharaan</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22113">
												<li>Beban Administrasi</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22114">
												<li>Beban Perlengkapan</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22115">
												<li>Beban Kerusakan dan Kehilangan Aset</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22116">
												<li>Beban Transportasi</li>
											</a>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22117">
												<li>Insentif Pengurus Masjid</li>
											</a>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col s12 m4">
						<div class="card">
							<div class="card-image">
								<img src="<?php echo base_url('assets/images/beban/beban-lainnya-icon.png') ?>" width="200" height="300">
								<span class="card-title">Beban Lainnya</span>
								<a class="btn-floating halfway-fab waves-effect btn-large waves-light red modal-trigger" href="#tdk_rutin2"><i class="material-icons">add</i></a>
							</div>
							<div class="card-content">
								<p>Digunakan untuk mencatat pengeluaran yang dikeluarkan untuk beban lainnya yang
									tidak terikat.
								</p>

								<div id="tdk_rutin2" class="modal">
									<div class="modal-content">
										<h4>Beban Lainnya</h4>
										<ul>
											<a href="<?php echo base_url('acc/form_input_beban'); ?>?kd_akun=22120">
												<li>Beban Lainnya</li>
											</a>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
	<!-- /Javascript -->

</body>

</html>