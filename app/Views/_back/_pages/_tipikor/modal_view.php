<!-- Modal -->
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>DETAIL PELAPOR</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('', ['class' => 'form_view']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">

                <div class="form-group row pb-1 pt-3">
                    <label for="" class="col-md-3 col-form-label">No Laporan</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="id_report" name="id_report" value="<?= $report_id; ?>" disabled>
                        <div class="invalid-feedback errorFullname"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-3">
                    <label for="reporter_fullname" class="col-md-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="reporter_fullname" name="reporter_fullname" value="<?= $reporter_fullname; ?>" disabled>
                        <div class="invalid-feedback errorFullname"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-1">
                    <label for="reporter_nik" class="col-md-3 col-form-label">NIK</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="reporter_nik" name="reporter_nik" value="<?= $reporter_nik; ?>" disabled>
                        <div class="invalid-feedback errorNik"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-1">
                    <label for="reporter_address" class="col-md-3 col-form-label">Alamat (Sesuai KTP)</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="reporter_address" name="reporter_address" rows="3" disabled><?= $reporter_address; ?></textarea>
                        <div class="invalid-feedback errorAddress"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-1">
                    <label for="reporter_email" class="col-md-3 col-form-label">Alamat Email</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="reporter_email" name="reporter_email" value="<?= $reporter_email; ?>" disabled>
                        <div class="invalid-feedback errorEmail"></div>
                    </div>
                </div>

                <div class="form-group row pb-1 pt-1">
                    <label for="reporter_phonenumber" class="col-md-3 col-form-label">No. HP</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="reporter_phonenumber" name="reporter_phonenumber" value="<?= $reporter_phonenumber; ?>" disabled>
                        <div class="invalid-feedback errorPhonenumber"></div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>