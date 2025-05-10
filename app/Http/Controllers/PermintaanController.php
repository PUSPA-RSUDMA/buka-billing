<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
        $alasans = Alasan::all();

        $q = Permintaan::with('alasan');

        if (auth()->user()->hasRole('user')) {
            $q->whereCreatedBy(auth()->id());
        }

        if ($tanggal = request('tanggal')) {
            $q->where('created_at', 'like', $tanggal.'%');
        }
        if ($alasan_id = request('alasan_id')) {
            $q->where('alasan_id', $alasan_id);
        }
        if ($status = request('status')) {
            $q->where('status', $status);
        }

        $permintaans = $q->orderBy('created_at', 'desc')->paginate(10);

        return view('permintaan.index', compact('permintaans', 'alasans'));
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
        $permintaan->processed_by = auth()->id();
        $permintaan->processed_at = now();
        $permintaan->save();

        return redirect()->back()->with('success', 'Permintaan berhasil diselesaikan.');
    }
}
