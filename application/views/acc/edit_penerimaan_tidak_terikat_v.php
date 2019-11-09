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
            <a href="<?php echo base_url('acc/penerimaan_tidak_terikat'); ?>" class="breadcrumb">Penerimaan Tidak Terikat</a>
            <a href="<?php echo base_url('acc/penerimaan_tidak_terikat'); ?>" class="breadcrumb"><?php echo ucwords($menu); ?></a>
            <a href="<?php echo base_url('acc/penerimaan_tidak_terikat/' . $controller); ?>" class="breadcrumb"><?php echo ucwords(str_replace("_", " ", $nama_sub)); ?></a>
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

            <form action="<?php echo base_url('acc/penerimaan_tidak_terikat/proses_edit_ptt'); ?>" method="POST" class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="controller" hidden id="controller" type="text" value="<?php echo $controller; ?>">
                        <input name="kd_akun_PT" readonly id="kd_akun_PT" type="text" value="<?php echo $kd_akun; ?>">
                        <label for="kd_akun_PT">Kode Akun</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="date" name="tanggal_old" value="<?php echo $tanggal; ?>" hidden>
                        <input type="text" name="idtr" value="<?php echo $idtr; ?>" hidden>
                        <input name="tanggal_PT" id="tanggal_PT" type="text" class="datepicker to" value="<?php echo $tanggal; ?>">
                        <label for="tanggal_PT">Tanggal</label>
                    </div>
                </div>

                <!-- Form tanpa nama pemberi -->
                <?php if ($kd_akun == 11200 || $kd_akun == 11500) { ?>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="nama_pemberi_PT" id="nama_pemberi_PT" type="text" value=" " hidden>
                            <input name="nominal_PT" id="nominal_PT" type="number" value="<?php echo $nominal; ?>">
                            <label for="nominal_PT">Nominal</label>
                        </div>
                        <div class="input-field col s6">
                            <textarea name="keterangan_PT" id="keterangan_PT" type="text" class="materialize-textarea"><?php echo $keterangan; ?></textarea>
                            <label for="keterangan_PT">Keterangan</label>
                        </div>
                    </div>
                <?php } else { ?>

                    <!-- Form dengan nama pemberi -->
                    <div class="row">
                        <div class="input-field col s4">
                            <input name="nama_pemberi_PT" id="nama_pemberi_PT" type="text" value="<?php echo $nama_pemberi; ?>" />
                            <label for="nama_pemberi_PT">Nama Pemberi</label>
                        </div>
                        <div class="input-field col s4">
                            <input name="nominal_PT" id="nominal_PT" type="number" value="<?php echo $nominal; ?>" />
                            <label for="nominal_PT">Nominal</label>
                        </div>
                        <div class="input-field col s4">
                            <textarea name="keterangan_PT" id="keterangan_PT" type="text" class="materialize-textarea"><?php echo $keterangan; ?></textarea>
                            <label for="keterangan_PT">Keterangan</label>
                        </div>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="input-field col s2">
                        <button class="btn waves-effect green waves-light" type="submit">Update <i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /form input -->

        <div class="divider"></div>

    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>