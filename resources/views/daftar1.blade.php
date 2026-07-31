<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lomba RT 012 - Karang Taruna RT 012</title>
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
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col selection:bg-red-500 selection:text-white relative overflow-x-hidden">

    <!-- Ambient Glow Effects Background -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-96 bg-gradient-to-b from-red-600/15 via-rose-600/5 to-transparent blur-3xl pointer-events-none z-0"></div>
    <div class="fixed top-1/3 -right-32 w-80 h-80 bg-red-600/10 rounded-full blur-3xl pointer-events-none z-0"></div>
    <div class="fixed bottom-10 -left-32 w-80 h-80 bg-rose-600/10 rounded-full blur-3xl pointer-events-none z-0"></div>

    <!-- NAVBAR MATCHING -->
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

            <a href="/" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-700/80 text-slate-200 text-xs font-bold transition-all hover:border-red-500/50">
                <i class="fa-solid fa-arrow-left text-red-400"></i>
                <span>Kembali ke Beranda</span>
            </a>
        </div>
    </header>

    <!-- CONTENT UTAMA -->
    <main class="flex-1 z-10 py-10 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
        
        <!-- Header Judul -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-red-500/10 border border-red-500/20 text-red-400 text-xs font-bold uppercase tracking-wider mb-3">
                <i class="fa-solid fa-trophy text-amber-400"></i> SEMARAK KEMERDEKAAN
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight">Daftar Lomba RT 012</h1>
            <p class="text-slate-400 text-xs sm:text-sm mt-3 leading-relaxed">
                Pilih perlombaan yang ingin kamu ikuti dan daftarkan dirimu secara online dengan mudah & cepat!
            </p>
        </div>

        <!-- Grid Kartu Lomba (Perulangan Dinamis Database) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            
            @forelse($lomba ?? $lombas ?? [] as $item)
                <div class="bg-slate-900/90 border border-slate-800/90 hover:border-red-500/50 rounded-3xl p-6 sm:p-7 backdrop-blur-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group shadow-xl hover:shadow-red-950/20">
                    <div>
                        <!-- Header Kartu -->
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-red-600/20 to-rose-600/20 border border-red-500/30 flex items-center justify-center text-red-400 text-xl group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-trophy"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-400 bg-amber-500/10 border border-amber-500/20 px-3 py-1 rounded-full">
                                {{ $item->kategori ?? 'LOMBA RT 012' }}
                            </span>
                        </div>

                        <!-- Judul & Deskripsi -->
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-red-400 transition-colors">
                            {{ $item->nama_lomba }}
                        </h3>
                        <p class="text-slate-400 text-xs leading-relaxed mb-6">
                            {{ $item->deskripsi ?? 'Ayo daftarkan dirimu dan raih hadiah menarik di perlombaan Kemerdekaan RT 012!' }}
                        </p>

                        <!-- Detail Lokasi / Peserta -->
                        <div class="space-y-2 mb-6 border-t border-slate-800/80 pt-4 text-xs text-slate-300">
                            @if(isset($item->lokasi))
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-red-400 w-4"></i>
                                <span>{{ $item->lokasi }}</span>
                            </div>
                            @endif
                            @if(isset($item->peserta))
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-emerald-400 w-4"></i>
                                <span>{{ $item->peserta }}</span>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Tombol Form Pendaftaran -->
                    <a href="/daftar/{{ $item->id }}" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold text-xs transition-all text-center flex items-center justify-center gap-2 shadow-lg shadow-red-600/20 active:scale-[0.98]">
                        <span>Daftar Sekarang</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-slate-900/50 border border-slate-800 rounded-3xl p-8">
                    <i class="fa-solid fa-trophy text-4xl text-slate-600 mb-3 block"></i>
                    <p class="text-slate-400 text-sm">Belum ada data lomba yang tersedia di database.</p>
                </div>
            @endforelse

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 border-t border-slate-900 py-8 px-4 text-center z-10 mt-auto">
        <p class="text-slate-500 text-xs">
            Karang Taruna RT 012 &copy; {{ date('Y') }} &bull; Semangat Kemerdekaan & Kebersamaan
        </p>
    </footer>

</body>
</html>