<table id="tabel-suspect" class="table">
    <thead class="thead-dark">
        <th>No</th>
        <th>NIK</th>
        <th>Nama Tersangka</th>
        <th>TTL</th>
        <th>Jenis Kelamin</th>
        <!-- <th>Kebangsaan</th>
                        <th>Agama</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th> -->
        <th>Alamat</th>
        <!-- <th>Email</th>
                        <th>No Hp</th> -->
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
            url: "<?php echo site_url('Back/Sitaraa/Suspect/edit') ?>",
            data: {
                id_suspect: id_suspect
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

    function view(id_suspect) {
        $.ajax({
            type: "post",
            url: "<?php echo site_url('Back/Sitaraa/Suspect/view') ?>",
            data: {
                id_suspect: id_suspect
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

    function load_table() {
        $('#tabel-suspect').DataTable({
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
                "url": "<?php echo site_url('Back/Sitaraa/Suspect/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": [0, 3, 4, 5, 6],
                "orderable": false
            }],



        });


    }

    function remove(id_suspect) {
        Swal.fire({
            title: 'Hapus',
            text: `Yakin untuk menghapus data ini `,
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
                    url: "<?= site_url('Back/Sitaraa/Suspect/remove') ?>",
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
                            data_suspect();
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