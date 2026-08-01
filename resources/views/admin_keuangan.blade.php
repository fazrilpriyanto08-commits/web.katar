<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Keuangan - Katar Panel</title>
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

            <!-- PROFIL USER YANG SEDANG LOGIN -->
            <div class="mb-6 p-3 rounded-xl bg-slate-950/60 border border-slate-800 flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-gradient-to-tr from-red-600 to-rose-500 flex items-center justify-center text-white font-bold text-xs shadow-md">
                    {{ substr(session('user_name', 'Admin'), 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <h2 class="font-bold text-xs text-white truncate">{{ session('user_name', 'Panitia RT 012') }}</h2>
                    <span class="inline-block px-2 py-0.5 rounded text-[9px] font-extrabold uppercase bg-red-500/10 border border-red-500/20 text-red-400 mt-0.5">
                        {{ session('user_role', 'Panitia') }}
                    </span>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="/admin/pendaftar" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-users text-sm"></i> <span>Pendaftar Lomba</span>
                </a>
                <a href="/admin/donasi" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-hand-holding-dollar text-sm"></i> <span>Donasi & Data Anak</span>
                </a>
                <a href="/admin/doorprize" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-compact-disc text-sm text-amber-400"></i> <span>Spin Wheel (Doorprize)</span>
                </a>
                <a href="/admin/inventaris" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-boxes-stacked text-sm"></i> <span>Inventaris Perlap</span>
                </a>
                <!-- Active Link Keuangan -->
                <a href="/admin/keuangan" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-600/10 text-red-400 border border-red-500/20 text-xs font-bold transition-all">
                    <i class="fa-solid fa-wallet text-sm"></i> <span>Laporan Keuangan</span>
                </a>
                <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-user-gear text-sm"></i> <span>Kelola User Panitia</span>
                </a>
            </nav>
        </div>

        <form action="/logout" method="POST" class="pt-6 border-t border-slate-800">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 rounded-xl text-slate-500 hover:text-red-400 text-xs font-bold transition-colors flex items-center gap-2">
                <i class="fa-solid fa-right-from-bracket"></i> <span>Keluar / Logout</span>
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-6 lg:p-10">
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-black text-white">Laporan Keuangan</h1>
            <p class="text-slate-400 text-xs mt-1">Catat dan pantau arus kas masuk/keluar secara transparan dengan jejak panitia.</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- FORM TAMBAH KEUANGAN -->
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 h-fit">
                <h3 class="text-sm font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-file-circle-plus text-red-400"></i> Tambah Transaksi Kas
                </h3>

                <form action="/admin/keuangan" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Keterangan Transaksi</label>
                        <input type="text" name="keterangan" required placeholder="Contoh: Beli konsumsi rapat" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Jenis Arus Kas</label>
                        <select name="jenis" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                            <option value="pemasukan">Kas Masuk (Pemasukan)</option>
                            <option value="pengeluaran">Kas Keluar (Pengeluaran)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">Nominal (Rp)</label>
                        <input type="number" name="jumlah" required placeholder="50000" class="w-full bg-slate-950 border border-slate-800 rounded-xl px-4 py-2.5 text-xs text-white focus:outline-none focus:border-red-500">
                    </div>

                    <button type="submit" class="w-full py-3 rounded-xl bg-red-600 hover:bg-red-500 text-white font-bold text-xs transition-all shadow-lg shadow-red-600/20">
                        Simpan Transaksi
                    </button>
                </form>
            </div>

            <!-- TABEL LAPORAN KEUANGAN -->
            <div class="lg:col-span-2 bg-slate-900 border border-slate-800 rounded-2xl p-6">
                <h3 class="text-sm font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-list-check text-red-400"></i> Riwayat Arus Kas & Jejak Panitia
                </h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs">
                        <thead class="bg-slate-950/60 text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-800">
                            <tr>
                                <th class="p-3">#</th>
                                <th class="p-3">Keterangan & Jejak Panitia</th>
                                <th class="p-3">Jenis</th>
                                <th class="p-3">Jumlah</th>
                                <th class="p-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60 text-slate-300">
                            @forelse($keuangan ?? [] as $index => $item)
                                <tr class="hover:bg-slate-800/30 transition-colors">
                                    <td class="p-3 text-slate-500">{{ $index + 1 }}</td>
                                    <td class="p-3 font-bold text-white">
                                        {{ $item->keterangan }}
                                    </td>
                                    <td class="p-3">
                                        @if($item->jenis == 'pemasukan')
                                            <span class="px-2 py-0.5 rounded-full font-bold text-[10px] bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 uppercase">Masuk</span>
                                        @else
                                            <span class="px-2 py-0.5 rounded-full font-bold text-[10px] bg-rose-500/10 border border-rose-500/20 text-rose-400 uppercase">Keluar</span>
                                        @endif
                                    </td>
                                    <td class="p-3 font-mono font-bold {{ $item->jenis == 'pemasukan' ? 'text-emerald-400' : 'text-rose-400' }}">
                                        Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                    </td>
                                    <td class="p-3 text-right">
                                        <form action="/admin/keuangan/{{ $item->id }}" method="POST" onsubmit="return confirm('Hapus catatan transaksi ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-rose-400 hover:text-rose-300 p-1 font-bold">
                                                <i class="fa-solid fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6 text-slate-500">Belum ada catatan keuangan yang tersimpan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>
</html>