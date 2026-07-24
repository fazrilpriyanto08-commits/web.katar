<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karang Taruna RT 012</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">KATAR RT 012</a>
            <div class="ms-auto d-flex gap-2">
                <a href="/" class="btn btn-outline-light btn-sm">Beranda</a>
                <a href="/admin/pendaftar" class="btn btn-warning btn-sm fw-bold">
                    <i class="bi bi-shield-lock"></i> Dashboard Admin
                </a>
            </div>
        </div>
    </nav>

    <!-- BANNER HEROUSECTION -->
    <div class="bg-danger text-white py-5 text-center">
        <div class="container">
            <h1 class="fw-bold display-5">SELAMAT DATANG DI PORTAL KARANG TARUNA</h1>
            <p class="lead">Informasi Kegiatan, Perlombaan, dan Pengumuman RT 012 / RW 05</p>
        </div>
    </div>

    <!-- SEKSI PENGUMUMAN (NEWS FEED) -->
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-danger">
                <i class="bi bi-megaphone-fill me-2"></i>Pengumuman & Info Terkini
            </h2>
            <p class="text-muted">Pantau terus kabar dan pengumuman terbaru dari pengurus Karang Taruna</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse($pengumumans ?? [] as $info)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm rounded-3 border-start border-4 border-danger">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-danger px-3 py-2 rounded-pill">
                                    {{ $info->kategori ?? 'Info' }}
                                </span>
                                <small class="text-muted">
                                    <i class="bi bi-clock me-1"></i>{{ $info->created_at ? $info->created_at->diffForHumans() : '-' }}
                                </small>
                            </div>
                            <h5 class="fw-bold text-dark mt-3 mb-2">{{ $info->judul }}</h5>
                            <p class="card-text text-secondary">
                                {{ $info->isi }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-8 text-center py-4">
                    <div class="p-4 rounded-3 bg-white shadow-sm">
                        <i class="bi bi-info-circle text-danger fs-1 d-block mb-2"></i>
                        <p class="text-muted mb-0 fw-semibold">Belum ada pengumuman terbaru saat ini.</p>
                        <small class="text-muted">Pengumuman yang ditambahkan dari Dashboard Admin akan muncul otomatis di sini.</small>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <!-- SEKSI PERLOMBAAN -->
    <div class="bg-white py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-danger">
                    <i class="bi bi-trophy-fill me-2"></i>INFORMASI TERBARU PERLOMBAAN
                </h2>
                <p class="text-muted">Pantau terus status dan jadwal lomba di sini. Jangan sampai kelewatan!</p>
            </div>
            <!-- LIST LOMBA -->
            <div class="row g-4">
                @forelse($lombas ?? [] as $lomba)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <span class="badge bg-success mb-2">Terbuka</span>
                                <h5 class="fw-bold">{{ $lomba->nama_lomba }}</h5>
                                <p class="text-muted small">{{ $lomba->deskripsi }}</p>
                                <a href="/daftar-lomba/{{ $lomba->id }}" class="btn btn-outline-danger btn-sm w-100">Daftar Lomba</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Belum ada data lomba.</div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>