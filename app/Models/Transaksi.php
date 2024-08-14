<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis',
        'stok',
        'jumlah_ambil',
        'jumlah_kembali',
        'id_mahasiswa',
        'tanggal',
        'keperluan'
    ];

    public function bahan()
    {
        // return $this->belongsTo(Bahan::class, 'id_bahan');
        // return $this->belongsTo(Bahan::class, 'id_bahan');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
