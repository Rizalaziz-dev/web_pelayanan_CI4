<table class="table">
    <thead class="thead-light">
        <tr>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        load_search();

    });

    function load_search() {
        var myArray = []

        buidTable(myArray)

        $.ajax({
            type: "get",
            url: "<?= site_url('Front/Tipikor/data_search') ?>",
            // data: data,
            dataType: "json",
            success: function(response) {
                myArray = response
                console.log(Array);


            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }

        });
    }

    function buidTable(data) {
        var table = document.getElementById('tabel-search')

        for (var i = 0; i < data.length; i++) {
            var row = `<tr>
                    <td?>${data[i].updated_at}</td>
                    <td>${data[i].status}</td>
                 </tr>`

            table.innerHTML += row
        }
    }
</script>