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
            <a href="<?php echo base_url('acc/penerimaan_terikat'); ?>" class="breadcrumb">Penerimaan Terikat</a>
            <a href="<?php echo base_url('acc/penerimaan_terikat'); ?>" class="breadcrumb"><?php echo ucwords($submenu); ?></a>
            <a href="<?php echo base_url('acc/penerimaan_terikat/' . $controller); ?>" class="breadcrumb"><?php echo ucwords(str_replace("_", " ", $controller)); ?></a>
        </div>
    </div>
    <!-- breadcrumb -->

    <!-- content -->
    <div class="container">
        <div class="row">
            <h4 class="center"><?php echo ucwords(str_replace("_", " ", $controller)); ?></h4>
        </div>
        <!-- form input -->
        <div class="row">

            <form action="<?php echo base_url('acc/penerimaan_terikat/proses_input'); ?>" method="POST" class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="controller" hidden id="controller" type="text" value="<?php echo $controller; ?>">
                        <input name="kd_akun_PT" readonly id="kd_akun_PT" type="text" value="<?php echo $kd_akun; ?>">
                        <label for="kd_akun_PT">Kode Akun</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="tanggal_PT" id="tanggal_PT" type="text" class="datepicker to">
                        <label for="tanggal_PT">Tanggal</label>
                    </div>
                </div>

                <!-- Form tanpa nama pemberi -->
                <?php if ($kd_akun == 12610 || $kd_akun == 12620 || $kd_akun == 12630 || $kd_akun == 12640 || $kd_akun == 12820) { ?>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="nama_pemberi_PT" id="nama_pemberi_PT" type="text" value=" " hidden>
                            <input name="nominal_PT" id="nominal_PT" type="number" />
                            <label for="nominal_PT">Nominal</label>
                        </div>
                        <div class="input-field col s6">
                            <textarea name="keterangan_PT" id="keterangan_PT" type="text" class="materialize-textarea"></textarea>
                            <label for="keterangan_PT">Keterangan</label>
                        </div>
                    </div>
                <?php } else { ?>

                    <!-- Form dengan nama pemberi -->
                    <div class="row">
                        <div class="input-field col s4">
                            <input name="nama_pemberi_PT" id="nama_pemberi_PT" type="text" />
                            <label for="nama_pemberi_PT">Nama Pemberi</label>
                        </div>
                        <div class="input-field col s4">
                            <input name="nominal_PT" id="nominal_PT" type="number" />
                            <label for="nominal_PT">Nominal</label>
                        </div>
                        <div class="input-field col s4">
                            <textarea name="keterangan_PT" id="keterangan_PT" type="text" class="materialize-textarea"></textarea>
                            <label for="keterangan_PT">Keterangan</label>
                        </div>
                    </div>
                <?php } ?>

                <div class="row">
                    <div class="input-field col s2">
                        <button class="btn waves-effect green waves-light" type="submit">Submit <i class="material-icons right">send</i></button>
                    </div>
                </div>
            </form>

        </div>
        <!-- /form input -->

        <div class="divider"></div>

        <div class="row">
            <div class="col s12">
                <table id="view_data" class="display" style="width: 100%" />
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <?php if ($kd_akun != 12610 && $kd_akun != 12620 && $kd_akun != 12630 && $kd_akun != 12640 && $kd_akun != 12820) { ?>
                            <th>Nama Pemberi</th>
                        <?php } ?>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($PT->result() as $tr) :
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $tr->tanggal; ?></td>
                            <?php if ($kd_akun != 12610 && $kd_akun != 12620 && $kd_akun != 12630 && $kd_akun != 12640 && $kd_akun != 12820) { ?>
                                <td><?php echo $tr->nama_pemberi; ?></td>
                            <?php } ?>
                            <td><?php echo $tr->nominal; ?></td>
                            <td><?php echo $tr->keterangan; ?></td>
                            <td>
                                <?php if ($kd_akun != 12610 && $kd_akun != 12620 && $kd_akun != 12630 && $kd_akun != 12640 && $kd_akun != 12820) { ?>
                                    <a href="<?php echo base_url('acc/penerimaan_terikat/edit_pt?idtr=' . $tr->idtr . '&&kd_akun=' . $kd_akun . '&&tanggal=' . $tr->tanggal . '&&nominal=' . $tr->nominal . '&&keterangan=' . $tr->keterangan . '&&controller=' . $controller . '&&nama_pemberi=' . $tr->nama_pemberi); ?>">
                                        <img src="<?php echo base_url('assets/images/icon/sidebar/pencilataupenyesuaian-black.svg'); ?>" width="25px" height="25px">
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url('acc/penerimaan_terikat/edit_pt?idtr=' . $tr->idtr . '&&kd_akun=' . $kd_akun . '&&tanggal=' . $tr->tanggal . '&&nominal=' . $tr->nominal . '&&keterangan=' . $tr->keterangan . '&&controller=' . $controller); ?>">
                                        <img src="<?php echo base_url('assets/images/icon/sidebar/pencilataupenyesuaian-black.svg'); ?>" width="25px" height="25px">
                                    </a>
                                <?php } ?>
                            </td>
                            <td>
                                <a id='<?php echo $tr->idtr; ?>' href="#modal-delete" class="modal-trigger" data-controller='<?php echo $controller; ?>' onclick='delete_button(this.id)'>
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
                        <?php if ($kd_akun != 12610 && $kd_akun != 12620 && $kd_akun != 12630 && $kd_akun != 12640 && $kd_akun != 12820) { ?>
                            <th>Nama Pemberi</th>
                        <?php } ?>
                        <th>Nominal</th>
                        <th>Keterangan</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- content -->

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

    <!-- js -->
    <?php $this->load->view("acc/_partials/js"); ?>
    <script>
        <?php if ($this->input->get('ubah') != NULL) { ?>
            modalEdit();
        <?php } ?>
    </script>
    <!-- end js -->
</body>

</html>