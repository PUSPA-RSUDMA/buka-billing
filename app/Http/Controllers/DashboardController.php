<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Permintaan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $alasans = Alasan::get();
        $jumlah_permintaan_by_ruangan = Permintaan::getJumlahPerRuangan();
        
        return view('dashboard', compact('alasans', 'jumlah_permintaan_by_ruangan'));
    }
}
