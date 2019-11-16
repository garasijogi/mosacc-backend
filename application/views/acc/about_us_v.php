<!DOCTYPE html>
<html lang="en">

<head>
    <!-- head -->
    <?php $this->load->view("acc/_partials/head"); ?>
    <!-- /head -->
</head>

<body style="overflow-x: hidden">
    <!-- Sidebar -->
    <div class="wrapper">
        <?php $this->load->view("acc/_partials/sidebar"); ?>
    </div>
    <!-- /Sidebar -->

    <div class="navbar">
        <nav id="navigation" style="box-shadow: none; background: transparent;">
            <div class="nav-wrapper">

                <ul id="more_DD" class="dropdown-content" style='position: absolute'>
                    <li><a href="#" class="">About</a></li>
                    <li><a href="<?php echo base_url('login/log_out') ?>" class="">Log Out</a></li>
                    <li><a href="<?php echo base_url('acc/dashboard/exit_mosacc'); ?>">Exit Mosacc</a></li>
                </ul>

                <a href="<?php echo base_url('acc/dashboard'); ?>" class="brand-logo">Mosacc</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="<?php echo base_url('acc/profil'); ?>"><?php echo $this->session->userdata('nama_masjid'); ?></a></li>
                    <li><a class=" more-vert dropdown-trigger bold-font center" href="#" data-target="more_DD"><I class="material-icons">more_vert</I></a></li>
                    </li>
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
        <p>Kami adalah mahasiswa UIN Syarif Hidayatullah Jakarta
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
                        <span>SCOPE</span> atau Sharing Community for Optimizing People’s Economy adalah sebuah komunitas yang terbentuk atas kesadaran untuk melakukan pengabdian ditengah masyarakat, khususnya dilingkungan UIN Syarif Hidayatullah Jakarta.
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
                <div class="contact-card-value">0895 1729 9064</div>
                <div class="contact-card-description">Mengalami masalah dengan aplikasi? Kami siap melayani lebih dekat.
                </div>
            </div>
            <div class="contact-card">
                <div class="contact-card-icon">
                    <img src="<?php echo base_url('assets/images/logo/chat.svg') ?>" alt="Call Icon">
                </div>
                <div class="contact-card-head">MESSAGE</div>
                <div class="contact-card-value">0895 1729 9064</div>
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
    <?php $this->load->view("acc/_partials/js"); ?>
    <!-- /Javascript -->
    <script src="js/index.js"></script>

</body>

</html>