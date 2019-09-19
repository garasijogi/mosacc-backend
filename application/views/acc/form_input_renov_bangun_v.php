<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head");?>
    <!-- /head -->
</head>

<body>

<div class="wrapper">
    <?php $this->load->view("acc/_partials/sidebar"); ?>
</div>

    <div>
        <!-- navbar&&sidebar -->
        
        <?php $this->load->view("acc/_partials/navbar"); ?>
        <!-- /navbar&&sidebar -->
    </div>
    
<section class="container">
    <div class="row">
        <form action="<?php echo base_url('acc/form_input_renov_bangun/proses'); ?>" method="POST" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input name="kd_akun" readonly id="kd_akun" type="text" value="<?php echo $kd_akun;?>" />
                    <label for="kd_akun">Kode Akun</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input name="tanggal" id="tanggal" type="text" class="datepicker"/>
                    <label for="tanggal">Tanggal</label> 
                </div>
                <div class="input-field col s6">
                    <input name="nominal" id="jumlah" type="number" />
                    <label for="nominal">Nominal</label> 
                </div>
            </div>

            <div class="row">
                <div class="input-field col s10">
                    <textarea name="keterangan" id="keterangan" type="text" class="materialize-textarea"></textarea>
                    <label for="keterangan">Keterangan</label> 
                </div>

                <div class="input-field col s2">
                    <button class="btn waves-effect green waves-light" type="submit" >Submit <i class="material-icons right">send</i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col s12">
            <table id="view_data" class="display" style="width: 100%" >
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
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
                        <td><?php echo $col->nominal; ?></td>
                        <td></td>
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
                	</tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>

<!-- Javascript -->
<?php $this->load->view("acc/_partials/js"); ?>
<!-- /Javascript -->

</body>

</html>
