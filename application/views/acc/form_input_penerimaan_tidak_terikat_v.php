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
            <a href="<?php echo base_url('acc/penerimaan_tidak_terikat'); ?>" class="breadcrumb"><?php echo ucwords($submenu); ?></a>
            <a href="<?php echo base_url('acc/penerimaan_tidak_terikat/' . $controller); ?>" class="breadcrumb"><?php echo ucwords(str_replace("_", " ", $controller)); ?></a>
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

            <form action="<?php echo base_url('acc/penerimaan_tidak_terikat/proses_input'); ?>" method="POST" class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="controller" hidden id="controller" type="text" value="<?php echo $controller; ?>">
                        <input name="kd_akun_PTT" readonly id="kd_akun_PTT" type="text" value="<?php echo $kd_akun; ?>">
                        <label for="kd_akun_PTT">Kode Akun</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="tanggal_PTT" id="tanggal_PTT" type="text" class="datepicker">
                        <label for="tanggal_PTT">Tanggal</label>
                    </div>
                </div>

                <!-- Form tanpa nama pemberi -->
                <?php if ($kd_akun == 11200 || $kd_akun == 11500) { ?>
                    <div class="row">
                        <div class="input-field col s6">
                            <input name="nama_pemberi_PTT" id="nama_pemberi_PTT" type="text" value=" " hidden>
                            <input name="nominal_PTT" id="nominal_PT" type="number" />
                            <label for="nominal_PTT">Nominal</label>
                        </div>
                        <div class="input-field col s6">
                            <textarea name="keterangan_PTT" id="keterangan_PTT" type="text" class="materialize-textarea"></textarea>
                            <label for="keterangan_PTT">Keterangan</label>
                        </div>
                    </div>
                <?php } else { ?>

                    <!-- Form dengan nama pemberi -->
                    <div class="row">
                        <div class="input-field col s4">
                            <input name="nama_pemberi_PTT" id="nama_pemberi_PT" type="text" />
                            <label for="nama_pemberi_PTT">Nama Pemberi</label>
                        </div>
                        <div class="input-field col s4">
                            <input name="nominal_PTT" id="nominal_PTT" type="number" />
                            <label for="nominal_PT">Nominal</label>
                        </div>
                        <div class="input-field col s4">
                            <textarea name="keterangan_PTT" id="keterangan_PTT" type="text" class="materialize-textarea"></textarea>
                            <label for="keterangan_PTT">Keterangan</label>
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
                        <th width='20%'>Tanggal</th>
                        <?php if ($kd_akun != 11200 && $kd_akun != 11500) { ?>
                            <th>Nama Pemberi</th>
                        <?php } ?>
                        <th width='20%'>Nominal</th>
                        <th width='50%'>Keterangan</th>
                        <th width='5%'></th>
                        <th width='5%'></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($PTT->result() as $tr) :
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $tr->tanggal; ?></td>
                            <?php if ($kd_akun != 11200 && $kd_akun != 11500) { ?>
                                <td><?php echo $tr->nama_pemberi; ?></td>
                            <?php } ?>
                            <td><?php echo "Rp " . number_format($tr->nominal, 2, ',', '.'); ?></td>
                            <td><?php echo $tr->keterangan; ?></td>
                            <td>
                                <?php if ($kd_akun != 11200 && $kd_akun != 11500) { ?>
                                    <a href="<?php echo base_url('acc/penerimaan_tidak_terikat/edit_ptt?idtr=' . $tr->idtr . '&&kd_akun=' . $kd_akun . '&&tanggal=' . $tr->tanggal . '&&nominal=' . $tr->nominal . '&&keterangan=' . $tr->keterangan . '&&controller=' . $controller . '&&nama_pemberi=' . $tr->nama_pemberi); ?>">
                                        <img src="<?php echo base_url('assets/images/icon/sidebar/pencilataupenyesuaian-black.svg'); ?>" width="25px" height="25px">
                                    </a>
                                <?php } else { ?>
                                    <a href="<?php echo base_url('acc/penerimaan_tidak_terikat/edit_ptt?idtr=' . $tr->idtr . '&&kd_akun=' . $kd_akun . '&&tanggal=' . $tr->tanggal . '&&nominal=' . $tr->nominal . '&&keterangan=' . $tr->keterangan . '&&controller=' . $controller); ?>">
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
                        <?php if ($kd_akun != 11200 && $kd_akun != 11500) { ?>
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

    <!-- content -->

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