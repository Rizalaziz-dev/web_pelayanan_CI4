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
                        <h3 id="show-complaint"></h3>

                        <p>Pengaduan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsPengaduan');
                                } else {
                                    echo site_url('Back/Tipikor');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>




            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 id="show-process"></h3>

                        <p>Pengaduan Diproses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsDiproses');
                                } else {
                                    echo site_url('Back/Tipikor');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-12 ">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 id="show-done"></h3>

                        <p>Pengaduan Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <a href="<?php $akses = $session->get('nama_level');
                                if ($akses == "Kepala") {
                                    echo site_url('Back/Kepala/Tipikor/DetailsSelesai');
                                } else {
                                    echo site_url('Back/Tipikor');
                                } ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>



        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        complaint();
        process();
        done();


    });

    function complaint() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Tipikor/count_pengaduan') ?>",
            dataType: "json",
            success: function(response) {
                $('#show-complaint').text(response.success);
                console.log(response.success);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        return false;
    }

    function process() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Tipikor/count_diproses') ?>",
            dataType: "json",
            success: function(response) {
                $('#show-process').text(response.success);
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
            url: "<?= site_url('Back/Tipikor/count_selesai') ?>",
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