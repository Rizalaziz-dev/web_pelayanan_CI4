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

                    <form action="">

                        <div class="form-group row pb-3 pt-3">
                            <label for="nama_lengkap_pelapor" class="col-md-3 col-form-label">Nama Lengkap</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nama_lengkap_pelapor" placeholder="Masukkan Nama Lengkap Anda">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="nik_pelapor" class="col-md-3 col-form-label">NIK</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nik_pelapor" placeholder="Masukkan (16 digit) NIK Anda">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="alamat_pelapor" class="col-md-3 col-form-label">Alamat (Sesuai KTP)</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="alamat_pelapor" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="email_pelapor" class="col-md-3 col-form-label">Alamat Email</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email_pelapor" placeholder="nama@contoh.com">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="nohp_pelapor" class="col-md-3 col-form-label">No. HP</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nohp_pelapor" placeholder="08xx xxxx xxxx">
                            </div>
                        </div>

                        <br><br>
                        <h5><strong>DATA LAPORAN</strong></h5>
                        <div class="form-group row pb-3 pt-3">
                            <label for="nama_pegawai" class="col-md-3 col-form-label">Nama Pegawai</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="nama_pegawai" placeholder="Mr. x">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="dugaan_pelanggaran" class="col-md-3 form-label">Dugaan Jenis Pelanggaran</label>
                            <div class="col-md-9">
                                <select name="dugaan_pelanggaran" id="dugaan_pelanggaran" class="form-control select2">
                                    <option value="">--Pilih Salah Satu--</option>
                                    <option value="Ujaran Kebencian">Ujaran Kebencian</option>
                                    <option value="Penyalahgunaan Wewenang">Penyalahgunaan Wewenang</option>
                                    <option value="Perbuatan Tercela">Perbuatan Tercela</option>
                                    <option value="Pungutan Liar">Pungutan Liar</option>
                                    <option value="Penerimaan Gratifikasis">Penerimaan Gratifikasis</option>
                                </select>
                                <div class="invalid-feedback errorGroup">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="waktu_kejadian" class="col-md-3 col-form-label">Waktu Kejadian</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="waktu_kejadian" placeholder="01 Januari 2021 (Siang)">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="tempat_kejadian" class="col-md-3 col-form-label">Tempat Kejadian</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="tempat_kejadian" placeholder="Kantor xxx">
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3">
                            <label for="uraian_laporan" class="col-md-3 col-form-label">Uraian Laporan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="uraian_laporan" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group row pb-3 pt-3 text-left">
                            <label for="file" class="col-md-3 form-label ">Upload dokumen pendukung (Jika ada)</label>
                            <div class="col-md-9">
                                <input type="file" name="file" id="file">
                                <p>Upload dalam bentuk .zip atau .rar (Penting : lampirkan foto KTP)</p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary"><i class="far fa-paper-plane"></i> Kirim Pengaduan</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</section>




<?= $this->EndSection(); ?>