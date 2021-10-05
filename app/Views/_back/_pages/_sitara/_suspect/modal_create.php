<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>TAMBAH TERSANGKA</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['class' => 'form_create']) ?>

            <?= csrf_field(); ?>

            <div class="modal-body">

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_nik" class="col-md-3 col-form-label">NIK</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="suspect_nik" name="suspect_nik" placeholder="Masukkan (16 digit) NIK Tersangka">
                        <div class="invalid-feedback errorNik">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_name" class="col-md-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="suspect_name" name="suspect_name" placeholder="Masukkan Nama Lengkap Tersangka">
                        <div class="invalid-feedback errorName">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_ttl" class="col-md-3 col-form-label">TTL</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="suspect_ttl" name="suspect_ttl" placeholder="Masukkan TTL Tersangka">
                        <div class="invalid-feedback errorTtl">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_gender" class="col-md-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-9">
                        <select name="suspect_gender" id="suspect_gender" class="form-control select2">
                            <option value="">--Pilih Salah Satu--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback errorGender">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_nationality" class="col-md-3 col-form-label">Kebangsaan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="suspect_nationality" name="suspect_nationality" placeholder="Masukkan Kebangsaan Tersangka">
                        <div class="invalid-feedback errorNationality">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_religion" class="col-md-3 col-form-label">Agama</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="suspect_religion" name="suspect_religion" placeholder="Masukkan Agama Tersangka">
                        <div class="invalid-feedback errorReligion">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_profession" class="col-md-3 col-form-label">Pekerjaan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="suspect_profession" name="suspect_profession" placeholder="Masukkan Pekerjaan Tersangka">
                        <div class="invalid-feedback errorProffesion">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_education" class="col-md-3 col-form-label">Pendidikan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="suspect_education" name="suspect_education" placeholder="Masukkan Pendidikan Tersangka">
                        <div class="invalid-feedback errorEducation">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_address" class="col-md-3 col-form-label">Alamat (Sesuai KTP)</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="suspect_address" name="suspect_address" rows="3"></textarea>
                        <div class="invalid-feedback errorAddress">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_email" class="col-md-3 col-form-label">Alamat Email</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="suspect_email" name="suspect_email" placeholder="nama@contoh.com">
                        <div class="invalid-feedback errorEmail">
                        </div>
                    </div>
                </div>

                <div class="form-group row pb-3 pt-3">
                    <label for="suspect_phonenumber" class="col-md-3 col-form-label">No. HP</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="suspect_phonenumber" name="suspect_phonenumber" placeholder="08xx xxxx xxxx">
                        <div class="invalid-feedback errorPhonenumber">
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-send">Simpan</button>
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
            var suspect_nik = $("#suspect_nik").val();
            var suspect_name = $("#suspect_name").val();
            var suspect_ttl = $("#suspect_ttl").val();
            var suspect_gender = $("#suspect_gender").val();
            var suspect_nationality = $("#suspect_nationality").val();
            var suspect_religion = $("#suspect_religion").val();
            var suspect_profession = $("#suspect_profession").val();
            var suspect_education = $("#suspect_education").val();
            var suspect_address = $("#suspect_address").val();
            var suspect_email = $("#suspect_email").val();
            var suspect_phonenumber = $("#suspect_phonenumber").val();


            let data = new FormData();

            data.append("suspect_nik", suspect_nik)
            data.append("suspect_name", suspect_name)
            data.append("suspect_ttl", suspect_ttl)
            data.append("suspect_gender", suspect_gender)
            data.append("suspect_nationality", suspect_nationality)
            data.append("suspect_religion", suspect_religion)
            data.append("suspect_profession", suspect_profession)
            data.append("suspect_education", suspect_education)
            data.append("suspect_address", suspect_address)
            data.append("suspect_email", suspect_email)
            data.append("suspect_phonenumber", suspect_phonenumber)


            $.ajax({
                type: "post",
                url: "<?= site_url('Back/Sitaraa/Suspect/save_data'); ?>",
                data: data,
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
                    $('.btn-send').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.suspect_nik) {
                            $('#suspect_nik').addClass('is-invalid')
                            $('.errorNik').html(response.error.suspect_nik);
                        } else {
                            $('#suspect_nik').removeClass('is-invalid')
                            $('.errorNik').html('');
                        }
                        if (response.error.suspect_name) {
                            $('#suspect_name').addClass('is-invalid')
                            $('.errorName').html(response.error.suspect_name);
                        } else {
                            $('#suspect_name').removeClass('is-invalid')
                            $('.errorName').html('');
                        }
                        if (response.error.suspect_ttl) {
                            $('#suspect_ttl').addClass('is-invalid')
                            $('.errorTtl').html(response.error.suspect_ttl);
                        } else {
                            $('#suspect_ttl').removeClass('is-invalid')
                            $('.errorTtl').html('');
                        }
                        if (response.error.suspect_gender) {
                            $('#suspect_gender').addClass('is-invalid')
                            $('.errorGender').html(response.error.suspect_gender);
                        } else {
                            $('#suspect_gender').removeClass('is-invalid')
                            $('.errorGender').html('');
                        }
                        if (response.error.suspect_nationality) {
                            $('#suspect_nationality').addClass('is-invalid')
                            $('.errorNationality').html(response.error.suspect_nationality);
                        } else {
                            $('#suspect_nationality').removeClass('is-invalid')
                            $('.errorNationality').html('');
                        }
                        if (response.error.suspect_religion) {
                            $('#suspect_religion').addClass('is-invalid')
                            $('.errorReligion').html(response.error.suspect_religion);
                        } else {
                            $('#suspect_religion').removeClass('is-invalid')
                            $('.errorReligion').html('');
                        }
                        if (response.error.suspect_profession) {
                            $('#suspect_profession').addClass('is-invalid')
                            $('.errorProfession').html(response.error.suspect_profession);
                        } else {
                            $('#suspect_profession').removeClass('is-invalid')
                            $('.errorProfession').html('');
                        }
                        if (response.error.suspect_education) {
                            $('#suspect_education').addClass('is-invalid')
                            $('.errorEducation').html(response.error.suspect_education);
                        } else {
                            $('#suspect_education').removeClass('is-invalid')
                            $('.errorEducation').html('');
                        }
                        if (response.error.suspect_address) {
                            $('#suspect_address').addClass('is-invalid')
                            $('.errorAddress').html(response.error.suspect_address);
                        } else {
                            $('#suspect_address').removeClass('is-invalid')
                            $('.errorAddress').html('');
                        }
                        if (response.error.suspect_phonenumber) {
                            $('#suspect_phonenumber').addClass('is-invalid')
                            $('.errorPhoneNumber').html(response.error.suspect_phonenumber);
                        } else {
                            $('#suspect_phonenumber').removeClass('is-invalid')
                            $('.errorPhoneNumber').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
                        clear_form();
                        data_suspect();
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

    }
</script>