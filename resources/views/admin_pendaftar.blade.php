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

</body>
</html>