<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Partisipasi & Donasi - KATAR RT 012</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #0f172a; color: #f8fafc; font-family: 'Segoe UI', sans-serif; }
        .card-custom { background-color: #1e293b; border: 1px solid #334155; border-radius: 16px; }
    </style>
</head>
<body class="py-5">
    <div class="container" style="max-width: 650px;">
        
        <div class="text-center mb-4">
            <h2 class="fw-bold text-warning"><i class="bi bi-heart-fill me-2"></i>Form Partisipasi & Donasi</h2>
            <p class="text-white-50">Pengumpulan Dana Acara & Pendataan Anak Warga RT 012</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card-custom p-4 shadow-lg">
            <form action="/donasi" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- INFORMASI ORANG TUA / DONATUR -->
                <h5 class="fw-bold text-warning mb-3"><i class="bi bi-person-fill me-2"></i>Data Orang Tua / Donatur</h5>
                
                <div class="mb-3">
                    <label class="form-label small text-white-50 fw-bold">Nama Lengkap Orang Tua / Warga</label>
                    <input type="text" name="nama_orang_tua" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Pak Budi Santoso" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small text-white-50 fw-bold">Nomor WhatsApp</label>
                    <input type="text" name="no_wa" class="form-control bg-dark text-white border-secondary" placeholder="08123456789" required>
                </div>

                <hr class="border-secondary my-4">

                <!-- INFORMASI ANAK -->
                <h5 class="fw-bold text-warning mb-3"><i class="bi bi-emoji-smile-fill me-2"></i>Data Anak (Optional)</h5>
                
                <div class="row g-2 mb-3">
                    <div class="col-8">
                        <label class="form-label small text-white-50 fw-bold">Nama Anak</label>
                        <input type="text" name="nama_anak" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Rehan">
                    </div>
                    <div class="col-4">
                        <label class="form-label small text-white-50 fw-bold">Umur (Tahun)</label>
                        <input type="number" name="umur_anak" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: 7" min="1" max="17">
                    </div>
                </div>

                <hr class="border-secondary my-4">

                <!-- INFORMASI DONASI -->
                <h5 class="fw-bold text-warning mb-3"><i class="bi bi-wallet2 me-2"></i>Nominal Partisipasi / Donasi</h5>
                
                <!-- INFO REKENING -->
                <div class="p-3 mb-3 rounded" style="background-color: #0f172a; border: 1px dashed #f59e0b;">
                    <small class="text-white-50 d-block mb-1">Transfer Bank / QRIS :</small>
                    <div class="fw-bold text-white">BCA: <span class="text-warning">1234-5678-90</span> a/n Karang Taruna RT 012</div>
                    <div class="fw-bold text-white">DANA / GoPay: <span class="text-warning">0812-9999-8888</span></div>
                </div>

                <div class="mb-3">
                    <label class="form-label small text-white-50 fw-bold">Nominal Donasi (Rp)</label>
                    <input type="number" name="nominal_donasi" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: 50000" min="10000" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small text-white-50 fw-bold">Upload Bukti Transfer (Opsional)</label>
                    <input type="file" name="bukti_transfer" class="form-control bg-dark text-white border-secondary" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label small text-white-50 fw-bold">Pesan / Ucapan Semangat</label>
                    <textarea name="catatan" class="form-control bg-dark text-white border-secondary" rows="2" placeholder="Semoga acara 17-an RT 012 sukses dan meriah!"></textarea>
                </div>

                <button type="submit" class="btn btn-warning w-100 fw-bold text-dark py-3 mt-2 fs-5">
                    <i class="bi bi-send-fill me-2"></i> Kirim Form & Donasi
                </button>
            </form>
        </div>

    </div>
</body>
</html>