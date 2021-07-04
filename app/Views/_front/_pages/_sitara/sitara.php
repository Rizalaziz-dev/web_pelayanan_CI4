<?= $this->extend('_front/_layout/template'); ?>

<?= $this->section('content'); ?>


<!-- Data Tables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>



<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-4 text-center">
                <h1>SITARA</h1>
                <h2>SISTEM INFORMASI TAHAPAN PERKARA (SITARA).</h2>
                <p>PERKARA TINDAK PIDANA UMUM PADA KEJAKSAAN NEGERI KABUPATEN TASIKMALAYA</p>
            </div>
        </div>

    </div>
</section>
<!-- End Hero -->

<section id="services" class="services p-5">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-md" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box iconbox-blue">

                    <table id="tabel-sitara" class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Tersangka</th>
                                <th>Penyidik</th>
                                <th>Sangkaan Pasal</th>
                                <th>SPDP</th>
                                <th>Tanggal Terima Berkas</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>



                </div>
            </div>

        </div>
</section>

<script>
    $(document).ready(function() {
        $('#tabel-sitara').DataTable();
    });
</script>



<?= $this->EndSection(); ?>