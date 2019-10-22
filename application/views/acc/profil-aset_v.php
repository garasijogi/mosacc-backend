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
							<a href="<?php echo base_url('acc/profil/dkm'); ?>" class="menu-trigger" id="struktur-dkm">
								<li>Struktur DKM</li>
							</a>
							<a href="<?php echo base_url('acc/profil/akun'); ?>" class="menu-trigger" id="daftar-akun">
								<li>Daftar Akun</li>
							</a>
							<a href="<?php echo base_url('acc/profil/aset'); ?>" class="menu-trigger profil-nav-active" id="aset-masjid">
								<li>Aset Masjid</li>
							</a>
						</ul>
					</div>
					<div class="profil-content">
						<div class="profil-contents-wrapper">
							<div class="row">
								<div class="col s12 head-content">
									<h5>Daftar Aset</h5>
									<h6>Akun-akun Masjid seperti Peralatan, Tanah, dan Bangunan</h6>
								</div>
								<div class="col s12">
									<div class="row header">
										<h5>ASET PERALATAN</h5>
										<h6>Aset yang diperlukan untuk mendukung kegiatan operasional</h6>
									</div>
								</div>
								<div class="col s12">
									<table id="tabel-akun" class="display centered striped" style="width:100%">
										<thead>
											<tr>
												<th>NOMOR</th>
												<th>NAMA PERALATAN</th>
												<th>JUMLAH</th>
												<th>NILAI PERALATAN</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>1</td>
												<td>MOUSE</td>
												<td>17</td>
												<td>13.000.000</td>
											</tr>
											<tr>
												<td>4</td>
												<td>KUNCI MOTOR</td>
												<td>4</td>
												<td>40.000</td>
											</tr>
											<tr>
												<td>2</td>
												<td>ASBES</td>
												<td>200</td>
												<td>3.000.000</td>
											</tr>
											<tr>
												<td>8</td>
												<td>SENDAL</td>
												<td>2</td>
												<td>13.000</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="profil-contents-wrapper">
							<div class="row">
								<div class="col s12">
									<div class="row header">
										<h5>ASET BANGUNAN</h5>
										<h6>Aset bangunan yang dimiliki masjid</h6>
									</div>
									<table id="tabel-akun" class="display centered striped" style="width:100%">
										<thead>
											<tr>
												<th>NOMOR</th>
												<th>NAMA BANGUNAN</th>
												<th>LUAS</th>
												<th>NILAI</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>1</td>
												<td>GEDUNG MASJID</td>
												<td>17m^2</td>
												<td>13.000.000</td>
											</tr>
											<tr>
												<td>4</td>
												<td>AWULA</td>
												<td>4m^2</td>
												<td>40.000</td>
											</tr>
											<tr>
												<td>2</td>
												<td>KAMAR MANDI</td>
												<td>200m^2</td>
												<td>3.000.000</td>
											</tr>
											<tr>
												<td>8</td>
												<td>GUDANG</td>
												<td>2m^2</td>
												<td>13.000</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="profil-contents-wrapper">
							<div class="row">
								<div class="col s12">
									<div class="row header">
										<h5>ASET TANAH</h5>
										<h6>Aset tanah yang dimiliki masjid</h6>
									</div>
									<table id="tabel-akun" class="display centered striped" style="width:100%">
										<thead>
											<tr>
												<th>NOMOR</th>
												<th>NAMA BANGUNAN</th>
												<th>LUAS</th>
												<th>NILAI</th>
											</tr>
										</thead>

										<tbody>
											<tr>
												<td>1</td>
												<td>GEDUNG MASJID</td>
												<td>17m^2</td>
												<td>13.000.000</td>
											</tr>
											<tr>
												<td>4</td>
												<td>AWULA</td>
												<td>4m^2</td>
												<td>40.000</td>
											</tr>
											<tr>
												<td>2</td>
												<td>KAMAR MANDI</td>
												<td>200m^2</td>
												<td>3.000.000</td>
											</tr>
											<tr>
												<td>8</td>
												<td>GUDANG</td>
												<td>2m^2</td>
												<td>13.000</td>
											</tr>
										</tbody>
									</table>
								</div>
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
