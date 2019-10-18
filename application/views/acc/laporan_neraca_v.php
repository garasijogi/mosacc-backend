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
                <h5><b>Laporan Posisi Keuangan (Neraca)</b></h5>
            </div>
            <!-- laporan nav -->
            <?php $this->load->view('acc/_partials/laporan-nav.php'); ?>
            <!-- laporan nav -->
        </div>
        <div class="row">

            <h6 class="center"><b>Masjid Al-Ishlah <br> Neraca <br> Tanggal 31 Desember 2018 dan 2019</b></h6>
            <table>
                <tr>
                    <th colspan="5"></th>
                    <th>2018</th>
                    <th>2019</th>
                </tr>
                <tr>
                    <td colspan="7"><b>Aset Lancar</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Kas</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Bank</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Surat Berharga</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Piutang Usaha</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Piutang Pinjaman Anggota</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Piutang Pinjaman Non-Anggota</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Penyisihan Piutang Tak Tertagih</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Persediaan</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Beban dibayar di muka</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Pendapatan akan diterima</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Aset lancar lainnya</td>
                    <td>Rp. XXX,-</td>
                    <td>Rp. XXX,-</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- content -->

    <?php $this->load->view("acc/_partials/js"); ?>
</body>

</html>