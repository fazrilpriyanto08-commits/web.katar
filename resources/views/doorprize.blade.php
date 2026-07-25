<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheel of Fortune Doorprize - KATAR RT 012</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Canvas Confetti -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

    <style>
        body {
            background-color: #0b0f19;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .wheel-container {
            position: relative;
            width: 360px;
            height: 360px;
            margin: 0 auto;
        }

        #wheel {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 8px solid #f59e0b;
            box-shadow: 0 0 35px rgba(245, 158, 11, 0.4);
            transition: transform 4s cubic-bezier(0.15, 0.99, 0.15, 0.99);
        }

        .pointer {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 18px solid transparent;
            border-right: 18px solid transparent;
            border-top: 30px solid #dc2626;
            z-index: 10;
            filter: drop-shadow(0 4px 6px rgba(0,0,0,0.5));
        }

        .card-custom {
            background-color: #161e2e;
            border: 1px solid #2d3748;
            border-radius: 16px;
        }

        .winner-display-box {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border: 2px dashed #f59e0b;
            border-radius: 16px;
            padding: 1.5rem;
            text-align: center;
        }

        @media (max-width: 576px) {
            .wheel-container {
                width: 280px;
                height: 280px;
            }
        }
    </style>
</head>
<body class="py-4">

    <div class="container">
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold m-0 text-warning"><i class="bi bi-gift-fill me-2"></i>Wheel of Fortune Kupon Doorprize</h3>
                <small class="text-white-50">Undian Nomor Kupon Semarak HUT RI RT 012</small>
            </div>
            <a href="/admin/dashboard" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>

        <div class="row g-4 align-items-center">
            
            <!-- SISI KIRI: RODA SPINNER NOMOR -->
            <div class="col-lg-7 text-center">
                <div class="card-custom p-4 position-relative overflow-hidden">
                    <div class="wheel-container mb-4">
                        <div class="pointer"></div>
                        <canvas id="wheel" width="360" height="360"></canvas>
                    </div>

                    <button id="spin-btn" class="btn btn-warning btn-lg fw-bold text-dark px-5 py-3 rounded-pill shadow-lg fs-3">
                        🎰 ADIRKAN NOMOR!
                    </button>
                </div>
            </div>

            <!-- SISI KANAN: PENGATURAN KUPON & RIWAYAT PEMENANG -->
            <div class="col-lg-5">
                
                <!-- PENGATURAN RENTANG NOMOR -->
                <div class="card-custom p-4 mb-4">
                    <h5 class="fw-bold mb-3 text-white"><i class="bi bi-sliders me-2"></i>Pengaturan Nomor Kupon</h5>
                    
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small text-white-50 fw-bold">Nomor Awal</label>
                            <input type="number" id="num-min" class="form-control bg-dark text-white border-secondary" value="1" min="1">
                        </div>
                        <div class="col-6">
                            <label class="form-label small text-white-50 fw-bold">Nomor Akhir</label>
                            <input type="number" id="num-max" class="form-control bg-dark text-white border-secondary" value="200" min="2">
                        </div>
                    </div>

                    <button id="update-btn" class="btn btn-outline-warning w-100 fw-bold">
                        <i class="bi bi-arrow-clockwise me-1"></i> Reset / Set Rentang Kupon
                    </button>
                </div>

                <!-- RIWAYAT NOMOR PEMENANG -->
                <div class="card-custom p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold m-0 text-white"><i class="bi bi-trophy-fill text-warning me-2"></i>Daftar Nomor Pemenang</h5>
                        <button onclick="clearHistory()" class="btn btn-sm btn-outline-danger border-0">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </div>

                    <div id="winner-history-list" class="d-flex flex-wrap gap-2 style-scroll" style="max-height: 150px; overflow-y: auto;">
                        <span class="text-white-50 small italic">Belum ada nomor yang diundi.</span>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- MODAL POPUP NOMOR PEMENANG -->
    <div class="modal fade" id="winnerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-custom text-center p-4 border-warning">
                <div class="modal-body">
                    <div class="fs-1 mb-2">🎉 🎁 🎉</div>
                    <h5 class="text-warning fw-bold text-uppercase">PEMENANG DOORPRIZE NOMOR KUPON</h5>
                    
                    <div class="winner-display-box my-4">
                        <small class="text-white-50 text-uppercase d-block mb-1">Nomor Kupon Beruntung:</small>
                        <h1 class="display-1 fw-black text-warning m-0" id="winner-number" style="font-weight: 900; letter-spacing: 2px;">000</h1>
                    </div>

                    <p class="text-white-50">Selamat kepada warga pemilik nomor kupon di atas!</p>
                    
                    <button type="button" class="btn btn-warning fw-bold px-4 py-2 rounded-pill mt-2 text-dark" data-bs-dismiss="modal">
                        Simpan & Undi Lagi
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- LOGIKA SPINNER NOMOR KUPON -->
    <script>
        const canvas = document.getElementById('wheel');
        const ctx = canvas.getContext('2d');
        const spinBtn = document.getElementById('spin-btn');
        const updateBtn = document.getElementById('update-btn');
        const minInput = document.getElementById('num-min');
        const maxInput = document.getElementById('num-max');
        const winnerHistoryList = document.getElementById('winner-history-list');

        let minNum = 1;
        let maxNum = 200;
        let currentRotation = 0;
        let winners = [];

        // Warna-warni Roda
        const colors = ['#dc2626', '#f59e0b', '#10b981', '#3b82f6', '#8b5cf6', '#ec4899', '#06b6d4', '#f97316'];

        function drawWheel() {
            minNum = parseInt(minInput.value) || 1;
            maxNum = parseInt(maxInput.value) || 200;

            const radius = canvas.width / 2;
            const sliceCount = 12; // Menampilkan 12 sektor visual pada roda
            const sliceAngle = (2 * Math.PI) / sliceCount;

            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < sliceCount; i++) {
                const angle = i * sliceAngle;

                // Gambar Potongan Roda
                ctx.beginPath();
                ctx.fillStyle = colors[i % colors.length];
                ctx.moveTo(radius, radius);
                ctx.arc(radius, radius, radius, angle, angle + sliceAngle);
                ctx.lineTo(radius, radius);
                ctx.fill();

                // Teks Angka Sampel di Roda
                ctx.save();
                ctx.translate(radius, radius);
                ctx.rotate(angle + sliceAngle / 2);
                ctx.textAlign = "right";
                ctx.fillStyle = "#ffffff";
                ctx.font = "bold 16px Segoe UI";
                
                // Menampilkan sampel rentang kupon
                const sampleNum = Math.floor(minNum + (i * ((maxNum - minNum) / sliceCount)));
                ctx.fillText(`Kupon #${sampleNum}`, radius - 20, 5);
                ctx.restore();
            }
        }

        // Jalankan Undian
        spinBtn.addEventListener('click', () => {
            if (minNum >= maxNum) return alert('Nomor akhir harus lebih besar dari nomor awal!');

            spinBtn.disabled = true;

            // Pilih nomor acak dari rentang minNum sampai maxNum
            let drawnNumber;
            let attempts = 0;
            
            // Loop sampai menemukan nomor yang belum pernah keluar (jika rentang mencukupi)
            do {
                drawnNumber = Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
                attempts++;
            } while (winners.includes(drawnNumber) && attempts < 500);

            // Putaran Animasi Roda (5 Putaran + Acak Derajat)
            const randomExtraDeg = Math.floor(Math.random() * 360) + 1800; // 5 x 360 = 1800deg
            currentRotation += randomExtraDeg;
            canvas.style.transform = `rotate(${currentRotation}deg)`;

            // Tampilkan Pemenang setelah 4 detik animasi selesai
            setTimeout(() => {
                // Tambahkan ke daftar riwayat pemenang
                winners.push(drawnNumber);
                renderWinnerHistory();

                // Set Teks Modal
                document.getElementById('winner-number').innerText = `#${drawnNumber}`;
                var winnerModal = new bootstrap.Modal(document.getElementById('winnerModal'));
                winnerModal.show();

                // Efek Kembang Api / Confetti
                confetti({
                    particleCount: 150,
                    spread: 90,
                    origin: { y: 0.6 }
                });

                spinBtn.disabled = false;
            }, 4000);
        });

        // Tampilkan Riwayat Pemenang
        function renderWinnerHistory() {
            if (winners.length === 0) {
                winnerHistoryList.innerHTML = `<span class="text-white-50 small italic">Belum ada nomor yang diundi.</span>`;
                return;
            }

            winnerHistoryList.innerHTML = winners.map(num => 
                `<span class="badge bg-warning text-dark px-3 py-2 rounded-pill fs-6 fw-bold">#${num}</span>`
            ).join('');
        }

        function clearHistory() {
            if (confirm('Hapus seluruh riwayat nomor pemenang?')) {
                winners = [];
                renderWinnerHistory();
            }
        }

        updateBtn.addEventListener('click', () => {
            drawWheel();
            alert(`Rentang nomor kupon berhasil diset: ${minInput.value} sampai ${maxInput.value}`);
        });

        // Inisialisasi awal
        drawWheel();
    </script>
</body>
</html>