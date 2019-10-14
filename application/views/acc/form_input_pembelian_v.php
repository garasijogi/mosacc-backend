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

		<!-- content -->
		<section class="content">

			<!-- judul halaman -->
			<div class="row">
				<h4 class="center"><?php echo ucwords(str_replace("_", " ", $judul));?></h4>
			</div>
			<!-- /judul halaman -->

			<!-- form input -->
			<div class="row">
				<form action="<?php echo base_url('acc/form_input_pembelian/proses'); ?>" method="POST" class="col s12">
					<div class="row">
						<div class="input-field col s10 offset-s1">
							<input name="kd_akun" readonly id="kd_akun" type="text" value="<?php echo $kd_akun;?>" />
							<label for="kd_akun">Kode Akun</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5 offset-s1">
							<input name="tanggal" type="text" class="datepicker" id="input-tanggal">
							<label for="input-tanggal">Masukkan Tanggal</label>
						</div>
						<div class="input-field col s5">
							<select name="jenis">
								<option value="" selected>Jenis</option>
								<option value="1">Option 1</option>
								<option value="2">Option 2</option>
								<option value="3">Option 3</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5 offset-s1">
							<input name="merek" id="input-merek" type="text">
							<label for="input-merek">Masukkan Merek</label>
						</div>
						<div class="input-field col s5">
							<input name="nomor_seri" id="input-nomor-seri" type="number">
							<label for="input-nomor-seri">Masukkan Nomor Seri</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5 offset-s1">
							<input name="jumlah" id="input-jumlah-barang" type="number">
							<label for="input-jumlah-barang">Masukkan Jumalah Barang</label>
						</div>
						<div class="input-field col s5">
							<input name="keterangan" id="input-keterangan" type="text">
							<label for="input-keterangan">Masukkan Keterangan</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s5 offset-s1">
							<input name="harga_satuan" id="input-harga-satuan" type="number">
							<label for="input-harga-satuan">Masukkan Harga Satuan</label>
						</div>
						<div class="input-field col s5">
							<input name="total_harga" id="input-total-harga" type="number">
							<label for="input-total-harga">Masukkan Total Harga</label>
						</div>
					</div>

					<div class="input-field col s5 offset-s1">
						<button class="btn waves-effect green waves-light" type="submit">Submit <i
								class="material-icons right">send</i>
						</button>
					</div>
				</form>
			</div>
			<!-- /form input -->

			<div class="divider"></div>

			<!-- tabel -->
			<div class="row">
				<div class="col s12">
					<table id="view_data" class="display" style="width: 100%">
						<thead>
							<tr>
								<th>Tanggal</th>
								<th>Jenis</th>
								<th>Merek</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php 
                    foreach ($transaksi->result() as $col) :
                        ?>
							<tr>
								<td><?php echo $col->tanggal; ?></td>
								<td><?php echo $col->jenis; ?></td>
								<td><?php echo $col->merek; ?></td>
								<td><?php echo $col->jumlah; ?></td>
								<td><?php echo $col->total_harga; ?></td>
								<td></td>
							</tr>
							<?php
                    endforeach;
                    ?>
						</tbody>
						<tfoot>
							<tr>
								<th>Tanggal</th>
								<th>Jenis</th>
								<th>Merek</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
			<!-- /tabel -->
		</section>
		<!-- /content -->

		<!-- Javascript -->
		<?php $this->load->view("acc/_partials/js"); ?>
		<!-- /Javascript -->
	</body>

</html>
