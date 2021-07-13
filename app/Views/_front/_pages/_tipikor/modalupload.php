<!-- Modal -->
<div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Lampiran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('', ['class' => 'form-upload']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group row pb-3 pt-3 text-left">
                    <label for="" class="col-md-3 form-label ">Upload dokumen pendukung</label>
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="lampiran" id="lampiran">
                        <div class="invalid-feedback errorLampiran"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary btn-upload ">Upload</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        upload();
    });

    function upload() {
        $('.btn-upload').click(function(e) {
            e.preventDefault();

            let form = $('.form-upload')[0];

            let data = new FormData(form);

            $.ajax({
                type: "post",
                url: "<?= site_url('Front/Tipikor/doupload') ?>",
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-upload').attr('disable', 'disabled');
                    $('.btn-upload').html('<i class="fa fa-spin fa-spinner"></i>            ');
                },
                complete: function() {
                    $('.btn-upload').removeAttr('disable');
                    $('.btn-upload').html('Upload');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.lampiran) {
                            $('#lampiran').addClass('is-invalid')
                            $('.errorLampiran').html(response.error.lampiran);
                        } else {
                            $('#lampiran').removeClass('is-invalid')
                            $('.errorLampiran').html('');
                        }
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }


            });

        });
    }
</script>