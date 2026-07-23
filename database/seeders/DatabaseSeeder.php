<?php

namespace Database\Seeders;

use App\Models\Lomba;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $lombas = [
            ['nama_lomba' => 'Masukin Bendera Anak-Anak', 'lokasi' => 'Lapangan Baru', 'waktu' => '07.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Futsal Pake Sarung', 'lokasi' => 'Lapangan Baru', 'waktu' => '16.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Sendok Kelereng Anak-Anak', 'lokasi' => 'Lapangan Baru', 'waktu' => '08.30', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Tali Ping-Pong', 'lokasi' => 'Lapangan Baru', 'waktu' => '14.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Mewarnai Anak-Anak', 'lokasi' => 'Lapangan Baru', 'waktu' => '12.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Joget Koran', 'lokasi' => 'Lapangan Baru', 'waktu' => '15.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Makan Kerupuk', 'lokasi' => 'Lapangan Baru', 'waktu' => '15.30', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Karung Helm', 'lokasi' => 'Lapangan Baru', 'waktu' => '10.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Masukin Paku Anak-Anak', 'lokasi' => 'Lapangan Baru', 'waktu' => '09.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Masukin Paku Ibu-Ibu', 'lokasi' => 'Lapangan Baru', 'waktu' => '15.30', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Tusuk Balon', 'lokasi' => 'Lapangan Baru', 'waktu' => '14.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Pancing Kerupuk Ibu-Ibu', 'lokasi' => 'Lapangan Baru', 'waktu' => '16.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Ikan Kipas Anak-Anak', 'lokasi' => 'Lapangan Baru', 'waktu' => '07.00', 'status' => 'Terbuka'],
            ['nama_lomba' => 'Estafet Spons', 'lokasi' => 'Lapangan Baru', 'waktu' => '14.00', 'status' => 'Terbuka'],
        ];

        foreach ($lombas as $lomba) {
            Lomba::create([
                'nama_lomba' => $lomba['nama_lomba'],
                'lokasi'     => $lomba['lokasi'],
                'waktu'      => $lomba['waktu'],
                'status'     => $lomba['status'],
                'pemenang'   => null,
            ]);
        }
    }
}