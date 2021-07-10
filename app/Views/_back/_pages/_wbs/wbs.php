<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Data Tables -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables/dataTables.bootstrap4.min.css" />

<link rel="stylesheet" href="<?= base_url() ?>/assets/theme/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />

<script src="<?= base_url() ?>/assets/theme/plugins/datatables/jquery.dataTables.min.js"> </script>

<script src="<?= base_url() ?>/assets/theme/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"> </script>


<!-- /.content-header -->
<div class="content">

    <!-- /.card-header -->
    <div class="col-sm-12">
        <div class="card m-b-30">
            <!-- /.card-body -->
            <div class="card-body">
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
            </div>

        </div>
    </div>

</div><!-- /.container-fluid -->

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
<?= $this->endsection(); ?>