<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
       $permintaans = Permintaan::with('alasan')->orderBy('id', 'desc')->paginate(5);
        return view('permintaan.index', compact('permintaans'));
    }

    public function create()
    {
        $alasans = Alasan::all();
        return view('permintaan.create', compact('alasans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_register' => 'required|string',
            'perubahan' => 'required|string',
            'alasan_id' => 'required|exists:alasans,id',
        ]);

        Permintaan::create($request->all());

        return to_route('permintaan.index');
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
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->delete();
        return redirect()->route('permintaan.index');
    }

    public function selesai($id, Request $request)
    {
        $permintaan = Permintaan::findOrFail($id);
        $permintaan->status = 'selesai';
        $permintaan->save();

        return redirect()->back()->with('success', 'Permintaan berhasil diselesaikan.');
    }
}
