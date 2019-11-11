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
        <div class="form>">
            <div class="row">
                <form action="<?php echo base_url('acc/form_input_beban/proses_edit_b'); ?>" method="POST" class="col s12">
                    <div class="row">
                        <div class="input-field col s10 offset-s1">
                            <input type="text" name="idtr" value="<?php echo $idtr; ?>" hidden>
                            <input name="kd_akun" readonly id="kd_akun" type="text" value="<?php echo $kd_akun; ?>" />
                            <label for="kd_akun">Kode Akun</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s5 offset-s1">
                            <input name="tanggal_old" id="tanggal" type="text" class="datepicker" value="<?php echo $tanggal; ?>" hidden />
                            <input name="tanggal" id="tanggal" type="text" class="datepicker" value="<?php echo $tanggal; ?>" />
                            <label for="tanggal">Tanggal</label>
                        </div>
                        <div class="input-field col s5">
                            <input name="nominal" id="jumlah" type="number" value="<?php echo $nominal; ?>">
                            <label for="nominal">Nominal</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s5 offset-s1">
                            <textarea name="keterangan" id="keterangan" type="text" class="materialize-textarea"><?php echo $keterangan; ?></textarea>
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

    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>