<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>
<?php
$session = \Config\Services::session() ?>

<div class="row justify-content-center">
    <div class="col-xl-7 col-lg-9 text-center">
        <h1>Selamat Datang</h1>
        <h2><?= $session->get('user_fullname'); ?></h2>
        <h3>Kejaksaan Negeri Kabupaten Tasikmalaya</h3>
    </div>
</div>
<?= $this->endsection(); ?>