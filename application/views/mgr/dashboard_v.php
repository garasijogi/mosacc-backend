<!DOCTYPE html>
<html lang="en">

<head>
	<!-- head -->
	<?php $this->load->view("mgr/_partials/head"); ?>
	<!-- /head -->
</head>

<body>

	<!-- sidebar -->
	<div class="container-fluid">
		<?php $this->load->view("mgr/_partials/sidebar"); ?>
	</div>
	<!-- /sidebar -->

	<!-- navbar -->
	<div>
		<?php $this->load->view("mgr/_partials/navbar"); ?>
	</div>
	<!-- /navbar -->

	<!-- preloader -->
	<?php $this->load->view('mgr/_partials/preloader.php') ?>
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
								<h6 class="card-nominal pm-0"><?php echo ($tab_data_saldo['bulan_ini']); ?></h6>
								<p class="card-lastChange">^<?php echo ($tab_data_saldo['rasio']); ?>% dari bulan lalu</p>
							</div>
						</a>
					</li>
					<li class="tab col card-tab s3">
						<a class="card-status" href="#swipe-penerimaan">
							<div class="card-container border-left">
								<h5 class="card-judul pm-0">Penerimaan</h5>
								<h6 class="card-nominal pm-0"><?php echo ($tab_data_penerimaan['bulan_ini']); ?></h6>
								<p class="card-lastChange">^<?php echo ($tab_data_penerimaan['rasio']); ?>% dari bulan lalu</p>
							</div>
						</a>
					</li>
					<li class="tab col card-tab s3">
						<a class="card-status" href="#swipe-pengeluaran">
							<div class="card-container border-left">
								<h5 class="card-judul pm-0">Pengeluaran</h5>
								<h6 class="card-nominal pm-0"><?php echo ($tab_data_pengeluaran['bulan_ini']); ?></h6>
								<p class="card-lastChange">^<?php echo ($tab_data_pengeluaran['rasio']); ?>% dari bulan lalu</p>
							</div>
						</a>
					</li>
				</ul>
				</ul>
			</div>

			<div class="row">
				<div class="row">
					<div id="swipe-saldo" class="col s12 dashChart-container">
						<div class="col s8 dashchart-innerContainer">
							<canvas class="dashChart" id="dChart_saldo" style="height: 550px"></canvas>
						</div>
						<div class="dashchart-innerContainer col s4">
							<div class="row">
								<table class="striped">
									<caption>Saldo akhir di tahun <?php echo (date('Y')); ?></caption>
									<tr>
										<th></th>
										<th>Bulan</th>
										<th>Saldo</th>
									</tr>
									<?php foreach ($tabel_data_saldo as $key => $value) : ?>
										<tr>
											<td><?php echo ($key + 1); ?></td>
											<td><?php echo ($value['bulan']); ?></td>
											<td><?php echo "Rp " . number_format(($value['jumlah']), 2, ',', '.'); ?></td>
										</tr>
									<?php endforeach; ?>
								</table>
							</div>
						</div>
					</div>
					<div id="swipe-penerimaan" class="col s12 dashChart-container">
						<div class="row">
							<div class="dashchart-innerContainer col s8">
								<canvas class="dashChart" id="dChart_penerimaan" style="height: 650px"></canvas>
							</div>
							<div class="dashchart-innerContainer col s4">
								<!-- <div class="row">
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
							</div> -->
								<div class="row">
									<table class="striped">
										<caption>Penerimaan Terbesar di <?php echo date('F'); ?> <?php echo (date('Y')); ?></caption>
										<tr>
											<th></th>
											<th>Bulan</th>
											<th>Jumlah</th>
										</tr>
										<?php foreach ($tabel_data_penerimaan as $key => $value) : ?>
											<tr>
												<td><?php echo ($key + 1); ?></td>
												<td><?php echo ($value['nama_sub']); ?></td>
												<td><?php echo "Rp " . number_format(($value['jumlah']), 2, ',', '.'); ?></td>
											</tr>
										<?php endforeach; ?>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div id="swipe-pengeluaran" class="col s12 dashChart-container">
						<div class="row">
							<div class="dashchart-innerContainer col s8">
								<canvas class="dashChart" id="dChart_pengeluaran" style="height: 750px"></canvas>
							</div>
							<div class="dashchart-innerContainer col s4">
								<!-- <div class="row">
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
							</div> -->
								<!-- <div class="col s6">
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
							</div> -->
								<div class="row">
									<table class="striped">
										<caption>Penerimaan Terbesar di <?php echo date('F'); ?> <?php echo (date('Y')); ?></caption>
										<tr>
											<th></th>
											<th>Transaksi</th>
											<th>Jumlah</th>
										</tr>
										<?php foreach ($tabel_data_pengeluaran as $key => $value) : ?>
											<tr>
												<td><?php echo ($key + 1); ?></td>
												<td><?php echo ($value['nama_sub']); ?></td>
												<td><?php echo "Rp " . number_format(($value['jumlah']), 2, ',', '.'); ?></td>
											</tr>
										<?php endforeach; ?>
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
		<script>
			var bulan = <?php echo '["' . implode('", "', $bulan) . '"]' ?>; //buat di garis X axis setiap chart per bulan

			// buat array js dari array php untuk penerimaan
			var sum_penerimaan = <?php echo '["' . implode('", "', $sum_penerimaan) . '"]' ?>; //buat di garis Y axis
			//buat array js dari array php untuk pengeluaran
			var sum_pengeluaran = <?php echo '["' . implode('", "', $sum_pengeluaran) . '"]' ?>; //buat di garis Y axis
			//buat array js dari array php untuk chart pengeluaran
			var sum_saldo = <?php echo '["' . implode('", "', $sum_saldo) . '"]' ?>; //buat di garis Y axis

			//buat array js dari array php untuk chart penerimaan
			var s_terima01 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[0]) . '"]' ?>; //buat di garis Y axis
			var s_terima02 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[1]) . '"]' ?>; //buat di garis Y axis
			var s_terima03 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[2]) . '"]' ?>; //buat di garis Y axis
			var s_terima04 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[3]) . '"]' ?>; //buat di garis Y axis
			var s_terima05 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[4]) . '"]' ?>; //buat di garis Y axis
			var s_terima06 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[5]) . '"]' ?>; //buat di garis Y axis
			var s_terima07 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[6]) . '"]' ?>; //buat di garis Y axis
			var s_terima08 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[7]) . '"]' ?>; //buat di garis Y axis
			var s_terima09 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[8]) . '"]' ?>; //buat di garis Y axis
			var s_terima10 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[9]) . '"]' ?>; //buat di garis Y axis
			var s_terima11 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[10]) . '"]' ?>; //buat di garis Y axis
			var s_terima12 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[11]) . '"]' ?>; //buat di garis Y axis
			var s_terima13 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[12]) . '"]' ?>; //buat di garis Y axis
			var s_terima14 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[13]) . '"]' ?>; //buat di garis Y axis
			var s_terima15 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[14]) . '"]' ?>; //buat di garis Y axis
			var s_terima16 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[15]) . '"]' ?>; //buat di garis Y axis
			var s_terima17 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[16]) . '"]' ?>; //buat di garis Y axis
			var s_terima18 = <?php echo '["' . implode('", "', $sum_akun_penerimaan[17]) . '"]' ?>; //buat di garis Y axis

			//buat array js dari array php untuk chart pengeluaran
			var s_keluar01 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[0]) . '"]' ?>; //buat di garis Y axis
			var s_keluar02 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[1]) . '"]' ?>; //buat di garis Y axis
			var s_keluar03 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[2]) . '"]' ?>; //buat di garis Y axis
			var s_keluar04 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[3]) . '"]' ?>; //buat di garis Y axis
			var s_keluar05 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[4]) . '"]' ?>; //buat di garis Y axis
			var s_keluar06 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[5]) . '"]' ?>; //buat di garis Y axis
			var s_keluar07 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[6]) . '"]' ?>; //buat di garis Y axis
			var s_keluar08 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[7]) . '"]' ?>; //buat di garis Y axis
			var s_keluar09 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[8]) . '"]' ?>; //buat di garis Y axis
			var s_keluar10 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[9]) . '"]' ?>; //buat di garis Y axis
			var s_keluar11 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[10]) . '"]' ?>; //buat di garis Y axis
			var s_keluar12 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[11]) . '"]' ?>; //buat di garis Y axis
			var s_keluar13 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[12]) . '"]' ?>; //buat di garis Y axis
			var s_keluar14 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[13]) . '"]' ?>; //buat di garis Y axis
			var s_keluar15 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[14]) . '"]' ?>; //buat di garis Y axis
			var s_keluar16 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[15]) . '"]' ?>; //buat di garis Y axis
			var s_keluar17 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[16]) . '"]' ?>; //buat di garis Y axis
			var s_keluar18 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[17]) . '"]' ?>; //buat di garis Y axis
			var s_keluar19 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[18]) . '"]' ?>; //buat di garis Y axis
			var s_keluar20 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[19]) . '"]' ?>; //buat di garis Y axis
			var s_keluar21 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[20]) . '"]' ?>; //buat di garis Y axis
			var s_keluar22 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[21]) . '"]' ?>; //buat di garis Y axis
			var s_keluar23 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[22]) . '"]' ?>; //buat di garis Y axis
			var s_keluar24 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[23]) . '"]' ?>; //buat di garis Y axis
			var s_keluar25 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[24]) . '"]' ?>; //buat di garis Y axis
			var s_keluar26 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[25]) . '"]' ?>; //buat di garis Y axis
			var s_keluar27 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[26]) . '"]' ?>; //buat di garis Y axis
			var s_keluar28 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[27]) . '"]' ?>; //buat di garis Y axis
			var s_keluar29 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[28]) . '"]' ?>; //buat di garis Y axis
			var s_keluar30 = <?php echo '["' . implode('", "', $sum_akun_pengeluaran[29]) . '"]' ?>; //buat di garis Y axis

			// buat array js dari array php untuk customer chart
			<?php
			// 			$x=1;
			// 			foreach($customer as $k => $v){
			// 				$jenis_customer[$x] = $k;
			// 				$x++;
			// 			} 
			?>
			//var jenis_customer = <?php //echo '["' . implode('", "', $jenis_customer) . '"]' 
									?>; //buat di garis X axis
			//var jumlah_customer = <?php //echo '["' . implode('", "', $customer) . '"]' 
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

		<?php $this->load->view("mgr/_partials/js"); ?>
		<!-- /Javascript -->

		<?php // print_r($bulan); 
		?>
		<?php // print_r($sum_pengeluaran); 
		?>

</body>

</html>