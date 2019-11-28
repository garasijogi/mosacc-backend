<br>
<div class="row">
    <div class="divider black"></div>
</div>
<div class="row">
    <nav class="no-shadows" id="laporan-nav">
        <div class="nav-wrapper white">
            <ul class="left hide-on-med-and-down">
                <?php if ($this->router->fetch_method() != "buku_besar" && $this->router->fetch_method() != "jurnal_umum" && $this->router->fetch_method() != "neraca_saldo") : ?>
                    <li><a class="black-text dropdown-trigger" href="#!" data-target="tampilan_DD">Tampilan<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php endif; ?>
                <li><a class="black-text dropdown-trigger" href="#!" data-target="tahun_DD">Tahun<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php if (($this->router->fetch_class()) != 'buku_besar_utama') : ?>
                    <li><a class="black-text dropdown-trigger" href="#!" data-target="bulan_DD">Bulan<i class="material-icons right">arrow_drop_down</i></a></li>
                <?php endif; ?>
                <li><a id="print-button" class="black-text" href="#"><i class="material-icons left">picture_as_pdf</i>Simpan PDF/Print</a></li>
                <?php if ($this->router->fetch_method() != "buku_besar") : ?>
                    <li><a id="export-excel" class="black-text" href="#!"><i class="material-icons left">insert_drive_file</i>Simpan Excel</a></li>
                <?php endif; ?>
            </ul>
            <ul id="tahun_DD" class="dropdown-content">
                <?php foreach ($year_list->result() as $yl) : ?>
                    <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . '/change_year?cu=' . base_url(uri_string())) . '&&tahun=' . $yl->id_db; ?>"><?php echo $yl->id_db; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <ul id="tampilan_DD" class="dropdown-content">
                <?php foreach ($year_list->result() as $yl) : ?>
                    <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=12&&tampilan=tahunan"); ?>">Tahunan</a></li>
                    <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=" . date('m') . "&&tampilan=bulanan"); ?>">Bulanan</a></li>
                <?php endforeach; ?>
            </ul>
            <ul id="bulan_DD" class="dropdown-content">
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=1&&tampilan=bulanan"); ?>">Januari</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=2&&tampilan=bulanan"); ?>">Februari</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=3&&tampilan=bulanan"); ?>">Maret</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=4&&tampilan=bulanan"); ?>">April</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=5&&tampilan=bulanan"); ?>">Mei</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=6&&tampilan=bulanan"); ?>">Juni</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=7&&tampilan=bulanan"); ?>">Juli</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=8&&tampilan=bulanan"); ?>">Agustus</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=9&&tampilan=bulanan"); ?>">September</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=10&&tampilan=bulanan"); ?>">Oktober</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=11&&tampilan=bulanan"); ?>">November</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=12&&tampilan=bulanan"); ?>">Desember</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="divider black"></div>