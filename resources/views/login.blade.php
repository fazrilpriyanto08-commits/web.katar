<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Panitia - Katar RT 012</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden selection:bg-red-500 selection:text-white">

    <!-- Ambient Glow Background -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-lg h-96 bg-gradient-to-tr from-red-600/20 via-rose-600/10 to-transparent blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-3xl p-8 shadow-2xl relative z-10">
        
        <div class="text-center mb-8">
            <div class="inline-block px-3 py-1 rounded-full bg-red-500/10 border border-red-500/20 text-red-400 text-[10px] font-bold tracking-wider uppercase mb-3">
                Panitia Control Center
            </div>
            <h1 class="text-2xl font-black text-white tracking-tight">KATAR RT 012</h1>
            <p class="text-slate-400 text-xs mt-1">Masukkan kredensial panitia untuk masuk dashboard.</p>
        </div>

        @if($errors->has('login_error'))
            <div class="mb-6 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/20 text-rose-400 text-xs font-bold text-center">
                {{ $errors->first('login_error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="mb-6 p-3.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Email / Username</label>
                <input type="email" name="email" required placeholder="Masukkan email panitia" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-red-500 transition-colors">
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-red-500 transition-colors">
            </div>

            <button type="submit" class="w-full py-3.5 mt-2 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold text-xs transition-all shadow-lg shadow-red-600/25 flex items-center justify-center gap-2">
                <i class="fa-solid fa-right-to-bracket"></i> Masuk Dashboard
            </button>
        </form>

        <div class="mt-8 text-center border-t border-slate-800/80 pt-6">
            <a href="/" class="text-slate-500 hover:text-slate-300 text-xs font-medium transition-colors">
                <i class="fa-solid fa-arrow-left mr-1"></i> Kembali ke Beranda Utama
            </a>
        </div>

    </div>

</body>
</html>