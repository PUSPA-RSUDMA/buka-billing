<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $alasans = Alasan::get();

        return view('dashboard', compact('alasans'));
    }

}
