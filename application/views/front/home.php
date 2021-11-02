<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="Sistem Pengaduan Masyarakat" name="description">
  <meta content="sipema" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/'); ?>fav.png" rel="icon">
  <link href="<?= base_url('assets/img/'); ?>fav.png" rel="sipema-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/front/'); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/front/'); ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/front/'); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/front/'); ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/front/'); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets/front/'); ?>assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/front/'); ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v2.3.1
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo"><a href="<?= base_url(); ?>">SiPeMa</a></h1>
      <nav class="nav-menu d-none d-lg-block">

        <ul>
          <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
          <li><a href="#faq">Tentang</a></li>

        </ul>

      </nav><!-- .nav-menu -->

      <a href="<?= base_url('login'); ?>" class="get-started-btn mr-1 ml-auto">Login</a>
      <a href="<?= base_url('register'); ?>" class="get-started-btn ml-0 mr-5">Register</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about mt-5" style="background-color: #d9232d;">
      <br>
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <h2>Sipema</h2>
            <h3>Sistem Pengaduan Masyarakat</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p style="color: white;">
              SiPeMa adalah website Layanan Aspirasi & Pengaduan Online Masyarakat, Sampaikan laporan anda langsung kepada instansi pemerintah berwenang
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Pengaduan</li>
              <li><i class="ri-check-double-line"></i> Aspirasi</li>
              <li><i class="ri-check-double-line"></i> Informasi</li>
            </ul>
            <p class="font-italic" style="color: white;">
              Cepat, Lengkap, dan Jelas.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>TANYA</h2>
          <p>TENTANG SIPEMA</p>
        </div>

        <div class="row faq-item d-flex align-items-stretch mt-0">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Apa Itu Sipema?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              SiPeMa - singkatan dari Sistem Pengaduan Masyarakat. adalah website Layanan Aspirasi dan Pengaduan Online Masyarakat
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" style="margin-top: -50px;">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Bagaimana Cara Membuat Laporan?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Anda bisa membuat akun terlebih dahulu, menu Lapor ada di Dashboard akun anda.
              <br><a href="<?= base_url('register'); ?>">Klik Disini</a> untuk membuat akun
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" style="margin-top: -50px;">
          <div class="col-lg-5">
            <i class="bx bx-help-circle"></i>
            <h4>Apa Yang Dilakukan Setelah Mengirim Laporan?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              Anda harus menunggu laporan anda diverifikasi oleh petugas, jika lolos verifikasi selanjutnya petugas akan menanggapi laporan anda.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container">
      <div class="copyright">
        <strong><span>SiPeMa</span></strong> - Sistem Pengaduan Masyarakat
      </div>
      <div class="credits">
        Oleh <a href="#">Farid Fatkhurrozak</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/front/'); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/front/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/front/'); ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/front/'); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/front/'); ?>assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url('assets/front/'); ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/front/'); ?>assets/js/main.js"></script>

</body>

</html>