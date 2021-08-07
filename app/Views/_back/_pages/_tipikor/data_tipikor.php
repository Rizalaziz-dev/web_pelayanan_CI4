<div class="table-responsive">
    <table id="tabel-tipikor" class="table">
        <thead class="thead-dark">
            <th>No</th>
            <th>No Laporan</th>
            <th>Nama Pelapor</th>
            <th>Subject</th>
            <th>Waktu Kejadian</th>
            <th>Tempat Kejadian</th>
            <th>Uraian Laporan</th>
            <!-- <th>Lampiran</th> -->
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

    function load_data() {
        $('#tabel-tipikor').DataTable({
            "autoWidth": false,
            "order": [],
            "processing": true,
            "serverSide": true,
            responsive: true,
            "ajax": {
                "url": "<?php echo site_url('Back/Tipikor/data') ?>",
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