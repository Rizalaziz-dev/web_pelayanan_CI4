<?php
$session = \Config\Services::session() ?>

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <!-- <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li> -->
        </ul>

        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">Akun</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item ">
                        <img src="<?= base_url('/assets/img/profile.jpg'); ?>" class="img-circle mr-3" width="30" height="30"> <?= $session->get('user_fullname'); ?>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?php echo site_url('Back/Login/out') ?>" class="dropdown-item dropdown-footer">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>


                </div>
            </li>

        </ul>


</div>