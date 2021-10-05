<?= $this->extend('_front/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- G-recaptcha -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-4 text-center">
                <h1>PELAYANAN HUKUM</h1>
                <p>PELAYANAN HUKUM PADA KEJAKSAAN NEGERI KABUPATEN TASIKMALAYA</p>

                <Button type="submit" class="btn btn-warning text-light" name="btn-tanyakami" id="btn-tanyakami"> Tanya Kami</Button>

            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card-body">
                    <div class="input-group">
                        <input id="tipikor_search" name="tipikor_search" type="text" class="form-control" placeholder="Masukan No Token disini" aria-label="" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-danger btn-search" type="button">Search</button>
                        </div>
                        <div class="invalid-feedback errorSearch"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Modal -->
<div id="modal-permohonan" class="modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>FORM PENGADUAN</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-md-6 text-left">
                        <h5><strong>DATA DIRI</strong></h5>

                        <?= form_open_multipart('', ['class' => 'form-upload']) ?>

                        <?= csrf_field(); ?>

                        <div class="form-group row pb-3 pt-3">
                            <label for="reporter_fullname" class="col-md-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="reporter_fullname" name="reporter_fullname" placeholder="Masukkan Nama Lengkap Anda">
                                <div class="invalid-feedback errorFullname"></div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="reporter_nik" class="col-md-3 col-form-label">NIK</label>
                            <div class="col-md-9">
                                <input type="text" minlength="16" maxlength="16" onkeypress="return hanyaAngka (event)" class="form-control" id="reporter_nik" name="reporter_nik" placeholder="Masukkan (16 digit) NIK Anda">
                                <div class="invalid-feedback errorNik"></div>
                            </div>
                        </div>

                        <script>
                            function hanyaAngka(evt) {
                                var charCode = (evt.which) ? evt.which : event.keyCode
                                if (charCode > 31 && (charCode < 48 || charCode > 57))

                                    return false;
                                return true;
                            }
                        </script>

                        <div class="form-group row pb-3 pt-3">
                            <label for="reporter_address" class="col-md-3 col-form-label">Alamat (Sesuai KTP)</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="reporter_address" name="reporter_address" rows="3"></textarea>
                                <div class="invalid-feedback errorAddress"></div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="reporter_email" class="col-md-3 col-form-label">Alamat Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="reporter_email" name="reporter_email" placeholder="nama@contoh.com">
                                <div class="invalid-feedback errorEmail"></div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="reporter_phonenumber" class="col-md-3 col-form-label">No. HP</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="reporter_phonenumber" name="reporter_phonenumber" placeholder="08xx xxxx xxxx">
                                <div class="invalid-feedback errorPhonenumber"></div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 text-left">
                        <h5><strong>PERTANYAAN/MASALAH</strong></h5>
                        <div class="form-group row pt-3">
                            <label for="question_type" class="col-md-3 form-label">Kategori</label>
                            <div class="col-md-9">
                                <select name="question_type" id="question_type" class="form-control select2">
                                    <option value="">--Pilih Salah Satu--</option>
                                    <option value="Pertanahan dan Perumahan">Pertanahan dan Perumahan</option>
                                    <option value="Perdata">Perdata</option>
                                    <option value="TUN">TUN</option>
                                    <option value="Pidana">Pidana</option>
                                    <option value="Buruh dan Tenaga Kerja">Buruh dan Tenaga Kerja</option>
                                    <option value="Waris">Waris</option>
                                    <option value="Perceraian">Perceraian</option>
                                    <option value="Adopsi">Adopsi</option>
                                    <option value="Pendirian PT">Pendirian PT</option>
                                </select>
                                <div class="invalid-feedback errorType">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="question_subject" class="col-md-3 col-form-label">Subject</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="question_subject" name="question_subject" placeholder="Subyek">
                                <div class="invalid-feedback errorSubject"></div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="question_detail" class="col-md-3 col-form-label">Isi Permohonan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="question_detail" name="question_detail" rows="3"></textarea>
                                <div class="invalid-feedback errorDetail"></div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3 text-left">
                            <label for="" class="col-md-3 form-label ">Upload dokumen pendukung</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="attachment" id="attachment">
                                <div class="invalid-feedback errorAttachment"></div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <div class="col-md-9">
                                <div id="captcha"></div>
                                <!-- <div class="g-recaptcha" data-sitekey="6LfM8-sbAAAAAATZcNrybWeV2rR2XHLqJb2dgUDU" name="captcha" id="captcha"></div> -->
                                <div class="invalid-feedback errorCaptcha"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-send">Kirim</button>
                <button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal">Batal</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    var onloadCallback = function() {
        grecaptcha.render('captcha', {
            'sitekey': '6LfM8-sbAAAAAATZcNrybWeV2rR2XHLqJb2dgUDU',
            'callback': 'correctCaptcha'

        });
    };
    $(document).ready(function() {
        $('#btn-tanyakami').click(function(e) {
            $('#modal-permohonan').modal('show');

            cancel();
        });

        save();
    });

    function cancel() {
        $('.btn-cancel').click(function(e) {
            e.preventDefault();
            clear_form();
        })
    }

    function save() {
        $('.btn-send').click(function(e) {
            e.preventDefault();

            var response = grecaptcha.getResponse();
            var id_report = $("#id_report").val();
            var r_fullname = $("#reporter_fullname").val();
            var r_nik = $("#reporter_nik").val();
            var r_address = $("#reporter_address").val();
            var r_email = $("#reporter_email").val();
            var r_phonenumber = $("#reporter_phonenumber").val();
            var question_type = $("#question_type").val();
            var question_subject = $("#question_subject").val();
            var question_detail = $("#question_detail").val();
            var attachment = $("#attachment")[0].files[0];

            let data = new FormData();

            data.append("id_report", id_report)
            data.append("reporter_fullname", r_fullname)
            data.append("reporter_nik", r_nik)
            data.append("reporter_address", r_address)
            data.append("reporter_email", r_email)
            data.append("reporter_phonenumber", r_phonenumber)
            data.append("question_type", question_type)
            data.append("question_subject", question_subject)
            data.append("question_detail", question_detail)
            data.append("attachment", attachment)
            data.append("captcha", response)


            $.ajax({
                type: "post",
                url: "<?= site_url('Front/Yankum/save_data') ?>",
                data: data,
                enctype: 'multipart/form-data',
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
                        if (response.error.reporter_fullname) {
                            $('#reporter_fullname').addClass('is-invalid')
                            $('.errorFullname').html(response.error.reporter_fullname);
                        } else {
                            $('#reporter_fullname').removeClass('is-invalid')
                            $('.errorFullname').html('');
                        }
                        if (response.error.reporter_nik) {
                            $('#reporter_nik').addClass('is-invalid')
                            $('.errorNik').html(response.error.reporter_nik);
                        } else {
                            $('#reporter_nik').removeClass('is-invalid')
                            $('.errorNik').html('');
                        }
                        if (response.error.reporter_address) {
                            $('#reporter_address').addClass('is-invalid')
                            $('.errorAddress').html(response.error.reporter_address);
                        } else {
                            $('#reporter_address').removeClass('is-invalid')
                            $('.errorAddress').html('');
                        }
                        if (response.error.reporter_email) {
                            $('#reporter_email').addClass('is-invalid')
                            $('.errorEmail').html(response.error.reporter_email);
                        } else {
                            $('#reporter_email').removeClass('is-invalid')
                            $('.errorEmail').html('');
                        }
                        if (response.error.reporter_phonenumber) {
                            $('#reporter_phonenumber').addClass('is-invalid')
                            $('.errorPhonenumber').html(response.error.reporter_phonenumber);
                        } else {
                            $('#reporter_phonenumber').removeClass('is-invalid')
                            $('.errorPhonenumber').html('');
                        }
                        if (response.error.question_type) {
                            $('#question_type').addClass('is-invalid')
                            $('.errorType').html(response.error.question_type);
                        } else {
                            $('#question_type').removeClass('is-invalid')
                            $('.errorType').html('');
                        }
                        if (response.error.question_subject) {
                            $('#question_subject').addClass('is-invalid')
                            $('.errorSubject').html(response.error.question_subject);
                        } else {
                            $('#question_subject').removeClass('is-invalid')
                            $('.errorSubject').html('');
                        }
                        if (response.error.question_detail) {
                            $('#question_detail').addClass('is-invalid')
                            $('.errorDetail').html(response.error.question_detail);
                        } else {
                            $('#question_detail').removeClass('is-invalid')
                            $('.errorDetail').html('');
                        }
                        if (response.error.attachment) {
                            $('#attachment').addClass('is-invalid')
                            $('.errorAttachment').html(response.error.attachment);
                        } else {
                            $('#attachment').removeClass('is-invalid')
                            $('.errorAttachment').html('');
                        }
                        if (response.error.captcha) {
                            $('#captcha').addClass('is-invalid')
                            $('.errorCaptcha').html(response.error.captcha);
                        } else {
                            $('#captcha').removeClass('is-invalid')
                            $('.errorCaptcha').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
                        clear_form();
                        grecaptcha.reset();
                        $('#modal-permohonan').modal('hide');
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }


            });

        });
    }

    function clear_form() {
        $("#id_report").val('');
        $("#reporter_fullname").val('');
        $("#reporter_nik").val('');
        $("#reporter_address").val('');
        $("#reporter_email").val('');
        $("#reporter_phonenumber").val('');
        $("#question_type").val('');
        $("#question_subject").val('');
        $("#question_detail").val('');
        $("#attachment").val('');
        grecaptcha.reset();
    }
</script>

<?= $this->EndSection(); ?>