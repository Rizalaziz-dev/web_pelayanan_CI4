<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pelayanan Terpadu | Kejari |</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image.png" href="<?= base_url('assets/theme/img/Favicon.png') ?>">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/fontawesome-free/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>/assets/front_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front_assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front_assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front_assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front_assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front_assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front_assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/assets/front_assets/css/style.css" rel="stylesheet">


</head>

<body>
  <?php echo view('_front/_layout/navmenu'); ?>

  <?= $this->renderSection('content') ?>

  <?php echo view('_front/_layout/footer'); ?>


  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/assets/front_assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>/assets/front_assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/assets/front_assets/js/main.js"></script>

</body>

</html>