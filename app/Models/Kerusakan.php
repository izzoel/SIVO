<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $fillable = [
        'id_persediaan',
        'id_laboratorium',
        'kondisi',
        'jumlah',
        'id_status'
    ];

    public function persediaan()
    {
        return $this->belongsTo(Persediaan::class, 'id_persediaan');
    }
    public function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'id_laboratorium');
    }

    public function statusKerusakan()
    {
        return $this->belongsTo(StatusKerusakan::class, 'id_status');
    }

    public function statusChanges()
    {
        return $this->hasMany(KerusakanStatusChange::class);
    }
}
