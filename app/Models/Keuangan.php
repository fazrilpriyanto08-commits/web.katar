<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $table = 'keuangans';

    // Kita hanya mengizinkan kolom yang benar-benar aman disentuh agar kolom 'jenis' tidak ikut dikirim
    protected $fillable = [
        'keterangan',
        'nominal',
        'tanggal',
    ];
}