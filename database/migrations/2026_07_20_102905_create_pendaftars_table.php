<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('pendaftars', function (Blueprint $table) {
        $table->id();
        $table->string('nama_warga');
        $table->string('nomor_hp');
        $table->string('rt_rw'); // Asal RT/RW pendaftar
        
        // Menghubungkan pendaftar dengan id lomba yang dipilih
        $table->foreignId('lomba_id')->constrained('lombas')->onDelete('cascade');
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
