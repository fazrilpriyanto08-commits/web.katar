<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karang Taruna RT012</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .hover-lift {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-lift:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2) !important;
        }
    </style>
    <body>
        <!-- === NAVBAR DENGAN MENU GARIS TIGA === -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3">
    <div class="container">
        <!-- Logo / Nama Aplikasi -->
        <a class="navbar-brand fw-bold text-uppercase tracking-wider" href="{{ url('/') }}">
            Katar RT 012
        </a>
        
        <!-- Tombol Garis Tiga (Muncul Otomatis di Layar HP) -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Isi Menu Link Navbar -->
<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-2 mt-2 mt-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-white-50 active" aria-current="page" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold text-white-50" href="#lomba">Daftar Lomba</a>
                </li>
                <!-- MENU BARU: Menuju ke Section Galeri -->
    <li class="nav-item">
    <a class="nav-link fw-semibold text-white-50" href="{{ url('/galeri') }}">Galeri Panitia</a>
        </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-warning btn-sm fw-bold text-dark px-3 rounded-pill" href="{{ url('/panitia') }}">
                        👥 Struktur Panitia
                    </a>
                </li>
            </ul>
        </div>
</nav>

    <header class="position-relative text-white overflow-hidden py-5 shadow" style="background: linear-gradient(135deg, #e63946 0%, #9b1c26 100%);">
    <!-- PERBAIKAN: Lingkaran hiasan dipindah ke pojok banget dan dikasih z-index agar di paling belakang -->
    <div class="position-absolute opacity-10 pointer-events-none rounded-circle bg-white" style="width: 300px; height: 300px; top: -100px; left: -100px; z-index: 0;"></div>
    <div class="position-absolute opacity-10 pointer-events-none rounded-circle bg-white" style="width: 200px; height: 200px; bottom: -50px; left: 30%; z-index: 0;"></div>
    
    <!-- Dikasih z-index 1 supaya teks selalu berada di depan lingkaran -->
    <div class="container position-relative py-5" style="z-index: 1;">
        <div class="row align-items-center g-5">
            <!-- Kolom Teks Kiri -->
            <div class="col-lg-7 text-center text-lg-start">
                <span class="badge bg-white text-danger px-3 py-2 rounded-pill fw-bold text-uppercase mb-3 shadow-sm" style="letter-spacing: 2px;">
        HUT RI ke-81
                </span>
                <h1 class="display-3 fw-black text-white mb-3 text-uppercase" style="text-shadow: 0 4px 12px rgba(0,0,0,0.15); line-height: 1.1; font-weight: 900;">
                    Menyambut Hari <br class="d-none d-lg-block"><span class="text-warning">Kemerdekaan RI</span>
                </h1>
                <p class="lead text-white-50 mb-4 fs-4 fw-light" style="max-width: 600px;">
                    Portal resmi informasi kegiatan, perlombaan lingkungan, dan pendaftaran online Karang Taruna RW 012. Mari semarakkan dengan semangat kebersamaan!
                </p>
                <div class="d-sm-flex justify-content-center justify-content-lg-start gap-3">
                    <a href="#lomba" class="btn btn-warning btn-lg px-5 py-3 fw-bold rounded-pill shadow-lg border-2 border-warning text-dark hover-lift">
                        🔥 Lihat Daftar Lomba
                    </a>
                </div>
            </div>
            
<!-- Kolom Kanan (Foto Tim Panitia - Versi Polos Modern) -->
                        <div class="col-lg-5 d-none d-lg-block text-center">
                            <div class="position-relative d-inline-block">
                                <!-- Bingkai Kotak Foto Panitia -->
                                <div class="position-relative border border-4 border-white shadow-lg overflow-hidden" style="width: 340px; border-radius: 12px; z-index: 1;">
                                    <!-- Menggunakan foto panitia dalam bentuk kotak asli (pastikan nama file di folder public sesuai) -->
                                    <img src="{{ asset('katar.jpg') }}" alt="Panitia" class="w-100 img-fluid" style="display: block;">
                                    
                                    <!-- Overlay teks di bagian bawah foto -->
                                    <div class="position-absolute bottom-0 start-0 w-100 py-2 text-center" style="background: rgba(155, 28, 38, 0.85); backdrop-filter: blur(2px);">
                                        <span class="text-warning fw-bold text-uppercase small" style="letter-spacing: 1px;">💪 Panitia RT 012</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Penutup row align-items-center g-5 -->
                </div> <!-- Penutup container position-relative py-5 -->
            </header>
</header>


<!-- Section: Lomba -->
<!-- PERBAIKAN: Background diganti #f1f3f5 biar tidak silau putih polos -->
<section id="lomba" class="py-5" style="background-color: #f1f3f5;">
    <div class="container py-4">
        
        @if(session('sukses'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow mb-4 p-3 fw-bold text-center" role="alert">
                🎉 {{ session('sukses') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <div class="text-center mb-5">
            <h2 class="fw-bold text-danger text-uppercase mb-2" style="letter-spacing: 1px;">🏆 Informasi Terbaru Perlombaan</h2>
            <p class="text-secondary lead fs-6 fw-medium">Pantau terus status dan jadwal lomba di sini. Jangan sampai kelewatan!</p>
            <div class="mx-auto bg-danger" style="width: 80px; height: 4px; border-radius: 2px;"></div>
        </div>

        <div class="row g-4">
            @foreach($daftarLomba as $lomba)
            
<div class="row g-4">
    @foreach($daftarLomba as $lomba)
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow border-0 border-top border-4 border-danger hover-lift transition-all" style="border-radius: 10px;">
                <div class="card-body p-4 d-flex flex-column justify-content-between">
                    <div>
                        <!-- Badge Status -->
                        <div class="mb-3">
                            @if($lomba->status == 'Terbuka' || $lomba->status == 'Pendaftaran Dibuka')
                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-bold" style="font-size: 0.75rem;">{{ $lomba->status }}</span>
                            @elseif($lomba->status == 'Penuh')
                                <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill fw-bold" style="font-size: 0.75rem;">{{ $lomba->status }}</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary px-3 py-2 rounded-pill fw-bold" style="font-size: 0.75rem;">{{ $lomba->status }}</span>
                            @endif
                        </div>

                        <!-- Nama Lomba -->
                        <h5 class="card-title fw-bold text-dark mb-3 fs-5" style="line-height: 1.4;">{{ $lomba->nama_lomba }}</h5>

                        <!-- Info Detail -->
                        <div class="p-3 rounded-3 mb-4" style="background-color: #f8f9fa; border: 1px solid #e9ecef;">
                            <div class="d-flex align-items-center mb-2 text-secondary small">
                                <span class="me-2 fs-6">📍</span>
                                <span>Lokasi: <strong class="text-dark">{{ $lomba->lokasi }}</strong></span>
                            </div>
                            <div class="d-flex align-items-center text-secondary small">
                                <span class="me-2 fs-6">⏰</span>
                                <span>Waktu: <strong class="text-dark">{{ $lomba->waktu }}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div> <!-- End Row -->

        </div> <!-- End Row -->

    </div> <!-- End Container -->
</section>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">&copy; 2026 Panitia Kemerdekaan RI. Made with ❤️</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>