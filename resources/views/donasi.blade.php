<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi - Karang Taruna RT 012</title>
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
<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden my-6">

    <!-- Background Glow Effect -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-emerald-600/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-teal-600/20 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-lg bg-slate-800/80 backdrop-blur-xl border border-slate-700/60 rounded-3xl p-6 sm:p-8 shadow-2xl relative z-10">
        
        <!-- Header & Tombol Kembali -->
        <div class="flex items-center justify-between mb-6">
            <a href="/" class="w-10 h-10 rounded-full bg-slate-700/50 hover:bg-slate-700 flex items-center justify-center text-slate-300 hover:text-white transition-all">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <span class="text-xs font-semibold uppercase tracking-wider text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-3 py-1 rounded-full">
                Karang Taruna RT 012
            </span>
        </div>

        <!-- Judul Form -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-white mb-1">Form Donasi Acara</h1>
            <p class="text-slate-400 text-sm">
                Partisipasi warga untuk menyukseskan kegiatan RT 012.
            </p>
        </div>

        <!-- Alert Pesan Sukses jika ada -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/30 rounded-2xl flex items-center gap-3 text-emerald-400 text-sm">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <!-- Form Utama Donasi -->
        <form action="/donasi" method="POST" enctype="multipart/form-data" id="formDonasi" class="space-y-4">
            @csrf

            <!-- Input 1: Nama Orang Tua / Donatur -->
            <div>
                <label for="nama_orang_tua" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Nama Donatur / Orang Tua <span class="text-emerald-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <i class="fa-solid fa-user text-sm"></i>
                    </div>
                    <input type="text" id="nama_orang_tua" name="nama_orang_tua" required placeholder="Contoh: Bpk. Ahmad"
                        class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
                </div>
            </div>

            <!-- Grid 2 Kolom: No WA & Nama Anak -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Input No WA -->
                <div>
                    <label for="no_wa" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                        No. WhatsApp <span class="text-emerald-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-brands fa-whatsapp text-base"></i>
                        </div>
                        <input type="tel" inputmode="numeric" id="no_wa" name="no_wa" required placeholder="081234567890"
                            class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
                    </div>
                </div>

                <!-- Input Nama Anak -->
                <div>
                    <label for="nama_anak" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                        Nama Anak <span class="text-slate-500">(Opsional)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-child text-sm"></i>
                        </div>
                        <input type="text" id="nama_anak" name="nama_anak" placeholder="Nama anak"
                            class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
                    </div>
                </div>
            </div>

            <!-- Input Nominal Donasi -->
            <div>
                <label for="nominal_donasi" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Nominal Donasi (Rp) <span class="text-emerald-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400 font-bold text-sm">
                        Rp
                    </div>
                    <input type="number" inputmode="numeric" id="nominal_donasi" name="nominal_donasi" required min="10000" step="5000" placeholder="50000"
                        class="w-full pl-10 pr-4 py-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all">
                </div>
            </div>

            <!-- Upload Bukti Transfer -->
            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Bukti Transfer / Foto Donasi
                </label>
                <div class="relative">
                    <input type="file" id="bukti_transfer" name="bukti_transfer" accept="image/*" class="hidden" onchange="previewImage(event)">
                    <label for="bukti_transfer" class="w-full py-4 px-4 bg-slate-900/80 border-2 border-dashed border-slate-700 hover:border-emerald-500 rounded-2xl flex flex-col items-center justify-center cursor-pointer transition-all group">
                        <i class="fa-solid fa-cloud-arrow-up text-2xl text-slate-400 group-hover:text-emerald-400 mb-1 transition-colors"></i>
                        <span id="fileName" class="text-xs text-slate-400 group-hover:text-slate-200">Klik untuk upload foto / bukti transfer</span>
                    </label>
                </div>
                <!-- Preview Gambar -->
                <div id="imagePreviewContainer" class="hidden mt-3">
                    <img id="imagePreview" src="" alt="Preview Bukti" class="w-full h-32 object-cover rounded-2xl border border-slate-700">
                </div>
            </div>

            <!-- Catatan / Doa -->
            <div>
                <label for="catatan" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">
                    Pesan / Catatan <span class="text-slate-500">(Opsional)</span>
                </label>
                <textarea id="catatan" name="catatan" rows="2" placeholder="Tuliskan ucapan atau doa untuk kelancaran acara..."
                    class="w-full p-3 bg-slate-900/80 border border-slate-700 rounded-2xl text-white placeholder-slate-500 text-sm focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 transition-all"></textarea>
            </div>

            <!-- Tombol Kirim -->
            <button type="submit" id="btnSubmitDonasi"
                class="w-full mt-2 py-3.5 px-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-semibold rounded-2xl shadow-lg shadow-emerald-600/30 hover:shadow-emerald-600/50 transition-all active:scale-[0.98] flex items-center justify-center gap-2">
                <i class="fa-solid fa-heart text-sm" id="btnIconDonasi"></i>
                <span id="btnTextDonasi">Kirim Donasi</span>
            </button>
        </form>

        <!-- Footer -->
        <p class="text-center text-xs text-slate-500 mt-6">
            Karang Taruna RT 012 &copy; {{ date('Y') }}
        </p>
    </div>

    <!-- Script Preview Gambar & Loading Spinner -->
    <script>
        function previewImage(event) {
            const input = event.target;
            const fileName = document.getElementById('fileName');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const previewImage = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                fileName.textContent = input.files[0].name;

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        const form = document.getElementById('formDonasi');
        const btnSubmit = document.getElementById('btnSubmitDonasi');
        const btnText = document.getElementById('btnTextDonasi');
        const btnIcon = document.getElementById('btnIconDonasi');

        form.addEventListener('submit', function() {
            btnSubmit.disabled = true;
            btnSubmit.classList.add('opacity-80', 'cursor-not-allowed');
            btnIcon.className = 'fa-solid fa-spinner fa-spin text-sm';
            btnText.innerText = 'Memproses Donasi...';
        });
    </script>
</body>
</html>