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

	<!-- content -->
	<div class="content ">
		<div class="row ">
			<div class="col s5 offset-s3 ">
				<ul id="tabs-swipe-dashchart" class="tabs tabs-cardContainer">
					<li class="tab col card-tab s3">
						<a class="active card-status" href="#swipe-saldo">
							<div class="card-container">
								<h5 class="card-judul pm-0">Saldo</h5>
								<h6 class="card-nominal pm-0">14.000</h6>
								<p class="card-lastChange">^140% dari bulan lalu</p>
							</div>
						</a>
					</li>
					<li class="tab col card-tab s3">
						<a class="card-status" href="#swipe-penerimaan">
							<div class="card-container border-left">
								<h5 class="card-judul pm-0">Penerimaan</h5>
								<h6 class="card-nominal pm-0">14.000</h6>
								<p class="card-lastChange">^140% dari bulan lalu</p>
							</div>
						</a>
					</li>
					<li class="tab col card-tab s3">
						<a class="card-status" href="#swipe-pengeluaran">
							<div class="card-container border-left">
								<h5 class="card-judul pm-0">Pengeluaran</h5>
								<h6 class="card-nominal pm-0">14.000</h6>
								<p class="card-lastChange">^140% dari bulan lalu</p>
							</div>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="row">
				<div id="swipe-saldo" class="col s12 dashChart-container">
					<div class="col s8 dashchart-innerContainer">
						<canvas class="dashChart" id="dChart_saldo"></canvas>
					</div>
					<div class="dashchart-innerContainer col s4">
						<div class="row">
							<div class="col s6">
								<div class="input-field">
									<select>
										<option value="" disabled selected>Tahun</option>
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<label>jjjj</label>
									</select>
								</div>
							</div>
							<div class="col s6">
								<div class="input-field">
									<select>
										<option value="" disabled selected>Tahun</option>
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<label>jjjj</label>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<div class="input-field">
									<select>
										<option value="" disabled selected>Tahun</option>
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<label>jjjj</label>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<div class="input-field">
									<select>
										<option value="" disabled selected>Tahun</option>
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<label>jjjj</label>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<table class="striped">
								<tr>
									<th></th>
									<th>Transaksi</th>
									<th>Saldo(Rp .000,-)</th>
								</tr>
								<tr>
									<td>1</td>
									<td>Sholat Jumat</td>
									<td>5.0000</td>
								</tr>
								<tr>
									<td>2</td>
									<td>Infaq Jenazah</td>
									<td>5.0000</td>
								</tr>
								<tr>
									<td>3</td>
									<td>Donatur</td>
									<td>5.0000</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Wakaf</td>
									<td>5.0000</td>
								</tr>
								<tr>
									<td>5</td>
									<td>Shodaqoh</td>
									<td>5.0000</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div id="swipe-penerimaan" class="col s12 dashChart-container">
					<div class="row">
						<div class="dashchart-innerContainer col s8">
							<canvas class="dashChart" id="dChart_penerimaan"></canvas>
						</div>
						<div class="dashchart-innerContainer col s4">
							<div class="row">
								<div class="col s6">
									<div class="input-field">
										<select>
											<option value="" disabled selected>Tahun</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<label>jjjj</label>
										</select>
									</div>
								</div>
								<div class="col s6">
									<div class="input-field">
										<select>
											<option value="" disabled selected>Tahun</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<label>jjjj</label>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<select>
											<option value="" disabled selected>Tahun</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<label>jjjj</label>
										</select>
									</div>
								</div>
							</div>
							<div class="col s6">
								<div class="input-field">
									<select>
										<option value="" disabled selected>Tahun</option>
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<label>jjjj</label>
									</select>
								</div>
							</div>
							<div class="row">
								<table class="striped">
									<tr>
										<th></th>
										<th>Transaksi</th>
										<th>Saldo(Rp .000,-)</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Sholat Jumat</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Infaq Jenazah</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Donatur</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Wakaf</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Shodaqoh</td>
										<td>5.0000</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div id="swipe-pengeluaran" class="col s12 dashChart-container">
					<div class="row">
						<div class="dashchart-innerContainer col s8">
							<canvas class="dashChart" id="dChart_pengeluaran"></canvas>
						</div>
						<div class="dashchart-innerContainer col s4">
							<div class="row">
								<div class="col s6">
									<div class="input-field">
										<select>
											<option value="" disabled selected>Tahun</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<label>jjjj</label>
										</select>
									</div>
								</div>
								<div class="col s6">
									<div class="input-field">
										<select>
											<option value="" disabled selected>Tahun</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<label>jjjj</label>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<select>
											<option value="" disabled selected>Tahun</option>
											<option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<label>jjjj</label>
										</select>
									</div>
								</div>
							</div>
							<div class="col s6">
								<div class="input-field">
									<select>
										<option value="" disabled selected>Tahun</option>
										<option value="2019">2019</option>
										<option value="2018">2018</option>
										<option value="2017">2017</option>
										<option value="2016">2016</option>
										<label>jjjj</label>
									</select>
								</div>
							</div>
							<div class="row">
								<table class="striped">
									<tr>
										<th></th>
										<th>Transaksi</th>
										<th>Saldo(Rp .000,-)</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Sholat Jumat</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>2</td>
										<td>Infaq Jenazah</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>3</td>
										<td>Donatur</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>4</td>
										<td>Wakaf</td>
										<td>5.0000</td>
									</tr>
									<tr>
										<td>5</td>
										<td>Shodaqoh</td>
										<td>5.0000</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- /content -->

	<!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
	<!-- /Javascript -->
</body>

</html>

<script>
	// //buat array js dari array php untuk chart sales order
	// 		var sales_order = <?php //echo '["' . implode('", "', $sales_order) . '"]' 
									?>; //buat di garis Y axis
	// 		var bulan = <?php //echo '["' . implode('", "', $bulan) . '"]' 
							?>; //buat di garis X axis

	// 		// buat array js dari array php untuk customer chart
	// 		<?php
				// 		$x=1;
				// 		foreach($customer as $k => $v){
				// 			$jenis_customer[$x] = $k;
				// 			$x++;
				// 		} 
				?>
	// 		var jenis_customer = <?php //echo '["' . implode('", "', $jenis_customer) . '"]' 
									?>; //buat di garis X axis
	// 		var jumlah_customer = <?php //echo '["' . implode('", "', $customer) . '"]' 
										?>; //buat di garis Y axis

	// 		//buat array js dari array php untuk stok produk
	// 		<?php
				// 		$y=1;
				// 		$x=1;
				// 		foreach($stock_barang as $stok){
				// 			foreach($stok as $v){
				// 				if($x==1){
				// 					$nama_produk[$y] = $v;
				// 					$x++;
				// 				}else{
				// 					$jumlah_produk[$y] = $v;
				// 					$x--;
				// 				}
				// 			}
				// 			$y++;
				// 		} 
				?>
	// 		var nama_produk = <?php //echo '["' . implode('", "', $nama_produk) . '"]' 
									?>; //buat label chart
	// 		var jumlah_produk = <?php //echo '["' . implode('", "', $jumlah_produk) . '"]' 
									?>; //buat besar chart
</script>