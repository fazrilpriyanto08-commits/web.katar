<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan Kas 17-an - Admin KATAR RT 012</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #0f172a; color: #f8fafc; font-family: 'Segoe UI', sans-serif; min-height: 100vh; }
        .card-custom { background-color: #1e293b; border: 1px solid #334155; border-radius: 16px; }
        .table-custom { color: #f8fafc; }
        .table-custom th { background-color: #0f172a; color: #94a3b8; border-bottom: 2px solid #334155; }
        .table-custom td { border-bottom: 1px solid #334155; vertical-align: middle; }
    </style>
</head>
<body class="py-4">

    <div class="container-fluid px-4">
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold m-0 text-warning"><i class="bi bi-cash-stack me-2"></i>Laporan Keuangan Kas 17-an</h3>
                <small class="text-white-50">Pencatatan Transparansi Pemasukan & Pengeluaran Acara</small>
            </div>
            <a href="/admin/dashboard" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Dashboard Admin
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- RINGKASAN SALDO (3 CARDS) -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card-custom p-3 border-success text-center">
                    <small class="text-white-50 fw-bold">TOTAL PEMASUKAN</small>
                    <h3 class="fw-bold text-success m-0 mt-1">+ Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-3 border-danger text-center">
                    <small class="text-white-50 fw-bold">TOTAL PENGELUARAN</small>
                    <h3 class="fw-bold text-danger m-0 mt-1">- Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom p-3 border-warning text-center">
                    <small class="text-white-50 fw-bold">SISA SALDO KAS</small>
                    <h3 class="fw-bold {{ $sisaSaldo >= 0 ? 'text-warning' : 'text-danger' }} m-0 mt-1">
                        Rp {{ number_format($sisaSaldo, 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- FORM INPUT TRANSAKSI -->
            <div class="col-lg-4">
                <div class="card-custom p-4">
                    <h5 class="fw-bold text-warning mb-3"><i class="bi bi-plus-circle me-2"></i>Tambah Transaksi</h5>
                    
                    <form action="/admin/keuangan" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Jenis Transaksi</label>
                            <select name="jenis" class="form-select bg-dark text-white border-secondary" required>
                                <option value="Pemasukan">Pemasukan (+)</option>
                                <option value="Pengeluaran">Pengeluaran (-)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Keterangan / Keperluan</label>
                            <input type="text" name="keterangan" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Beli Kerupuk & Tali" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Nominal (Rp)</label>
                            <input type="number" name="nominal" class="form-control bg-dark text-white border-secondary" placeholder="50000" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control bg-dark text-white border-secondary" value="{{ date('Y-m-d') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Kategori (Opsional)</label>
                            <input type="text" name="kategori" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Hadiah, Konsumsi, Sound">
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold text-dark py-2">
                            <i class="bi bi-save me-1"></i> Simpan Transaksi
                        </button>
                    </form>
                </div>
            </div>

            <!-- TABEL DAFTAR TRANSAKSI -->
            <div class="col-lg-8">
                <div class="card-custom p-4">
                    <h5 class="fw-bold text-white mb-3"><i class="bi bi-journal-text me-2"></i>Riwayat Transaksi</h5>
                    
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Nominal</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transaksis as $t)
                                    <tr>
                                        <td class="small text-white-50">{{ date('d/m/Y', strtotime($t->tanggal)) }}</td>
                                        <td class="fw-bold">{{ $t->keterangan }}</td>
                                        <td>
                                            @if($t->kategori)
                                                <span class="badge bg-secondary">{{ $t->kategori }}</span>
                                            @else
                                                <span class="text-white-50 small">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($t->jenis == 'Pemasukan')
                                                <span class="badge bg-success">Pemasukan</span>
                                            @else
                                                <span class="badge bg-danger">Pengeluaran</span>
                                            @endif
                                        </td>
                                        <td class="fw-bold {{ $t->jenis == 'Pemasukan' ? 'text-success' : 'text-danger' }}">
                                            {{ $t->jenis == 'Pemasukan' ? '+' : '-' }} Rp {{ number_format($t->nominal, 0, ',', '.') }}
                                        </td>
                                        <td class="text-end">
                                            <form action="/admin/keuangan/{{ $t->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-white-50 py-4">Belum ada data transaksi keuangan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>