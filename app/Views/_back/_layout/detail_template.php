<?php
$session = \Config\Services::session() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Details <?= $tittle; ?> </title>

    <!-- favicon -->
    <link rel="icon" type="image.png" href="<?= base_url('assets/img/Favicon.png') ?>">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/fontawesome-free/css/all.min.css">

    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/back/theme/css/adminlte.min.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/bootstrap/css/bootstrap.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/toastr/toastr.min.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/sweetalert2/dist/sweetalert2.min.css">

    <script src="<?= base_url() ?>/assets/plugins/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>



    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/node_modules/jquery/jquery.min.js"></script>
    <!-- <script src="<?= base_url() ?>/assets/plugins/node_modules/jQuery-3.3.1/jquery-3.3.1.min.js"></script> -->

    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/toastr/toastr.min.css">

    <!-- Pusher -->
    <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>

    <!-- G-recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Datatables -->
    <script src="<?= base_url() ?>/assets/plugins/node_modules/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/DataTables-1.11.0/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/Buttons-2.0.0/css/buttons.dataTables.min.css">





</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <?php
        $akses = $session->get('nama_level');
        if ($akses == 'Admin') {
            echo view('_back/_layout/sidebar_admin');
        } else if ($akses == 'Pidsus') {
            echo view('_back/_layout/sidebar_tipikor');
        } else if ($akses == 'Pembinaan') {
            echo view('_back/_layout/sidebar_wbs');
        } else if ($akses == 'Datun') {
            echo view('_back/_layout/sidebar_yankum');
        } else if ($akses == 'Kepala') {
            echo view('_back/_layout/sidebar_kepala');
        } else if ($akses == 'Pidum') {
            echo view('_back/_layout/sidebar_sitara');
        }
        ?>


        <?php echo view('_back/_layout/footer'); ?>

    </div>


    <!-- REQUIRED SCRIPTS -->


    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/assets/plugins/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE -->
    <script src="<?= base_url() ?>/assets/back/theme/js/adminlte.js"></script>


    <!-- Button -->
    <script src="<?= base_url() ?>/assets/plugins/node_modules/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script> -->

    <!-- <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script> -->

    <script src="<?= base_url() ?>/assets/plugins/node_modules/JSZip-2.5.0/jszip.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->

    <script src="<?= base_url() ?>/assets/plugins/node_modules/pdfmake-0.1.36/pdfmake.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->

    <script src="<?= base_url() ?>/assets/plugins/node_modules/pdfmake-0.1.36/vfs_fonts.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->

    <script src="<?= base_url() ?>/assets/plugins/node_modules/Buttons-2.0.0/js/buttons.html5.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script> -->

    <script src="<?= base_url() ?>/assets/plugins/node_modules/Buttons-2.0.0/js/buttons.print.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script> -->

    <script src="<?= base_url() ?>/assets/plugins/node_modules/Buttons-2.0.0/js/buttons.colVis.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script> -->



</body>

</html>