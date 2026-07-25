<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('donasis', function ($table) {
            $table->id();
            $table->string('nama_orang_tua');
            $table->string('no_wa');
            $table->string('nama_anak')->nullable();
            $table->integer('umur_anak')->nullable();
            $table->bigInteger('nominal_donasi');
            $table->string('bukti_transfer')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donasis');
    }
};