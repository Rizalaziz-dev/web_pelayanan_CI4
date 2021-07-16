<table id="tabel-yankum" class="table">
    <thead class="thead-dark">
        <th>No</th>
        <th>No Laporan</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Subject</th>
        <th>Uraian Laporan</th>
        <th>Lampiran</th>
        <th>Actions</th>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        load_table();

    });

    function load_table() {
        $('#tabel-yankum').DataTable({
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Yankum/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });

    }
</script>