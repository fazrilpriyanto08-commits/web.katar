<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Premium Panitia - Karang Taruna RW 012</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts untuk Tampilan Lebih Mahal -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            background-color: #fcfcfd;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2D3748;
        }

        /* Hero Text Gradient */
        .text-gradient {
            background: linear-gradient(135deg, #fff 30%, #ffd700 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Card Galeri Premium */
        .premium-gallery-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }

        /* Pembungkus Gambar & Efek Overlay */
        .img-wrapper {
            position: relative;
            overflow: hidden;
            height: 280px;
            background-color: #f7fafc;
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        /* Lapisan Merah Transparan Saat Di-Hover */
        .img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(220, 53, 69, 0) 40%, rgba(167, 29, 42, 0.7) 100%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: 2;
        }

        /* Aksi Aktor Hover */
        .premium-gallery-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(167, 29, 42, 0.12) !important;
        }

        .premium-gallery-card:hover .img-wrapper img {
            transform: scale(1.08) rotate(1deg);
        }

        .premium-gallery-card:hover .img-overlay {
            opacity: 1;
        }

        /* Badge Momen Kreatif */
        .moment-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            color: #a71d2a;
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            z-index: 10;
        }

        /* Desain Glassmorphism untuk Stat Box */
        .stat-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            padding: 12px 24px;
        }
    </style>
</head>
<body>

    <!-- Navbar Minimalis Berkelas -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-uppercase tracking-wider fs-5" href="{{ url('/') }}">🇮🇩 KATAR 012</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3 align-items-center">
                    <li class="nav-item"><a class="nav-link fw-medium text-white-50" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link fw-medium text-white-50" href="{{ url('/#lomba') }}">Daftar Lomba</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-white active" href="{{ url('/galeri') }}">Galeri Panitia</a></li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-warning btn-sm fw-bold text-dark px-4 py-2 rounded-pill shadow-sm" href="{{ url('/panitia') }}">👥 Struktur Panitia</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Agensi Kreatif (Mewah & Sinematik) -->
    <header class="py-5 text-white" style="background: radial-gradient(circle at top right, #c32f3c 0%, #17171b 100%);">
        <div class="container py-4 text-center">
            <span class="badge bg-danger text-white fw-bold px-3 py-2 rounded-pill text-uppercase mb-3 shadow-sm" style="font-size: 0.75rem; letter-spacing: 2px;">Dibalik Layar HUT RI</span>
            <h1 class="display-4 fw-extrabold text-uppercase tracking-tight mb-3"><span class="text-gradient">Jejak Bakti</span> Panitia</h1>
            <p class="text-white-50 fs-5 mx-auto mb-4" style="max-width: 650px; font-weight: 400; line-height: 1.6;">
                Setiap peluh, tawa, dan malam-malam panjang yang dikorbankan demi merajut kebahagiaan warga RW 012. Dirgahayu Republik Indonesia!
            </p>
            
            <!-- Statistik Interaktif -->
            <div class="d-flex justify-content-center gap-3 mt-2">
                <div class="stat-glass text-center">
                    <h3 class="fw-bold text-warning mb-0">13</h3>
                    <small class="text-white-50 small" style="font-size: 0.7rem;">Momen Emas</small>
                </div>
                <div class="stat-glass text-center">
                    <h3 class="fw-bold text-warning mb-0">1</h3>
                    <small class="text-white-50 small" style="font-size: 0.7rem;">Visi Bersama</small>
                </div>
            </div>
        </div>
    </header>

    <!-- Ruang Grid Dokumentasi Utama -->
    <main class="py-5">
        <div class="container">
            
            <div class="row g-4 justify-content-center">
                
                <!-- PROGRAM LOOPING OTOMATIS FOTO DARI KODE KAMU -->
                @for ($i = 1; $i <= 13; $i++)
                    @php
                        // Memastikan nama file sesuai struktur folder public kamu
                        $fileName = $i == 1 ? 'katar.jpg' : 'katar' . $i . '.jpg';
                        
                        // Kumpulan judul kustom bernarasi tinggi agar warga bangga membaca perjuangan kalian
                        $titles = [
                            1 => 'Rapat Pleno Konsep Besar', 2 => 'Pemasangan Bendera Lingkungan', 3 => 'Sterilisasi & Dekorasi Lapangan',
                            4 => 'Uji Coba Teknis Alat Lomba', 5 => 'Briefing Subuh Sebelum Tempur', 6 => 'Kekompakan Divisi Lapangan',
                            7 => 'Evaluasi Kilat & Manajemen Konflik', 8 => 'Dapur Umum & Logistik Energi', 9 => 'Canda Tawa di Sela Kelelahan',
                            10 => 'Sinergi Antar Anggota Pemuda', 11 => 'Tim Dokumentasi Pemburu Momen', 12 => 'Lembur Malam Finishing Atribut',
                            13 => 'Senyum Kemenangan Karang Taruna'
                        ];
                    @endphp

                    <div class="col-xl-4 col-md-6">
                        <div class="card premium-gallery-card">
                            <!-- Label Penanda Momen Premium -->
                            <div class="moment-badge">MEMORI #{{ sprintf('%02d', $i) }}</div>
                            
                            <!-- Gambar Bermutu Tinggi + Lapisan Gradasi -->
                            <div class="img-wrapper">
                                <div class="img-overlay"></div>
                                <img src="{{ asset($fileName) }}" alt="Dokumentasi Karang Taruna Momen {{ $i }}" loading="lazy">
                            </div>
                            
                            <!-- Deskripsi Cantik Minimalis -->
                            <div class="card-body p-4">
                                <h5 class="fw-bold text-dark mb-2 fs-5 transition-all" style="letter-spacing: -0.3px;">
                                    {{ $titles[$i] ?? 'Dokumentasi Khusus Panitia' }}
                                </h5>
                                <div class="d-flex align-items-center justify-content-between text-muted small border-top pt-2 mt-2">
                                    <span>📍 Wilayah RW 012</span>
                                    <span class="fw-semibold text-danger">Katar Aktif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor

            </div> <!-- End Row -->

            <!-- Navigasi Aksi Akhir -->
            <div class="text-center mt-5 pt-4">
                <a href="{{ url('/') }}" class="btn btn-danger btn-lg rounded-pill px-5 py-3 fw-bold shadow border-0 me-3 hover-lift" style="background-color: #a71d2a; font-size: 0.95rem;">
                    🏠 Kembali ke Beranda Utama
                </a>
                <a href="{{ url('/panitia') }}" class="btn btn-outline-dark btn-lg rounded-pill px-5 py-3 fw-bold" style="font-size: 0.95rem;">
                    👥 Kenali Struktur Panitia
                </a>
            </div>

        </div>
    </main>

    <!-- Footer Berkelas -->
    <footer class="py-4 bg-dark text-white-50 text-center small border-top border-secondary mt-5">
        <div class="container py-2">
            Made with 🔥 & Pride by **Karang Taruna RW 012** &copy; 2026. Seluruh hak cipta dokumentasi dilindungi.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>