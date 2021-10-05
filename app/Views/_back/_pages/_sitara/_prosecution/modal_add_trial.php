<!-- Modal -->
<div class="modal fade" id="modal-add-trial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Tambah Sidang</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['class' => 'form_create']) ?>

            <?= csrf_field(); ?>

            <div class="modal-body">

                <input type="hidden" class="form-control" id="id_trial" name="id_trial" value="<?= $id_trial; ?>" disabled>

                <?php
                $trial = $trial_nomor;
                if ($trial == null) {
                    $nomor = 1;
                } else {
                    $nomor = intval($trial) + 1;
                }

                echo "<input type='hidden' value ='$nomor' class='form-control' id='trial_no' name='trial_no'>"
                ?>
                <!-- <input type="hidden" class="form-control" id="trial_nomor" name="trial_nomor" value="<?= $id_trial; ?>" disabled> -->

                <div class="form-group row pb-3 pt-3">
                    <label for="trial_date" class="col-md-3 col-form-label">Tanggal Sidang</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="trial_date" name="trial_date">
                        <div class="invalid-feedback errorTrialDate">
                        </div>
                        </select>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="trial_agenda" class="col-md-3 col-form-label">Agenda</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="trial_agenda" name="trial_agenda" rows="3"></textarea>
                        <div class="invalid-feedback errorAgenda">
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
            var id_trial = $("#id_trial").val();
            var trial_date = $("#trial_date").val();
            var trial_no = $("#trial_no").val();
            var trial_agenda = $("#trial_agenda").val();

            let data = new FormData();

            data.append("id_trial", id_trial)
            data.append("trial_no", trial_no)
            data.append("trial_date", trial_date)
            data.append("trial_agenda", trial_agenda)


            $.ajax({
                type: "post",
                url: "<?= site_url('Back/Sitaraa/prosecution/save_data_trial'); ?>",
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
                        if (response.error.trial_date) {
                            $('#trial_date').addClass('is-invalid')
                            $('.errorTrialDate').html(response.error.trial_date);
                        } else {
                            $('#trial_date').removeClass('is-invalid')
                            $('.errorTrialDate').html('');
                        }
                        if (response.error.trial_agenda) {
                            $('#trial_agenda').addClass('is-invalid')
                            $('.errorAgenda').html(response.error.trial_agenda);
                        } else {
                            $('#trial_agenda').removeClass('is-invalid')
                            $('.errorAgenda').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
                        clear_form();
                        data_preprosecution();
                        $('#modal-add-trial').modal('hide');
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
        $("#trial_date").val('');
        $("#trial_agenda").val('');



    }
</script>