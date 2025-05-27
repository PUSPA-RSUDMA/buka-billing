<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public static function getJumlahPerRuangan($tanggalPermintaan = null)
    {
        $query = Permintaan::select(
                'alasans.label as alasan',
                'users.name as ruangan',
                DB::raw('COUNT(permintaans.id) as jumlah')
            )
            ->join('alasans', 'permintaans.alasan_id', '=', 'alasans.id')
            ->join('users', 'permintaans.created_by', '=', 'users.id')
            ->groupBy('users.name', 'alasans.label');

        if ($tanggalPermintaan) {
            $query->whereDate('permintaans.created_at', $tanggalPermintaan);
        }

        return $query->get();
    }

    public static function getJumlahAktivitas($tanggalPermintaan = null)
    {
        $user = auth()->user();

        $query = Permintaan::select('status', DB::raw('COUNT(id) as jumlah'))
            ->groupBy('status')
            ->orderBy('status');

        if ($user->hasRole('user')) {
            $query->where('created_by', $user->id);
        }

        if ($tanggalPermintaan) {
            $query->whereDate('created_at', $tanggalPermintaan);
        }

        $results = $query->get();

        $data = [
            'baru' => 0,
            'proses' => 0,
        ];

        foreach ($results as $item) {
            $data[$item->status] = $item->jumlah;
        }

        return $data;
    }
}
