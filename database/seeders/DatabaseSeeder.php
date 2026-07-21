<?php

namespace Database\Seeders;

use App\Models\Lomba;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Masukkan data lomba bawaan Karang Taruna
        Lomba::create([
            'nama_lomba' => 'Lomba Balap Karung',
            'deskripsi'  => 'Lomba ketangkasan balap karung menggunakan helm untuk kategori dewasa & remaja.',
            'tanggal'    => '2026-08-17',
        ]);

        Lomba::create([
            'nama_lomba' => 'Lomba Makan Kerupuk',
            'deskripsi'  => 'Lomba seru makan kerupuk gantung tanpa menggunakan tangan khusus anak-anak.',
            'tanggal'    => '2026-08-17',
        ]);

        Lomba::create([
            'nama_lomba' => 'Lomba Tarik Tambang',
            'deskripsi'  => 'Lomba antar-RT untuk menguji kekompakan dan kekuatan tim.',
            'tanggal'    => '2026-08-18',
        ]);
    }
}