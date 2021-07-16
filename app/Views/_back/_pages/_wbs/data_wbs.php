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
        $('#tabel-wbs').DataTable({
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Wbs/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });

    }
</script>