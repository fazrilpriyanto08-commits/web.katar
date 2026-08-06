<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('keuangans', function (Blueprint $table) {
            if (!Schema::hasColumn('keuangans', 'jenis')) {
                $table->string('jenis')->nullable();
            }
            if (!Schema::hasColumn('keuangans', 'jumlah')) {
                $table->decimal('jumlah', 15, 2)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('keuangans', function (Blueprint $table) {
            $table->dropColumn(['jenis', 'jumlah']);
        });
    }
};