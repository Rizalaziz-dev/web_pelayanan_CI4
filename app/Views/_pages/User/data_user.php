<table id="tabel-user" class="table table-sm table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Fullname</th>
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
                <td><?= $row['user_group']; ?></td>
                <td>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tabel-user').DataTable();
    });
</script>