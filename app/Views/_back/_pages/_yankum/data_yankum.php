<div class="table-responsive">
    <table id="tabel-yankum" class="table">
        <thead class="thead-dark">
            <th>No</th>
            <th>No Laporan</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Subject</th>
            <th>Uraian Laporan</th>
            <th colspan="2" class="text-center">Lampiran</th>
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
        $('#tabel-yankum').DataTable({
            "autoWidth": false,
            "order": [],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Yankum/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0, 3, 4, 5, 8],
                "orderable": false
            }],
            "dom": "<'row'<'col-md-2'l><'col-md-6'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ]
        });

    }
</script>