<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>DETAIL LAPORAN</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['class' => 'form_edit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">


                <input type="hidden" class="form-control" id="wbs_id" name="wbs_id" value="<?= $wbs_id; ?>" disabled>
                <input type="hidden" class="form-control" id="token" name="token" value="<?= $token; ?>" disabled>


                <div class="form-group row pb-1 pt-3">
                    <label for="" class="col-md-3 col-form-label">No Laporan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="id_report" name="id_report" value="<?= $id_report; ?>" disabled>
                        <div class="invalid-feedback errorFullname"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-3">
                    <label for="employee_name" class="col-md-3 col-form-label">Nama Petugas</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="employee_name" name="employee_name" value="<?= $employee_name; ?>" disabled>
                        <div class="invalid-feedback errorEmployee"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-1">
                    <label for="occurre_time" class="col-md-3 col-form-label">Waktu Kejadian</label>
                    <div class="col-md-9">
                        <div class="form-group row">
                            <div class="col-sm">
                                <input type="text" class="form-control" id="occurre_time" name="occurre_time" value="<?= $occurre_time; ?>" disabled>
                                <div class="invalid-feedback errorOccurre"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-1">
                    <label for="crime_scene" class="col-md-3 col-form-label">Tempat Kejadian</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="crime_scene" name="crime_scene" value="<?= $crime_scene; ?>" disabled>
                        <div class="invalid-feedback errorScene"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-1">
                    <label for="report_detail" class="col-md-3 col-form-label">Uraian Laporan</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="report_detail" name="report_detail" rows="3" disabled><?= $report_detail; ?></textarea>
                        <div class="invalid-feedback errorDetail"></div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="status" class="col-md-3 form-label">Status</label>
                    <div class="col-md-9">
                        <select name="status" id="status" class="form-control select2">
                            <option value="">--Pilih Salah Satu--</option>
                            <option value="Diterima" <?php if ($status == 'Diterima') echo "selected" ?>>Diterima</option>
                            <option value="Diproses" <?php if ($status == 'Diproses') echo "selected" ?>>Diproses</option>
                            <option value="Ditolak" <?php if ($status == 'Ditolak') echo "selected" ?>>Ditolak</option>
                            <option value="Selesai" <?php if ($status == 'Selesai') echo "selected" ?>>Selesai</option>
                        </select>
                        <div class="invalid-feedback errorStatus">
                        </div>
                    </div>
                </div>

                <div hidden id="hide-ket" class="form-group row pb-1 pt-1">
                    <label for="note" class="col-md-3 col-form-label">Keterangan</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="note" name="note" rows="3">-</textarea>
                        <div class="invalid-feedback errorNote"></div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-update">Update</button>
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#status').on('change', function() {
            if (this.value == 'Selesai') {

                $('#hide-ket').removeAttr('hidden');


            } else {
                $('#hide-ket').attr("hidden", true);


            }
        });
        Update();
    });



    function Update() {
        $('.btn-update').click(function(e) {
            e.preventDefault();

            var wbs_id = $("#wbs_id").val();
            var status = $("#status").val();
            var token = $("#token").val();
            var note = $("#note").val();

            let data = new FormData();

            data.append("wbs_id", wbs_id)
            data.append("status", status)
            data.append("token", token)
            data.append("note", note)

            $.ajax({
                type: "post",
                url: "<?= site_url('Back/Wbs/update_data') ?>",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-update').attr('disable', 'disabled');
                    $('.btn-update').html('<i class="fa fa-spin fa-spinner"></i>');

                },
                complete: function() {
                    $('.btn-update').removeAttr('disable');
                    $('.btn-update').html('Update');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.status) {
                            $('#status').addClass('is-invalid')
                            $('.errorStatus').html(response.error.status);
                        } else {
                            $('#status').removeClass('is-invalid')
                            $('.errorStatus').html('');
                        }
                        if (response.error.note) {
                            $('#note').addClass('is-invalid')
                            $('.errorNote').html(response.error.note);
                        } else {
                            $('#note').removeClass('is-invalid')
                            $('.errorNote').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })

                        $('#modal-edit').modal('hide')

                        data_wbs();
                        clear_form();
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }


            });

        });
    }

    function clear_form() {
        $('#id_report').val('');
        $('#subject').val('');
        $('#occure_time').val('');
        $('#crime_scene').val('');
        $('#report_detail').val('');
        $('#attachment').val('');
    }
</script>