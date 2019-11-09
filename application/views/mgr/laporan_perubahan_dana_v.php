<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("mgr/_partials/head"); ?>
<!-- /head -->

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

    <!-- content -->
    <div class="container">
        <div class="sticky">
            <div class="row center">
                <h5><b>Laporan Perubahan Dana</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('mgr/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>
        <div class="row" id="printed">

            <h6 class="center"><b>Masjid Al-Ishlah <br> Laporan Perubahan Dana <br> Tanggal 31 Desember 2018 dan 2019</b></h6>
            <table>
                <tr>
                    <th colspan="5"></th>
                    <th>2018</th>
                    <th>2019</th>
                </tr>
                <tr>
                    <td colspan="7"><b>Dana Zakat</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b>Penerimaan</b></td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="6"><b>Penyaluran</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="3">Program Kesehatan</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="3">Program Pendidikan</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="3">Program Pemberdayaan Ekonomi</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="3">Fisabilillah</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="3">Amilin</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="3">Penyaluran Non-Cash</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b>Jumlah Penyaluran</b></td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>

            </table>
        </div>
    </div>
    <!-- content -->

    <?php $this->load->view("mgr/_partials/js"); ?>
</body>

</html>