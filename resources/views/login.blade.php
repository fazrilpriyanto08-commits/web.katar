<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panitia - KATAR RT 012</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
        }

        .form-control {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #ffffff;
            padding: 0.75rem 1rem;
            border-radius: 8px;
        }

        .form-control:focus {
            background-color: #0f172a;
            border-color: #f8fafc;
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
        }

        .btn-monochrome {
            background-color: #ffffff;
            color: #0f172a;
            font-weight: 700;
            padding: 0.75rem;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
            border: none;
        }

        .btn-monochrome:hover {
            background-color: #e2e8f0;
            color: #000000;
            transform: translateY(-2px);
        }

        .badge-katar {
            background-color: #334155;
            color: #94a3b8;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Logo / Header -->
        <div class="text-center mb-4">
            <span class="badge badge-katar text-uppercase px-3 py-2 rounded-pill fw-bold mb-3">
                Panitia Control Center
            </span>
            <h3 class="fw-bold mb-1">KATAR RT 012</h3>
            <p class="text-muted small">Masukkan kredensial panitia untuk masuk dashboard</p>
        </div>

        <!-- Alert Error -->
        @if($errors->has('login_error'))
            <div class="alert alert-danger border-0 bg-danger text-white small p-3 mb-4 rounded-3 d-flex align-items-center">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>{{ $errors->first('login_error') }}</div>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success border-0 bg-success text-white small p-3 mb-4 rounded-3 d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Form Login -->
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small text-uppercase text-muted fw-bold">Username</label>
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label small text-uppercase text-muted fw-bold">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-monochrome w-100">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Dashboard
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="/" class="text-muted small text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i>Kembali ke Beranda Utama
            </a>
        </div>
    </div>

</body>
</html>