<table id="tabel-preprosecution" class="table">
    <thead class="thead-dark">
        <th>No</th>
        <th>NIK</th>
        <th>Nama Tersangka</th>
        <th>TTL</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Actions</th>
    </thead>
    <tbody>

    </tbody>
</table>



<script>
    $(document).ready(function() {
        load_table();
    });

    function edit(id_suspect) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('Back/Sitaraa/preprosecution/edit') ?>",
            data: {
                id_suspect: id_suspect
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('.view-modal').html(response.success).show();
                    $('#modal-process').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        });

    }


    function load_table() {
        $('#tabel-preprosecution').DataTable({
            "searching": true,
            "bFilter": true,
            "ordering": false,
            "info": false,
            // "paging": false,
            // "lengthChange": false,
            "autoWidth": false,
            "order": [],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "deferRender": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Sitaraa/preprosecution/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0, 3, 4, 5, 6],
                "orderable": false
            }],



        });


    }
</script>