<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<?php
$session = \Config\Services::session() ?>
<div class="content">
    <div class="col-sm-12">
        <div class="row">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 id="show-dataSuspect"></h3>

                        <p>Data Tersangka</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsPengaduan');
                                } else {
                                    echo site_url('Back/Sitaraa/Suspect');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>




            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="show-dataPrePro"></h3>

                        <p>Data Pra Penuntutan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsDiproses');
                                } else {
                                    echo site_url('Back/Sitaraa/PreProsecution');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-12 ">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="show-dataPro"></h3>

                        <p>Data Tersangka Penuntutan</p>
                    </div>
                    <div class="icon">
                        <i class="far fas fa-balance-scale"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsSelesai');
                                } else {
                                    echo site_url('Back/Sitaraa/Prosecution');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-12">
        <div class="row">

            <div class="col-lg-3 col-12 ">
                <!-- small box -->
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3 id="show-dataExecution"></h3>

                        <p>Data Tersangka Eksekusi</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-user"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsSelesai');
                                } else {
                                    echo site_url('Back/Sitaraa/execution');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-12 ">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3 id="show-done"></h3>

                        <p>Data Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsSelesai');
                                } else {
                                    echo site_url('Back/Sitaraa/');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        dataSuspect();
        dataPrePro();
        dataPro();
        dataExecution();
        done();


    });

    function dataSuspect() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Sitaraa/Dashboard/count_dataTersangka') ?>",
            dataType: "json",
            success: function(response) {
                $('#show-dataSuspect').text(response.success);
                console.log(response.success);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    }

    function dataPrePro() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Sitaraa/Dashboard/count_dataPraPenuntutan') ?>",
            dataType: "json",
            success: function(response) {
                $('#show-dataPrePro').text(response.success);
                console.log(response.success);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    }

    function dataPro() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Sitaraa/Dashboard/count_dataPenuntutan') ?>",
            dataType: "json",
            success: function(response) {
                $('#show-dataPro').text(response.success);
                console.log(response.success);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    }

    function dataExecution() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Sitaraa/Dashboard/count_dataPenuntutan') ?>",
            dataType: "json",
            success: function(response) {
                $('#show-dataExecution').text(response.success);
                console.log(response.success);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    }

    function done() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Sitaraa/Dashboard/count_done') ?>",
            dataType: "json",
            success: function(response) {
                $('#show-done').text(response.success);
                console.log(response.success);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    }
</script>
<?= $this->endsection(); ?>