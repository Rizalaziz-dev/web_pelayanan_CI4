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
                <p class="card-text view-data">

                </p>

            </div>

        </div>
    </div>

</div><!-- /.container-fluid -->

<div class="view-modal" style="display: none;"></div>



<script>
    $(document).ready(function() {
        data_wbs();

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

    function data_wbs() {
        $.ajax({
            url: "<?= site_url('Back/Wbs/get_data') ?>",
            dataType: "json",
            success: function(response) {
                $('.view-data').html(response.data);
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

    // function load_table() {
    //     $('#tabel-wbs').DataTable({
    //         "dom": "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>>" +
    //             "<'row'<'col-md-12'tr>>" +
    //             "<'row'<'col-md-5'i><'col-md-7'p>>",
    //         "buttons": [
    //             'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
    //         ],
    //         "autoWidth": false,
    //         "order": [],
    //         "processing": true,
    //         "serverSide": true,
    //         "responsive": true,
    //         "deferRender": true,
    //         "ajax": {
    //             "url": "<?php echo site_url('Back/Wbs/data') ?>",
    //             "type": "POST",
    //         },
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false
    //         }],



    //     });


    // }
</script>

<?= $this->endsection(); ?>