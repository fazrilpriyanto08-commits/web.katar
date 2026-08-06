<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas Panitia - Katar Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex">

    <!-- SIDEBAR (Gunakan sidebar standar admin yang sama) -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 p-6 flex flex-col justify-between hidden md:flex min-h-screen">
        <div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 rounded-xl bg-red-600 flex items-center justify-center text-white font-black shadow-lg shadow-red-600/30">KT</div>
                <div>
                    <h1 class="font-black text-sm text-white">KATAR PANEL</h1>
                    <p class="text-[10px] text-slate-400">Admin Control Center</p>
                </div>
            </div>
            
            <div class="p-3 mb-6 bg-slate-950/50 rounded-2xl border border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr(session('user_name', 'Admin'), 0, 1)) }}
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-white capitalize truncate max-w-[120px]">
                            {{ session('user_name', 'Administrator') }}
                        </h4>
                        <span class="inline-block mt-0.5 px-2 py-0.5 text-[9px] font-extrabold uppercase rounded-md tracking-wider bg-red-500 text-white">
                            {{ session('user_role') ?? 'admin' }}
                        </span>
                    </div>
                </div>
            </div>

            <nav class="space-y-2">
                <a href="/admin/pendaftar" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 text-xs font-bold transition-all">
                    <i class="fa-solid fa-users text-sm"></i> <span>Pendaftar Lomba</span>
                </a>
                <a href="/admin/logs" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-red-600/10 text-red-400 border border-red-500/20 text-xs font-bold transition-all">
                    <i class="fa-solid fa-clock-rotate-left text-sm"></i> <span>Log Aktivitas</span>
                </a>
                <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-500 hover:text-slate-300 text-xs font-medium transition-all">
                    <i class="fa-solid fa-arrow-left text-sm"></i> <span>Kembali ke Dashboard</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- KONTEN UTAMA -->
    <main class="flex-1 p-6 lg:p-10">
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-black text-white">Log Aktivitas Panitia</h1>
            <p class="text-slate-400 text-xs mt-1">Rekaman jejak digital aksi yang dilakukan oleh setiap akun panitia secara real-time.</p>
        </div>

        <!-- TABEL LOG -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
            <h3 class="text-sm font-bold text-white mb-4 flex items-center gap-2">
                <i class="fa-solid fa-shield-halved text-red-400"></i> Riwayat Audit Aksi Panitia
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-950/60 text-slate-400 uppercase text-[10px] tracking-wider border-b border-slate-800">
                        <tr>
                            <th class="p-3">#</th>
                            <th class="p-3">Waktu</th>
                            <th class="p-3">Nama Panitia</th>
                            <th class="p-3">Role</th>
                            <th class="p-3">Aktivitas / Aksi Dilakukan</th>
                            <th class="p-3">IP Address</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-slate-300">
                        @php 
                            $logs = DB::table('activity_logs')->orderBy('created_at', 'desc')->get(); 
                        @endphp
                        @forelse($logs as $index => $log)
                            <tr class="hover:bg-slate-800/30 transition-colors">
                                <td class="p-3 font-bold text-slate-500">{{ $index + 1 }}</td>
                                <td class="p-3 text-slate-400 font-mono">{{ $log->created_at }}</td>
                                <td class="p-3 font-bold text-white flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-lg bg-red-500/20 text-red-400 flex items-center justify-center font-bold text-[10px]">
                                        {{ strtoupper(substr($log->nama_panitia, 0, 1)) }}
                                    </div>
                                    {{ $log->nama_panitia }}
                                </td>
                                <td class="p-3">
                                    <span class="px-2 py-0.5 rounded text-[9px] font-bold uppercase {{ $log->role == 'admin' ? 'bg-red-500/20 text-red-400 border border-red-500/30' : 'bg-slate-800 text-slate-300' }}">
                                        {{ $log->role }}
                                    </span>
                                </td>
                                <td class="p-3 text-emerald-400 font-medium">{{ $log->aktivitas }}</td>
                                <td class="p-3 text-slate-500 font-mono text-[10px]">{{ $log->ip_address ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-8 text-slate-500">
                                    Belum ada catatan aktivitas panitia yang terekam.
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