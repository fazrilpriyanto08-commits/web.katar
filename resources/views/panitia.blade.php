<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Susunan Panitia - 17an</title>
    
    <!-- 1. Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- 2. Link ke file CSS terpisah kamu -->
    <link rel="stylesheet" href="{{ asset('panitia.css') }}">
</head>
<body class="bg-light">

    <!-- Navbar Atas -->
    <nav class="navbar navbar-dark bg-danger sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Katar 012</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Menu Garis Tiga (Sidebar) -->
    <div class="offcanvas offcanvas-end bg-danger text-white" tabindex="-1" id="offcanvasNavbar">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title fw-bold" id="offcanvasNavbarLabel">Navigasi</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item"><a class="nav-link text-white fw-semibold" href="/">🏠 Home & Lomba</a></li>
                <li class="nav-item"><a class="nav-link text-white-50 fw-semibold" href="/panitia">👥 Susunan Panitia</a></li>
            </ul>
        </div>
    </div>

    <!-- Konten Struktur Panitia -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-danger">Struktur Organisasi Panitia 17-an</h2>
            <p class="text-muted">Semangat Gotong Royong Menuju Hari Kemerdekaan</p>
        </div>

        <!-- Pucuk Pimpinan (Ketua & Wakil) -->
        <div class="row g-4 justify-content-center mb-5">
            <div class="col-md-5 text-center">
                <div class="card shadow border-0 border-top border-danger border-4 p-4">
                    <div class="bg-danger text-white avatar-circle d-inline-block mx-auto mb-3">👑</div>
                    <h4 class="fw-bold mb-1">Revi Firmansyah</h4>
                    <p class="text-danger fw-semibold mb-0">Ketua Panitia</p>
                </div>
            </div>
            <div class="col-md-5 text-center">
                <div class="card shadow border-0 border-top border-secondary border-4 p-4">
                    <div class="bg-secondary text-white avatar-circle d-inline-block mx-auto mb-3">🎖️</div>
                    <h4 class="fw-bold mb-1">Mochammad Yafi</h4>
                    <p class="text-secondary fw-semibold mb-0">Wakil Ketua</p>
                </div>
            </div>
        </div>

        <!-- Baris Divisi Administrasi (Sekretaris & Bendahara) -->
        <div class="row g-4 justify-content-center mb-5">
            <!-- Sekretaris -->
            <div class="col-md-5">
                <div class="card shadow border-0 h-100 p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning text-dark rounded p-2 fw-bold divisi-title w-100 text-center">📝 Divisi Sekretaris</div>
                    </div>
                    <div class="text-start">
                        <div class="custom-list-name border-secretary">Salva Eka Ramadhani</div>
                        <div class="custom-list-name border-secretary">Jasmine Najwa Maulida Hasri</div>
                    </div>
                </div>
            </div>
            <!-- Bendahara -->
            <div class="col-md-5">
                <div class="card shadow border-0 h-100 p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded p-2 fw-bold divisi-title w-100 text-center">💰 Divisi Bendahara</div>
                    </div>
                    <div class="text-start">
                        <div class="custom-list-name border-treasurer">Rasya Sefita</div>
                        <div class="custom-list-name border-treasurer">Alika Putri Aryani</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Baris Divisi Operasional -->
        <div class="row g-4 text-start">
            <!-- Divisi Acara -->
            <div class="col-md-6">
                <div class="card shadow border-0 h-100 p-4">
                    <h5 class="fw-bold text-danger mb-3 border-bottom pb-2 divisi-title">🎯 Divisi Acara</h5>
                    <div>
                        <div class="custom-list-name">Almira Ramadhani Buana</div>
                        <div class="custom-list-name">Shafa Meliyani Sabirina</div>
                        <div class="custom-list-name">Vito Dewangga Maheswara</div>
                        <div class="custom-list-name">Keisha Anafiu</div>
                    </div>
                </div>
            </div>

            <!-- Divisi Konsumsi -->
            <div class="col-md-6">
                <div class="card shadow border-0 h-100 p-4">
                    <h5 class="fw-bold text-danger mb-3 border-bottom pb-2 divisi-title">🍹 Divisi Konsumsi</h5>
                    <div>
                        <div class="custom-list-name">Dimas Mahendra</div>
                        <div class="custom-list-name">Pauzi adhil Pratama</div>
                    </div>
                </div>
            </div>

            <!-- Divisi Perlengkapan -->
            <div class="col-md-6">
                <div class="card shadow border-0 h-100 p-4">
                    <h5 class="fw-bold text-danger mb-3 border-bottom pb-2 divisi-title">📦 Divisi Perlengkapan</h5>
                    <div>
                        <div class="custom-list-name">Nur Aini Salsabila</div>
                        <div class="custom-list-name">Muhammad Fazril Nur Priyanto</div>
                        <div class="custom-list-name">Nyimas Kalamsyah Al Maira Kalzetta Rainhard</div>
                        <div class="custom-list-name">Satria Ramadhan</div>
                    </div>
                </div>
            </div>

            <!-- Divisi PDD -->
            <div class="col-md-6">
                <div class="card shadow border-0 h-100 p-4">
                    <h5 class="fw-bold text-danger mb-3 border-bottom pb-2 divisi-title">📸 Divisi PDD</h5>
                    <div>
                        <div class="custom-list-name">Revalina Dwi Zunianty</div>
                        <div class="custom-list-name">Naysila Abiela Darwis</div>
                        <div class="custom-list-name">Rayya Faiza Ranna</div>
                        <div class="custom-list-name">Reza Fachizilal Ariansyah</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>