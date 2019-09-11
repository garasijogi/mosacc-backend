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

        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input disabled id="kd_akun" type="text" value="<?php echo $kd_akun;?>" />
                    <label for="kd_akun">Kode Akun</label> 
                </div>
                <div class="input-field col s6">
                    <input id="tanggal" type="text" />
                    <label for="tanggal">Tanggal</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <input id="jenis" type="text" />
                    <label for="jenis">Jenis</label> 
                </div>
                <div class="input-field col s4">
                    <input id="merek" type="text" />
                    <label for="merek">Merek</label> 
                </div>
                <div class="input-field col s4">
                    <input id="nomor_seri" type="text" />
                    <label for="nomor_seri">Nomor Seri</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input id="jumlah" type="text" />
                    <label for="jumlah">Jumlah</label> 
                </div>
                <div class="input-field col s6">
                    <input id="keterangan" type="text" />
                    <label for="keterangan">Keterangan</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s5">
                    <input id="harga_satuan" type="text" />
                    <label for="harga_satuan">Harga Satuan</label> 
                </div>
                <div class="input-field col s5">
                    <input id="total_harga" type="text" />
                    <label for="total_harga">Total Harga</label> 
                </div>

                <div class="input-field col s2">
                    <button class="btn waves-effect green waves-light" type="submit" name="action">Submit <i class="material-icons right">send</i></button>
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