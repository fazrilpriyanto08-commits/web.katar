<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Perlombaan - KATAR RT 012</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8fafc;
            color: #1e293b;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .navbar-katar {
            background-color: #0f172a;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .card-lomba {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.2s ease-in-out;
        }

        .card-lomba:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .badge-kategori {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-katar sticky-top py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold text-white" href="/">
                <i class="bi bi-flag-fill text-danger fs-3 me-2"></i>
                <span>KATAR <span class="text-warning">RT 012</span></span>
            </a>
            <div class="ms-auto">
                <a href="/" class="btn btn-outline-light btn-sm rounded-pill px-3 fw-bold">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </nav>

    <!-- KONTEN DAFTAR LOMBA -->
    <section class="py-5">
        <div class="container py-2">
            
            <div class="text-center max-w-xl mx-auto mb-5">
                <span class="badge bg-danger text-white px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">Semarak Kemerdekaan</span>
                <h2 class="fw-bold display-6">Daftar Lomba RT 012</h2>
                <p class="text-muted">Pilih perlombaan yang ingin kamu ikuti dan daftarkan dirimu secara online!</p>
            </div>

            <div class="row g-4">

                <!-- 1. MASUKIN BENDERA (ANAK-ANAK) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-danger text-white p-4 text-center">
                            <i class="bi bi-flag fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Masukin Bendera</h5>
                            <small class="badge bg-white text-danger badge-kategori mt-2">Kategori: Anak-Anak</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-danger me-2"></i> Lapangan Utama RT 012</li>
                                <li><i class="bi bi-person-badge text-danger me-2"></i> Khusus Anak-Anak</li>
                            </ul>
                            <a href="/daftar-lomba/1" class="btn btn-danger w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 2. FUTSAL PAKE SARUNG -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-dark text-white p-4 text-center">
                            <i class="bi bi-dribbble fs-1 text-warning"></i>
                            <h5 class="fw-bold mt-2 mb-0">Futsal Pake Sarung</h5>
                            <small class="badge bg-warning text-dark badge-kategori mt-2">Kategori: Bapak / Umum</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-dark me-2"></i> Lapangan Bulutangkis</li>
                                <li><i class="bi bi-people text-dark me-2"></i> Tim / Perorangan</li>
                            </ul>
                            <a href="/daftar-lomba/2" class="btn btn-dark w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 3. SENDOK KELERENG (ANAK-ANAK) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-warning text-dark p-4 text-center">
                            <i class="bi bi-circle-fill fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Sendok Kelereng</h5>
                            <small class="badge bg-dark text-white badge-kategori mt-2">Kategori: Anak-Anak</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-warning me-2"></i> Area Balai Warga</li>
                                <li><i class="bi bi-person-badge text-warning me-2"></i> Khusus Anak-Anak</li>
                            </ul>
                            <a href="/daftar-lomba/3" class="btn btn-warning text-dark w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 4. TALI PING-PONG -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-danger text-white p-4 text-center">
                            <i class="bi bi-trophy fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Tali Ping-Pong</h5>
                            <small class="badge bg-white text-danger badge-kategori mt-2">Kategori: Umum / Remaja</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-danger me-2"></i> Lapangan Utama RT 012</li>
                                <li><i class="bi bi-person-check text-danger me-2"></i> Terbuka untuk Umum</li>
                            </ul>
                            <a href="/daftar-lomba/4" class="btn btn-danger w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 5. MEWARNAI (ANAK-ANAK) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-primary text-white p-4 text-center">
                            <i class="bi bi-palette fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Mewarnai</h5>
                            <small class="badge bg-white text-primary badge-kategori mt-2">Kategori: Anak PAUD / TK / SD</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i> Indoor Balai RT 012</li>
                                <li><i class="bi bi-pencil-fill text-primary me-2"></i> Bawa Alat Mewarnai Sendiri</li>
                            </ul>
                            <a href="/daftar-lomba/5" class="btn btn-primary w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 6. JOGET KORAN -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-success text-white p-4 text-center">
                            <i class="bi bi-music-note-beamed fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Joget Koran</h5>
                            <small class="badge bg-white text-success badge-kategori mt-2">Kategori: Berpasangan / Umum</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-success me-2"></i> Panggung Utama RT 012</li>
                                <li><i class="bi bi-people-fill text-success me-2"></i> Berpasangan (2 Orang)</li>
                            </ul>
                            <a href="/daftar-lomba/6" class="btn btn-success w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 7. MAKAN KERUPUK -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-danger text-white p-4 text-center">
                            <i class="bi bi-emoji-smile fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Makan Kerupuk</h5>
                            <small class="badge bg-white text-danger badge-kategori mt-2">Kategori: Anak-Anak / Umum</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-danger me-2"></i> Area Perlombaan RT 012</li>
                                <li><i class="bi bi-person-check text-danger me-2"></i> Terbuka untuk Semua</li>
                            </ul>
                            <a href="/daftar-lomba/7" class="btn btn-danger w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 8. KARUNG HELM -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-dark text-white p-4 text-center">
                            <i class="bi bi-shield-shaded fs-1 text-warning"></i>
                            <h5 class="fw-bold mt-2 mb-0">Karung Helm</h5>
                            <small class="badge bg-warning text-dark badge-kategori mt-2">Kategori: Remaja / Dewasa</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-dark me-2"></i> Lapangan Utama RT 012</li>
                                <li><i class="bi bi-person-fill text-dark me-2"></i> Wajib Helm (Disediakan)</li>
                            </ul>
                            <a href="/daftar-lomba/8" class="btn btn-dark w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 9. MASUKIN PAKU (ANAK-ANAK) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-secondary text-white p-4 text-center">
                            <i class="bi bi-bullseye fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Masukin Paku (Anak)</h5>
                            <small class="badge bg-white text-dark badge-kategori mt-2">Kategori: Anak-Anak</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-secondary me-2"></i> Area Perlombaan RT 012</li>
                                <li><i class="bi bi-person-badge text-secondary me-2"></i> Khusus Anak-Anak</li>
                            </ul>
                            <a href="/daftar-lomba/9" class="btn btn-secondary w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 10. MASUKIN PAKU (IBU-IBU) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-info text-dark p-4 text-center">
                            <i class="bi bi-flower1 fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Masukin Paku (Ibu)</h5>
                            <small class="badge bg-dark text-white badge-kategori mt-2">Kategori: Khusus Ibu-Ibu</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-info me-2"></i> Area Perlombaan RT 012</li>
                                <li><i class="bi bi-heart-fill text-info me-2"></i> Khusus Ibu-Ibu RT 012</li>
                            </ul>
                            <a href="/daftar-lomba/10" class="btn btn-info text-dark w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 11. TUSUK BALON -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-danger text-white p-4 text-center">
                            <i class="bi bi-balloon fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Tusuk Balon</h5>
                            <small class="badge bg-white text-danger badge-kategori mt-2">Kategori: Umum / Remaja</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-danger me-2"></i> Lapangan Utama RT 012</li>
                                <li><i class="bi bi-person-check text-danger me-2"></i> Perorangan</li>
                            </ul>
                            <a href="/daftar-lomba/11" class="btn btn-danger w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 12. PANCING KERUPUK (IBU-IBU) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-primary text-white p-4 text-center">
                            <i class="bi bi-tsunami fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Pancing Kerupuk</h5>
                            <small class="badge bg-white text-primary badge-kategori mt-2">Kategori: Khusus Ibu-Ibu</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i> Area Balai Warga</li>
                                <li><i class="bi bi-heart-fill text-primary me-2"></i> Khusus Ibu-Ibu RT 012</li>
                            </ul>
                            <a href="/daftar-lomba/12" class="btn btn-primary w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 13. IKAN KIPAS (ANAK-ANAK) -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-warning text-dark p-4 text-center">
                            <i class="bi bi-water fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Ikan Kipas</h5>
                            <small class="badge bg-dark text-white badge-kategori mt-2">Kategori: Anak-Anak</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-warning me-2"></i> Area Perlombaan RT 012</li>
                                <li><i class="bi bi-person-badge text-warning me-2"></i> Khusus Anak-Anak</li>
                            </ul>
                            <a href="/daftar-lomba/13" class="btn btn-warning text-dark w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

                <!-- 14. ESTAFET SPONS -->
                <div class="col-md-6 col-lg-4">
                    <div class="card-lomba h-100 overflow-hidden d-flex flex-column justify-content-between">
                        <div class="bg-success text-white p-4 text-center">
                            <i class="bi bi-moisture fs-1"></i>
                            <h5 class="fw-bold mt-2 mb-0">Estafet Spons</h5>
                            <small class="badge bg-white text-success badge-kategori mt-2">Kategori: Tim / Kelompok</small>
                        </div>
                        <div class="p-4 d-flex flex-column justify-content-between flex-grow-1">
                            <ul class="list-unstyled small text-muted mb-4">
                                <li class="mb-2"><i class="bi bi-geo-alt text-success me-2"></i> Lapangan Utama RT 012</li>
                                <li><i class="bi bi-people-fill text-success me-2"></i> Berkelompok (3-5 Orang)</li>
                            </ul>
                            <a href="/daftar-lomba/14" class="btn btn-success w-100 fw-bold py-2 rounded-pill">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>