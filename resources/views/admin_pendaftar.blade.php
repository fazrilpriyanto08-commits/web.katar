<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Panitia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="bg-light">

    <div class="container py-5">
        <!-- HEADER DASHBOARD -->
        <div class="d-flex justify-content-between align-items-center mb-4 no-print">
            <div>
                <h2 class="fw-bold text-danger m-0">
                    <i class="bi bi-shield-lock-fill me-2"></i>Dashboard Panitia
                </h2>
                <p class="text-muted m-0">Kelola Data Pendaftar Lomba Karang Taruna</p>
            </div>
            <div>
                <button onclick="window.print()" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-printer me-1"></i> Cetak / PDF
                </button>
                <a href="/" class="btn btn-danger">
                    <i class="bi bi-house-door me-1"></i> Ke Beranda
                </a>
            </div>
        </div>

        <!-- NOTIFIKASI SUCCESS -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- TABEL PENDAFTAR LOMBA -->
        <div class="card shadow-sm border-0 mb-5">
            <div class="card-header bg-white py-3">
                <h5 class="fw-bold m-0 text-dark">
                    <i class="bi bi-people-fill me-2 text-danger"></i>Data Pendaftar Lomba
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Warga</th>
                                <th>No. WhatsApp/HP</th>
                                <th>RT / RW</th>
                                <th>Lomba ID</th>
                                <th>Tanggal Daftar</th>
                                <th class="text-center no-print">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftars as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-bold">{{ $item->nama_warga }}</td>
                                    <td>
                                        <a href="https://wa.me/{{ preg_replace('/^0/', '62', $item->nomor_hp) }}" target="_blank" class="text-decoration-none text-success">
                                            <i class="bi bi-whatsapp"></i> {{ $item->nomor_hp }}
                                        </a>
                                    </td>
                                    <td><span class="badge bg-secondary">{{ $item->rt_rw ?? 'RT 012 / RW 05' }}</span></td>
                                    <td><span class="badge bg-danger">Lomba #{{ $item->lomba_id }}</span></td>
                                    <td class="small text-muted">{{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}</td>
                                    <td class="text-center no-print">
                                        <form action="/admin/pendaftar/{{ $item->id }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus pendaftar ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">Belum ada warga yang mendaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- =================================================== -->
        <!-- SEKSI KELOLA PENGUMUMAN (TOMBOL & TABEL) -->
        <!-- =================================================== -->
        <div class="d-flex justify-content-between align-items-center mb-3 no-print">
            <h4 class="fw-bold text-danger m-0">
                <i class="bi bi-megaphone-fill me-2"></i>Kelola Pengumuman News Feed
            </h4>
            
            <!-- TOMBOL PANGGIL MODAL -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalTambahPengumuman">
                <i class="bi bi-plus-lg me-1"></i> + Tambah Pengumuman
            </button>
        </div>

        <div class="card shadow-sm border-0 mb-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Isi Pengumuman</th>
                                <th>Kategori</th>
                                <th class="text-center no-print">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengumumans ?? [] as $index => $info)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="fw-bold">{{ $info->judul }}</td>
                                    <td>{{ Str::limit($info->isi, 50) }}</td>
                                    <td><span class="badge bg-info text-dark">{{ $info->kategori }}</span></td>
                                    <td class="text-center no-print">
                                        <form action="/admin/pengumuman/{{ $info->id }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pengumuman ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">Belum ada pengumuman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- =================================================== -->
    <!-- MODAL POP-UP FORM TAMBAH PENGUMUMAN -->
    <!-- =================================================== -->
    <div class="modal fade" id="modalTambahPengumuman" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title fw-bold" id="modalTambahLabel">
                        <i class="bi bi-megaphone me-2"></i>Tambah Pengumuman Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/pengumuman" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control" placeholder="Contoh: Kerja Bakti Massal" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="Info">Info</option>
                                <option value="Penting">Penting</option>
                                <option value="Jadwal">Jadwal</option>
                                <option value="Lomba">Lomba</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Isi Pengumuman</label>
                            <textarea name="isi" class="form-control" rows="4" placeholder="Tuliskan detail informasi di sini..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger px-4">Simpan & Terbitkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SCRIPT BOOTSTRAP JS (WAJIB ADA BIAR MODAL POP-UP BISA DIPENCET) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>