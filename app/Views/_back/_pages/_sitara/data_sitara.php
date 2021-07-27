<table id="tabel-sitara" class="table">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Nomor Perkara</th>
            <th>Nama Tersangka</th>
            <th>SPDP</th>
            <th>Sangkaan Pasal</th>
            <th>Tanggal Terima Berkas</th>
            <th>Penyidik</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


    </tbody>
</table>

<script>
    $(document).ready(function() {
        load_data();

    });

    function load_data() {
        $('#tabel-sitara').DataTable({
            "order": [],
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('Back/Sitara/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });

    }
</script>