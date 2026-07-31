<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Lomba - Karang Taruna RT 012</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col justify-center items-center p-4 relative overflow-x-hidden">

    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-red-600/15 via-rose-600/5 to-transparent blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 shadow-2xl relative z-10 overflow-hidden">
        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-red-500 via-rose-500 to-amber-500"></div>

        <a href="/daftar-lomba" class="inline-flex items-center gap-2 text-xs font-semibold text-slate-400 hover:text-white mb-6 transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Lomba
        </a>

        <div class="mb-6">
            <span class="text-[10px] font-bold uppercase tracking-wider text-red-400 bg-red-500/10 border border-red-500/20 px-3 py-1 rounded-full">
                Formulir Pendaftaran
            </span>
            <h1 class="text-2xl font-black text-white mt-2">
                {{ $lomba->nama_lomba ?? $lomba->nama ?? 'Lomba #' . $id }}
            </h1>
            <p class="text-slate-400 text-xs mt-1">Isi data diri kamu di bawah ini untuk mendaftar.</p>
        </div>

        <form action="/proses-daftar" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="lomba_id" value="{{ $id }}">

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1.5 uppercase tracking-wider">Nama Lengkap</label>
                <input type="text" name="nama" required placeholder="Contoh: Budi Santoso" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-red-500 transition-colors">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1.5 uppercase tracking-wider">No. WhatsApp / HP</label>
                <input type="text" name="no_hp" required placeholder="Contoh: 081234567890" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-white focus:outline-none focus:border-red-500 transition-colors">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-300 mb-1.5 uppercase tracking-wider">RT / RW</label>
                <input type="text" name="rt_rw" value="RT 012 / RW 05" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-3 text-sm text-slate-400 focus:outline-none">
            </div>

            <button type="submit" class="w-full py-3.5 mt-2 rounded-xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold text-sm transition-all shadow-lg shadow-red-600/30 active:scale-[0.98]">
                Kirim Pendaftaran
            </button>
        </form>
    </div>

</body>
</html>