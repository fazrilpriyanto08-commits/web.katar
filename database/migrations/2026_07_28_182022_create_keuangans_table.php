<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan');
            $table->enum('jenis', ['Pemasukan', 'Pengeluaran']);
            $table->bigInteger('nominal');
            $table->date('tanggal');
            $table->string('kategori')->nullable(); // contoh: Hadiah, Konsumsi, Donasi, Kas
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};