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

  <!-- Sweet Alert -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/node_modules/sweetalert2/dist/sweetalert2.min.css">

  <script src="<?= base_url() ?>/assets/theme/plugins/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- jquery -->
  <script src="<?= base_url() ?>/assets/front_assets/vendor/jquery/jquery.min.js"></script>

  <!-- Datepicker -->
  <script src="<?= base_url() ?>/assets/theme/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

  <link href="<?= base_url() ?>/assets/theme/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">

  <!-- G-recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
  </script>

  <!-- Datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">



</head>

<body>
  <?php echo view('_front/_layout/navmenu'); ?>

  <?= $this->renderSection('content') ?>

  <?php echo view('_front/_layout/footer'); ?>


  <!-- Vendor JS Files -->
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