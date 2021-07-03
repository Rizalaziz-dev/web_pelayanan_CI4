<?= $this->extend('_front/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">

        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-4 text-center">
                <h1>LAPDU TIPIKOR</h1>
                <h2>LAPORAN PENGADUAN TINDAK PIDANA KORUPSI (LAPDU TIPIKOR).</h2>
                <p>PERKARA TINDAK PIDANA KORUPSI PADA KEJAKSAAN NEGERI KABUPATEN TASIKMALAYA</p>

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
                    <h4><a href="">FORM PENGADUAN</a></h4>


                    <div class="row">
                        <div class="col-md-4">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>

                        </div>

                        <div class="col-md text-left">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
</section>




<?= $this->EndSection(); ?>