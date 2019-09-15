<!DOCTYPE html>
<html lang="en">
<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head");?>
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
    <!-- form input -->
    <div class="row">

        <form action="<?php echo base_url('acc/penerimaan_terikat/proses'); ?>" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input name="kd_akun" readonly id="kd_akun" type="text" value="<?php echo $kd_akun;?>" />
                    <label for="kd_akun">Kode Akun</label> 
                </div>
                <div class="input-field col s6">
                    <input name="tanggal" id="tanggal" type="text" class="datepicker"/>
                    <label for="tanggal">Tanggal</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <input name="jenis" id="jenis" type="text" />
                    <label for="jenis">Jenis</label> 
                </div>
                <div class="input-field col s4">
                    <input name="merek" id="merek" type="text" />
                    <label for="merek">Merek</label> 
                </div>
                <div class="input-field col s4">
                    <input name="nomor_seri" id="nomor_seri" type="text" />
                    <label for="nomor_seri">Nomor Seri</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input name="jumlah" id="jumlah" type="number" />
                    <label for="jumlah">Jumlah</label> 
                </div>
                <div class="input-field col s6">
                    <textarea name="keterangan" id="keterangan" type="text" class="materialize-textarea"></textarea>
                    <label for="keterangan">Keterangan</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s5">
                    <input name="harga_satuan" id="harga_satuan" type="number" />
                    <label for="harga_satuan">Harga Satuan</label> 
                </div>
                <div class="input-field col s5">
                    <input name="total_harga" id="total_harga" type="number" />
                    <label for="total_harga">Total Harga</label> 
                </div>

                <div class="input-field col s2">
                    <button class="btn waves-effect green waves-light" type="submit" >Submit <i class="material-icons right">send</i></button>
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
                        <th>Jenis</th>
                        <th>Merek</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th></th>
                    </tr>
                </thead>
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
</div>
<!-- content -->

<?php $this->load->view("acc/_partials/js"); ?>
</body>
</html>