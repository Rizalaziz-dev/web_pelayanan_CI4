<?= $this->extend('_front/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-4 text-center">
                <h1>WBS</h1>
                <h2>WHISTLE BLOWING SYSTEM (WBS).</h2>
                <p>WHISTLE BLOWING SYSTEM PADA KEJAKSAAN NEGERI KABUPATEN TASIKMALAYA</p>

            </div>
        </div>

    </div>
</section>
<!-- End Hero -->

<!-- form group -->
<section id="services" class="services section-bg ">
    <div class="container" data-aos="fade-up">
        <div class="icon-box text-left rounded border-bottom border-primary">
            <h4 class="border-bottom border-primary pb-3">
                <strong>FORM PENGADUAN</strong>
            </h4>


            <div class="row p-2 pt-4">
                <div class="col-md-4">
                    <div class="p-2 pt-4 rounded bg-danger">
                        <div class="mb-3">
                            <label class="form-label text-light"><strong> PERLINDUNGAN BAGI PELAPOR!</strong></label>
                            <p class="text-light text-justify">Jika memiliki informasi maupun buktI-bukti terjadinya korupsi, jangan ragu untuk
                                melaporkannya kepada kami. Kerahasiaan identitas pelapor
                                dijamin selama pelapor tdak mempublikasikan sendiri perihal
                                laporan tersebut.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md text-left">
                    <h5><strong>IDENTITAS PELAPOR</strong></h5>

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
                            <input type="text" class="form-control" id="reporter_nik" name="reporter_nik" placeholder="Masukkan (16 digit) NIK Anda">
                            <div class="invalid-feedback errorNik"></div>
                        </div>
                    </div>

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

                    <br><br>
                    <h5><strong>DATA LAPORAN</strong></h5>
                    <div class="form-group row pb-3 pt-3">
                        <label for="employee_name" class="col-md-3 col-form-label">Nama Pegawai</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="employee_name" name="employee_name" placeholder="Mr. x">
                            <div class="invalid-feedback errorEmployee"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-3 pt-3">
                        <label for="violation_type" class="col-md-3 form-label">Dugaan Jenis Pelanggaran</label>
                        <div class="col-md-9">
                            <select name="violation_type" id="violation_type" class="form-control select2">
                                <option value="">--Pilih Salah Satu--</option>
                                <option value="Ujaran Kebencian">Ujaran Kebencian</option>
                                <option value="Penyalahgunaan Wewenang">Penyalahgunaan Wewenang</option>
                                <option value="Perbuatan Tercela">Perbuatan Tercela</option>
                                <option value="Pungutan Liar">Pungutan Liar</option>
                                <option value="Penerimaan Gratifikasis">Penerimaan Gratifikasis</option>
                            </select>
                            <div class="invalid-feedback errorViolation">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row pb-3 pt-3">
                        <label for="occurre_time" class="col-md-3 col-form-label">Waktu Kejadian</label>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-sm">
                                    <div class="row">
                                        <div class="col-sm">
                                            <input id="calendar_day" name="calendar_day" type="number" class="form-control" placeholder="Day" autocomplete="off" maxlength="2" />
                                        </div>

                                        <div class="col-sm">
                                            <input id="calendar_month" name="calendar_month" type="number" class="form-control" placeholder="Month" autocomplete="off" maxlength="2" />
                                        </div>

                                        <div class="col-sm">
                                            <input id="calendar_year" name="calendar_year" type="number" class="form-control" placeholder="Year" autocomplete="off" maxlength="4" />
                                        </div>

                                        <div class="col-sm">
                                            <input type="text" class="form-control" id="occurre_time" name="occurre_time" placeholder="Siang">
                                            <div class="invalid-feedback errorOccurre"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row pb-3 pt-3">
                        <label for="crime_scene" class="col-md-3 col-form-label">Tempat Kejadian</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="crime_scene" name="crime_scene" placeholder="Kantor xxx">
                            <div class="invalid-feedback errorScene"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-3 pt-3">
                        <label for="report_detail" class="col-md-3 col-form-label">Uraian Laporan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="report_detail" name="report_detail" rows="3"></textarea>
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

                    <button type="submit" class="btn btn-outline-primary btn-send "><i class="far fa-paper-plane"></i> Kirim Pengaduan</button>


                    <?= form_close() ?>



                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        $(function() {
            $("#calendar_day").datepicker({
                format: "dd",
                useCurrent: false,
                todayHighlight: true,
                autoclose: true
            })
            $("#calendar_month").datepicker({
                format: "mm",
                useCurrent: false,
                startView: "months",
                minViewMode: "months",
                todayHighlight: true,
                autoclose: true
            })
            $("#calendar_year").datepicker({
                format: "yyyy",
                useCurrent: false,
                startView: "years",
                minViewMode: "years",
                todayHighlight: true,
                autoclose: true
            })
        });

        save();

    });

    function save() {
        $('.btn-send').click(function(e) {
            e.preventDefault();

            var id_report = $("#id_report").val();
            var r_fullname = $("#reporter_fullname").val();
            var r_nik = $("#reporter_nik").val();
            var r_address = $("#reporter_address").val();
            var r_email = $("#reporter_email").val();
            var r_phonenumber = $("#reporter_phonenumber").val();
            var employee_name = $("#employee_name").val();
            var violation_type = $("#violation_type").val();
            var occurre_time = $("#occurre_time").val();
            var calendar_day = $("#calendar_day").val();
            var calendar_month = $("#calendar_month").val();
            var calendar_year = $("#calendar_year").val();
            var crime_scene = $("#crime_scene").val();
            var report_detail = $("#report_detail").val();
            var attachment = $("#attachment")[0].files[0];

            let data = new FormData();

            data.append("id_report", id_report)
            data.append("reporter_fullname", r_fullname)
            data.append("reporter_nik", r_nik)
            data.append("reporter_address", r_address)
            data.append("reporter_email", r_email)
            data.append("reporter_phonenumber", r_phonenumber)
            data.append("employee_name", employee_name)
            data.append("violation_type", violation_type)
            data.append("occurre_time", occurre_time)
            data.append("calendar_day", calendar_day)
            data.append("calendar_month", calendar_month)
            data.append("calendar_year", calendar_year)
            data.append("crime_scene", crime_scene)
            data.append("report_detail", report_detail)
            data.append("attachment", attachment)

            $.ajax({
                type: "post",
                url: "<?= site_url('Front/Wbs/save_data') ?>",
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
                    $('.btn-send').html('<i class="far fa-paper-plane"></i> Kirim Pengaduan');
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
                        if (response.error.employee_name) {
                            $('#employee_name').addClass('is-invalid')
                            $('.errorEmployee').html(response.error.employee_name);
                        } else {
                            $('#employee_name').removeClass('is-invalid')
                            $('.errorEmployee').html('');
                        }
                        if (response.error.violation_type) {
                            $('#violation_type').addClass('is-invalid')
                            $('.errorViolation').html(response.error.violation_type);
                        } else {
                            $('#violation_type').removeClass('is-invalid')
                            $('.errorViolation').html('');
                        }
                        if (response.error.occurre_time) {
                            $('#occurre_time').addClass('is-invalid')
                            $('.errorOccurre').html(response.error.occurre_time);
                        } else {
                            $('#occurre_time').removeClass('is-invalid')
                            $('.errorOccure').html('');
                        }
                        if (response.error.crime_scene) {
                            $('#crime_scene').addClass('is-invalid')
                            $('.errorScene').html(response.error.crime_scene);
                        } else {
                            $('#crime_scene').removeClass('is-invalid')
                            $('.errorScene').html('');
                        }
                        if (response.error.report_detail) {
                            $('#report_detail').addClass('is-invalid')
                            $('.errorDetail').html(response.error.report_detail);
                        } else {
                            $('#report_detail').removeClass('is-invalid')
                            $('.errorDetail').html('');
                        }
                        if (response.error.attachment) {
                            $('#attachment').addClass('is-invalid')
                            $('.errorAttachment').html(response.error.attachment);
                        } else {
                            $('#attachment').removeClass('is-invalid')
                            $('.errorAttachment').html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        })
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
        $("#id_report").val('');
        $("#reporter_fullname").val('');
        $("#reporter_nik").val('');
        $("#reporter_address").val('');
        $("#reporter_email").val('');
        $("#reporter_phonenumber").val('');
        $("#employee_name").val('');
        $("#violation_type").val('');
        $("#occurre_time").val('');
        $("#calendar_day").val('');
        $("#calendar_month").val('');
        $("#calendar_year").val('');
        $("#crime_scene").val('');
        $("#report_detail").val('');
        $("#attachment").val('');
    }
</script>


<?= $this->EndSection(); ?>