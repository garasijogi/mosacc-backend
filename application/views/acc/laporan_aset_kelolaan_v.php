<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php $this->load->view("acc/_partials/head"); ?>
<!-- /head -->

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
        <div class="sticky">
            <div class="row center">
                <h5><b>Laporan Aset Kelolaan</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>
        <div class="row">

            <h6 class="center"><b>Masjid Al-Ishlah <br> Laporan Perubahan Aset Kelolaan <br> Tanggal 31 Desember 2018 dan 2019</b></h6>
            <table>
                <tr>
                    <th colspan="2">Keterangan</th>
                    <th>Saldo Awal</th>
                    <th>Penambahan</th>
                    <th>Pengurangan</th>
                    <th>Akm. Penyusutan</th>
                    <th>Akm. Penyisihan</th>
                    <th>Saldo Akhir</th>
                </tr>
                <tr>
                    <td colspan="8"><b>Dana Tidak Terikat</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td>PAUD Juara</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Laptop</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Wakaf Tanah</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Wakaf Motor</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                </tr>
                <tr>
                    <td colspan="8"><b>Dana Infaq Tidak Terikat</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Laptopr</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Motor</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                    <td class="right-align">-</td>
                    <td class="right-align">Rp. XXX,-</td>
                </tr>
                <tr>
                    <td colspan="2"><b>Jumlah</b></td>
                    <td class="right-align"><b>Rp. XXX,-</b></td>
                    <td class="right-align"><b>Rp. XXX,-</b></td>
                    <td class="right-align"><b>-</b></td>
                    <td class="right-align"><b>Rp. XXX,-</b></td>
                    <td class="right-align"><b>-</b></td>
                    <td class="right-align"><b>Rp. XXX,-</b></td>
                </tr>

            </table>
        </div>
    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>