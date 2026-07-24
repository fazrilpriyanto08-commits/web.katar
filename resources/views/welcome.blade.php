<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karang Taruna RT 012 - Portal Resmi</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --katar-red: #dc2626;
            --katar-dark-red: #991b1b;
            --katar-yellow: #f59e0b;
        }

        body {
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* NAVBAR STYLING */
        .navbar-katar {
            background-color: #0f172a;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .nav-link {
            font-weight: 500;
            color: #cbd5e1 !important;
            transition: all 0.2s;
            padding: 0.5rem 1rem !important;
        }

        .nav-link:hover, .nav-link.active {
            color: #ffffff !important;
            transform: translateY(-1px);
        }

        /* HERO BANNER & COUNTDOWN */
        .hero-banner {
            background: linear-gradient(135deg, var(--katar-red) 0%, var(--katar-dark-red) 100%);
            position: relative;
            overflow: hidden;
        }

        .countdown-item {
            background: rgba(15, 23, 42, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            border-radius: 12px;
            padding: 0.75rem 1.25rem;
            min-width: 75px;
        }

        .btn-warning-custom {
            background-color: var(--katar-yellow);
            color: #0f172a;
            font-weight: 700;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-warning-custom:hover {
            background-color: #d97706;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(245, 158, 11, 0.3);
        }

        /* CARDS & SECTIONS */
        .card-custom {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-custom:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        .badge-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 700;
        }

        /* RESPONSIVE FIXES FOR MOBILE */
        @media (max-width: 768px) {
            .display-5 {
                font-size: 2.1rem;
            }
            .countdown-item {
                padding: 0.5rem 0.75rem;
                min-width: 60px;
            }
            .countdown-num {
                font-size: 1.5rem !important;
            }
        }
    </style>
</head>
<body>

    <!-- ========================================== -->
    <!-- 1. NAVBAR RESPONSIF -->
    <!-- ========================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-katar sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <i class="bi bi-flag-fill text-danger fs-3 me-2"></i>
                <span>KATAR <span class="text-warning">RT 012</span></span>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-2 mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/"><i class="bi bi-house-door me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#daftar-lomba"><i class="bi bi-trophy me-1"></i> Daftar Lomba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/panitia"><i class="bi bi-people me-1"></i> Struktur Panitia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/galeri"><i class="bi bi-images me-1"></i> Galeri Kegiatan</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="/login" class="btn btn-outline-light btn-sm px-3 py-2 rounded-pill fw-bold w-100 w-lg-auto">
                            <i class="bi bi-shield-lock me-1"></i> Portal Admin
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ========================================== -->
    <!-- 2. HERO BANNER + COUNTDOWN TIMER -->
    <!-- ========================================== -->
    <section class="hero-banner text-white py-5">
        <div class="container py-3">
            <div class="row align-items-center g-4">
                
                <!-- KIRI: TEKS UTAMA & COUNTDOWN -->
                <div class="col-lg-7 text-center text-lg-start">
                    <div class="d-inline-flex align-items-center bg-white bg-opacity-10 border border-white border-opacity-25 px-3 py-1 rounded-pill mb-3">
                        <span class="spinner-grow spinner-grow-sm text-warning me-2"></span>
                        <span class="small fw-bold text-uppercase text-warning">HUT RI KE-81 • SEMARAK RT 012</span>
                    </div>

                    <h1 class="display-5 fw-black text-white text-uppercase mb-3" style="font-weight: 900; line-height: 1.2;">
                        Menyambut Hari <br><span class="text-warning">Kemerdekaan RI</span>
                    </h1>

                    <p class="lead text-white-50 mb-4 pe-lg-4" style="font-size: 1.05rem;">
                        Portal resmi informasi kegiatan, perlombaan warga, dan pendaftaran online Karang Taruna RT 012. Mari meriahkan hari kemerdekaan dengan kebersamaan!
                    </p>

                    <!-- COUNTDOWN BOX -->
                    <div class="mb-4">
                        <small class="text-uppercase fw-bold text-white-50 d-block mb-2">Hitung Mundur Menuju 17 Agustus:</small>
                        <div class="d-flex justify-content-center justify-content-lg-start gap-2 text-center">
                            <div class="countdown-item">
                                <span class="h2 fw-bold text-warning mb-0 d-block countdown-num" id="cd-days">00</span>
                                <small class="text-white-50 text-uppercase" style="font-size: 0.65rem;">Hari</small>
                            </div>
                            <div class="countdown-item">
                                <span class="h2 fw-bold text-white mb-0 d-block countdown-num" id="cd-hours">00</span>
                                <small class="text-white-50 text-uppercase" style="font-size: 0.65rem;">Jam</small>
                            </div>
                            <div class="countdown-item">
                                <span class="h2 fw-bold text-white mb-0 d-block countdown-num" id="cd-minutes">00</span>
                                <small class="text-white-50 text-uppercase" style="font-size: 0.65rem;">Menit</small>
                            </div>
                            <div class="countdown-item">
                                <span class="h2 fw-bold text-warning mb-0 d-block countdown-num" id="cd-seconds">00</span>
                                <small class="text-white-50 text-uppercase" style="font-size: 0.65rem;">Detik</small>
                            </div>
                        </div>
                    </div>

                    <!-- TOMBOL AJAKAN -->
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                        <a href="#daftar-lomba" class="btn btn-warning-custom btn-lg px-4 py-3 rounded-pill">
                            🔥 Ikut Lomba Sekarang
                        </a>
                        <a href="#pengumuman" class="btn btn-outline-light btn-lg px-4 py-3 rounded-pill">
                            📢 Lihat Pengumuman
                        </a>
                    </div>
                </div>

                <!-- KANAN: FOTO PANITIA / HIGHLIGHT -->
                <div class="col-lg-5 text-center">
                    <div class="card-custom p-2 bg-white text-dark shadow-lg">
                        <img src="{{ asset('katar11.jpg') }}" alt="Panitia Karang Taruna" class="img-fluid rounded-3" style="max-height: 350px; width: 100%; object-fit: cover;">
                        <div class="p-3 text-center">
                            <h6 class="fw-bold mb-1 text-dark"><i class="bi bi-people-fill text-danger me-1"></i> Panitia Karang Taruna RT 012</h6>
                            <small class="text-muted">Siap Mengabdi untuk Kemajuan Lingkungan</small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 3. SEKSI PENGUMUMAN & INFO TERKINI -->
    <!-- ========================================== -->
    <section id="pengumuman" class="py-5">
        <div class="container py-2">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <div>
                    <h3 class="fw-bold m-0"><i class="bi bi-megaphone-fill text-danger me-2"></i>Pengumuman & Info Terkini</h3>
                    <p class="text-muted m-0 small">Informasi penting seputar kegiatan warga dan panitia</p>
                </div>
            </div>

            <div class="row g-4">
                @forelse($pengumumans ?? [] as $info)
                    <div class="col-md-6 col-lg-4">
                        <div class="card-custom h-100 p-4 border-top border-4 border-danger">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge bg-danger bg-opacity-10 text-danger badge-category px-3 py-2 rounded-pill">
                                    {{ $info->kategori ?? 'Informasi' }}
                                </span>
                                <small class="text-muted">{{ $info->created_at ? $info->created_at->diffForHumans() : 'Baru saja' }}</small>
                            </div>
                            <h5 class="fw-bold mb-2">{{ $info->judul }}</h5>
                            <p class="text-muted small mb-0">{{ $info->isi }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card-custom p-5 text-center text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary"></i>
                            <p class="mb-0">Belum ada pengumuman terbaru dari panitia.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ========================================== -->
    <!-- 4. SEKSI DAFTAR LOMBA INTERAKTIF -->
    <!-- ========================================== -->
    <section id="daftar-lomba" class="py-5 bg-white border-top">
        <div class="container py-2">
            <div class="text-center max-w-xl mx-auto mb-5">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Ayo Berpartisipasi</span>
                <h2 class="fw-bold">Daftar Perlombaan Kemerdekaan</h2>
                <p class="text-muted">Pilih lomba yang ingin kamu ikuti dan daftarkan dirimu secara online!</p>
            </div>

            <div class="row g-4">
                <!-- LOMBA 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-custom h-100 overflow-hidden">
                        <div class="bg-danger text-white p-4 text-center">
                            <i class="bi bi-trophy-fill fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Lomba Makan Kerupuk</h5>
                            <small class="text-white-50">Kategori: Anak-Anak</small>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-calendar-event text-danger me-2"></i> 17 Agustus 2026</li>
                                <li class="mb-2"><i class="bi bi-geo-alt text-danger me-2"></i> Lapangan RT 012</li>
                                <li><i class="bi bi-person-badge text-danger me-2"></i> Usia 5 - 12 Tahun</li>
                            </ul>
                            <a href="/daftar-lomba/1" class="btn btn-danger w-100 fw-bold py-2 rounded-pill">Daftar Lomba Ini</a>
                        </div>
                    </div>
                </div>

                <!-- LOMBA 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-custom h-100 overflow-hidden">
                        <div class="bg-dark text-white p-4 text-center">
                            <i class="bi bi-controller fs-1 text-warning"></i>
                            <h5 class="fw-bold mt-2 mb-0">Turnamen Mobile Legends</h5>
                            <small class="text-white-50">Kategori: Remaja / Umum</small>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-calendar-event text-warning me-2"></i> 16 Agustus 2026</li>
                                <li class="mb-2"><i class="bi bi-geo-alt text-warning me-2"></i> Balai Warga RT 012</li>
                                <li><i class="bi bi-people text-warning me-2"></i> Tim (5 Orang)</li>
                            </ul>
                            <a href="/daftar-lomba/2" class="btn btn-dark w-100 fw-bold py-2 rounded-pill">Daftar Lomba Ini</a>
                        </div>
                    </div>
                </div>

                <!-- LOMBA 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-custom h-100 overflow-hidden">
                        <div class="bg-warning text-dark p-4 text-center">
                            <i class="bi bi-dribbble fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Futsal Pakai Sarung</h5>
                            <small class="text-dark-50">Kategori: Bapak-Bapak</small>
                        </div>
                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-calendar-event text-warning me-2"></i> 17 Agustus 2026</li>
                                <li class="mb-2"><i class="bi bi-geo-alt text-warning me-2"></i> Lapangan Bulutangkis</li>
                                <li><i class="bi bi-person-check text-warning me-2"></i> Khusus Warga RT 012</li>
                            </ul>
                            <a href="/daftar-lomba/3" class="btn btn-warning text-dark w-100 fw-bold py-2 rounded-pill">Daftar Lomba Ini</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-4 border-top border-secondary">
        <div class="container text-center">
            <p class="mb-1 fw-bold">Karang Taruna RT 012 / RW 05</p>
            <small class="text-muted">Semarak Hari Kemerdekaan Republik Indonesia 2026</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- COUNTDOWN TIMER SCRIPT AUTOMATIS -->
    <script>
        // Tanggal Target: 17 Agustus 2026 Jam 08:00 WIB
        const targetDate = new Date("August 17, 2026 08:00:00").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const difference = targetDate - now;

            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                document.getElementById("cd-days").innerText = days < 10 ? '0' + days : days;
                document.getElementById("cd-hours").innerText = hours < 10 ? '0' + hours : hours;
                document.getElementById("cd-minutes").innerText = minutes < 10 ? '0' + minutes : minutes;
                document.getElementById("cd-seconds").innerText = seconds < 10 ? '0' + seconds : seconds;
            } else {
                document.getElementById("cd-days").innerText = "00";
                document.getElementById("cd-hours").innerText = "00";
                document.getElementById("cd-minutes").innerText = "00";
                document.getElementById("cd-seconds").innerText = "00";
            }
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>
</html>