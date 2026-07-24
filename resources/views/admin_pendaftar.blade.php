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
            --bg-dark: #0f172a;
            --card-dark: #1e293b;
            --border-dark: #334155;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
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

        .nav-link-admin {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .nav-link-admin:hover, .nav-link-admin.active {
            color: #ffffff;
            background-color: rgba(255, 255, 255, 0.05);
            border-left-color: #ffffff;
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
        }

        .table-dark-custom {
            color: var(--text-light);
            background-color: transparent;
        }

        .table-dark-custom th {
            background-color: #0f172a;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border-dark);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 1rem;
        }

        .table-dark-custom td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-dark);
            vertical-align: middle;
            color: #e2e8f0;
        }

        .form-control-dark, .form-select-dark {
            background-color: #0f172a;
            border: 1px solid var(--border-dark);
            color: #ffffff;
        }

        .form-control-dark:focus, .form-select-dark:focus {
            background-color: #0f172a;
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
                    <small class="text-muted">Admin Control Center</small>
                </div>
            </div>

            <!-- MENU LINKS -->
            <div class="sidebar-menu">
                <a href="#pendaftar" class="nav-link-admin active">
                    <i class="bi bi-people"></i> Pendaftar Lomba
                </a>
                <a href="#pengumuman" class="nav-link-admin">
                    <i class="bi bi-megaphone"></i> Kelola Pengumuman
                </a>
                <a href="#doorprize" class="nav-link-admin text-muted opacity-50" title="Fitur Mendatang">
                    <i class="bi bi-gift"></i> Wheel of Fortune <span class="badge bg-secondary ms-2 small" style="font-size:0.6rem">SOON</span>
                </a>
                <a href="/" target="_blank" class="nav-link-admin mt-3 border-top border-secondary">
                    <i class="bi bi-box-arrow-up-right"></i> Lihat Beranda Utama
                </a>
            </div>
        </div>

        <!-- LOGOUT BUTTON -->
        <div class="p-3 border-top border-secondary">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 btn-sm text-start ps-3 py-2">
                    <i class="bi bi-box-arrow-left me-2"></i> Keluar / Logout
                </button>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 2. MAIN CONTENT AREA -->
    <!-- ========================================== -->
    <div class="main-content">
        
        <!-- HEADER DASHBOARD -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Dashboard Panitia</h3>
                <p class="text-muted mb-0">Kelola informasi lomba dan pengumuman warga RT 012</p>
            </div>
            <div>
                <span class="badge bg-outline-light border px-3 py-2 rounded-pill text-muted">
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
        <div class="row g-3 mb-5">
            <div class="col-md-6">
                <div class="card-custom p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted text-uppercase fw-bold">Total Pendaftar Lomba</small>
                        <h2 class="fw-bold m-0 mt-1">{{ count($pendaftars ?? []) }} <span class="fs-6 text-muted font-normal">orang</span></h2>
                    </div>
                    <div class="bg-dark p-3 rounded-circle border border-secondary">
                        <i class="bi bi-person-lines-fill fs-3 text-white"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-custom p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <small class="text-muted text-uppercase fw-bold">Total Pengumuman Aktif</small>
                        <h2 class="fw-bold m-0 mt-1">{{ count($pengumumans ?? []) }} <span class="fs-6 text-muted font-normal">postingan</span></h2>
                    </div>
                    <div class="bg-dark p-3 rounded-circle border border-secondary">
                        <i class="bi bi-broadcast fs-3 text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEKSI 1: DATA PENDAFTAR LOMBA -->
        <div id="pendaftar" class="card-custom mb-5">
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
                                    <td class="small text-muted">{{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}</td>
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
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada pendaftar lomba.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SEKSI 2: KELOLA PENGUMUMAN -->
        <div id="pengumuman" class="card-custom">
            <div class="card-header bg-transparent border-bottom border-secondary py-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold m-0 text-white">
                    <i class="bi bi-megaphone-fill me-2"></i>Kelola Pengumuman News Feed
                </h5>
                <button type="button" class="btn btn-light btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#modalTambahPengumuman">
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
                                    <td>{{ Str::limit($info->isi, 60) }}</td>
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
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada pengumuman yang diposting.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- MODAL POP-UP FORM TAMBAH PENGUMUMAN -->
    <div class="modal fade" id="modalTambahPengumuman" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-custom text-white border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold"><i class="bi bi-megaphone me-2"></i>Tambah Pengumuman</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/pengumuman" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label small text-muted fw-bold">Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control form-control-dark" placeholder="Contoh: Kerja Bakti RT" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-muted fw-bold">Kategori</label>
                            <select name="kategori" class="form-select form-select-dark" required>
                                <option value="Info">Info</option>
                                <option value="Penting">Penting</option>
                                <option value="Jadwal">Jadwal</option>
                                <option value="Lomba">Lomba</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small text-muted fw-bold">Isi Informasi</label>
                            <textarea name="isi" class="form-control form-control-dark" rows="4" placeholder="Tuliskan detail informasi..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-light fw-bold px-4">Terbitkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>