<!-- Modal -->
<div class="modal fade" id="modal-process" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Eksekusi</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['class' => 'form_create']) ?>

            <?= csrf_field(); ?>

            <div class="modal-body">

                <input type="hidden" class="form-control" id="suspect_id" name="suspect_id" value="<?= $suspect_id; ?>" disabled>

                <div class="form-group row pb-3 pt-3">
                    <label for="decision_nomor" class="col-md-3 col-form-label">Nomor Putusan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="decision_nomor" name="decision_nomor" placeholder="Masukkan Nomor Putusan">
                        <div class="invalid-feedback errorNomor">
                        </div>
                        </select>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="decision_date" class="col-md-3 col-form-label">Tanggal Putusan</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="decision_date" name="decision_date">
                        <div class="invalid-feedback errorDate">
                        </div>
                        </select>
                    </div>
                </div>



                <div class="form-group row pb-3 pt-3">
                    <label for="decision_pn" class="col-md-3 col-form-label">Detail Putusan</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="decision_pn" name="decision_pn" rows="3"></textarea>
                        <div class="invalid-feedback errorDetail">
                        </div>
                    </div>
                </div>





            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-save">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        save();
    });

    function save() {
        $('.form_create').submit(function(e) {
            e.preventDefault();
            var suspect_id = $("#suspect_id").val();
            var decision_nomor = $("#decision_nomor").val();
            var decision_date = $("#decision_date").val();
            var decision_pn = $("#decision_pn").val();




            let data = new FormData();

            data.append("suspect_id", suspect_id)
            data.append("suspect_id", suspect_id)
            data.append("decision_nomor", decision_nomor)
            data.append("decision_nomor", decision_nomor)
            data.append("decision_date", decision_date)
            data.append("decision_date", decision_date)
            data.append("decision_pn", decision_pn)



            $.ajax({
                type: "post",
                url: "<?= site_url('Back/Sitaraa/execution/save_data'); ?>",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-save').attr('disable', 'disabled');
                    $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-save').removeAttr('disable');
                    $('.btn-save').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.decision_nomor) {
                            $('#decision_nomor').addClass('is-invalid')
                            $('.errorNomor').html(response.error.decision_nomor);
                        } else {
                            $('#decision_nomor').removeClass('is-invalid')
                            $('.errorNomor').html('');
                        }
                        if (response.error.decision_date) {
                            $('#decision_date').addClass('is-invalid')
                            $('.errorDate').html(response.error.decision_date);
                        } else {
                            $('#decision_date').removeClass('is-invalid')
                            $('.errorDate').html('');
                        }
                        if (response.error.decision_pn) {
                            $('#decision_pn').addClass('is-invalid')
                            $('.errorDetail').html(response.error.decision_pn);
                        } else {
                            $('#decision_pn').removeClass('is-invalid')
                            $('.errorDetail').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
                        clear_form();
                        data_execution();
                        $('#modal-process').modal('hide');
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }


            });
            return false;
        });
    }

    function clear_form() {
        $("#case_nomor").val('');
        $("#case_date").val('');
        $("#start_investigation").val('');
        $("#allegation").val('');
        $("#stage_one").val('');
        $("#stage_two").val('');
        $("#public_prosecutor").val('');
        $("#indictment_article").val('');
        $("#demans").val('');


    }
</script>