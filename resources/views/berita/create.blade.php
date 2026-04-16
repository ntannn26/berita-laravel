<h1>Tambah Berita</h1>

<form action="/store" method="POST">
    @csrf
    <input type="text" name="judul" placeholder="Judul"><br>
    <textarea name="isi" placeholder="Isi berita"></textarea><br>
    <button type="submit">Simpan</button>
</form>