<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Donasi & Anak - KATAR RT 012</title>
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
                <h3 class="fw-bold m-0 text-warning"><i class="bi bi-wallet2 me-2"></i>Kelola Donasi & Pendataan Anak</h3>
                <small class="text-white-50">Laporan Masuk Partisipasi Dana Warga & Pendaftaran Anak RT 012</small>
            </div>
            <a href="/admin/dashboard" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- TOTAL DANA TERKUMPUL -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card-custom p-4 text-center border-warning">
                    <small class="text-white-50 fw-bold">TOTAL DANA DITERIMA</small>
                    <h2 class="fw-bold text-warning m-0 mt-2">Rp {{ number_format($totalDonasi, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>

        <!-- TABEL DATA -->
        <div class="card-custom p-4">
            <h5 class="fw-bold mb-3 text-white"><i class="bi bi-list-check me-2"></i>Daftar Warga & Anak Pendaftar</h5>
            
            <div class="table-responsive">
                <table class="table table-custom align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Orang Tua / Donatur</th>
                            <th>No. WA</th>
                            <th>Nama Anak (Umur)</th>
                            <th>Nominal Donasi</th>
                            <th>Bukti Transfer</th>
                            <th>Catatan</th>
                            <th>Status</th>
                            <th class="text-end">Aksi Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($donasis as $index => $d)
                            <tr>
                                <td class="text-white-50">{{ $index + 1 }}</td>
                                <td class="fw-bold text-warning">{{ $d->nama_orang_tua }}</td>
                                <td>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $d->no_wa) }}" target="_blank" class="btn btn-sm btn-outline-success">
                                        <i class="bi bi-whatsapp me-1"></i> {{ $d->no_wa }}
                                    </a>
                                </td>
                                <td>
                                    @if($d->nama_anak)
                                        <span class="badge bg-info text-dark">{{ $d->nama_anak }} ({{ $d->umur_anak }} thn)</span>
                                    @else
                                        <span class="text-white-50 small">-</span>
                                    @endif
                                </td>
                                <td class="fw-bold text-success">Rp {{ number_format($d->nominal_donasi, 0, ',', '.') }}</td>
                                <td>
                                    @if($d->bukti_transfer)
                                        <a href="{{ asset('storage/' . $d->bukti_transfer) }}" target="_blank" class="btn btn-sm btn-outline-light">
                                            <i class="bi bi-image me-1"></i> Lihat Foto
                                        </a>
                                    @else
                                        <span class="badge bg-secondary">Tanpa Foto</span>
                                    @endif
                                </td>
                                <td class="small text-white-50" style="max-width: 180px;">{{ $d->catatan ?? '-' }}</td>
                                <td>
                                    @if($d->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($d->status == 'Diterima')
                                        <span class="badge bg-success">Diterima</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <form action="/admin/donasi/{{ $d->id }}/status" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="Diterima">
                                        <button class="btn btn-sm btn-success me-1" title="Terima Donasi"><i class="bi bi-check-circle"></i></button>
                                    </form>
                                    <form action="/admin/donasi/{{ $d->id }}/status" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="Ditolak">
                                        <button class="btn btn-sm btn-danger" title="Tolak Donasi"><i class="bi bi-x-circle"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-white-50 py-4">Belum ada donasi masuk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>
</html>