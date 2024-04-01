<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bahan',
        'jumlah_ambil',
        'id_mahasiswa',
        'tanggal_ambil',
        'keperluan'
    ];
}
