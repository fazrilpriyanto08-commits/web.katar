<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pendaftar Lomba</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 p-6 flex flex-col justify-between hidden md:flex min-h-screen">
        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-red-600 flex items-center justify-center text-white font-black shadow-lg shadow-red-600/30">KT</div>
                <div>
                    <h1 class="font-black text-sm text-white">KATAR PANEL</h1>
                    <p class="text-[10px] text-slate-400">Admin Control Center</p>
                </div>
            </div>

            <!-- PROFIL USER & BADGE ROLE DINAMIS + TOMBOL PROFIL -->
            <div class="p-3 mb-6 bg-slate-950/50 rounded-2xl border border-slate-800 space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-sm shrink-0">
                        {{ strtoupper(substr(session('user_name', 'Admin'), 0, 1)) }}
                    </div>
                    <div class="overflow-hidden">
                        <h4 class="text-xs font-bold text-white capitalize truncate">
                            {{ session('user_name', 'Administrator') }}
                        </h4>
                        <!-- Badge Role Diperkuat agar langsung mendeteksi admin -->
                        <span class="inline-block mt-0.5 px-2 py-0.5 text-[9px] font-extrabold uppercase rounded-md tracking-wider {{ strtolower(session('user_role')) == 'admin' ? 'bg-red-500 text-white shadow-lg shadow-red-500/30' : 'bg-slate-800 text-slate-300' }}">
                            {{ session('user_role') ?? 'panitia' }}
                        </span>
                    </div>
                </div>
                <!-- Tombol ke Halaman Profil -->
                <a href="/admin/profile" class="w-full flex items-center justify-center gap-2 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 border border-slate-800 text-slate-300 hover:text-white text-[11px] font-semibold transition-all">
                    <i class="fa-solid fa-user-gear text-red-400"></i>
                    <span>Pengaturan Profil</span>
                </a>
            </div>

            <nav class="space-y-2">
                <!-- 1. Pendaftar Lomba (Active) -->
                <a href="/admin/pendaftar" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-600/10 text-red-400 border border-red-500/20 text-xs font-bold transition-all">
                    <i class="fa-solid fa-users text-sm"></i>
                    <span>Pendaftar Lomba</span>
                </a>

                <!-- 2. Donasi & Data Anak -->
                <a href="/admin/donasi" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-hand-holding-dollar text-sm"></i>
                    <span>Donasi & Data Anak</span>
                </a>

                <!-- 3. Spin Wheel (Doorprize) -->
                <a href="/admin/doorprize" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-compact-disc text-sm text-amber-400"></i>
                    <span>Spin Wheel (Doorprize)</span>
                </a>

                <!-- 4. Inventaris Perlap -->
                <a href="/admin/inventaris" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-boxes-stacked text-sm"></i>
                    <span>Inventaris Perlap</span>
                </a>

                <!-- 5. Laporan Keuangan -->
                <a href="/admin/keuangan" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-wallet text-sm"></i>
                    <span>Laporan Keuangan</span>
                </a>

                <!-- 6. Kelola User Panitia -->
                <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-user-gear text-sm"></i>
                    <span>Kelola User Panitia</span>
                </a>

                <!-- 7. Log Aktivitas -->
                <a href="/admin/logs" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-clock-rotate-left text-sm"></i>
                    <span>Log Aktivitas</span>
                </a>

                <div class="pt-4 border-t border-slate-800/80 mt-4">
                    <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-500 hover:text-slate-300 text-xs font-medium transition-all">
                        <i class="fa-solid fa-globe text-sm"></i>
                        <span>Lihat Web Utama</span>
                    </a>
                </div>
            </nav>
        </div>

        <form action="/logout" method="POST" class="pt-6 border-t border-slate-800">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-slate-500 hover:text-red-400 text-xs font-bold transition-colors flex items-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar / Logout</span>
            </button>
        </form>
    </aside>

    <!-- CONTENT UTAMA -->
    <main class="flex-1 p-6 lg:p-10">
        
        <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl sm:text-3xl font-black text-white">Dashboard Pendaftar Lomba</h1>
                <p class="text-slate-400 text-xs mt-1">Kelola informasi pendaftaran warga RT 012 secara real-time.</p>
            </div>
            <a href="/daftar-lomba" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-800 text-xs font-bold text-white hover:border-red-500/50 transition-colors">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Buka Form Warga
            </a>
        </div>

        <!-- STATS KARTU -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
            <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Total Pendaftar Lomba</p>
                    <h2 class="text-3xl font-black text-white mt-1">{{ count($pendaftar ?? []) }} <span class="text-sm font-normal text-slate-400">orang</span></h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-red-500/10 border border-red-500/20 flex items-center justify-center text-red-400 text-xl">
                    <i class="fa-solid fa-users"></i>
                </div>
            </div>

            <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Status Sistem</p>
                    <h2 class="text-sm font-bold text-emerald-400 mt-2 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Terhubung Sheets
                    </h2>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 text-xl">
                    <i class="fa-solid fa-file-excel"></i>
                </div>
            </div>
        </div>

        <!-- TABEL PENDAFTAR -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
            <h3 class="text-sm font-bold text-white mb-4 flex items-center gap-2">
                <i class="fa-solid fa-list text-red-400"></i> Data Pendaftar Lomba
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-950/60 text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="p-3">#</th>
                            <th class="p-3">Nama Warga</th>
                            <th class="p-3">No. WhatsApp</th>
                            <th class="p-3">RT / RW</th>
                            <th class="p-3">ID Lomba</th>
                            <th class="p-3">Tanggal Daftar</th>
                            <th class="p-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-slate-300">
                        @forelse($pendaftar ?? [] as $index => $item)
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="p-3 font-bold text-slate-500">{{ $index + 1 }}</td>
                                <td class="p-3 font-bold text-white">{{ $item->nama_warga }}</td>
                                <td class="p-3 text-emerald-400 font-mono">{{ $item->nomor_hp }}</td>
                                <td class="p-3">{{ $item->rt_rw }}</td>
                                <td class="p-3">
                                    <span class="bg-red-500/10 border border-red-500/20 text-red-400 px-2 py-0.5 rounded-full font-bold">
                                        Lomba #{{ $item->lomba_id }}
                                    </span>
                                </td>
                                <td class="p-3 text-slate-400">{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}</td>
                                <td class="p-3 text-right">
                                    <form action="/admin/pendaftar/{{ $item->id }}" method="POST" onsubmit="return confirm('Yakin mau hapus data pendaftar ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-400 hover:text-rose-300 font-bold p-1">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-8 text-slate-500">
                                    Belum ada data pendaftar yang masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>