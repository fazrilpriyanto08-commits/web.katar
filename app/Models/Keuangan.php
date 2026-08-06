<?php

namespace App\Models;

use Illuminate\Database\Factories\HasFactory;
use Illuminate\Database\Model;

class Keuangan extends Model
{
    use HasFactory;

    protected $table = 'kas_keuangan';

    protected $fillable = [
        'keterangan',
        'jenis',
        'jumlah',
    ];
}