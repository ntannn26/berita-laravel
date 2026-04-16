<h1>Data Berita</h1>
<a href="/create">Tambah Berita</a>

@foreach($berita as $b)
    <h3>{{ $b->judul }}</h3>
    <p>{{ $b->isi }}</p>
@endforeach