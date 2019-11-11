<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head"); ?>
    <!-- /head -->
</head>

<body>

    <div class="container-fluid">
        <?php $this->load->view("acc/_partials/sidebar"); ?>
    </div>

    <div>
        <!-- navbar&&sidebar -->

        <?php $this->load->view("acc/_partials/navbar"); ?>
        <!-- /navbar&&sidebar -->
    </div>

    <!-- preloader -->
    <?php $this->load->view('acc/_partials/preloader.php') ?>
    <!-- preloader -->

    <!-- breadcrumb -->
    <div class="content">
        <div class="col s12 breadcrumb-wrapper valign-wrapper">
            <a href="<?php echo base_url('acc/pembelian'); ?>" class="breadcrumb">Pengeluaran</a>
            <a href="<?php echo base_url('acc/form_input_pembelian?kd_akun=' . $kd_akun); ?>" class="breadcrumb"><?php echo ucwords(str_replace("_", " ", $nama_sub)); ?></a>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- content -->
    <div class="container">
        <div class="row">
            <h4 class="center">Edit <?php echo ucwords(str_replace("_", " ", $nama_sub)); ?></h4>
        </div>
        <!-- form input -->
        <div class="row">
            <form action="<?php echo base_url('acc/form_input_pembelian/proses_edit_p'); ?>" method="POST" class="col s12">
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input type="text" name="idtr" value="<?php echo $idtr; ?>" hidden>
                        <input name="kd_akun" readonly id="kd_akun" type="text" value="<?php echo $kd_akun; ?>" />
                        <label for="kd_akun">Kode Akun</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5 offset-s1">
                        <input name="tanggal_old" type="text" id="tangga|_old" value="<?php echo $tanggal; ?>" hidden>
                        <input name="tanggal" type="text" class="datepicker" id="input-tanggal" value="<?php echo $tanggal; ?>">
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
                        <input name="merek" id="input-merek" type="text" value="<?php echo $merek; ?>">
                        <label for="input-merek">Masukkan Merek</label>
                    </div>
                    <div class="input-field col s5">
                        <input name="nomor_seri" id="input-nomor-seri" type="number" value="<?php echo $nomor_seri; ?>">
                        <label for="input-nomor-seri">Masukkan Nomor Seri</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5 offset-s1">
                        <input name="jumlah" id="input-jumlah-barang" type="number" value="<?php echo $jumlah; ?>">
                        <label for="input-jumlah-barang">Masukkan Jumlah Barang</label>
                    </div>
                    <div class="input-field col s5">
                        <input name="keterangan" id="input-keterangan" type="text" value="<?php echo $keterangan ?>">
                        <label for="input-keterangan">Masukkan Keterangan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5 offset-s1">
                        <input name="harga_satuan" id="input-harga-satuan" type="number" value="<?php echo $harga_satuan; ?>">
                        <label for="input-harga-satuan">Masukkan Harga Satuan</label>
                    </div>
                    <div class="input-field col s5">
                        <input name="total_harga" id="input-total-harga" type="number" value="<?php echo $total_harga; ?>">
                        <label for="input-total-harga">Masukkan Total Harga</label>
                    </div>
                </div>

                <div class="input-field col s5 offset-s1">
                    <button class="btn waves-effect green waves-light" type="submit">Submit <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
        <!-- /form input -->

    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>