<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $guarded = [
        'id',
    ];

    protected static function booted()
    {
        static::creating(function ($permintaan) {
            if (auth()->check()) {
                $permintaan->created_by = auth()->id();
            }
        });
    }

    public function alasan()
    {
        return $this->belongsTo(Alasan::class);
    }
}
