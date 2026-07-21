<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Online - {{ $lomba->nama_lomba }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-form { border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .bg-katar { background: linear-gradient(135deg, #dc3545, #9b1c26); color: white; border-radius: 15px 15px 0 0; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <!-- Tombol Kembali -->
            <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-4">← Kembali ke Beranda</a>

            <div class="card card-form border-0">
                <div class="card-header bg-katar p-4 text-center">
                    <h3 class="fw-bold mb-1">Form Pendaftaran Warga</h3>
                    <p class="mb-0 text-white-50">Silakan isi data diri Anda dengan benar</p>
                </div>
                <div class="card-body p-4">
                    
                    <!-- Info Lomba Yang Dipilih -->
                    <div class="alert alert-info border-0 shadow-sm mb-4">
                        <small class="text-uppercase fw-bold text-muted d-block">Lomba Yang Diikuti:</small>
                        <span class="fs-5 fw-bold text-dark">{{ $lomba->nama_lomba }}</span>
                        <hr class="my-2">
                        <small class="d-block text-muted">📍 Lokasi: {{ $lomba->lokasi }} | ⏰ Waktu: {{ $lomba->waktu }}</small>
                    </div>

                    <!-- Form Input -->
                    <form action="{{ url('/proses-daftar') }}" method="POST">
                        @csrf
                        
                        <!-- Kirim Lomba ID secara tersembunyi -->
                        <input type="hidden" name="lomba_id" value="{{ $lomba->id }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama_warga" class="form-line form-control p-2.5" placeholder="Contoh: Budi Santoso" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor HP / WhatsApp</label>
                            <input type="number" name="nomor_hp" class="form-control p-2.5" placeholder="Contoh: 081234567890" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Asal RT / RW</label>
                            <input type="text" name="rt_rw" class="form-control p-2.5" placeholder="Contoh: RT 03 / RW 02" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100 py-2.5 fw-bold fs-5 shadow-sm">Kirim Pendaftaran Online</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>