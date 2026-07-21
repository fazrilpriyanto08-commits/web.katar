<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lombas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lomba');
            $table->string('lokasi');
            $table->string('waktu');
            $table->string('status');
            $table->string('pemenang')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lombas');
    }
};