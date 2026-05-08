<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $fillable = [
        'jenis',
        'nama',
        'stok',
        'spesifikasi',
        'id_satuan',
        'id_laboratorium',
        'id_lokasi',
        'id_status',
    ];

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'id_laboratorium');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function statusKerusakan()
    {
        return $this->belongsTo(StatusKerusakan::class, 'id_status');
    }

    public function kerusakan()
    {
        return $this->hasOne(Kerusakan::class, 'id_persediaan');
    }
}
