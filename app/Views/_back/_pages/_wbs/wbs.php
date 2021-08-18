<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Data Tables -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables/dataTables.bootstrap4.min.css" />

<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

<script src="<?= base_url() ?>/assets/theme/plugins/datatables/jquery.dataTables.min.js"> </script>

<script src="<?= base_url() ?>/assets/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"> </script> -->



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
                        <th colspan="2" class="text-center">Lampiran</th>
                        <th>Status</th>
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



<script>
    $(document).ready(function() {
        load_table();

        // $('#form-add-edit').on('submit', function(e) {
        //     e.preventDefault();
        // });

        // $('#btn-edit').on('click', function() {
        //     edit();
        // });

        // $('#modal-edit').on('show.bs.modal', function() {
        //     //
        // })

    });

    function edit(report_id) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('Back/Wbs/edit') ?>",
            data: {
                report_id: report_id
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('.view-modal').html(response.success).show();
                    $('#modal-edit').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        });

    }

    function view(report_id) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('Back/Wbs/view') ?>",
            data: {
                report_id: report_id
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('.view-modal').html(response.success).show();
                    $('#modal-view').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        });

    }

    // function edit(rowIndex) {
    //     if (rowIndex != undefined) {
    //         var rows = $('tr.immediate');
    //         var table = $('#table-wbs').DataTable();

    //         var data = table.rows(rows).data();
    //         // const rowClicked = table.row($(this).data());

    //         // $('#reporter_fullname').val(data.reporter_fullname);

    //         console.log(data);

    //         // $('#employee_name').val(data["Nama Petugas"]);

    //         $('#modal-edit').modal('show');
    //     }
    // }

    function load_table() {
        $('#tabel-wbs').DataTable({
            "dom": "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            "autoWidth": false,
            "order": [],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "deferRender": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Wbs/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }],



        });


    }
</script>

<?= $this->endsection(); ?>