<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pelayanan Terpadu | Kejari |</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" type="image.png" href="<?= base_url('assets/img/Favicon.png') ?>">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/fontawesome-free/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>/assets/front/theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front/theme/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front/theme/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front/theme/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front/theme/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front/theme/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/front/theme/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/assets/front/theme/css/style.css" rel="stylesheet">

  <!-- Sweet Alert -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/sweetalert2/dist/sweetalert2.min.css">

  <script src="<?= base_url() ?>/assets/plugins/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

  <!-- jquery -->
  <script src="<?= base_url() ?>/assets/plugins/node_modules/jquery/jquery.min.js"></script>

  <!-- Datepicker -->
  <script src="<?= base_url() ?>/assets/plugins/node_modules/bootstrap-datepicker/bootstrap-datepicker.js"></script>

  <link href="<?= base_url() ?>/assets/plugins/node_modules/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">

  <!-- G-recaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
  </script>

  <!-- Datatables -->
  <!-- Datatables -->
  <script src="<?= base_url() ?>/assets/plugins/node_modules/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"> -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/DataTables-1.11.0/css/jquery.dataTables.min.css">

  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css"> -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/Buttons-2.0.0/css/buttons.dataTables.min.css">



</head>

<body>
  <?php echo view('_front/_layout/navmenu'); ?>

  <?= $this->renderSection('content') ?>

  <?php echo view('_front/_layout/footer'); ?>


  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/assets/front/theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>/assets/front/theme/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/assets/front/theme/js/main.js"></script>

</body>

</html>