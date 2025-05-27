<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Permintaan;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $request_date = request('tanggal');

        if (!request()->has('tanggal')) {
            $date_now = Carbon::now();
            $alasans = Alasan::with(['permintaan' => function ($query) use ($date_now) {
                $query->whereDate('created_at', $date_now);
            }])->get();
            $filtered_date = $date_now->format('Y-m-d');
        } elseif (!empty($request_date)) {
            $alasans = Alasan::with(['permintaan' => function ($query) use ($request_date) {
                $query->whereDate('created_at', $request_date);
            }])->get();
            $filtered_date = $request_date;
        } else {
            $alasans = Alasan::with('permintaan')->get();
            $filtered_date = null;
        }

        $jumlah_permintaan_by_ruangan = Permintaan::getJumlahPerRuangan($filtered_date);
        $jumlah_aktivitas = Permintaan::getJumlahAktivitas($filtered_date);

        return view('dashboard', compact('alasans', 'jumlah_permintaan_by_ruangan', 'jumlah_aktivitas', 'filtered_date'));
    }
}
