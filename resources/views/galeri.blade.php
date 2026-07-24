<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Memori Panitia - KATAR RT 012</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --bg-dark: #0f172a;
            --katar-red: #b91c1c;
            --katar-dark-red: #7f1d1d;
        }

        body {
            background-color: #f8fafc;
            color: #1e293b;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .navbar-katar {
            background-color: var(--bg-dark);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* HERO HEADER STYLE */
        .hero-galeri {
            background: linear-gradient(135deg, var(--katar-red) 0%, var(--katar-dark-red) 100%);
            position: relative;
            overflow: hidden;
        }

        .stat-card-memori {
            background: rgba(15, 23, 42, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 1rem 1.5rem;
            min-width: 120px;
        }

        /* GALLERY CARD STYLE */
        .gallery-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
        }

        .gallery-card:hover {
            transform: translateY(-6px) scale(1.01);
            box-shadow: 0 16px 32px rgba(185, 28, 28, 0.15);
        }

        .gallery-img-wrapper {
            position: relative;
            width: 100%;
            height: 260px;
            overflow: hidden;
            background-color: #e2e8f0;
        }

        .gallery-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover .gallery-img-wrapper img {
            transform: scale(1.08);
        }

        .badge-memori {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(4px);
            color: #ffffff;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.35rem 0.85rem;
            border-radius: 50rem;
            letter-spacing: 0.5px;
            z-index: 2;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.8) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: flex-end;
            padding: 1.25rem;
            z-index: 1;
        }

        .gallery-card:hover .gallery-overlay {
            opacity: 1;
        }

        /* RESPONSIVE OPTIMIZATION FOR MOBILE */
        @media (max-width: 576px) {
            .gallery-img-wrapper {
                height: 220px;
            }
            .hero-galeri .display-5 {
                font-size: 1.8rem;
            }
            .gallery-overlay {
                opacity: 1; /* Selalu terlihat di HP supaya estetik */
                background: linear-gradient(to top, rgba(15, 23, 42, 0.7) 0%, transparent 70%);
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR RESPONSIF -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-katar sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-white" href="/">
                <i class="bi bi-flag-fill text-danger fs-3 me-2"></i>
                <span>KATAR <span class="text-warning">RT 012</span></span>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-2 mt-3 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="bi bi-house-door me-1"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/daftar-lomba"><i class="bi bi-trophy me-1"></i> Daftar Lomba</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/galeri"><i class="bi bi-images me-1"></i> Galeri Panitia</a>
                    </li>
                    <li class="nav-item ms-lg-2">
                        <a href="/panitia" class="btn btn-warning btn-sm px-3 py-2 rounded-pill fw-bold text-dark w-100 w-lg-auto">
                            👥 Struktur Panitia
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO HEADER BANNER -->
    <section class="hero-galeri text-white py-5 text-center">
        <div class="container py-3">
            <span class="badge bg-white bg-opacity-20 border border-white border-opacity-25 text-warning px-3 py-2 rounded-pill fw-bold text-uppercase mb-3">
                📸 DIBALIK LAYAR HUT RI KE-81
            </span>
            <h1 class="display-5 fw-black text-uppercase text-white mb-3" style="font-weight: 900;">
                Jejak <span class="text-warning">Bakti</span> Panitia
            </h1>
            <p class="lead text-white-50 mx-auto mb-4" style="max-width: 680px; font-size: 1.05rem;">
                Setiap peluh, tawa, dan malam-malam panjang yang dikorbankan demi merajut kebahagiaan warga RT 012. Kenangan indah ini milik kita bersama!
            </p>

            <!-- STATS COUNTER MEMORI -->
            <div class="d-flex justify-content-center gap-3">
                <div class="stat-card-memori text-center">
                    <span class="h2 fw-bold text-warning d-block mb-0">9+</span>
                    <small class="text-white-50 text-uppercase" style="font-size: 0.65rem;">Momen Emas</small>
                </div>
                <div class="stat-card-memori text-center">
                    <span class="h2 fw-bold text-white d-block mb-0">1</span>
                    <small class="text-white-50 text-uppercase" style="font-size: 0.65rem;">Visi Bersama</small>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERI FOTO GRID -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">

                <!-- MEMORI #01 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar11.jpg') }}', 'Kekompakan Panitia RT 012')">
                        <span class="badge-memori">MEMORI #01</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar11.jpg') }}" alt="Panitia RT 012" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Kebersamaan Panitia</h6>
                                    <small class="text-white-50">Semarak Kemerdekaan RT 012</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #02 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar5.jpg') }}', 'Makan Bersama Lesehan Panitia')">
                        <span class="badge-memori">MEMORI #02</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar5.jpg') }}" alt="Makan Bersama Panitia" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Tradisi Lesehan</h6>
                                    <small class="text-white-50">Kehangatan Syukuran Panitia</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #03 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar6.jpg') }}', 'Kumpul Santai Panitia Outdoor')">
                        <span class="badge-memori">MEMORI #03</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar6.jpg') }}" alt="Kumpul Panitia" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Gelak Tawa Bersama</h6>
                                    <small class="text-white-50">Momen Santai Luar Ruangan</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #04 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar7.jpg') }}', 'Rapat Persiapan Perlombaan')">
                        <span class="badge-memori">MEMORI #04</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar7.jpg') }}" alt="Rapat Panitia" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Diskusi & Perencanaan</h6>
                                    <small class="text-white-50">Persiapan Matang Lomba</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #05 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar8.jpg') }}', 'Gotong Royong Dekorasi Lapangan')">
                        <span class="badge-memori">MEMORI #05</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar8.jpg') }}" alt="Dekorasi Lapangan" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Kerja Keras Perlengkapan</h6>
                                    <small class="text-white-50">Menghias Lapangan RT 012</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #06 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar9.jpg') }}', 'Dokumentasi Divisi Acara')">
                        <span class="badge-memori">MEMORI #06</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar9.jpg') }}" alt="Divisi Acara" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Semangat Tim Acara</h6>
                                    <small class="text-white-50">Mengawal Jalannya Lomba</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #07 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar10.jpg') }}', 'Momen Evaluasi Malam Panitia')">
                        <span class="badge-memori">MEMORI #07</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar10.jpg') }}" alt="Evaluasi Malam" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Evaluasi Bersama</h6>
                                    <small class="text-white-50">Setiap Malam Penuh Cerita</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #08 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar12.jpg') }}', 'Foto Puncak Acara Kemerdekaan')">
                        <span class="badge-memori">MEMORI #08</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar12.jpg') }}" alt="Puncak Acara" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Panggung Kemerdekaan</h6>
                                    <small class="text-white-50">Malam Puncak Pembagian Hadiah</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MEMORI #09 -->
                <div class="col-md-6 col-lg-4">
                    <div class="gallery-card" onclick="openLightbox('{{ asset('katar13.jpg') }}', 'Senyum Bahagia Seluruh Panitia')">
                        <span class="badge-memori">MEMORI #09</span>
                        <div class="gallery-img-wrapper">
                            <img src="{{ asset('katar13.jpg') }}" alt="Senyum Panitia" loading="lazy">
                            <div class="gallery-overlay">
                                <div class="text-white">
                                    <h6 class="fw-bold mb-0"><i class="bi bi-zoom-in me-1"></i> Senyum Kemenangan</h6>
                                    <small class="text-white-50">Suksesnya Pesta Rakyat RT 012</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-4 border-top border-secondary text-center">
        <div class="container">
            <p class="mb-1 fw-bold">Karang Taruna RT 012 / RW 05</p>
            <small class="text-white-50">Kenangan Indah Peringatan HUT RI Ke-81</small>
        </div>
    </footer>

    <!-- LIGHTBOX MODAL FULLSCREEN FOTO -->
    <div class="modal fade" id="lightboxModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark text-white border-secondary rounded-4 overflow-hidden">
                <div class="modal-header border-secondary py-2">
                    <h6 class="modal-title fw-bold text-warning" id="lightboxTitle"><i class="bi bi-image me-2"></i>Foto Memori</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 text-center bg-black">
                    <img id="lightboxImage" src="" class="img-fluid" style="max-height: 80vh; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT LIGHTBOX POPUP -->
    <script>
        function openLightbox(imageSrc, caption) {
            document.getElementById('lightboxImage').src = imageSrc;
            document.getElementById('lightboxTitle').innerText = caption;
            var myModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
            myModal.show();
        }
    </script>
</body>
</html>