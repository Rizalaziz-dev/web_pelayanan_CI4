<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Data Tables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables/dataTables.bootstrap4.min.css" />

<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

<script src="<?= base_url() ?>/assets/theme/plugins/datatables/jquery.dataTables.min.js"> </script>

<script src="<?= base_url() ?>/assets/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"> </script>




<div class="content">
    <div class="col-sm-12">
        <div class="row">

            <div class="col-sm-3">
                <div class="info-box bg-gradient-primary">
                    <span class="info-box-icon"><i class="far fa-envelope"></i></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengaduan</span>
                        <span class="info-box-number "></span>
                        <h3 id="show-complaint"></h3>

                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number">41,410</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Events</span>
                        <span class="info-box-number">41,410</span>
                        <div class="progress">
                            <div class="progress-bar" style="width: 70%"></div>
                        </div>
                        <span class="progress-description">
                            70% Increase in 30 Days
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.content-header -->

<div class="content">

    <!-- /.card-header -->
    <div class="col-sm-12">
        <div class="card m-b-30">
            <!-- /.card-body -->
            <div class="card-body">
                <p class="card-text view-data">

                </p>

            </div>

        </div>
    </div>

</div><!-- /.container-fluid -->





<div class="view-modal" style="display: none;"></div>


<script>
    $(document).ready(function() {
        data_tipikor();
        complaint();

    });

    function data_tipikor() {
        $.ajax({
            url: "<?= site_url('Back/Tipikor/get_data') ?>",
            dataType: "json",
            success: function(response) {
                $('.view-data').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function complaint() {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Tipikor/count_complaint') ?>",
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
</script>

<?= $this->endsection(); ?>