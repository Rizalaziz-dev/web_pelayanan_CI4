<div class="table-responsive">
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

<script>
    $(document).ready(function() {
        load_table();

    });

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


    // function load_table() {
    //     $('#tabel-wbs').DataTable({
    //         "autoWidth": false,
    //         "order": [],
    //         "processing": true,
    //         "serverSide": true,
    //         "responsive": true,
    //         "ajax": {
    //             "url": "<?php echo site_url('Back/Wbs/data') ?>",
    //             "type": "POST",
    //         },
    //         "columnDefs": [{
    //             "targets": [0],
    //             "orderable": false
    //         }],
    //         "dom": "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>>" +
    //             "<'row'<'col-md-12'tr>>" +
    //             "<'row'<'col-md-5'i><'col-md-7'p>>",
    //         "buttons": [
    //             'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
    //         ]
    //     });

    // }
</script>