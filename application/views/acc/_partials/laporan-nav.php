<br>
<div class="row">
    <div class="divider black"></div>
</div>
<div class="row">
    <nav class="no-shadows" id="laporan-nav">
        <div class="nav-wrapper white">
            <ul class="left hide-on-med-and-down">
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
            <ul id="bulan_DD" class="dropdown-content">
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=1"); ?>">Januari</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=2"); ?>">Februari</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=3"); ?>">Maret</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=4"); ?>">April</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=5"); ?>">Mei</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=6"); ?>">Juni</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=7"); ?>">Juli</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=8"); ?>">Agustus</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=9"); ?>">September</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=10"); ?>">Oktober</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=11"); ?>">November</a></li>
                <li><a href="<?php echo base_url('acc/' . $this->router->fetch_class() . "/" . $this->router->fetch_method() . "?bulan=12"); ?>">Desember</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="divider black"></div>