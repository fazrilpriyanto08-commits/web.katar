<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas Admin - Katar RT 012</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen p-6">

    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-xl font-black text-white">Log Aktivitas Panitia</h1>
                <p class="text-xs text-slate-400">Riwayat aksi yang dilakukan oleh panitia di dashboard.</p>
            </div>
            <a href="/admin/pendaftar" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-xs font-bold rounded-xl transition-colors">
                <i class="fa-solid fa-arrow-left mr-1">} Kembali</i>
            </a>
        </div>

        <div class="bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden shadow-xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-800 bg-slate-950/50 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                        <th class="p-4">Waktu</th>
                        <th class="p-4">Nama Panitia</th>
                        <th class="p-4">Aksi yang Dilakukan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-xs">
                    @forelse($logs as $log)
                        <tr class="hover:bg-slate-800/40 transition-colors">
                            <td class="p-4 text-slate-400 whitespace-nowrap">{{ $log->created_at->format('d M Y, H:i') }}</td>
                            <td class="p-4 font-bold text-white">{{ $log->user_name }}</td>
                            <td class="p-4 text-slate-300">{{ $log->action }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-8 text-center text-slate-500">Belum ada aktivitas tercatat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $logs->links() }}
        </div>
    </div>

</body>
</html>