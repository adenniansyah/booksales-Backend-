<!DOCTYPE html>
<html>
<head>
    <title>Data Author Buku</title>
</head>
<body>
    <h2>Daftar Penulis (Author) Buku</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Penulis</th>
        </tr>
        @foreach($authors as $author)
        <tr>
            <td>{{ $author['id'] }}</td>
            <td>{{ $author['nama'] }}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <a href="/genre">Lihat Data Genre</a>
</body>
</html>