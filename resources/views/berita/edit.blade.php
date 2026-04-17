<!DOCTYPE html>
<html>
<head>
    <title>Edit Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h3 class="mb-4">Edit Berita</h3>

    <div class="card shadow p-4">
        <form action="/update/{{ $berita->id }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}">
            </div>

            <div class="mb-3">
                <label>Isi</label>
                <textarea name="isi" class="form-control" rows="5">{{ $berita->isi }}</textarea>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="/" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</div>

</body>
</html>