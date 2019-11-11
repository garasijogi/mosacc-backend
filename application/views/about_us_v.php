<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("_partials/head"); ?>
    <!-- /head -->
</head>

<body style="overflow-x: hidden">

    <div class="navbar">
        <nav id="navigation" style="box-shadow: none; background: transparent;">
            <div class="nav-wrapper">
                <img class="logo-homepage" src="<?php echo base_url('assets/images/icon/mosacc-logo.svg'); ?>" width="50px" height="50px" alt="">
                <a href="<?php echo base_url('homepage'); ?>" class="brand-logo">Mosacc</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down flex-display">
                    <a href="<?php echo base_url('homepage'); ?>">
                        <li>Login</li>
                    </a>
                    <li>About</li>
                </ul>
            </div>
        </nav>
    </div>

    <section id="jumbotron">
        <div class="jumbotron-background"></div>
        <h1>We Work in the <span>Dark</span> <br> to Serve the <span>Light</span></h1>
        <img src="<?php echo base_url('assets/images/ilustrations/work chat.svg') ?>" alt="Work People">
    </section>

    <section id="about">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ullam quod omnis nam consequuntur fuga? Animi
            quisquam ex laboriosam recusandae exercitationem veniam facilis eligendi? Adipisci illum eaque saepe quo a!
        </p>
        <div class="about-content">
            <div class="about-content-img">
                <img src="<?php echo base_url('assets/images/ilustrations/team.svg') ?>" alt="Team Ilustration">
            </div>
            <div class="about-content-description">
                <div class="about-content-description-head">
                    <h3><span>garasijogi</span></h3>
                </div>
                <div class="about-content-description-body">
                    <p>
                        <span>garasijogi</span> adalah sebuah komunitas yang terdiri dari mahasiswa-mahasiswa
                        Universitas Islam Negeri Jakarta jurusan Sistem Informasi yang bergerak di bidang
                        pengembangan perangkat lunak.
                    </p>
                </div>
                <div class="about-content-description-head">
                    <h4><span>Accounting Team</span></h4>
                </div>
                <div class="about-content-description-body">
                    <p>
                        <span>Accounting Team</span> adalah mahasiswa-mahasiswi Universitas Islam Negeri Jakarta jurusan
                        akuntansi. Tim inilah yang menyusun segala aturan tentang pencatatan keuangan berdasarkan PSAK
                        45.
                    </p>
                </div>
                <div class="about-content-description-head">
                    <h4><span>SCOPE</span></h4>
                </div>
                <div class="about-content-description-body">
                    <p>
                        <span>SCOPE</span> adalah gua gatau gua gatau gua gatau gua gatau gua gatau gua gatau gua gatau
                        gua gatau gua gatau gua gatau gua gatau gua gatau gua gatau gua gatau gua gatau gua gatau gua
                        gatau gua gatau gua gatau gua gatau
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <h2>Need a Help? Tell Us!</h2>
        <p>Hubungi kami apabila anda membutuhkan bantuan terkait aplikasi ini ataupun hal lain yang berhubungan kami.
        </p>
        <div class="contact-cards-wrapper">
            <div class="contact-card">
                <div class="contact-card-icon">
                    <img src="<?php echo base_url('assets/images/logo/gmail.svg') ?>" alt="Gmail Icon">
                </div>
                <div class="contact-card-head">GMAIL</div>
                <div class="contact-card-value">jogigarasi@gmail.com</div>
                <div class="contact-card-description">Hubungi kami melalui E-Mail untuk kebutuhan formal.</div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon">
                    <img src="<?php echo base_url('assets/images/logo/whatsapp.svg') ?>" alt="WhatsApp Icon">
                </div>
                <div class="contact-card-head">WHATSAPP</div>
                <div class="contact-card-value">0812 3456 7890</div>
                <div class="contact-card-description">Mengalami masalah dengan aplikasi? Kami siap melayani lebih dekat.
                </div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon">
                    <img src="<?php echo base_url('assets/images/logo/chat.svg') ?>" alt="Call Icon">
                </div>
                <div class="contact-card-head">MESSAGE</div>
                <div class="contact-card-value">0812 3456 7890</div>
                <div class="contact-card-description">Tentu saja cara tradisional juga tersedia untuk memudahkan anda.
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="row">
            <div class="col s12 valign-wrapper sponsored-icon">
                <img src="<?php echo base_url('assets/images/icon/uin-icon3.png'); ?>" alt="icon-uin" width="140px" height="80px">
                <img src="<?php echo base_url('assets/images/icon/scope_logo.png'); ?>" alt="icon-scope" width="140px" height="50px">
            </div>
            <a target="_blank" href="https://www.instagram.com/garasi_jogi">
                <img src="<?php echo base_url('assets/images/logo/instagram.svg') ?>" class="svg" alt="Instagram Icon">
            </a>
            <a target="_blank" href="https://www.github.com/garasijogi">
                <img src="<?php echo base_url('assets/images/logo/github.svg') ?>" class="svg" alt="GitHub Icon">
            </a>
            <a target="_blank" href="https://www.linkedin.com/company/garasijogi">
                <img src="<?php echo base_url('assets/images/logo/linkedin.svg') ?>" class="svg" alt="LinkedIn Icon">
            </a>
            <p>&copy; Copyright 2019 | All Right Reserved</p>
    </footer>


    <!-- Javascript -->
    <?php $this->load->view("_partials/js"); ?>
    <!-- /Javascript -->
    <script src="js/index.js"></script>

</body>

</html>