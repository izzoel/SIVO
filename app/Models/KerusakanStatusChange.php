<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KerusakanStatusChange extends Model
{
    protected $fillable = [
        'kerusakan_id',
        'status_lama',
        'status_baru',
        'user_id',
    ];

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class);
    }

    public function statusLama()
    {
        return $this->belongsTo(StatusKerusakan::class, 'status_lama');
    }

    public function statusBaru()
    {
        return $this->belongsTo(StatusKerusakan::class, 'status_baru');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
