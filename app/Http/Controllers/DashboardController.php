<?php

namespace App\Http\Controllers;

use App\Models\Alasan;

class DashboardController extends Controller
{
    public function index()
    {
        $alasans = Alasan::get();

        return view('dashboard', compact('alasans'));
    }
}
