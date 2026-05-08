<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $fillable = [
        'nama',
        'jenis',
        'warna'
    ];

    public function persediaans()
    {
        return $this->hasMany(Persediaan::class, 'id_satuan');
    }
}
