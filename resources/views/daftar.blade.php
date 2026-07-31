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
                Pilih dari 14 perlombaan seru Kemerdekaan RT 012 dan daftarkan dirimu secara online!
            </p>
        </div>

        @php
            // Array 14 Lomba Asli Versi Kamu
            $defaultLombas = [
                ['id' => 1,  'nama' => 'Masukin Bendera Anak-Anak', 'kat' => 'ANAK-ANAK', 'icon' => 'fa-flag', 'desc' => 'Lomba adu kecepatan memasukkan bendera ke dalam botol.', 'lokasi' => 'Lapangan Utama RT 012', 'peserta' => 'Anak-Anak (Usia 4-8 Thn)'],
                ['id' => 2,  'nama' => 'Futsal Pake Sarung',        'kat' => 'BAPAK / UMUM', 'icon' => 'fa-futbol', 'desc' => 'Pertandingan futsal ceria menggunakan sarung antar warga.', 'lokasi' => 'Lapangan Bulutangkis', 'peserta' => 'Bapak-Bapak & Remaja'],
                ['id' => 3,  'nama' => 'Sendok Kelereng Anak-Anak', 'kat' => 'ANAK-ANAK', 'icon' => 'fa-spoon', 'desc' => 'Uji keseimbangan membawa kelereng menggunakan sendok.', 'lokasi' => 'Area Balai Warga', 'peserta' => 'Anak-Anak (Usia 5-10 Thn)'],
                ['id' => 4,  'nama' => 'Tali Ping-Pong',            'kat' => 'ANAK / REMAJA', 'icon' => 'fa-table-tennis-paddle-ball', 'desc' => 'Lomba ketangkasan menggoyangkan bola ping-pong dari wadah di pinggang.', 'lokasi' => 'Lapangan Utama RT 012', 'peserta' => 'Anak-Anak & Remaja'],
                ['id' => 5,  'nama' => 'Mewarnai Anak-Anak',       'kat' => 'PAUD / TK', 'icon' => 'fa-palette', 'desc' => 'Lomba kreasi seni mewarnai sketsa tema Kemerdekaan.', 'lokasi' => 'Posyandu RT 012', 'peserta' => 'Anak PAUD & TK'],
                ['id' => 6,  'nama' => 'Joget Koran',              'kat' => 'UMUM / IBU-IBU', 'icon' => 'fa-newspaper', 'desc' => 'Lomba joget berpasangan di atas selembar koran yang makin dilipat mengecil.', 'lokasi' => 'Panggung Utama RT 012', 'peserta' => 'Ibu-Ibu & Remaja'],
                ['id' => 7,  'nama' => 'Makan Kerupuk',            'kat' => 'ANAK-ANAK', 'icon' => 'fa-utensils', 'desc' => 'Adu cepat menghabiskan kerupuk gantung tanpa menggunakan tangan.', 'lokasi' => 'Lapangan Utama RT 012', 'peserta' => 'Anak-Anak & Remaja'],
                ['id' => 8,  'nama' => 'Karung Helm',              'kat' => 'REMAJA / UMUM', 'icon' => 'fa-person-running', 'desc' => 'Balap karung heboh dan kocak dengan mengenakan helm keselamatan.', 'lokasi' => 'Lapangan Utama RT 012', 'peserta' => 'Remaja & Pemuda'],
                ['id' => 9,  'nama' => 'Masukin Paku Anak-Anak',   'kat' => 'ANAK-ANAK', 'icon' => 'fa-bullseye', 'desc' => 'Lomba konsentrasi memasukkan paku terikat tali ke dalam botol.', 'lokasi' => 'Area Balai Warga', 'peserta' => 'Anak-Anak'],
                ['id' => 10, 'nama' => 'Masukin Paku Ibu-Ibu',     'kat' => 'IBU-IBU', 'icon' => 'fa-bullseye', 'desc' => 'Lomba kehebohan dan ketepatan memasukkan paku ke botol khusus ibu-ibu.', 'lokasi' => 'Area Balai Warga', 'peserta' => 'Ibu-Ibu RT 012'],
                ['id' => 11, 'nama' => 'Tusuk Balon',              'kat' => 'UMUM', 'icon' => 'fa-circle-dot', 'desc' => 'Lomba ketangkasan memecahkan balon dengan mata tertutup.', 'lokasi' => 'Panggung Utama RT 012', 'peserta' => 'Umum / Warga'],
                ['id' => 12, 'nama' => 'Pancing Kerupuk Ibu-Ibu',   'kat' => 'IBU-IBU', 'icon' => 'fa-fish-fins', 'desc' => 'Lomba memancing kerupuk unik dan penuh kehebohan khusus ibu-ibu.', 'lokasi' => 'Lapangan Utama RT 012', 'peserta' => 'Ibu-Ibu RT 012'],
                ['id' => 13, 'nama' => 'Ikan Kipas Anak-Anak',     'kat' => 'ANAK-ANAK', 'icon' => 'fa-fan', 'desc' => 'Lomba mengipas gambar ikan kertas sampai garis finish paling cepat.', 'lokasi' => 'Area Balai Warga', 'peserta' => 'Anak-Anak'],
                ['id' => 14, 'nama' => 'Estafet Spons',            'kat' => 'ANAK / REMAJA', 'icon' => 'fa-water', 'desc' => 'Lomba basah-basahan memindahkan air menggunakan spons secara estafet.', 'lokasi' => 'Lapangan Utama RT 012', 'peserta' => 'Tim Anak / Remaja']
            ];

            // Gunakan data dari controller jika ada, jika tidak pakai 14 daftar asli
            $lombaList = (isset($lomba) && count($lomba) > 0) ? $lomba : ((isset($lombas) && count($lombas) > 0) ? $lombas : $defaultLombas);
        @endphp

        <!-- Grid Kartu 14 Lomba -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            
            @foreach($lombaList as $index => $item)
                @php
                    $id = is_object($item) ? $item->id : ($item['id'] ?? ($index + 1));
                    $nama = is_object($item) ? ($item->nama_lomba ?? $item->nama) : $item['nama'];
                    $kat = is_object($item) ? ($item->kategori ?? 'RT 012') : $item['kat'];
                    $desc = is_object($item) ? ($item->deskripsi ?? 'Ayo meriahkan perlombaan Kemerdekaan RT 012!') : $item['desc'];
                    $lokasi = is_object($item) ? ($item->lokasi ?? 'Lapangan RT 012') : $item['lokasi'];
                    $peserta = is_object($item) ? ($item->peserta ?? 'Warga RT 012') : $item['peserta'];
                    $icon = is_object($item) ? 'fa-trophy' : ($item['icon'] ?? 'fa-trophy');
                @endphp

                <div class="bg-slate-900/90 border border-slate-800/90 hover:border-red-500/50 rounded-3xl p-6 sm:p-7 backdrop-blur-xl transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between group shadow-xl hover:shadow-red-950/20">
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-400 text-xl group-hover:scale-110 transition-transform">
                                <i class="fa-solid {{ $icon }}"></i>
                            </div>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-400 bg-amber-500/10 border border-amber-500/20 px-3 py-1 rounded-full">
                                {{ $kat }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-red-400 transition-colors">
                            {{ $nama }}
                        </h3>
                        <p class="text-slate-400 text-xs leading-relaxed mb-6">
                            {{ $desc }}
                        </p>

                        <div class="space-y-2 mb-6 border-t border-slate-800/80 pt-4 text-xs text-slate-300">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-dot text-red-400 w-4"></i>
                                <span>{{ $lokasi }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-users text-emerald-400 w-4"></i>
                                <span>{{ $peserta }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Form Pendaftaran -->
                    <a href="/daftar/{{ $id }}" class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold text-xs transition-all text-center flex items-center justify-center gap-2 shadow-lg shadow-red-600/20 active:scale-[0.98]">
                        <span>Daftar Sekarang</span>
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            @endforeach

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