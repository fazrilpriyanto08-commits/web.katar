<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Panitia - Katar RT 012</title>
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-danger"><i class="bi bi-shield-lock-fill"></i> Dashboard Panitia</h2>
                <p class="text-muted mb-0">Kelola Data Pendaftar Lomba Karang Taruna</p>
            </div>
            <div class="no-print">
                <button onclick="window.print()" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-printer"></i> Cetak / PDF
                </button>
                <a href="/" class="btn btn-danger">
                    <i class="bi bi-house-door"></i> Ke Beranda
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-danger">
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
                                        <form action="/admin/pendaftar/{{ $item->id }}" method="POST" onsubmit="return confirm('Apakah kamu yakin ingin menghapus data ini?')">
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
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        <em>Belum ada warga yang mendaftar.</em>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL & KELOLA PENGUMUMAN -->
<div class="card shadow-sm border-0 my-5">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h5 class="fw-bold mb-0 text-danger"><i class="bi bi-megaphone"></i> Kelola Pengumuman News Feed</h5>
        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modalTambahPengumuman">
            <i class="bi bi-plus-lg"></i> Tambah Pengumuman
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Isi Pengumuman</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengumumans as $index => $info)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-bold">{{ $info->judul }}</td>
                            <td>{{ Str::limit($info->isi, 50) }}</td>
                            <td><span class="badge bg-info">{{ $info->kategori }}</span></td>
                            <td>
                                <!-- Tombol Edit (Memicu Modal) -->
                                <button class="btn btn-sm btn-outline-warning me-1" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $info->id }}">
                                    <i class="bi bi-pencil"></i> Edit
                                </button>
                                <!-- Form Hapus -->
                                <form action="/admin/pengumuman/{{ $info->id }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengumuman ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- MODAL EDIT PENGUMUMAN -->
                        <div class="modal fade" id="modalEdit{{ $info->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="/admin/pengumuman/{{ $info->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">Edit Pengumuman</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" value="{{ $info->judul }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <select name="kategori" class="form-select">
                                                    <option value="Penting" {{ $info->kategori == 'Penting' ? 'selected' : '' }}>Penting</option>
                                                    <option value="Jadwal" {{ $info->kategori == 'Jadwal' ? 'selected' : '' }}>Jadwal</option>
                                                    <option value="Info" {{ $info->kategori == 'Info' ? 'selected' : '' }}>Info</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Isi Pengumuman</label>
                                                <textarea name="isi" class="form-control" rows="4" required>{{ $info->isi }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-danger">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted">Belum ada pengumuman.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH PENGUMUMAN -->
<div class="modal fade" id="modalTambahPengumuman" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/pengumuman" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Pengumuman Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Contoh: Perubahan Jadwal Lomba" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-select">
                            <option value="Penting">Penting</option>
                            <option value="Jadwal">Jadwal</option>
                            <option value="Info" selected>Info</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Isi Pengumuman</label>
                        <textarea name="isi" class="form-control" rows="4" placeholder="Tuliskan detail info di sini..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>