<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran {{ $lomba->nama_lomba ?? 'Lomba' }} - RT 012</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden">

    <!-- Background Glow Effect -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-red-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-rose-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md bg-slate-800/80 backdrop-blur-xl border border-slate-700/60 rounded-3xl p-6 sm:p-8 shadow-2xl relative z-10">
        
        <!-- Header & Tombol Kembali -->
        <div class="flex items-center justify-between mb-6">
            <a href="/" class="w-10 h-10 rounded-full bg-slate-700/50 hover:bg-slate-700 flex items-center justify-center text-slate-300 hover:text-white transition-all">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <span class="text-xs font-semibold uppercase tracking-wider text-red-400 bg-red-500/10 border border-red-500/20 px-3 py-1 rounded-full">
                Karang Taruna RT 012
            </span>
        </div>

        <!-- Judul Form -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-white mb-1">Form Pendaftaran</h1>
            <p class="text-slate-400 text-sm">
                Lomba: <span class="text-red-400 font-semibold">{{ $lomba->nama_lomba ?? '17 Agustus' }}</span>
            </p>
        </div>

        <!-- Form Utama -->
        <form action="/proses-daftar" method="POST" id="formDaftar" class="space-y-5">
            @csrf
            
            <!-- Hidden Input ID Lomba -->
            <input type="hidden" name="lomba_id" value="{{ $lomba->id ?? 1 }}">

            <!-- Input 1: Nama Warga -->
            <div>
                <label for="nama" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-user text-sm"></i>
                    </div>
                    <input type="text" id="nama" name="nama" required placeholder="Contoh: Budi Santoso"
                        class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all">
                </div>
            </div>

            <!-- Input 2: Nomor WA -->
            <div>
                <label for="no_hp" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Nomor WhatsApp <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-brands fa-whatsapp text-base"></i>
                    </div>
                    <input type="tel" inputmode="numeric" id="no_hp" name="no_hp" required placeholder="081234567890"
                        class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all">
                </div>
                <p class="text-[11px] text-slate-400 mt-1">Pastikan nomor aktif untuk koordinasi panitia.</p>
            </div>

            <!-- Input 3: RT / RW (Pilihan Cepat) -->
            <div>
                <label for="rt_rw" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    RT / RW
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-location-dot text-sm"></i>
                    </div>
                    <select id="rt_rw" name="rt_rw"
                        class="w-full pl-10 pr-8 py-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white text-sm focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all appearance-none">
                        <option value="RT 012 / RW 05" selected>RT 012 / RW 05</option>
                        <option value="RT 011 / RW 05">RT 011 / RW 05</option>
                        <option value="RT 010 / RW 05">RT 010 / RW 05</option>
                        <option value="Luar RT 012">Warga Luar / Tamu</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>

            <!-- Tombol Kirim Pendaftaran -->
            <button type="submit" id="btnSubmit"
                class="w-full mt-2 py-3.5 px-4 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-semibold rounded-2xl shadow-lg shadow-red-600/30 hover:shadow-red-600/50 transition-all active:scale-[0.98] flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane text-sm" id="btnIcon"></i>
                <span id="btnText">Kirim Pendaftaran</span>
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-xs text-slate-500 mt-6">
            Karang Taruna RT 012 &copy; {{ date('Y') }}
        </p>
    </div>

    <!-- Script UX: Loading Spinner saat Submit -->
    <script>
        const form = document.getElementById('formDaftar');
        const btnSubmit = document.getElementById('btnSubmit');
        const btnText = document.getElementById('btnText');
        const btnIcon = document.getElementById('btnIcon');

        form.addEventListener('submit', function() {
            btnSubmit.disabled = true;
            btnSubmit.classList.add('opacity-80', 'cursor-not-allowed');
            btnIcon.className = 'fa-solid fa-spinner fa-spin text-sm';
            btnText.innerText = 'Memproses Data...';
        });
    </script>
</body>
</html>