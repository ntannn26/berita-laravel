<!DOCTYPE html>
<html>
<head>
    <title>Portal Berita</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
        }

        .navbar {
            padding: 15px 0;
        }

        /* HEADLINE BESAR */
        .headline {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
        }

        .headline img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .headline-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
        }

        /* CARD KECIL */
        .news-card {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            height: 200px;
        }

        .news-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-overlay {
            position: absolute;
            bottom: 0;
            padding: 10px;
            width: 100%;
            background: linear-gradient(transparent, rgba(0,0,0,0.7));
            color: #fff;
            font-size: 14px;
        }

        /* SIDEBAR */
        .sidebar {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
        }

        .sidebar h5 {
            margin-bottom: 15px;
        }

        .list-news {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .list-news img {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
        }

        .list-news p {
            font-size: 13px;
            margin: 0;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<!-- TOP BAR -->
<div style="background:#111; color:#ccc; font-size:13px;">
    <div class="container d-flex justify-content-between py-2">
        <div>
            <a href="#" class="text-light me-3 text-decoration-none">About</a>
            <a href="#" class="text-light me-3 text-decoration-none">Contact</a>
            <a href="#" class="text-light me-3 text-decoration-none">Advertise</a>
            <a href="#" class="text-light text-decoration-none">Work for us</a>
        </div>
        <div>
            <span class="me-3">📅 {{ date('d M Y') }}</span>
        </div>
    </div>
</div>

<!-- MAIN NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand fw-bold" href="#">
             PortalBerita
        </a>

        <!-- TOGGLE (MOBILE) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Blog Styles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Mega Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-danger" href="#">Shop</a>
                </li>
            </ul>

            <!-- ICON KANAN -->
            <div class="d-flex align-items-center gap-3">

                @if(session('login'))
                    <span class="fw-semibold">Halo, {{ session('name') }}</span>
                    <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
                @else
                    <a href="/login" class="btn btn-primary btn-sm">Login</a>
                @endif

                <a href="/create" class="btn btn-dark btn-sm">Tambah</a>
            </div>

        </div>

    </div>
</nav>

<div class="container mt-4">
    <div class="row">

        <!-- KONTEN -->
        <div class="col-lg-8">

            <!-- HEADLINE -->
            @if($berita->count() > 0)
            <div class="headline mb-4 shadow-sm">
                <img src="{{ $berita[0]->gambar ?? 'https://source.unsplash.com/800x600?news' }}">

                <div class="headline-overlay">
                    <h3>{{ $berita[0]->judul }}</h3>
                    <p>{{ Str::limit($berita[0]->isi, 150) }}</p>

                    <div class="mt-2">
                        <a href="/edit/{{ $berita[0]->id }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/delete/{{ $berita[0]->id }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin hapus?')">
                           Hapus
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- GRID -->
            <div class="row">
                @foreach($berita->skip(1) as $b)
                <div class="col-md-6 mb-3">
                    <div class="news-card shadow-sm">

                        <img src="{{ $b->gambar ?? 'https://source.unsplash.com/400x300?news' }}">

                        <div class="news-overlay">
                            <h6>{{ $b->judul }}</h6>

                            <div class="mt-2">
                                <a href="/edit/{{ $b->id }}" class="btn btn-warning btn-sm">Edit</a>

                                <a href="/delete/{{ $b->id }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus?')">
                                   Hapus
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>

        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">
            <div class="sidebar shadow-sm">

                <h5>Berita Terbaru</h5>

                @foreach($berita->take(5) as $b)
                <div class="list-news">
                    <img src="{{ $b->gambar ?? 'https://source.unsplash.com/100x100?news' }}">
                    <p>{{ Str::limit($b->judul, 50) }}</p>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</div>

</body>
</html>