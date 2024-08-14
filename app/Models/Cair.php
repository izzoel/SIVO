<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cair extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'stok',
        'satuan',
        'jenis',
        'lokasi',
    ];
}
