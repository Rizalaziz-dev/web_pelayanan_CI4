<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- /.content-header -->
<div class="content">

    <!-- /.card-header -->
    <div class="col-sm-12">
        <div class="card m-b-30">
            <!-- /.card-body -->
            <div class="card-body">
                <p class="card-text view-data"></p>
            </div>

        </div>
    </div>

</div><!-- /.container-fluid -->


<div class="view-modal" style="display: none;"></div>


<script>
    $(document).ready(function() {
        data_yankum();
        direct_chat();

    });

    function data_yankum() {
        $.ajax({
            url: "<?= site_url('Back/Yankum/get_data') ?>",
            dataType: "json",
            success: function(response) {
                $('.view-data').html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }

    function direct_chat() {
        $('#chat-pane-toggle').DirectChat('toggle')
    }
</script>



<?= $this->endsection(); ?>