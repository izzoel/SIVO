<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    protected $table = 'laboratoriums';

    protected $fillable = [
        'nama',
        'gedung',
        'warna'
    ];
}
