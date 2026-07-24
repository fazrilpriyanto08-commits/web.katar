<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Panitia - KATAR RT 012</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8fafc;
            color: #0f172a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .navbar-katar {
            background-color: #0f172a;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* CARD STYLING */
        .card-panitia {
            border: none;
            border-radius: 16px;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.25s ease;
            overflow: hidden;
        }

        .card-panitia:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        .card-leader {
            border-top: 4px solid #dc2626;
        }

        .card-subleader {
            border-top: 4px solid #475569;
        }

        .avatar-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
        }

        .member-list-item {
            padding: 0.6rem 0;
            border-bottom: 1px dashed #e2e8f0;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            color: #334155;
        }

        .member-list-item:last-child {
            border-bottom: none;
        }

        .badge-divisi {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 0.5rem 1rem;
            border-radius: 50rem;
            font-weight: 700;
        }

        /* RESPONSIVE OPTIMIZATION FOR MOBILE */
        @media (max-width: 576px) {
            .display-6 {
                font-size: 1.75rem;
            }
            .card-panitia {
                margin-bottom: 0.5rem;
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
            <div class="ms-auto">
                <a href="/" class="btn btn-outline-light btn-sm rounded-pill px-3 fw-bold">
                    <i class="bi bi-arrow-left me-1"></i> Beranda
                </a>
            </div>
        </div>
    </nav>

    <!-- HEADER TITLE -->
    <section class="py-5 text-center">
        <div class="container">
            <span class="badge bg-danger text-white px-3 py-2 rounded-pill fw-bold text-uppercase mb-2">
                HUT RI KE-81
            </span>
            <h1 class="fw-bold display-6 mb-2">Struktur Organisasi Panitia</h1>
            <p class="text-muted">Semangat Gotong Royong Menuju Hari Kemerdekaan RT 012</p>
        </div>
    </section>

    <!-- BAGIAN STRUKTUR PANITIA -->
    <section class="pb-5">
        <div class="container">
            
            <!-- 1. KETUA & WAKIL KETUA PANITIA -->
            <div class="row g-4 justify-content-center mb-4">
                
                <!-- KETUA -->
                <div class="col-md-5 col-lg-4">
                    <div class="card-panitia card-leader p-4 text-center h-100">
                        <div class="avatar-circle bg-danger bg-opacity-10 text-danger">
                            👑
                        </div>
                        <h4 class="fw-bold mb-1 text-dark">Revi Firmansyah</h4>
                        <span class="badge bg-danger text-white rounded-pill px-3 py-1 fw-bold">Ketua Panitia</span>
                    </div>
                </div>

                <!-- WAKIL KETUA -->
                <div class="col-md-5 col-lg-4">
                    <div class="card-panitia card-subleader p-4 text-center h-100">
                        <div class="avatar-circle bg-secondary bg-opacity-10 text-dark">
                            🎖️
                        </div>
                        <h4 class="fw-bold mb-1 text-dark">Mochammad Yafi</h4>
                        <span class="badge bg-secondary text-white rounded-pill px-3 py-1 fw-bold">Wakil Ketua</span>
                    </div>
                </div>

            </div>

            <!-- 2. SEKRETARIS & BENDAHARA -->
            <div class="row g-4 justify-content-center mb-4">
                
                <!-- SEKRETARIS -->
                <div class="col-md-6 col-lg-5">
                    <div class="card-panitia p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-warning text-dark badge-divisi me-2">📝 Divisi Sekretaris</span>
                        </div>
                        <div class="member-list">
                            <div class="member-list-item"><i class="bi bi-person-fill text-warning me-2 fs-5"></i> Salva Eka Ramadhani</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-warning me-2 fs-5"></i> Jasmine Najwa Maulida Hasri</div>
                        </div>
                    </div>
                </div>

                <!-- BENDAHARA -->
                <div class="col-md-6 col-lg-5">
                    <div class="card-panitia p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-success text-white badge-divisi me-2">💰 Divisi Bendahara</span>
                        </div>
                        <div class="member-list">
                            <div class="member-list-item"><i class="bi bi-person-fill text-success me-2 fs-5"></i> Rasya Sefita</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-success me-2 fs-5"></i> Alika Putri Aryani</div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 3. DIVISI OPERASIONAL -->
            <div class="row g-4 justify-content-center">
                
                <!-- DIVISI ACARA -->
                <div class="col-md-6 col-lg-5">
                    <div class="card-panitia p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-danger text-white badge-divisi me-2">🎯 Divisi Acara</span>
                        </div>
                        <div class="member-list">
                            <div class="member-list-item"><i class="bi bi-person-fill text-danger me-2 fs-5"></i> Almira Ramadhani Buana</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-danger me-2 fs-5"></i> Shafa Meliyani Sabirina</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-danger me-2 fs-5"></i> Vito Dewangga Maheswara</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-danger me-2 fs-5"></i> Keisha Anafiu</div>
                        </div>
                    </div>
                </div>

                <!-- DIVISI KONSUMSI -->
                <div class="col-md-6 col-lg-5">
                    <div class="card-panitia p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-primary text-white badge-divisi me-2">🧃 Divisi Konsumsi</span>
                        </div>
                        <div class="member-list">
                            <div class="member-list-item"><i class="bi bi-person-fill text-primary me-2 fs-5"></i> Dimas Mahendra</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-primary me-2 fs-5"></i> Pauzi Adhil Pratama</div>
                        </div>
                    </div>
                </div>

                <!-- DIVISI PERLENGKAPAN -->
                <div class="col-md-6 col-lg-5">
                    <div class="card-panitia p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-dark text-white badge-divisi me-2">📦 Divisi Perlengkapan</span>
                        </div>
                        <div class="member-list">
                            <div class="member-list-item"><i class="bi bi-person-fill text-dark me-2 fs-5"></i> Nur Aini Salsabila</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-dark me-2 fs-5"></i> Muhammad Fazril Nur Priyanto</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-dark me-2 fs-5"></i> Nyimas Kalamsyah Al Maira Kalzetta Rainhard</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-dark me-2 fs-5"></i> Satria Ramadhan</div>
                        </div>
                    </div>
                </div>

                <!-- DIVISI PDD -->
                <div class="col-md-6 col-lg-5">
                    <div class="card-panitia p-4 h-100">
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-info text-dark badge-divisi me-2">📷 Divisi PDD (Pubdok)</span>
                        </div>
                        <div class="member-list">
                            <div class="member-list-item"><i class="bi bi-person-fill text-info me-2 fs-5"></i> Revalina Dwi Zunianty</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-info me-2 fs-5"></i> Naysila Abiela Darwis</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-info me-2 fs-5"></i> Rayya Faiza Ranna</div>
                            <div class="member-list-item"><i class="bi bi-person-fill text-info me-2 fs-5"></i> Reza Fachrizal Ariansyah</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark text-white py-4 border-top border-secondary text-center">
        <div class="container">
            <small class="text-white-50">Panitia Peringatan HUT RI Ke-81 • Karang Taruna RT 012</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>