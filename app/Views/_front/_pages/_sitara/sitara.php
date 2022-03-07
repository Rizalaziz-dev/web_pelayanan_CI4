<?= $this->extend('_front/_layout/template'); ?>

<?= $this->section('content'); ?>




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

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card-body">
                    <div class="input-group">
                        <input id="sitara_search" name="sitara_search" type="text" class="form-control" placeholder="Cari NIK Tersangka disini" aria-label="" aria-describedby="basic-addon1">
                        <!-- <div class="input-group-prepend">
                            <button class="btn btn-outline-danger btn-search" type="button">Search</button>
                        </div> -->
                        <div class="invalid-feedback errorSearch"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row justify-content-center">
            <div id="table-search" class="col-md-5">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Tersangka</th>
                            <th>:</th>
                            <th id="name"></th>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Nomor/Tanggal Perkara</th>
                                <th>Identitas Tersangka</th>
                                <th>Pasal Yang Dilanggar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="records_table">

                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->

        <table id="tabel-sitara" class="table">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nomor/Tanggal Perkara</th>
                    <th>Identitas Tersangka</th>
                    <th>Pasal Yang Dilanggar</th>
                    <th>Status</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>


    </div>
</section>
<!-- End Hero -->

<script>
    $(document).ready(function() {
        // document.getElementById("tabel-sitara").style.display = "none"; //Hide the table
        // search();
        // var oTable = $('#tabel-sitara').DataTable(); //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
        // $('#sitara_search').keyup(function() {
        //     oTable.search($(this).val()).draw();
        // })
        load_data();
        // show();
    });

    function load_data() {
        $('#tabel-sitara').DataTable({
            "dom": "t",
            "autoWidth": false,
            "order": [],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            // "searching": false,
            // "bFilter": true,
            // "ordering": false,
            // "info": false,
            // "paging": false,
            // "lengthChange": false,
            "ajax": {
                "url": "<?php echo site_url('Front/Sitara/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]

        });
        $("#listingData_filter").addClass("hidden");
        // $('#sitara_search').keyup(function() {
        //     oTable.search($(this).val()).draw();
        // })

        $("#sitara_search").on("input", function(e) {
            e.preventDefault();
            $('#tabel-sitara').DataTable().search($(this).val()).draw();
        });

    }

    function show() {
        $('.btn-search').click(function(e) {
            e.preventDefault();
            document.getElementById("tabel-sitara").style.display = "";

            $('.btn-search').attr("hidden", true);

            document.getElementById("sitara_search").disabled = true;
        });

    }

    function search() {
        $('.btn-search').click(function(e) {
            e.preventDefault();

            var sitara_search = $("#sitara_search").val();

            let data = new FormData();

            data.append("sitara_search", sitara_search)

            $.ajax({
                type: "post",
                url: "<?= site_url('Front/Sitara/get_data') ?>",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function() {
                    $('.btn-search').attr('disable', 'disabled');
                    $('.btn-search').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-search').removeAttr('disable');
                    $('.btn-search').html('Search');
                    $('.btn-search').attr("hidden", true);
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.sitara_search) {
                            $('#sitara_search').addClass('is-invalid')
                            $('.errorSearch').html(response.error.sitara_search);
                            document.getElementById("table-search").style.display = "none"; //Hide the table
                        } else {
                            $('#sitara_search').removeClass('is-invalid')
                            $('.errorSearch').html('');
                        }


                    } else {
                        document.getElementById("table-search").style.display = "";
                        $.each(response, function(i, item) {
                            var td = `</td>`;
                            // var th = `</th>`;
                            // $(`#records_info`).append(
                            //     $(`<tr>`),
                            //     $(`<th>`).text(`No Token`).append(th),
                            //     $(`<th>`).text(`:`).append(th),
                            //     $(`<th>`).text(item.subject).append(th),
                            //     $(`</tr>`),

                            // );
                            var $tr = $(`#records_table`).append(
                                $(`#name`).text(item.id_case).append,
                                $(`<tr>`),
                                $(`<td>`).text(item.id_case).append(td),
                                $(`<td>`).text(item.suspect_address).append(td),
                                $(`<td>`).text(item.suspect_phonenumber).append(td),
                            );
                            console.log(item.suspect_name)

                        });

                        // document.getElementById("btn-search").disabled = true;
                    }


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });

        });
    }
</script>



<?= $this->EndSection(); ?>