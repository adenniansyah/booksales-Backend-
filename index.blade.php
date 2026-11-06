<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <!-- Bootstrap biar cantik -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5 bg-light">
    <div class="container bg-white p-4 rounded shadow">
        <h2 class="mb-4 text-center">📚 Daftar Buku Perpustakaan</h2>
        
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>ISBN</th>
                    <th>Tahun Terbit</th>
                    <th>Penulis</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td><strong>{{ $book->title }}</strong></td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>{{ $book->author->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>