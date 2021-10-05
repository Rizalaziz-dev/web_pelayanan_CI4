<!-- Modal -->
<div class="modal fade" id="modal-process" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>PENUNTUTAN</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['class' => 'form_create']) ?>

            <?= csrf_field(); ?>

            <div class="modal-body">

                <input type="hidden" class="form-control" id="suspect_id" name="suspect_id" value="<?= $suspect_id; ?>" disabled>

                <div class="form-group row pb-3 pt-3">
                    <label for="case_nomor" class="col-md-3 col-form-label">Nomor Perkara</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="case_nomor" name="case_nomor" placeholder="Masukkan Nomor Perkara">
                        <div class="invalid-feedback errorCaseNomor">
                        </div>
                        </select>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="case_date" class="col-md-3 col-form-label">Tanggal Perkara</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="case_date" name="case_date">
                        <div class="invalid-feedback errorCaseDate">
                        </div>
                        </select>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="start_investigation" class="col-md-3 col-form-label">SPDP</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="start_investigation" name="start_investigation" placeholder="Masukkan (16 digit) NIK Tersangka" value="<?= $start_investigation; ?>">
                        <div class="invalid-feedback errorStart">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="allegation" class="col-md-3 col-form-label">Tuduhan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="allegation" name="allegation" placeholder="Masukkan Tuduhan">
                        <div class="invalid-feedback errorAllegation">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="stage_one" class="col-md-3 col-form-label">Tahap 1</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="stage_one" name="stage_one" placeholder="Masukkan TTL Tersangka">
                        <div class="invalid-feedback errorOne">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="stage_two" class="col-md-3 col-form-label">Tahap 2</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="stage_two" name="stage_two" placeholder="Masukkan TTL Tersangka">
                        <div class="invalid-feedback errorTwo">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="public_prosecutor" class="col-md-3 col-form-label">JPU</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="public_prosecutor" name="public_prosecutor" placeholder="Masukkan Nama Jaksa Penuntut">
                        <div class="invalid-feedback errorProsecutor">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="indictment_article" class="col-md-3 col-form-label">Pasal Sangkaan</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="indictment_article" name="indictment_article" rows="3"></textarea>
                        <div class="invalid-feedback errorArticle">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="demans" class="col-md-3 col-form-label">Tuntutan</label>
                    <div class="col-md-9">
                        <textarea type="text" class="form-control" id="demans" name="demans" rows="3"></textarea>
                        <div class="invalid-feedback errorDemans">
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
            var case_nomor = $("#case_nomor").val();
            var case_date = $("#case_date").val();
            var start_investigation = $("#start_investigation").val();
            var allegation = $("#allegation").val();
            var stage_one = $("#stage_one").val();
            var stage_two = $("#stage_two").val();
            var public_prosecutor = $("#public_prosecutor").val();
            var indictment_article = $("#indictment_article").val();
            var demans = $("#demans").val();



            let data = new FormData();

            data.append("suspect_id", suspect_id)
            data.append("case_nomor", case_nomor)
            data.append("case_date", case_date)
            data.append("start_investigation", start_investigation)
            data.append("allegation", allegation)
            data.append("stage_one", stage_one)
            data.append("stage_two", stage_two)
            data.append("public_prosecutor", public_prosecutor)
            data.append("indictment_article", indictment_article)
            data.append("demans", demans)



            $.ajax({
                type: "post",
                url: "<?= site_url('Back/Sitaraa/preprosecution/save_data'); ?>",
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
                        if (response.error.case_nomor) {
                            $('#case_nomor').addClass('is-invalid')
                            $('.errorCaseNomor').html(response.error.case_nomor);
                        } else {
                            $('#case_nomor').removeClass('is-invalid')
                            $('.errorCaseNomor').html('');
                        }
                        if (response.error.case_date) {
                            $('#case_date').addClass('is-invalid')
                            $('.errorCaseDate').html(response.error.case_date);
                        } else {
                            $('#case_date').removeClass('is-invalid')
                            $('.errorCaseDate').html('');
                        }
                        if (response.error.start_investigation) {
                            $('#start_investigation').addClass('is-invalid')
                            $('.errorStart').html(response.error.start_investigation);
                        } else {
                            $('#start_investigation').removeClass('is-invalid')
                            $('.errorStart').html('');
                        }
                        if (response.error.allegation) {
                            $('#allegation').addClass('is-invalid')
                            $('.errorAllegation').html(response.error.allegation);
                        } else {
                            $('#allegation').removeClass('is-invalid')
                            $('.errorAllegation').html('');
                        }
                        if (response.error.stage_one) {
                            $('#stage_one').addClass('is-invalid')
                            $('.errorOne').html(response.error.stage_one);
                        } else {
                            $('#stage_one').removeClass('is-invalid')
                            $('.errorOne').html('');
                        }
                        if (response.error.stage_two) {
                            $('#stage_two').addClass('is-invalid')
                            $('.errorTwo').html(response.error.stage_two);
                        } else {
                            $('#stage_two').removeClass('is-invalid')
                            $('.errorTwo').html('');
                        }
                        if (response.error.public_prosecutor) {
                            $('#public_prosecutor').addClass('is-invalid')
                            $('.errorProsecutor').html(response.error.public_prosecutor);
                        } else {
                            $('#public_prosecutor').removeClass('is-invalid')
                            $('.errorProsecutor').html('');
                        }
                        if (response.error.indictment_article) {
                            $('#indictment_article').addClass('is-invalid')
                            $('.errorArticle').html(response.error.indictment_article);
                        } else {
                            $('#indictment_article').removeClass('is-invalid')
                            $('.errorArticle').html('');
                        }
                        if (response.error.demans) {
                            $('#demans').addClass('is-invalid')
                            $('.errorDemans').html(response.error.demans);
                        } else {
                            $('#demans').removeClass('is-invalid')
                            $('.errorDemans').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
                        clear_form();
                        data_preprosecution();
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