<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Sistem Informasi AK1</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets_front') ?>/img/logo.png" rel="icon">
    <link href="<?= base_url('assets_front') ?>/img/logo.png" rel="apple-touch-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets_front') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets_front') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets_front') ?>/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Personal - v4.7.0
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">


            <?php if (session()->getFlashdata('error')) : ?>
                <div class="flash-data" data-flashdata_error="<?= session()->getFlashdata('error') ?>"></div>
            <?php elseif (session()->getFlashdata('sukses')) :  ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('sukses') ?>"></div>
            <?php endif; ?>



            <h1><a href="index.html"><img src="<?= base_url('assets_front') ?>/img/logo.png" alt="" width="100" class="img-fluid">Sistem Informasi AK1</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="mr-auto"></a> -->
            <h2> <span>Dinas Tenaga Kerja dan Transmigrasi Kabupaten Pesisir Selatan</span> </h2>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link active" href="#header">Home</a></li>
                    <li><a class="nav-link" href="#about">Tentang AK1</a></li>
                    <li><a class="nav-link" href="#registrasi">Registrasi Akun</a></li>
                    <li><a class="nav-link" href="#login">Login</a></li>
                    <li><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <!-- <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> -->

        </div>
    </header><!-- End Header -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <?= $this->include('template_front/V_tentang') ?>

    </section><!-- End About Section -->

    <!-- ======= Resume Section ======= -->
    <section id="registrasi" class="resume">
        <?= $this->include('template_front/V_registrasi') ?>

    </section><!-- End Resume Section -->

    <!-- ======= Services Section ======= -->
    <section id="login" class="services">
        <?= $this->include('template_front/V_login') ?>
    </section><!-- End Services Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <?= $this->include('template_front/V_kontak') ?>
    </section><!-- End Contact Section -->

    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>


    <!-- jQuery -->
    <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url('assets_front') ?>/myscript.js"></script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets_front') ?>/vendor/purecounter/purecounter.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('assets_front') ?>/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets_front') ?>/js/main.js"></script>

</body>

</html>