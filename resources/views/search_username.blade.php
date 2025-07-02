<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link type="text/css" href="{{ url('assets_skklweb/css/materialize.min.css') }}" media="screen,projection"
        rel="stylesheet">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
 
<body>
    <div class="container">
        <div class="row">
            <h5>Search Name</h5>
            <div class="row">
                <div class="input-field col s12">
                    <input id="search" type="text" class="validate">
                    <label for="search">Nama Jemaat</label>
                </div>
            </div>
            <table>
                <thead id="table-header" style="display: none;">
                    <tr>
                        <th>Username</th>
                        <th>Nama Keluarga</th>
                    </tr>
                </thead>
                <tbody id="results">
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('assets_skklweb/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets_skklweb/js/materialize.min.js') }}"></script>
 
    <script>
        document.getElementById("search").addEventListener("keyup", function() {
            let query = this.value.trim();
            let tableHeader = document.getElementById("table-header");
 
            if (query.length > 0) {
                tableHeader.style.display = "table-header-group"; // Tampilkan header tabel
            } else {
                tableHeader.style.display = "none"; // Sembunyikan jika kosong
            }
        });
 
        $(document).ready(function() {
            $('#search').on('keyup', function() {
            let query = $(this).val().trim();
                if (query === '') {
                    $('#results').empty();
                    return;
                }
 
                $.ajax({
                    url: "{{ route('search.username.json') }}",
                    type: "GET",
                    data: {'query': query},
                    success: function(data) {
                        $('#results').empty();
                        if (data.length > 0) {
                        $.each(data, function(index, post) {
                            $('#results').append(`
                                <tr>
                                <td>${post.nama_pertama.toLowerCase()}${post.nama_belakang.toLowerCase()}</td>
                                <td>${post.nama_keluarga}</td>
                                </tr>
                            `);
                        });
                    } else {
                        $('#results').append('<tr><td colspan="3">Data tidak ditemukan</td></tr>');
                    }
                    }
                });
            });
        });
    </script>
</body>
 
</html>