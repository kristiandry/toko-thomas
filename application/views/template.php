<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Toko Thomas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/boxicons/css/boxicons.min.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/quill/quill.snow.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/quill/quill.bubble.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/remixicon/remixicon.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/simple-datatables/style.css')?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Toko Thomas</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?=base_url('assets/img/profile-img.jpg')?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?=$this->session->userdata('namaKasir') ?> </span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?=$this->session->userdata('namaKasir') ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('profile') ?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= site_url('auth/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('dashboard') ?>">
          <i class="bx bxs-category"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-cart-alt"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo site_url('penjualan') ?>">
              <i class="bi bi-circle"></i><span>Penjualan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('laporan') ?>">
              <i class="bi bi-circle"></i><span>Laporan Penjualan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Transaksi Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#barang-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-archive"></i><span>Data Barang</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <i class="fa-solid fa-box-archive"></i>
        <ul id="barang-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo site_url('stok') ?>">
              <i class="bi bi-circle"></i><span>Stok</span>
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('barang/tambah') ?>">
              <i class="bi bi-circle"></i><span>Tambah Barang</span>
            </a>
          </li>
        </ul>
      </li><!-- End Data Barang Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo site_url('profile') ?>">
          <i class="bx bxs-user"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
      <?php echo $contents ?>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Kristiandry</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://www.instagram.com/kristiandry/">
        <i class="bx bxl-instagram-alt"></i>Kristiandry</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url('assets/vendor/apexcharts/apexcharts.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/chart.js/chart.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/echarts/echarts.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/quill/quill.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/simple-datatables/simple-datatables.js')?>"></script>
  <script src="<?=base_url('assets/vendor/tinymce/tinymce.min.js')?>"></script>
  <script src="<?=base_url('assets/vendor/php-email-form/validate.js')?>"></script>
  <script src="<?=base_url('assets/js/sweetalert.js') ?>"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url('assets/js/main.js')?>"></script>

</body>

</html>