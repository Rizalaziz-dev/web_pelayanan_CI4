<?= $this->extend('_back/_layout/template'); ?>

<?= $this->section('content'); ?>


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
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <!-- <a href="" type="button" class="btn btn-primary btn-create">><i class="fa fa-back"></i> Create</a> -->


        </div>
    </div>

</div><!-- /.container-fluid -->


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
                "url": "<?php echo site_url('Back/Kepala/Wbs/DetailsSelesai/data_wbs') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }],



        });


    }
</script>

<?= $this->endsection(); ?>