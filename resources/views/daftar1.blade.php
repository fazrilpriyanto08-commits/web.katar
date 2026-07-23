<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Lomba - KATAR RT 012</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">KATAR RT 012</a>
            <a href="/" class="btn btn-outline-light btn-sm">← Kembali ke Beranda</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-header bg-danger text-white text-center py-3">
                        <h4 class="mb-0 fw-bold">📝 Form Pendaftaran Lomba</h4>
                    </div>
                    <div class="card-body p-4">

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="/daftar" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pilih Lomba</label>
                                <select name="lomba_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Lomba yang Diikuti --</option>
                                    @foreach($daftarLomba as $lomba)
                                        <option value="{{ $lomba->id }}">{{ $lomba->nama_lomba }} ({{ $lomba->waktu }})</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama Lengkap Peserta</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">RT / RW</label>
                                <input type="text" name="rt_rw" class="form-control" placeholder="Contoh: RT 012 / RW 03" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor WhatsApp / HP</label>
                                <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                            </div>

                            <button type="submit" class="btn btn-danger w-100 fw-bold py-2 mt-3">Kirim Pendaftaran</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>