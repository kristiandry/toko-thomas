<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Toko Thomas</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Masuk ke akun anda</h5>
                    <p class="text-center small">Masukan Id Kasir & password untuk login</p>
                  </div>

                  <form class="row g-3 needs-validation" action="<?=site_url('auth/process')?>" method="POST">

                    <div class="col-12">
                      <label class="form-label">Id Kasir</label>
                      <div class="input-group has-validation">
                        <input type="text" name="IdKasir" class="form-control">
                        <div class="invalid-feedback">Silahkan masukan Id Kasir anda!</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                      <div class="invalid-feedback">Silahkan masukan password anda!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
              Designed by <a href="https://www.instagram.com/kristiandry/">
                  <i class="bx bxl-instagram-alt"></i>Kristiandry</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="<?=base_url('assets/js/sweetalerts.js') ?>"></script>

<?php
if($this->session->flashdata('error')){
  ?>
  <script>
    Swal.fire({
      icon:'warning',
      title:"<?= $this->session->flashdata('error') ?>",
      timer:3500
    })
  </script>
  <?php } ?>
</body>

</html>