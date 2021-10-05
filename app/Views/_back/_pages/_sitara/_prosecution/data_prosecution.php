<table id="tabel-prosecution" class="table">
    <thead class="thead-dark">
        <th>No</th>
        <th>NIK</th>
        <th>Nama Tersangka</th>
        <th>TTL</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th colspan="2">Sidang Ke</th>
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
            url: "<?php echo site_url('Back/Sitaraa/prosecution/edit') ?>",
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

    function add(id_suspect) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('Back/Sitaraa/prosecution/add') ?>",
            data: {
                id_suspect: id_suspect
            },
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $('.view-modal').html(response.success).show();
                    $('#modal-add-trial').modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        });

    }


    function load_table() {
        $('#tabel-prosecution').DataTable({
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
                "url": "<?php echo site_url('Back/Sitaraa/prosecution/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0, 3, 4, 5, 6],
                "orderable": false
            }],

        });
    }

    function next(id_suspect) {
        Swal.fire({
            title: 'Selesai',
            text: `Apakah data ini sudah selesai? `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: "<?= site_url('Back/Sitaraa/prosecution/next') ?>",
                    data: {
                        id_suspect: id_suspect
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.success,
                            });
                            data_preprosecution();
                        }

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
        })
    }
</script>