<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
       $permintaans = Permintaan::all();
        return view('permintaan.index', compact('permintaans'));
    }

    public function create()
    {
        $alasans = Alasan::all();
        return view('permintaan.create', compact('alasans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'perubahan' => 'required|string',
            'alasan_id' => 'required|exists:alasans,id',
        ]);

        Permintaan::create($validated);

        return redirect()->route('permintaan.index');
    }

    public function show($id)
    {
        return view('permintaan.show', compact('id'));
    }

    public function edit($id)
    {
        return view('permintaan.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update the request
        return redirect()->route('permintaan.index');
    }

    public function destroy($id)
    {
        // Logic to delete the request
        return redirect()->route('permintaan.index');
    }
}
