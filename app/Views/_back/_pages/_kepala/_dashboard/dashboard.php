<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<div class="content">
    <div class="col-sm-12">
        <div class="row">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning pl-2 pr-2">
                    <div class="inner">
                        <h3 id="show-complaint"></h3>

                        <p>Pengaduan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger pl-2 pr-2">
                    <div class="inner">
                        <h3 id="show-process"></h3>

                        <p>Pengaduan Diproses</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-spinner"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-12 ">
                <!-- small box -->
                <div class="small-box bg-primary pl-2 pr-2">
                    <div class="inner">
                        <h3 id="show-done"></h3>

                        <p>Pengaduan Selesai</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-check-circle"></i>
                    </div>
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