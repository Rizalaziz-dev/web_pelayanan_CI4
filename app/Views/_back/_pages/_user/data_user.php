<table id="tabel-user" class="table">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Fullname</th>
            <th>No HP</th>
            <th>Group</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 0;
        foreach ($show_user as $row) :
            $nomor++;
        ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $row['user_email']; ?></td>
                <td><?= $row['user_fullname']; ?></td>
                <td><?= $row['user_phonenumber']; ?></td>
                <td><?= $row['user_level']; ?></td>
                <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="edit('<?= $row['user_email'] ?>')">
                        <i class="fa fa-tags"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="remove('<?= $row['user_email'] ?>')">
                        <i class="fa fa-trash"></i>
                    </button>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tabel-user').DataTable();
    });

    function edit(user_email) {
        $.ajax({
            type: "post",
            url: "<?= site_url('Back/users/form_edit') ?>",
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