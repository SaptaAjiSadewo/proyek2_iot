<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terbaru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Berita Terbaru</h1>

        @if(isset($news) && count($news) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Publikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $article)
                        <tr>
                            <td>{{ $article['title'] }}</td>
                            <td>{{ $article['description'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($article['publishedAt'])->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ $article['url'] }}" class="btn btn-primary" target="_blank">Baca Selengkapnya</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning" role="alert">
                Tidak ada berita yang tersedia saat ini.
            </div>
        @endif
    </div>
</body>
</html>