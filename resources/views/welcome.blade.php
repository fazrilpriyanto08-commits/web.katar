<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karang Taruna RT 012 - Portal Resmi Kegiatan Warga</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col overflow-x-hidden selection:bg-red-500 selection:text-white">

    <!-- Ambient Glow Background -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-red-600/15 via-rose-600/5 to-transparent blur-3xl pointer-events-none z-0"></div>

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/80 border-b border-slate-800/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-red-600 to-rose-500 flex items-center justify-center text-white shadow-lg shadow-red-600/30 group-hover:scale-105 transition-all">
                    <i class="fa-solid fa-flag text-base"></i>
                </div>
                <div>
                    <span class="font-black text-xl tracking-tight text-white flex items-center gap-1.5">
                        KATAR <span class="text-red-500">RT 012</span>
                    </span>
                    <p class="text-[10px] text-slate-400 font-medium tracking-widest uppercase">Portal Warga Resmi</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden md:flex items-center gap-1 bg-slate-900/80 p-1.5 border border-slate-800/80 rounded-2xl backdrop-blur-md">
                <a href="/" class="px-4 py-2 rounded-xl text-xs font-semibold bg-red-600 text-white shadow-md shadow-red-600/20 transition-all">
                    <i class="fa-solid fa-house mr-1.5"></i> Beranda
                </a>
                <a href="/daftar-lomba" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800 transition-all">
                    <i class="fa-solid fa-trophy mr-1.5 text-amber-400"></i> Daftar Lomba
                </a>
                <a href="/donasi" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800 transition-all">
                    <i class="fa-solid fa-heart mr-1.5 text-rose-400"></i> Donasi
                </a>
                <a href="/panitia" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800 transition-all">
                    <i class="fa-solid fa-users mr-1.5 text-blue-400"></i> Struktur Panitia
                </a>
                <a href="/galeri" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800 transition-all">
                    <i class="fa-solid fa-images mr-1.5 text-emerald-400"></i> Galeri
                </a>
            </nav>

            <div class="flex items-center gap-3">
                <a href="/admin/dashboard" class="hidden sm:inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-700/80 text-slate-200 text-xs font-bold transition-all hover:border-red-500/50">
                    <i class="fa-solid fa-shield-halved text-red-400"></i>
                    <span>Portal Admin</span>
                </a>
                <button onclick="toggleMobileMenu()" class="md:hidden p-2.5 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 hover:text-white">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden bg-slate-900/95 border-b border-slate-800 px-4 py-4 space-y-2 backdrop-blur-2xl">
            <a href="/" class="block px-4 py-3 rounded-xl text-sm font-semibold bg-red-600 text-white">
                <i class="fa-solid fa-house mr-2"></i> Beranda
            </a>
            <a href="/daftar-lomba" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-trophy mr-2 text-amber-400"></i> Daftar Lomba
            </a>
            <a href="/donasi" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-heart mr-2 text-rose-400"></i> Donasi
            </a>
            <a href="/panitia" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-users mr-2 text-blue-400"></i> Struktur Panitia
            </a>
            <a href="/galeri" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-images mr-2 text-emerald-400"></i> Galeri
            </a>
            <a href="/admin/dashboard" class="block px-4 py-3 rounded-xl text-sm font-semibold bg-slate-800 text-red-400 border border-slate-700">
                <i class="fa-solid fa-shield-halved mr-2"></i> Portal Admin
            </a>
        </div>
    </header>

    <!-- HERO SECTION -->
    <main class="flex-1 z-10">
        <section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-500/10 border border-red-500/20 text-red-400 text-xs font-bold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                        Semarak HUT RI Ke-81 &bull; RT 012
                    </div>

                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Sambut Kemerdekaan <br class="hidden sm:inline">
                        Dengan <span class="bg-gradient-to-r from-red-500 via-rose-500 to-amber-400 bg-clip-text text-transparent">Kebersamaan!</span>
                    </h1>

                    <p class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Portal resmi pendaftaran lomba, donasi partisipasi, dan informasi seluruh rangkaian kegiatan Karang Taruna RT 012. Mari semarakkan Hari Kemerdekaan Republik Indonesia!
                    </p>

                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="/daftar-lomba" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold text-sm shadow-xl shadow-red-600/30 hover:shadow-red-600/50 transition-all flex items-center justify-center gap-2">
                            <i class="fa-solid fa-trophy text-amber-300"></i>
                            <span>Buka Page Daftar Lomba</span>
                        </a>
                        <a href="#pengumuman" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-slate-900 hover:bg-slate-800 text-slate-200 border border-slate-700/80 font-bold text-sm transition-all flex items-center justify-center gap-2">
                            <i class="fa-solid fa-bullhorn text-red-400"></i>
                            <span>Pengumuman Kegiatan</span>
                        </a>
                    </div>
                </div>

                <!-- Timer Card -->
                <div class="lg:col-span-5">
                    <div class="bg-slate-900/90 border border-slate-800/90 backdrop-blur-2xl p-6 sm:p-8 rounded-3xl shadow-2xl relative overflow-hidden">
                        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-red-500 via-rose-500 to-amber-500"></div>

                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-base font-bold text-white flex items-center gap-2">
                                    <i class="fa-solid fa-stopwatch text-red-500"></i>
                                    Hitung Mundur Acara
                                </h3>
                                <p class="text-xs text-slate-400 mt-0.5">Puncak 17 Agustus 2026</p>
                            </div>
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        </div>

                        <div class="grid grid-cols-4 gap-2.5 text-center my-4">
                            <div class="bg-slate-950/90 border border-slate-800 p-3 rounded-2xl">
                                <span id="days" class="block text-2xl sm:text-3xl font-black text-red-500 font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Hari</span>
                            </div>
                            <div class="bg-slate-950/90 border border-slate-800 p-3 rounded-2xl">
                                <span id="hours" class="block text-2xl sm:text-3xl font-black text-white font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Jam</span>
                            </div>
                            <div class="bg-slate-950/90 border border-slate-800 p-3 rounded-2xl">
                                <span id="minutes" class="block text-2xl sm:text-3xl font-black text-white font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Menit</span>
                            </div>
                            <div class="bg-slate-950/90 border border-slate-800 p-3 rounded-2xl">
                                <span id="seconds" class="block text-2xl sm:text-3xl font-black text-amber-400 font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Detik</span>
                            </div>
                        </div>

                        <div class="mt-6 p-4 rounded-2xl bg-red-500/5 border border-red-500/10 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center text-red-400 text-lg shrink-0">
                                <i class="fa-solid fa-flag"></i>
                            </div>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                Pendaftaran lomba dibuka untuk seluruh warga RT 012 & sekitarnya.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION PENGUMUMAN PENTING -->
        <section id="pengumuman" class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto border-t border-slate-900">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-red-400 bg-red-500/10 px-3 py-1 rounded-full border border-red-500/20">
                    Informasi Terkini
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-white mt-3">Pengumuman Panitia</h2>
                <p class="text-slate-400 text-xs sm:text-sm mt-2">Jadwal dan informasi resmi seputar kegiatan warga RT 012.</p>
            </div>

            <!-- Grid Pengumuman Card -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 relative overflow-hidden hover:border-red-500/40 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[11px] font-bold text-red-400 bg-red-500/10 px-2.5 py-1 rounded-lg border border-red-500/20">PENTING</span>
                        <span class="text-xs text-slate-500"><i class="fa-regular fa-clock mr-1"></i> Baru Saja</span>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">Pendaftaran Lomba Resmi Dibuka!</h3>
                    <p class="text-slate-400 text-xs leading-relaxed mb-4">
                        Seluruh warga RT 012 dan sekitarnya sudah dapat mendaftarkan diri secara online melalui portal web resmi ini.
                    </p>
                    <a href="/daftar-lomba" class="inline-flex items-center gap-1.5 text-xs font-bold text-red-400 hover:text-red-300">
                        <span>Ke Page Daftar Lomba</span> <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 relative overflow-hidden hover:border-amber-500/40 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[11px] font-bold text-amber-400 bg-amber-500/10 px-2.5 py-1 rounded-lg border border-amber-500/20">INFO DONASI</span>
                        <span class="text-xs text-slate-500"><i class="fa-regular fa-clock mr-1"></i> Aktif</span>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">Partisipasi & Donasi Warga</h3>
                    <p class="text-slate-400 text-xs leading-relaxed mb-4">
                        Panitia menerima donasi sukarela dari warga untuk mendukung konsumsi dan hadiah doorprize perlombaan.
                    </p>
                    <a href="/donasi" class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-400 hover:text-amber-300">
                        <span>Kirim Donasi</span> <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="bg-slate-900/80 border border-slate-800 rounded-3xl p-6 relative overflow-hidden hover:border-blue-500/40 transition-all">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[11px] font-bold text-blue-400 bg-blue-500/10 px-2.5 py-1 rounded-lg border border-blue-500/20">JADWAL</span>
                        <span class="text-xs text-slate-500"><i class="fa-regular fa-clock mr-1"></i> Agt 2026</span>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">Malam Puncak & Doorprize</h3>
                    <p class="text-slate-400 text-xs leading-relaxed mb-4">
                        Pengundian Spin Wheel Doorprize & Panggung Seni Warga akan diselenggarakan pada malam puncak 17 Agustus.
                    </p>
                    <span class="text-xs text-slate-500 font-semibold">Lapangan RT 012</span>
                </div>

            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 border-t border-slate-900 py-8 px-4 text-center z-10">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2 text-slate-400 text-xs">
                <i class="fa-solid fa-flag text-red-500"></i>
                <span>Karang Taruna RT 012 &copy; {{ date('Y') }}</span>
            </div>
            <p class="text-slate-500 text-xs">Semangat Kemerdekaan & Kebersamaan Warga RT 012 / RW 05</p>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        }

        const targetDate = new Date('August 17, 2026 00:00:00').getTime();
        function updateCountdown() {
            const now = new Date().getTime();
            const difference = targetDate - now;

            if (difference > 0) {
                document.getElementById('days').innerText = String(Math.floor(difference / (1000 * 60 * 60 * 24))).padStart(2, '0');
                document.getElementById('hours').innerText = String(Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))).padStart(2, '0');
                document.getElementById('minutes').innerText = String(Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60))).padStart(2, '0');
                document.getElementById('seconds').innerText = String(Math.floor((difference % (1000 * 60)) / 1000)).padStart(2, '0');
            }
        }
        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>
</html>