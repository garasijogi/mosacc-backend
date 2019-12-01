<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("mgr/_partials/head"); ?>
    <!-- /head -->
</head>

<body>
    <div class="container-fluid">
        <?php $this->load->view("mgr/_partials/sidebar"); ?>
    </div>

    <div>
        <!-- navbar&&sidebar -->

        <?php $this->load->view("mgr/_partials/navbar"); ?>
        <!-- /navbar&&sidebar -->
    </div>

    <!-- preloader -->
    <?php $this->load->view('mgr/_partials/preloader.php') ?>
    <!-- preloader -->

    <div class="content">

        <div class="row">
            <div class="col s12 m1"></div>
            <div class="col s12 m3">
                <div class="card">
                    <a href="<?php echo base_url('mgr/laporan_keuangan/laporan_neraca'); ?>">
                        <div class="card-image">
                            <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-laporan-posisi-keuangan.png'); ?>" width="200" height="300">
                            <span class="card-title card-title-text">Posisi Keuangan (Neraca)</span>
                        </div>
                        <div class="card-content">
                            <p>Laporan keuangan yang menyediakan informasi mengenai aset, kewajiban (liability), dan modal (equity) perusahaan pada periode tertentu.</p>

                            <div id="rutin1" class="modal">
                                <div class="modal-content">
                                    <h4>Posisi Keuangan (Neraca)</h4>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <a href="<?php echo base_url('mgr/laporan_keuangan/laporan_aktivitas?bulan=' . date('m') . '&&tampilan=bulanan'); ?>">
                        <div class="card-image">
                            <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-laporan-aktivitas.png'); ?>" width="200" height="300">
                            <span class="card-title card-title-text">Laporan Aktivitas</span>
                        </div>
                        <div class="card-content">
                            <p>Laporan yang menyediakan informasi pengaruh transaksi perubahan jumlah, sifat aktiva bersih, hubungan antar transaksi, serta penggunaan sumber daya.</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col s12 m3">
                <div class="card">
                    <a href="<?php echo base_url('mgr/laporan_keuangan/laporan_arus_kas'); ?>">
                        <div class="card-image">
                            <img src="<?php echo site_url('assets/images/laporan_keuangan/ilustrasi-laporan-arus-kas.png'); ?>" width="200" height="300">
                            <span class="card-title card-title-text">Arus Kas</span>
                        </div>
                        <div class="card-content">
                            <p>Laporan yang menyediakan informasi pada suatu periode akuntansi yang menunjukkan aliran masuk dan keluar uang (kas) perusahaan..</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view("mgr/_partials/js"); ?>
</body>