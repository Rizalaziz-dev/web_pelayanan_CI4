<?php
$session = \Config\Services::session() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Pelayanan Terpadu | Kejari | </title>

    <!-- favicon -->
    <link rel="icon" type="image.png" href="<?= base_url('assets/theme/img/Favicon.png') ?>">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/theme/css/adminlte.min.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/node_modules/sweetalert2/dist/sweetalert2.min.css">

    <script src="<?= base_url() ?>/assets/theme/plugins/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/theme/plugins/jquery/jquery.min.js"></script>

    <!-- Pusher -->
    <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php echo view('_back/_layout/navbar'); ?>

        <?=
        $akses = $session->get('nama_level');
        if ($akses == 'Pidsus') {
            echo view('_back/_layout/sidebar_tipikor');
        } else {
            echo view('_back/_layout/sidebar_admin');
        }
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>


            <?= $this->renderSection('content') ?>

        </div>





        <?php echo view('_back/_layout/footer'); ?>

    </div>


    <!-- REQUIRED SCRIPTS -->


    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?= base_url() ?>/assets/theme/js/adminlte.js"></script>

    <script>
        Pusher.logToConsole = true;
        var pusher = new Pusher('f00b9630960e06cbb49c', {
            cluster: 'ap1',
            forceTLS: true
        });

        var chanel = pusher.subscribe('my-chanel');
        chanel.bind('my-event', function(data) {
            if (data.message_user === 'success') {
                data_user();
            }
            if (data.message_tipikor === 'success') {
                data_tipikor();
            }
            if (data.message_wbs === 'success') {
                data_wbs();
            }
            if (data.message_yankum === 'success') {
                data_yankum();
            }
        });
    </script>



</body>

</html>