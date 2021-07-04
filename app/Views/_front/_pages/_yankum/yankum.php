<?= $this->extend('_front/_layout/template'); ?>

<?= $this->section('content'); ?>

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

                        <div class="form-group row pt-3">
                            <label for="nama_lengkap_pelapor" class="col-md-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nama_lengkap_pelapor" placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="nik_pelapor" class="col-md-3 col-form-label">NIK</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nik_pelapor" placeholder="Masukkan (16 digit) NIK Anda">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="alamat_pelapor" class="col-md-3 col-form-label">Alamat (Sesuai KTP)</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="alamat_pelapor" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="email_pelapor" class="col-md-3 col-form-label">Alamat Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email_pelapor" placeholder="nama@contoh.com">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="nohp_pelapor" class="col-md-3 col-form-label">No. HP</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nohp_pelapor" placeholder="08xx xxxx xxxx">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 text-left">
                        <h5><strong>PERTANYAAN/MASALAH</strong></h5>
                        <div class="form-group row pt-3">
                            <label for="dugaan_pelanggaran" class="col-md-3 form-label">Kategori</label>
                            <div class="col-md-9">
                                <select name="dugaan_pelanggaran" id="dugaan_pelanggaran" class="form-control select2">
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
                                <div class="invalid-feedback errorGroup">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="subject" class="col-md-3 col-form-label">Subyek</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="subject" placeholder="Subyek">
                            </div>
                        </div>

                        <div class="form-group row pt-3">
                            <label for="isi_permohonan" class="col-md-3 col-form-label">Isi Permohonan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="isi_permohonan" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3 text-left">
                            <label for="file" class="col-md-3 form-label ">Upload dokumen pendukung (Jika ada)</label>
                            <div class="col-md-9">
                                <input type="file" name="file" id="file">
                                <p>Upload dalam bentuk .zip atau .rar (Penting : lampirkan foto KTP)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btn-tanyakami').click(function(e) {
            $('#modal-permohonan').modal('show');
        });
    });
</script>

<?= $this->EndSection(); ?>