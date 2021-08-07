<div class="tabel-responsive">
    <table id="tabel-user" class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>No HP</th>
                <th>Hak Akses</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        load_data();

    });

    function load_data() {
        var table = $('#tabel-user').DataTable({
            "autoWidth": false,
            "order": [],
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('Back/Users/data') ?>",
                "type": "POST",
            },
            "columnDefs": [{
                "targets": 0,
                "orderable": false
            }]

        })

    }


    function edit(user_email) {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/users/edit') ?>",
            data: {
                user_email: user_email
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

    function remove(user_email) {
        Swal.fire({
            title: 'Hapus',
            text: `Yakin untuk menghapus ${user_email} `,
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
                    url: "<?= site_url('Back/users/remove') ?>",
                    data: {
                        user_email: user_email
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.success,
                            });
                            data_user();
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