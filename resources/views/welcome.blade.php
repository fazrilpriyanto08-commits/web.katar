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

    <!-- Ambient Glow Effects Background -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-red-600/15 via-rose-600/5 to-transparent blur-3xl pointer-events-none z-0"></div>
    <div class="fixed top-1/3 -left-32 w-80 h-80 bg-red-600/10 rounded-full blur-3xl pointer-events-none z-0"></div>
    <div class="fixed bottom-10 right-0 w-96 h-96 bg-rose-600/10 rounded-full blur-3xl pointer-events-none z-0"></div>

    <!-- NAVBAR -->
    <header class="sticky top-0 z-50 backdrop-blur-xl bg-slate-950/80 border-b border-slate-800/80 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Logo Brand -->
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
                <a href="#lomba" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-300 hover:text-white hover:bg-slate-800 transition-all">
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

            <!-- Portal Admin & Mobile Menu Button -->
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

        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-slate-900/95 border-b border-slate-800 px-4 py-4 space-y-2 backdrop-blur-2xl">
            <a href="/" class="block px-4 py-3 rounded-xl text-sm font-semibold bg-red-600 text-white">
                <i class="fa-solid fa-house mr-2"></i> Beranda
            </a>
            <a href="#lomba" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-trophy mr-2 text-amber-400"></i> Daftar Lomba
            </a>
            <a href="/donasi" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-heart mr-2 text-rose-400"></i> Donasi Acara
            </a>
            <a href="/panitia" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-users mr-2 text-blue-400"></i> Struktur Panitia
            </a>
            <a href="/galeri" class="block px-4 py-3 rounded-xl text-sm font-semibold text-slate-300 hover:bg-slate-800">
                <i class="fa-solid fa-images mr-2 text-emerald-400"></i> Galeri Kegiatan
            </a>
            <a href="/admin/dashboard" class="block px-4 py-3 rounded-xl text-sm font-semibold bg-slate-800 text-red-400 border border-slate-700">
                <i class="fa-solid fa-shield-halved mr-2"></i> Portal Admin
            </a>
        </div>
    </header>

    <!-- HERO SECTION MODERN (TANPA FOTO) -->
    <main class="flex-1 z-10">
        <section class="relative pt-12 pb-20 lg:pt-20 lg:pb-32 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Sisi Kiri: Informasi Utama & Hero Text -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    
                    <!-- Tag Banner -->
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-500/10 border border-red-500/20 text-red-400 text-xs font-bold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                        Semarak HUT RI Ke-81 &bull; RT 012
                    </div>

                    <!-- Headline Utama -->
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-tight">
                        Sambut Kemerdekaan <br class="hidden sm:inline">
                        Dengan <span class="bg-gradient-to-r from-red-500 via-rose-500 to-amber-400 bg-clip-text text-transparent">Kebersamaan!</span>
                    </h1>

                    <!-- Deskripsi -->
                    <p class="text-slate-400 text-sm sm:text-base max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Portal resmi pendaftaran lomba, donasi partisipasi, dan informasi seluruh rangkaian kegiatan Karang Taruna RT 012. Mari semarakkan Hari Kemerdekaan Republik Indonesia!
                    </p>

                    <!-- Tombol Aksi Cepat (CTA) -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="#lomba" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold text-sm shadow-xl shadow-red-600/30 hover:shadow-red-600/50 transition-all hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2">
                            <i class="fa-solid fa-fire text-amber-300"></i>
                            <span>Daftar Lomba Sekarang</span>
                        </a>
                        <a href="/donasi" class="w-full sm:w-auto px-8 py-4 rounded-2xl bg-slate-900 hover:bg-slate-800 text-slate-200 border border-slate-700/80 hover:border-slate-600 font-bold text-sm transition-all flex items-center justify-center gap-2">
                            <i class="fa-solid fa-hand-holding-heart text-rose-400"></i>
                            <span>Partisipasi Donasi</span>
                        </a>
                    </div>
                </div>

                <!-- Sisi Kanan: Live Countdown Timer Card -->
                <div class="lg:col-span-5">
                    <div class="bg-slate-900/90 border border-slate-800/90 backdrop-blur-2xl p-6 sm:p-8 rounded-3xl shadow-2xl shadow-red-950/20 relative overflow-hidden group">
                        
                        <!-- Top Accent Line -->
                        <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-red-500 via-rose-500 to-amber-500"></div>

                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-base font-bold text-white flex items-center gap-2">
                                    <i class="fa-solid fa-stopwatch text-red-500"></i>
                                    Hitung Mundur Acara
                                </h3>
                                <p class="text-xs text-slate-400 mt-0.5">Puncak 17 Agustus 2026</p>
                            </div>
                            <span class="w-3 h-3 rounded-full bg-emerald-500/20 border border-emerald-500/40 flex items-center justify-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            </span>
                        </div>

                        <!-- Grid angka timer -->
                        <div class="grid grid-cols-4 gap-2.5 sm:gap-3 text-center my-4">
                            <div class="bg-slate-950/90 border border-slate-800 p-3 sm:p-4 rounded-2xl">
                                <span id="days" class="block text-2xl sm:text-3xl font-black text-red-500 font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Hari</span>
                            </div>
                            <div class="bg-slate-950/90 border border-slate-800 p-3 sm:p-4 rounded-2xl">
                                <span id="hours" class="block text-2xl sm:text-3xl font-black text-white font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Jam</span>
                            </div>
                            <div class="bg-slate-950/90 border border-slate-800 p-3 sm:p-4 rounded-2xl">
                                <span id="minutes" class="block text-2xl sm:text-3xl font-black text-white font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Menit</span>
                            </div>
                            <div class="bg-slate-950/90 border border-slate-800 p-3 sm:p-4 rounded-2xl">
                                <span id="seconds" class="block text-2xl sm:text-3xl font-black text-amber-400 font-mono">00</span>
                                <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Detik</span>
                            </div>
                        </div>

                        <!-- Card Info Tambahan -->
                        <div class="mt-6 p-4 rounded-2xl bg-red-500/5 border border-red-500/10 flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-red-500/10 flex items-center justify-center text-red-400 text-lg shrink-0">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <p class="text-xs text-slate-300 leading-relaxed">
                                Pendaftaran lomba dibuka untuk seluruh warga RT 012 & sekitarnya.
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- SECTION DAFTAR LOMBA -->
        <section id="lomba" class="py-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto border-t border-slate-900">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold uppercase tracking-widest text-red-400 bg-red-500/10 px-3 py-1 rounded-full border border-red-500/20">
                    Kategori Perlombaan
                </span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-white mt-3">Pilih & Ikuti Lomba</h2>
                <p class="text-slate-400 text-xs sm:text-sm mt-2">Klik tombol daftar pada kategori lomba yang ingin kamu ikuti!</p>
            </div>

            <!-- Grid Kartu Lomba -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Example Card Lomba 1 -->
                <div class="bg-slate-900/80 border border-slate-800 hover:border-red-500/50 rounded-3xl p-6 transition-all hover:-translate-y-1 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-400 text-xl mb-4 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-gamepad"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Lomba Mobile Legends</h3>
                        <p class="text-slate-400 text-xs leading-relaxed mb-4">Turnamen e-sports khusus remaja & pemuda RT 012. Tim terdiri dari 5 orang.</p>
                    </div>
                    <a href="/daftar/1" class="w-full py-3 rounded-xl bg-slate-800 hover:bg-red-600 text-slate-200 hover:text-white font-semibold text-xs transition-all text-center flex items-center justify-center gap-2">
                        <span>Daftar Lomba Ini</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <!-- Example Card Lomba 2 -->
                <div class="bg-slate-900/80 border border-slate-800 hover:border-red-500/50 rounded-3xl p-6 transition-all hover:-translate-y-1 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-amber-500/10 border border-amber-500/20 flex items-center justify-center text-amber-400 text-xl mb-4 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-child-reaching"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Lomba Anak-Anak</h3>
                        <p class="text-slate-400 text-xs leading-relaxed mb-4">Makan kerupuk, balap karung helm, dan kelereng sendok untuk usia 5-12 tahun.</p>
                    </div>
                    <a href="/daftar/2" class="w-full py-3 rounded-xl bg-slate-800 hover:bg-red-600 text-slate-200 hover:text-white font-semibold text-xs transition-all text-center flex items-center justify-center gap-2">
                        <span>Daftar Lomba Ini</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <!-- Example Card Lomba 3 -->
                <div class="bg-slate-900/80 border border-slate-800 hover:border-red-500/50 rounded-3xl p-6 transition-all hover:-translate-y-1 flex flex-col justify-between group">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-rose-500/10 border border-rose-500/20 flex items-center justify-center text-rose-400 text-xl mb-4 group-hover:scale-110 transition-transform">
                            <i class="fa-solid fa-volleyball"></i>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Lomba Ibu-Ibu & Bapak</h3>
                        <p class="text-slate-400 text-xs leading-relaxed mb-4">Voli ria sarung, joget balon, dan memasak antar RT untuk bapak & ibu warga.</p>
                    </div>
                    <a href="/daftar/3" class="w-full py-3 rounded-xl bg-slate-800 hover:bg-red-600 text-slate-200 hover:text-white font-semibold text-xs transition-all text-center flex items-center justify-center gap-2">
                        <span>Daftar Lomba Ini</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
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

    <!-- SCRIPT TIMER COUNTDOWN & MOBILE NAV -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Live Countdown 17 Agustus 2026
        const targetDate = new Date('August 17, 2026 00:00:00').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const difference = targetDate - now;

            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                document.getElementById('days').innerText = String(days).padStart(2, '0');
                document.getElementById('hours').innerText = String(hours).padStart(2, '0');
                document.getElementById('minutes').innerText = String(minutes).padStart(2, '0');
                document.getElementById('seconds').innerText = String(seconds).padStart(2, '0');
            }
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>
</body>
</html>