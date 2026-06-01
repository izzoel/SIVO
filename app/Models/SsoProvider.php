<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SsoProvider extends Model
{
     protected $fillable = [
        'code',
        'name',
        'base_url',
        'verify_path',
        'secret',
        'is_active',
    ];
}
