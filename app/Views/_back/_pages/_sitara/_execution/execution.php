<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- /.content-header -->
<div class="content">

    <div class="container-fluid">
        <!-- <div class="card"> -->
        <!-- <div class="card-header">
                <button id="btn-create" type="button" class="btn btn-primary btn-create">
                    <i class="fa fa-plus-circle"></i> Create
                </button>
            </div> -->
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
        <!-- </div> -->
    </div>

</div><!-- /.container-fluid -->

<div class="view-modal" style="display: none;"></div>


<script>
    $(document).ready(function() {
        data_execution();
    });


    function data_execution() {
        $.ajax({
            url: "<?= site_url('Back/Sitaraa/execution/get_data') ?>",
            dataType: "json",
            success: function(response) {
                $('.view-data').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>

<?= $this->endsection(); ?>