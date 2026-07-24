<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - KATAR RT 012</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --bg-dark: #0b0f19;
            --card-dark: #161e2e;
            --border-dark: #2d3748;
            --text-light: #ffffff;
            --text-muted: #cbd5e1;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* --- SIDEBAR STYLE --- */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--card-dark);
            border-right: 1px solid var(--border-dark);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-dark);
        }

        .sidebar-menu {
            padding: 1rem 0;
            flex-grow: 1;
        }

        /* TAB LINK BTN IN SIDEBAR */
        .nav-link-admin {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.85rem 1.5rem;
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border: none;
            background: transparent;
            text-align: left;
            border-left: 3px solid transparent;
        }

        .nav-link-admin:hover, .nav-link-admin.active {
            color: #ffffff !important;
            background-color: rgba(255, 255, 255, 0.1) !important;
            border-left-color: #ffffff !important;
        }

        .nav-link-admin i {
            font-size: 1.2rem;
            margin-right: 0.75rem;
        }

        /* --- MAIN CONTENT AREA --- */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
        }

        .card-custom {
            background-color: var(--card-dark);
            border: 1px solid var(--border-dark);
            border-radius: 12px;
            overflow: hidden;
        }

        /* --- TABLE STYLING --- */
        .table-dark-custom {
            color: #ffffff !important;
            background-color: var(--card-dark) !important;
            margin-bottom: 0;
        }

        .table-dark-custom th {
            background-color: #0b0f19 !important;
            color: #ffffff !important;
            border-bottom: 1px solid var(--border-dark);
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            padding: 1rem;
        }

        .table-dark-custom td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-dark);
            vertical-align: middle;
            color: #f1f5f9 !important;
            background-color: var(--card-dark) !important;
        }

        .form-control-dark, .form-select-dark {
            background-color: #0b0f19;
            border: 1px solid var(--border-dark);
            color: #ffffff;
        }

        .form-control-dark:focus, .form-select-dark:focus {
            background-color: #0b0f19;
            border-color: #ffffff;
            color: #ffffff;
            box-shadow: none;
        }
    </style>
</head>
<body>

    <!-- ========================================== -->
    <!-- 1. SIDEBAR NAVIGATION -->
    <!-- ========================================== -->
    <div class="sidebar">
        <div>
            <!-- BRAND LOGO -->
            <div class="sidebar-brand d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="fw-bold m-0 text-white"><i class="bi bi-shield-lock-fill me-2"></i>KATAR PANEL</h5>
                    <small style="color: #94a3b8;">Admin Control Center</small>
                </div>
            </div>

            <!-- MENU TAB LINKS (PENGATUR MULTI-HALAMAN/TAB) -->
            <div class="sidebar-menu nav nav-pills flex-column" id="adminTab" role="tablist">
                <button class="nav-link-admin active" id="tab-pendaftar-btn" data-bs-toggle="pill" data-bs-target="#tab-pendaftar" type="button" role="tab">
                    <i class="bi bi-people text-white"></i> Pendaftar Lomba
                </button>
                
                <button class="nav-link-admin" id="tab-pengumuman-btn" data-bs-toggle="pill" data-bs-target="#tab-pengumuman" type="button" role="tab">
                    <i class="bi bi-megaphone text-white"></i> Kelola Pengumuman
                </button>
                
                <button class="nav-link-admin" id="tab-doorprize-btn" data-bs-toggle="pill" data-bs-target="#tab-doorprize" type="button" role="tab">
                    <i class="bi bi-gift text-white"></i> Wheel of Fortune <span class="badge bg-secondary ms-2 small" style="font-size:0.6rem">SOON</span>
                </button>

                <a href="/" target="_blank" class="nav-link-admin mt-3 border-top border-secondary">
                    <i class="bi bi-box-arrow-up-right text-white"></i> Lihat Beranda Utama
                </a>
            </div>
        </div>

        <!-- LOGOUT BUTTON -->
        <div class="p-3 border-top border-secondary">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 btn-sm text-start ps-3 py-2 fw-bold">
                    <i class="bi bi-box-arrow-left me-2"></i> Keluar / Logout
                </button>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 2. MAIN CONTENT AREA (KONTEN MULTI TAB) -->
    <!-- ========================================== -->
    <div class="main-content">
        
        <!-- HEADER DASHBOARD -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1 text-white">Dashboard Panitia</h3>
                <p class="mb-0" style="color: #cbd5e1;">Kelola informasi lomba dan pengumuman warga RT 012</p>
            </div>
            <div>
                <span class="badge bg-outline-light border px-3 py-2 rounded-pill text-white">
                    <i class="bi bi-person-circle me-1"></i> Logged as: Admin
                </span>
            </div>
        </div>

        <!-- NOTIFIKASI SUCCESS -->
        @if(session('success'))
            <div class="alert alert-success border-0 bg-success text-white alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- STATS SUMMARY CARDS -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card-custom p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-uppercase fw-bold" style="color: #cbd5e1;">Total Pendaftar Lomba</small>
                        <h2 class="fw-bold m-0 mt-1 text-white">{{ count($pendaftars ?? []) }} <span class="fs-6 font-normal" style="color: #94a3b8;">orang</span></h2>
                    </div>
                    <div class="bg-dark p-3 rounded-circle border border-secondary">
                        <i class="bi bi-person-lines-fill fs-3 text-white"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-uppercase fw-bold" style="color: #cbd5e1;">Total Pengumuman Aktif</small>
                        <h2 class="fw-bold m-0 mt-1 text-white">{{ count($pengumumans ?? []) }} <span class="fs-6 font-normal" style="color: #94a3b8;">postingan</span></h2>
                    </div>
                    <div class="bg-dark p-3 rounded-circle border border-secondary">
                        <i class="bi bi-broadcast fs-3 text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- WADAH TAB CONTENT -->
        <div class="tab-content" id="adminTabContent">
            
            <!-- ========================================== -->
            <!-- TAB 1: PENDAFTAR LOMBA -->
            <!-- ========================================== -->
            <div class="tab-pane fade show active" id="tab-pendaftar" role="tabpanel">
                <div class="card-custom">
                    <div class="card-header bg-transparent border-bottom border-secondary py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0 text-white">
                            <i class="bi bi-people-fill me-2"></i>Data Pendaftar Lomba
                        </h5>
                        <button onclick="window.print()" class="btn btn-sm btn-outline-light">
                            <i class="bi bi-printer me-1"></i> Cetak PDF
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-dark-custom mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Warga</th>
                                        <th>No. WhatsApp</th>
                                        <th>RT / RW</th>
                                        <th>Lomba ID</th>
                                        <th>Tanggal Daftar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pendaftars as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="fw-bold text-white">{{ $item->nama_warga }}</td>
                                            <td>
                                                <a href="https://wa.me/{{ preg_replace('/^0/', '62', $item->nomor_hp) }}" target="_blank" class="text-decoration-none text-info">
                                                    <i class="bi bi-whatsapp me-1"></i>{{ $item->nomor_hp }}
                                                </a>
                                            </td>
                                            <td><span class="badge bg-secondary">{{ $item->rt_rw ?? 'RT 012 / RW 05' }}</span></td>
                                            <td><span class="badge bg-light text-dark">Lomba #{{ $item->lomba_id }}</span></td>
                                            <td class="small text-white">{{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}</td>
                                            <td class="text-center">
                                                <form action="/admin/pendaftar/{{ $item->id }}" method="POST" onsubmit="return confirm('Hapus pendaftar ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-5 text-white fw-semibold">Belum ada pendaftar lomba.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 2: KELOLA PENGUMUMAN -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-pengumuman" role="tabpanel">
                <div class="card-custom">
                    <div class="card-header bg-transparent border-bottom border-secondary py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0 text-white">
                            <i class="bi bi-megaphone-fill me-2"></i>Kelola Pengumuman News Feed
                        </h5>
                        <button type="button" class="btn btn-light btn-sm fw-bold text-dark" data-bs-toggle="modal" data-bs-target="#modalTambahPengumuman">
                            <i class="bi bi-plus-lg me-1"></i> + Tambah Pengumuman
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-dark-custom mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Isi Pengumuman</th>
                                        <th>Kategori</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pengumumans ?? [] as $index => $info)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td class="fw-bold text-white">{{ $info->judul }}</td>
                                            <td class="text-white">{{ Str::limit($info->isi, 60) }}</td>
                                            <td><span class="badge bg-outline-light border text-white">{{ $info->kategori }}</span></td>
                                            <td class="text-center">
                                                <form action="/admin/pengumuman/{{ $info->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pengumuman ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="bi bi-trash"></i> Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5 text-white fw-semibold">Belum ada pengumuman yang diposting.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================== -->
            <!-- TAB 3: WHEEL OF FORTUNE (SOON) -->
            <!-- ========================================== -->
            <div class="tab-pane fade" id="tab-doorprize" role="tabpanel">
                <div class="card-custom p-5 text-center">
                    <i class="bi bi-gift fs-1 text-white mb-3 d-block"></i>
                    <h4 class="fw-bold text-white">Wheel of Fortune Doorprize</h4>
                    <p class="text-muted">Fitur undian Roda Doorprize akan segera dipasang di sini!</p>
                </div>
            </div>

        </div>

    </div>

    <!-- MODAL POP-UP FORM TAMBAH PENGUMUMAN -->
    <div class="modal fade" id="modalTambahPengumuman" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-custom text-white border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold text-white"><i class="bi bi-megaphone me-2"></i>Tambah Pengumuman</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/pengumuman" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small text-white fw-bold">Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control form-control-dark" placeholder="Contoh: Kerja Bakti RT" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-white fw-bold">Kategori</label>
                            <select name="kategori" class="form-select form-select-dark" required>
                                <option value="Info">Info</option>
                                <option value="Penting">Penting</option>
                                <option value="Jadwal">Jadwal</option>
                                <option value="Lomba">Lomba</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-white fw-bold">Isi Informasi</label>
                            <textarea name="isi" class="form-control form-control-dark" rows="4" placeholder="Tuliskan detail informasi..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-light fw-bold text-dark px-4">Terbitkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>