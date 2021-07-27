<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Data Tables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables/dataTables.bootstrap4.min.css" />

<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

<script src="<?= base_url() ?>/assets/theme/plugins/datatables/jquery.dataTables.min.js"> </script>

<script src="<?= base_url() ?>/assets/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"> </script>


<!-- /.content-header -->
<div class="content">

    <!-- /.card-header -->
    <div class="col-sm-12">
        <div class="card m-b-30">
            <!-- /.card-body -->
            <div class="card-body">
                <table id="tabel-wbs" class="table">
                    <thead class="thead-dark">
                        <th>No</th>
                        <th>No Laporan</th>
                        <th>Nama Pelapor</th>
                        <th>Nama Petugas</th>
                        <th>Jenis Pelanggaran</th>
                        <th>Waktu Kejadian</th>
                        <th>Tempat Kejadian</th>
                        <th>Uraian Laporan</th>
                        <th>Lampiran</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div><!-- /.container-fluid -->


<div class="view-modal" style="display: none;"></div>

<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form-add-edit" role="form">

                <div class="modal-body">

                    <h5 class="border-bottom border-primary pb-3"><strong>IDENTITAS PELAPOR</strong></h5>

                    <div class="form-group row pb-1 pt-3">
                        <label for="reporter_fullname" class="col-md-3 col-form-label">Nama Lengkap</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="reporter_fullname" name="reporter_fullname" placeholder="Masukkan Nama Lengkap Anda">
                            <div class="invalid-feedback errorFullname"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-1 pt-1">
                        <label for="reporter_nik" class="col-md-3 col-form-label">NIK</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="reporter_nik" name="reporter_nik" placeholder="Masukkan (16 digit) NIK Anda">
                            <div class="invalid-feedback errorNik"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-1 pt-1">
                        <label for="reporter_address" class="col-md-3 col-form-label">Alamat (Sesuai KTP)</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="reporter_address" name="reporter_address" rows="3"></textarea>
                            <div class="invalid-feedback errorAddress"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-1 pt-1">
                        <label for="reporter_email" class="col-md-3 col-form-label">Alamat Email</label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" id="reporter_email" name="reporter_email" placeholder="nama@contoh.com">
                            <div class="invalid-feedback errorEmail"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-1 pt-1">
                        <label for="reporter_phonenumber" class="col-md-3 col-form-label">No. HP</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="reporter_phonenumber" name="reporter_phonenumber" placeholder="08xx xxxx xxxx">
                            <div class="invalid-feedback errorPhonenumber"></div>
                        </div>
                    </div>

                    <br>
                    <h5 class="border-bottom border-primary pb-3"><strong>DATA LAPORAN</strong></h5>
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

                    <div class="form-group row pb-1 pt-1">
                        <label for="crime_scene" class="col-md-3 col-form-label">Tempat Kejadian</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="crime_scene" name="crime_scene" placeholder="Kantor xxx">
                            <div class="invalid-feedback errorScene"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-1 pt-1">
                        <label for="report_detail" class="col-md-3 col-form-label">Uraian Laporan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="report_detail" name="report_detail" rows="3"></textarea>
                            <div class="invalid-feedback errorDetail"></div>
                        </div>
                    </div>

                    <div class="form-group row pb-1 pt-1">
                        <label for="attachment" class="col-md-3 col-form-label">Lampiran</label>
                        <div class="col-md-9">
                            <img id="attachment">
                            <div class="invalid-feedback errorDetail"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        load_table();

        $('#form-add-edit').on('submit', function(e) {
            e.preventDefault();
        });

        $('#btn-edit').on('click', function() {
            //
        });

        $('#modal-edit').on('show.bs.modal', function() {
            //
        })

    });

    function edit(rowIndex) {
        if (rowIndex != undefined) {
            var table = $('#table-wbs').DataTable();

            var data = table.row(rowIndex).data();

            $('#employee_name').val(data["Nama Petugas"]);

            $('#modal-edit').modal('show');
        }
    }

    function load_table() {
        $('#tabel-wbs').DataTable({
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Wbs/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });

    }
</script>

<?= $this->endsection(); ?>