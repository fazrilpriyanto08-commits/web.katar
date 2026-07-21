<?php

namespace Database\Seeders;

use App\Models\Lomba;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Lomba::create([
            'nama_lomba' => 'Lomba Balap Karung',
            'lokasi'     => 'Lapangan RT 012',
            'waktu'      => '17 Agustus 2026, 08:00 WIB',
            'status'     => 'Pendaftaran Dibuka',
            'pemenang'   => null,
        ]);

        Lomba::create([
            'nama_lomba' => 'Lomba Makan Kerupuk',
            'lokasi'     => 'Halaman Pos RW 012',
            'waktu'      => '17 Agustus 2026, 10:00 WIB',
            'status'     => 'Pendaftaran Dibuka',
            'pemenang'   => null,
        ]);

        Lomba::create([
            'nama_lomba' => 'Lomba Tarik Tambang',
            'lokasi'     => 'Lapangan Utama',
            'waktu'      => '18 Agustus 2026, 15:30 WIB',
            'status'     => 'Pendaftaran Dibuka',
            'pemenang'   => null,
        ]);
    }
}