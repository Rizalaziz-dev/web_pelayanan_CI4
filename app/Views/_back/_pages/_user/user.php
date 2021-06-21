<?= $this->extend('_back/_layout/template'); ?>

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
            <div class="card-header">
                <button id="btn-create" type="button" class="btn btn-primary btn-create">
                    <i class="fa fa-plus-circle"></i> Create
                </button>
            </div>
            <!-- /.card-header -->
            <div class="col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <p class="card-text view-data">
                        </p>
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

<div class="view-modal" style="display: none;"></div>



<script>
    function data_user() {
        $.ajax({
            url: "<?= site_url('user/get_data') ?>",
            dataType: "json",
            success: function(response) {
                $('.view-data').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    $(document).ready(function() {
        data_user();

        $('.btn-create').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('user/form_create') ?>",
                dataType: "json",
                success: function(response) {
                    $('.view-modal').html(response.data).show();

                    $('#modal-create').modal('show');

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });
</script>



<?= $this->endsection(); ?>