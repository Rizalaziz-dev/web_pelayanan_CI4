<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelayanan Terpadu | Kejari</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="icon" type="image.png" href="<?= base_url('assets/theme/img/Favicon.png') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/theme/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Toaster -->
    <link rel="stylesheet" href="<?= base_url('assets/theme/plugins/toastr/toastr.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/theme/css/adminlte.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <!--a href="../../index2.html"><b>Admin</b>LTE</a-->
            <a href="../../index2.html"><img src="<?= base_url('assets/theme/img/logo.png') ?>" /></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="loginForm">
                    <div class="input-group mb-3">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">

                    <a id="btnLogin" href="javascript:void(0)" class="btn btn-block btn-primary" onclick="$('#loginForm').submit();">
                        <i class="fa fa-user mr-2"></i> Login
                    </a>

                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/theme/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Validator -->
    <script src="<?= base_url('assets/theme/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/theme/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
    <!-- Toaster -->
    <script src="<?= base_url('assets/theme/plugins/toastr/toastr.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/theme/js/adminlte.min.js') ?>"></script>
    <!-- Login script -->
    <script>
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <script src="<?= base_url('assets/js_app/login.js') ?>"></script>
</body>

</html>