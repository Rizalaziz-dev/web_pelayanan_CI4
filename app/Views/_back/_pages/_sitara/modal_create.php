<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sitara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('Back/Sitara/save_data', ['class' => 'form_create']) ?>

            <?= csrf_field(); ?>

            <div class="modal-body">

                <div class="row p-2">
                    <div class="col-md">
                        <div class="border-bottom border-primary">
                            <h5><strong>DATA PERKARA</strong></h5>
                        </div>
                        <br>

                        <div class="form-group row pb-3 pt-3">
                            <label for="case_nomor" class="col-md-3 col-form-label">Nomor Perkara</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="case_nomor" name="case_nomor" placeholder="Masukkan Nomor Perkara Anda">
                            </div>
                            </select>
                            <div class="invalid-feedback errorCaseNomor">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="case_date" class="col-md-3 col-form-label">Tanggal Perkara</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="case_date" name="case_date">
                            </div>
                            </select>
                            <div class="invalid-feedback errorCaseDate">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="Start_investigation" class="col-md-3 col-form-label">SPDP</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="Start_investigation" name="Start_investigation">
                            </div>
                            </select>
                            <div class="invalid-feedback errorSpdp">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="case_position" class="col-md-3 col-form-label">Kasus Posisi</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="case_position" name="case_position" rows="5"></textarea>>
                            </div>
                            </select>
                            <div class="invalid-feedback errorPosition">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="allegation" class="col-md-3 col-form-label">Pasal Sangkaan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="allegation" name="allegation" rows="3"></textarea>
                            </div>
                            </select>
                            <div class="invalid-feedback errorAllegation">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="stage_one" class="col-md-3 col-form-label">Tahap I</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="stage_one" name="stage_one">
                            </div>
                            </select>
                            <div class="invalid-feedback errorStageone">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="stage_two" class="col-md-3 col-form-label">Tahap II</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="stage_two" name="stage_two">
                            </div>
                            </select>
                            <div class="invalid-feedback errorStagetwo">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="public_prosecutor" class="col-md-3 col-form-label">JPU</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="public_prosecutor" name="public_prosecutor" placeholder="Masukkan Nama JPU">
                            </div>
                            </select>
                            <div class="invalid-feedback errorJpu">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="indictment_article" class="col-md-3 col-form-label">Pasal Dakwaaan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="indictment_article" name="indictment_article" rows="3"></textarea>
                            </div>
                            </select>
                            <div class="invalid-feedback errorAticle">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="indictment" class="col-md-3 col-form-label">Surat Dakwaan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="indictment" name="indictment" rows="5"></textarea>
                            </div>
                            </select>
                            <div class="invalid-feedback errorIndictment">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="demands" class="col-md-3 col-form-label">Tuntutan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="demands" name="demands" rows="5"></textarea>
                            </div>
                            </select>
                            <div class="invalid-feedback errorDemans">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="case_status" class="col-md-3 form-label">Status Perkara</label>
                            <div class="col-md-9">
                                <select name="decision_status" id="case_status" name="case_status" class="form-control select2">
                                    <option value="">--Pilih Salah Satu--</option>
                                    <option value="Kekuatan Hukum Tetap">Kekuatan Hukum Tetap</option>
                                    <option value="Pra Penuntutan">Pra Penuntutan</option>
                                    <option value="Penuntutan">Penuntutan</option>
                                    <option value="Banding">Banding</option>
                                    <option value="Kasasi">Kasasi</option>
                                </select>
                                <div class="invalid-feedback errorStatus">
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="border-bottom border-primary">
                            <h5><strong>DATA TERSANGKA</strong></h5>
                        </div>
                        <br>

                        <form action="">

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_nik" class="col-md-3 col-form-label">NIK</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_nik" name="suspect_nik" placeholder="Masukkan (16 digit) NIK Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorNik">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_name" class="col-md-3 col-form-label">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_name" name="suspect_name" placeholder="Masukkan Nama Lengkap Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorName">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_ttl" class="col-md-3 col-form-label">TTL</label>
                                <div class="col-md-9">
                                    <input type="date" class="form-control" id="suspect_ttl" name="suspect_ttl" placeholder="Masukkan TTL Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorTtl">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_gender" class="col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_gender" name="suspect_gender" placeholder="Masukkan Jenis Kelamin Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorGender">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_nationality" class="col-md-3 col-form-label">Kebangsaan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_nationality" name="suspect_nationality" placeholder="Masukkan Kebangsaan Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorNationality">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_religion" class="col-md-3 col-form-label">Agama</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_religion" name="suspect_religion" placeholder="Masukkan Agama Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorReligion">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_profession" class="col-md-3 col-form-label">Pekerjaan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_profession" name="suspect_profession" placeholder="Masukkan Pekerjaan Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorProffesion">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_education" class="col-md-3 col-form-label">Pendidikan</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_education" name="suspect_education" placeholder="Masukkan Pendidikan Tersangka">
                                </div>
                                </select>
                                <div class="invalid-feedback errorEducation">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_address" class="col-md-3 col-form-label">Alamat (Sesuai KTP)</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="suspect_address" name="suspect_address" rows="3"></textarea>
                                </div>
                                </select>
                                <div class="invalid-feedback errorAddress">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_email" class="col-md-3 col-form-label">Alamat Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" id="suspect_email" name="suspect_email" placeholder="nama@contoh.com">
                                </div>
                                </select>
                                <div class="invalid-feedback errorEmail">
                                </div>
                            </div>

                            <div class="form-group row pb-3 pt-3">
                                <label for="suspect_phonenumber" class="col-md-3 col-form-label">No. HP</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="suspect_phonenumber" name="suspect_phonenumber" placeholder="08xx xxxx xxxx">
                                </div>
                                </select>
                                <div class="invalid-feedback errorPhonenumber">
                                </div>
                            </div>


                    </div>

                    <div class="col-md text-left">
                        <div class="border-bottom border-primary">
                            <h5><strong>PUTUSAN</strong></h5>
                        </div>
                        <br>

                        <div class="form-group row pb-3 pt-3">
                            <label for="decision_nomor" class="col-md-3 col-form-label">Nomor Putusan</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="decision_nomor" name="decision_nomor" placeholder="Masukkan Nomor Putusan">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="decision_date" class="col-md-3 col-form-label">Tanggal Putusan</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="decision_date" name="decision_date" placeholder="Masukkan Tanggal Putusan">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="decision_pn" class="col-md-3 col-form-label">Putusan PN</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="decision_pn" name="decision_pn" placeholder="Masukkan Tanggal Putusan">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="decision_apeal" class="col-md-3 col-form-label">Banding</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="decision_apeal" name="decision_apeal" placeholder="Subyek">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="decision_cassation" class="col-md-3 col-form-label">Kasasi</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="decision_cassation" name="decision_cassation" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="decision_execution" class="col-md-3 col-form-label">Eksekusi</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="decision_execution" name="decision_execution" rows="3"></textarea>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-send">Kirim</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>

                <?= form_close() ?>
            </div>
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
            var case_nomor = $("#case_nomor").val();

            let data = new FormData();

            data.append("case_nomor", case_nomor)

            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-send').attr('disable', 'disabled');
                    $('.btn-send').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-send').removeAttr('disable');
                    $('.btn-send').html('Kirim');
                },
                success: function(response) {
                    if (response.error) {
                        // if (response.error.case_nomor) {
                        //     $('#case_nomor').addClass('is-invalid')
                        //     $('.errorCaseNomor').html(response.error.case_nomor);
                        // } else {
                        //     $('#case_nomor').removeClass('is-invalid')
                        //     $('.errorCaseNomor').html('');
                        // }


                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
                        clear_form();
                        $('#modal-create').modal('hide');
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
        $("#case_position").val('');
        $("#allegation").val('');
        $("#stage_one").val('');
        $("#stage_two").val('');
        $("#public_prosecutor").val('');
        $("#indictment_article").val('');
        $("#indictment").val('');
        $("#demans").val('');
        $("#case_status").val('');
        $("#suspect_nik").val('');
        $("#suspect_name").val('');
        $("#suspect_ttl").val('');
        $("#suspect_gender").val('');
        $("#suspect_nationality").val('');
        $("#suspect_religion").val('');
        $("#suspect_profession").val('');
        $("#suspect_address").val('');
        $("#suspect_email").val('');
        $("#suspect_phonenumber").val('');
        $("#decision_nomor").val('');
        $("#decision_date").val('');
        $("#decision_pn").val('');
        $("#decision_appeal").val('');
        $("#decision_cassation").val('');
        $("#decision_execution").val('');
    }
</script>