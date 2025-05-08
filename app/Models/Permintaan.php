<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permintaan extends Model
{
    protected $keyType = 'string';

    protected $guarded = [
        'id'
    ];

    protected static function booted()
    {
        static::creating(function ($permintaan) {
            if (auth()->check()) {
                $permintaan->created_by = auth()->id();
            }
        });
    }
}
