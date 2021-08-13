<div class="table-responsive">
    <table id="tabel-tipikor" class="table display" style="width:100%">
        <thead class="thead-dark">

            <th>No</th>
            <th>No Laporan</th>
            <th>Nama Pelapor</th>
            <th class="text-center">Subject</th>
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
        load_data();



    });

    function download(report_id) {

        $.ajax({
            type: "post",
            url: "<?= site_url('Back/Tipikor/download') ?>",
            data: {
                report_id: report_id
            },
            dataType: "json",
            success: function(response) {

                // $.getJSON()

                // Toast.fire({
                //     type: 'success',
                //     title: 'Link download',
                //     text: response
                // })
                toastr.success(response.success)
                // console.log(response.success)

            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
        // })
    }

    function load_data() {
        $('#tabel-tipikor').DataTable({
            "autoWidth": false,
            "order": [],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "ajax": {
                "url": "<?php echo site_url('Back/Tipikor/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                    "targets": [0],
                    "className": 'text-center',
                    "orderable": false
                }, {
                    "targets": [9, 10],
                    "className": 'text-center',
                    "orderable": false
                },
                {
                    "targets": [1, 2, 3, 4, 5, 6, 7, 8, 9],
                    "className": "dt-head-center"
                }
            ],



        });

    }

    function edit(report_id) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('Back/Tipikor/edit') ?>",
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
            url: "<?php echo site_url('Back/Tipikor/view') ?>",
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
</script>