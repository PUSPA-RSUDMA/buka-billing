<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permintaan extends Model
{
    protected $guarded = [
        'id',
    ];

    protected static function booted()
    {
        static::creating(function ($permintaan) {
            if (auth()->user()->hasRole('user')) {
                $permintaan->created_by = auth()->id();
            } else {
                $permintaan->created_by = request()->created_by;
            }
        });
    }

    public function alasan()
    {
        return $this->belongsTo(Alasan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getStatusLabelAttribute()
    {
        return StatusEnum::label($this->status);
    }

    public static function getJumlahPerRuangan()
    {
        return DB::select('
            select a.label as alasan, u.name as ruangan, count(p.id) as jumlah 
            from permintaans p 
            inner join alasans a on p.alasan_id=a.id
            inner join users u on p.created_by=u.id
            group by name, alasan
        ');
    }
}
