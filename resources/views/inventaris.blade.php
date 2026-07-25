<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Perlap - KATAR RT 012</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .card-custom {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
        }

        .table-custom {
            color: #f8fafc;
        }

        .table-custom th {
            background-color: #0f172a;
            color: #94a3b8;
            border-bottom: 2px solid #334155;
        }

        .table-custom td {
            border-bottom: 1px solid #334155;
            vertical-align: middle;
        }
    </style>
</head>
<body class="py-4">

    <div class="container">
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold m-0 text-warning"><i class="bi bi-box-seam-fill me-2"></i>Inventaris Barang Perlap</h3>
                <small class="text-white-50">Manajemen Aset & Peralatan Peringatan HUT RI RT 012</small>
            </div>
            <a href="/admin/dashboard" class="btn btn-outline-light btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>

        <!-- ROW UTAMA -->
        <div class="row g-4">
            
            <!-- FORM TAMBAH BARANG -->
            <div class="col-lg-4">
                <div class="card-custom p-4">
                    <h5 class="fw-bold mb-3 text-white"><i class="bi bi-plus-circle me-2"></i>Tambah Barang Baru</h5>
                    
                    <form id="form-barang">
                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Nama Barang</label>
                            <input type="text" id="nama_barang" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Kabel Roll 15M" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Kategori / Asal Barang</label>
                            <select id="kategori" class="form-select bg-dark text-white border-secondary">
                                <option value="Aset Katar/RT">Aset Katar / RT</option>
                                <option value="Pinjaman Warga">Pinjaman Warga</option>
                                <option value="Sewa Perlengkapan">Sewa / Rental</option>
                            </select>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small text-white-50 fw-bold">Jumlah Total</label>
                                <input type="number" id="jumlah" class="form-control bg-dark text-white border-secondary" value="1" min="1" required>
                            </div>
                            <div class="col-6">
                                <label class="form-label small text-white-50 fw-bold">Satuan</label>
                                <input type="text" id="satuan" class="form-control bg-dark text-white border-secondary" placeholder="Pcs / Roll / Set" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Status Barang</label>
                            <select id="status" class="form-select bg-dark text-white border-secondary">
                                <option value="Tersedia">Tersedia (Ready)</option>
                                <option value="Sedang Dipakai">Sedang Dipakai</option>
                                <option value="Dipinjam Divisi">Dipinjam Divisi Lain</option>
                                <option value="Perlu Perbaikan">Perlu Perbaikan / Rusak</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small text-white-50 fw-bold">Penanggung Jawab / Keterangan</label>
                            <input type="text" id="pj" class="form-control bg-dark text-white border-secondary" placeholder="Contoh: Dibawa Satria / Pinjam Pak RT">
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold text-dark">
                            <i class="bi bi-save me-1"></i> Simpan Barang
                        </button>
                    </form>
                </div>
            </div>

            <!-- TABEL DAFTAR INVENTARIS -->
            <div class="col-lg-8">
                <div class="card-custom p-4">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                        <h5 class="fw-bold m-0 text-white"><i class="bi bi-list-stars me-2"></i>Daftar Aset & Equipment</h5>
                        <input type="text" id="search-input" class="form-control bg-dark text-white border-secondary form-control-sm w-auto" placeholder="🔍 Cari barang...">
                    </div>

                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Asal</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>PJ / Ket</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="inventory-list">
                                <!-- Data barang akan muncul di sini via JavaScript -->
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SCRIPT LOGIKA INVENTARIS (LOCALSTORAGE) -->
    <script>
        const formBarang = document.getElementById('form-barang');
        const inventoryList = document.getElementById('inventory-list');
        const searchInput = document.getElementById('search-input');

        // Data Awal Bawaan (Default Data Tim Perlap)
        const defaultData = [
            { id: 1, nama: 'Sound System Portable', kategori: 'Aset Katar/RT', jumlah: 1, satuan: 'Set', status: 'Tersedia', pj: 'Di Balai Warga' },
            { id: 2, nama: 'Megaphone Toa', kategori: 'Aset Katar/RT', jumlah: 2, satuan: 'Pcs', status: 'Tersedia', pj: 'Tim Perlap' },
            { id: 3, nama: 'Kabel Roll 20M', kategori: 'Pinjaman Warga', jumlah: 3, satuan: 'Roll', status: 'Sedang Dipakai', pj: 'Pinjam Pak RT Budi' },
            { id: 4, nama: 'Terpal Merah Putih', kategori: 'Aset Katar/RT', jumlah: 2, satuan: 'Pcs', status: 'Tersedia', pj: 'Gudang RT' }
        ];

        function getInventory() {
            const data = localStorage.getItem('katar_inventory');
            return data ? JSON.parse(data) : defaultData;
        }

        function saveInventory(data) {
            localStorage.setItem('katar_inventory', JSON.stringify(data));
            renderInventory();
        }

        function renderInventory(filterText = '') {
            const items = getInventory();
            inventoryList.innerHTML = '';

            const filtered = items.filter(item => 
                item.nama.toLowerCase().includes(filterText.toLowerCase()) ||
                item.pj.toLowerCase().includes(filterText.toLowerCase())
            );

            if (filtered.length === 0) {
                inventoryList.innerHTML = `<tr><td colspan="7" class="text-center text-white-50 py-4">Belum ada data barang.</td></tr>`;
                return;
            }

            filtered.forEach((item, index) => {
                let statusBadge = 'bg-success';
                if (item.status === 'Sedang Dipakai') statusBadge = 'bg-primary';
                if (item.status === 'Dipinjam Divisi') statusBadge = 'bg-warning text-dark';
                if (item.status === 'Perlu Perbaikan') statusBadge = 'bg-danger';

                inventoryList.innerHTML += `
                    <tr>
                        <td class="text-white-50">${index + 1}</td>
                        <td class="fw-bold">${item.nama}</td>
                        <td><span class="badge bg-secondary">${item.kategori}</span></td>
                        <td class="fw-bold text-warning">${item.jumlah} ${item.satuan}</td>
                        <td><span class="badge ${statusBadge}">${item.status}</span></td>
                        <td class="small text-white-50">${item.pj || '-'}</td>
                        <td class="text-end">
                            <button onclick="deleteItem(${item.id})" class="btn btn-sm btn-outline-danger border-0">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        }

        formBarang.addEventListener('submit', (e) => {
            e.preventDefault();
            const items = getInventory();

            const newItem = {
                id: Date.now(),
                nama: document.getElementById('nama_barang').value,
                kategori: document.getElementById('kategori').value,
                jumlah: document.getElementById('jumlah').value,
                satuan: document.getElementById('satuan').value,
                status: document.getElementById('status').value,
                pj: document.getElementById('pj').value
            };

            items.unshift(newItem);
            saveInventory(items);
            formBarang.reset();
        });

        function deleteItem(id) {
            if (confirm('Hapus barang ini dari daftar inventaris?')) {
                const items = getInventory().filter(item => item.id !== id);
                saveInventory(items);
            }
        }

        searchInput.addEventListener('input', (e) => {
            renderInventory(e.target.value);
        });

        // Inisialisasi
        renderInventory();
    </script>
</body>
</html>