<!DOCTYPE html>
<html>
<head>
    <title>Data Genre Buku</title>
</head>
<body>
    <h2>Daftar Genre Buku</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Genre</th>
        </tr>
        @foreach($genres as $genre)
        <tr>
            <td>{{ $genre['id'] }}</td>
            <td>{{ $genre['nama'] }}</td>
        </tr>
        @endforeach
    </table>
    <br>
    <a href="/author">Lihat Data Author</a>
</body>
</html>