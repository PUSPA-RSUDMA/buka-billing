<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alasan extends Model
{
    public function permintaan()
    {
        if (auth()->user()->hasRole('admin')) {
            return $this->hasMany(Permintaan::class, 'alasan_id');
        }

        return $this->hasMany(Permintaan::class, 'alasan_id')->where('created_by', auth()->id());
    }

    public function getJumlahPermintaanAttribute()
    {
        return $this->permintaan->count();
    }
}
