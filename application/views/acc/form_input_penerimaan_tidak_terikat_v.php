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

    <!-- content -->
    <div class="container">
        <div class="row">
            <h4 class="center"><?php echo ucwords(str_replace("_", " ", $controller));?></h4>
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
                        <input name="tanggal_PTT" id="tanggal_PTT" type="date">
                        <label for="tanggal_PTT">Tanggal</label>
                    </div>
                </div>

                <!-- Form tanpa nama pemberi -->
                <?php if ($kd_akun == 11200 || $kd_akun == 11500 ) { ?>
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
                        <th>Tanggal</th>
                        <?php if ($kd_akun != 11200 && $kd_akun != 11500) { ?>
                            <th>Nama Pemberi</th>
                        <?php } ?>
                        <th>Nominal</th>
                        <th>Keterangan</th>
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
                            <td><?php echo $tr->nominal; ?></td>
                            <td><?php echo $tr->keterangan; ?></td>
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
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>