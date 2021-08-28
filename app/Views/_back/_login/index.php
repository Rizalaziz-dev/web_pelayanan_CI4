<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pelayanan Terpadu | Kejari</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="icon" type="image.png" href="<?= base_url('assets/img/Favicon.png') ?>">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/fontawesome-free/css/all.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/node_modules/toastr/toastr.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/back/theme/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <!--a href="../../index2.html"><b>Admin</b>LTE</a-->
            <a href="../../index2.html"><img src="<?= base_url('assets/img/logo.png') ?>" /></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>


                <?= form_open('Back/Login/check_login', ['class' => 'form-login']) ?>

                <?= csrf_field(); ?>
                <div class="input-group mb-3">
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback errorUsername"></div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="invalid-feedback errorPassword"></div>
                </div>

                <div class="social-auth-links text-center mb-3">

                    <button class="btn btn-block btn-primary btn-login " type="submit"><i class="fa fa-user mr-2"></i> Login</button>

                </div>

                <?= form_close() ?>
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                        <a href="forgot-password.html">I forgot my password</a>
                    </p> -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/plugins/node_modules/jQuery-3.3.1/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/back/theme/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Validator -->
    <script src="<?= base_url('assets/back/theme/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script src="<?= base_url('assets/back/theme/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
    <!-- Toaster -->
    <script src="<?= base_url('assets/back/theme/plugins/toastr/toastr.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/back/theme/js/adminlte.min.js') ?>"></script>
    <!-- Login script -->

    <script>
        $(document).ready(function() {
            Login();
        });

        function Login() {
            $('.form-login').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btn-login').attr('disable', 'disabled');
                        $('.btn-login').html('<i class="fa fa-spin fa-spinner"></i>');
                    },
                    complete: function() {
                        $('.btn-login').removeAttr('disable');
                        $('.btn-login').html('<i class="fa fa-user mr-2"></i> Login');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.user_name) {
                                $('#user_name').addClass('is-invalid')
                                $('.errorUsername').html(response.error.user_name);
                            } else {
                                $('#user_name').removeClass('is-invalid')
                                $('.errorUsername').html('');
                            }
                            if (response.error.password) {
                                $('#password').addClass('is-invalid')
                                $('.errorPassword').html(response.error.password);
                            } else {
                                $('#password').removeClass('is-invalid')
                                $('.errorPassword').html('');
                            }
                        }
                        if (response.success) {
                            window.location = response.success.link;
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        }
    </script>

</body>

</html>