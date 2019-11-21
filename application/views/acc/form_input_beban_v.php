<!DOCTYPE html>
<html lang="en">

<head>
	<!-- head -->
	<?php $this->load->view("acc/_partials/head"); ?>
	<!-- /head -->
</head>

<body>

	<!-- sidebar -->
	<div class="wrapper">
		<?php $this->load->view("acc/_partials/sidebar"); ?>
	</div>
	<!-- /sidebar -->

	<!-- navbar -->
	<div>
		<?php $this->load->view("acc/_partials/navbar"); ?>
	</div>
	<!-- navbar -->

	<!-- preloader -->
	<?php $this->load->view('acc/_partials/preloader.php') ?>
	<!-- preloader -->

	<!-- breadcrumb -->
	<div class="content">
		<div class="col s12 breadcrumb-wrapper valign-wrapper">
			<a href="<?php echo base_url('acc/beban/'); ?>" class="breadcrumb">Pengeluaran</a>
			<a href="<?php echo base_url('acc/beban/'); ?>" class="breadcrumb">Beban-beban</a>
			<a href="<?php echo base_url('acc/form_input_beban?kd_akun=' . $kd_akun); ?>" class="breadcrumb"><?php echo $judul; ?></a>
		</div>
	</div>
	<!-- breadcrumb -->

	<!-- content -->
	<section class="content">

		<!-- judul halaman -->
		<div class="row">
			<h4 class="center"><?php echo ucwords(str_replace("_", " ", $judul)); ?></h4>
		</div>
		<!-- /judul halaman -->

		<!-- form input -->
		<div class="form>">
			<div class="row">
				<form action="<?php echo base_url('acc/form_input_beban/proses'); ?>" method="POST" class="col s12">
					<div class="row">
						<div class="input-field col s10 offset-s1">
							<input name="kd_akun" readonly id="kd_akun" type="text" value="<?php echo $kd_akun; ?>" />
							<label for="kd_akun">Kode Akun</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s5 offset-s1">
							<input name="tanggal" id="tanggal" type="text" class="datepicker" />
							<label for="tanggal">Tanggal</label>
						</div>
						<div class="input-field col s5">
							<input name="nominal" id="jumlah" type="number" />
							<label for="nominal">Nominal</label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s5 offset-s1">
							<textarea name="keterangan" id="keterangan" type="text" class="materialize-textarea"></textarea>
							<label for="keterangan">Keterangan</label>
						</div>
					</div>

					<div class="row">
						<div class="col s5 offset-s1">
							<button class="btn waves-effect green waves-light" type="submit">Submit <i class="material-icons right">send</i></button>
						</div>
					</div>
				</form>
			</div>
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
							<th>Keterangan</th>
							<th>Nominal</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($transaksi->result() as $col) :
							?>
							<tr>
								<td><?php echo $col->tanggal; ?></td>
								<td><?php echo $col->keterangan; ?></td>
								<td><?php echo "Rp " . number_format($col->nominal, 2, ',', '.'); ?></td>
								<td>
									<a href="<?php echo base_url('acc/form_input_beban/edit_b?idtr=' . $col->idtr . '&&kd_akun=' . $kd_akun . '&&tanggal=' . $col->tanggal . '&&keterangan=' . $col->keterangan . '&&nominal=' . $col->nominal); ?>">
										<img src="<?php echo base_url('assets/images/icon/sidebar/pencilataupenyesuaian-black.svg'); ?>" width="25px" height="25px">
									</a>
								</td>
								<td>
									<a id='<?php echo $col->idtr; ?>' href="#modal-delete" class="modal-trigger" data-page='<?php echo $this->router->fetch_class(); ?>' data-controller='<?php echo $col->kd_akun; ?>' onclick='delete_button_pengeluaran(this.id)'>
										<img src="<?php echo base_url('assets/images/icon/sidebar/tongsampah-black.svg') ?>" width="20px" height="20px">
									</a>
								</td>
							</tr>
						<?php
						endforeach;
						?>
					</tbody>
					<tfoot>
						<tr>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th>Nominal</th>
							<th></th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<!-- /tabel -->
	</section>
	<!-- /content -->

	<!-- modal delete -->
	<div id="modal-delete" class="modal">
		<div class="modal-content">
			<h4>Hapus Transaksi</h4>
			<p>Apakah anda yakin untuk menghapus transaksi ini?</p>
		</div>
		<div class="modal-footer">
			<a id='tombol-delete' class="modal-close waves-effect waves-green btn-small red">Ya</a>
			<a href="#" class="modal-close waves-effect waves-green btn-flat">Tidak</a>
		</div>
	</div>
	<!-- end modal delete -->

	<!-- modal edit -->
	<div id="modal-edit" class="modal">
		<div class="modal-content">
			<h4>Edit Berhasil</h4>
			<p>Data telah berhasil diubah</p>
		</div>
		<div class="modal-footer">
			<a id='tombol-delete' class="modal-close waves-effect waves-green btn-small green">Tutup</a>
		</div>
	</div>
	<!-- end modal edit -->

	<!-- Javascript -->
	<?php $this->load->view("acc/_partials/js"); ?>
	<script>
		<?php if ($this->input->get('ubah') != NULL) { ?>
			modalEdit();
		<?php } ?>
	</script>
	<!-- /Javascript -->

</body>

</html>