<table id="tabel-tipikor" class="table">
    <thead class="thead-dark">
        <th>No</th>
        <th>No Laporan</th>
        <th>Nama Pelapor</th>
        <th>Subject</th>
        <th>Waktu Kejadian</th>
        <th>Tempat Kejadian</th>
        <th>Uraian Laporan</th>
        <th>Lampiran</th>
        <th>Actions</th>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        load_data();

    });

    function load_data() {
        $('#tabel-tipikor').DataTable({
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Tipikor/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });

    }
</script>