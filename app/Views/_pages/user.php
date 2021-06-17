<?= $this->extend('_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Data Tables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables/dataTables.bootstrap4.min.css" />

<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

<script src="<?= base_url() ?>/assets/theme/plugins/datatables/jquery.dataTables.min.js"> </script>

<script src="<?= base_url() ?>/assets/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"> </script>



<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <p class="card-text viewdata">
            </p>
            <div class="card-header">
                <button id="btn-create" type="button" class="btn btn-primary">Create</button>
            </div>
            <!-- /.card-header -->
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
</div>




<script>
    function data_user() {
        $.ajax({
            url: "<?= site_url('user/get_data') ?>",
            dataType: "json",
            success: function(response) {
                $('.viewdata').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        data_user();
    });
</script>



<?= $this->endsection(); ?>