<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Alasan;
use App\Models\Permintaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermintaanController extends Controller
{
    public function index()
    {
        $alasans = Alasan::all();
        $admins =  User::role('admin')->get();

        $q = Permintaan::with('alasan');

        if (auth()->user()->hasRole('user')) {
            $q->whereCreatedBy(auth()->id());
        }

        if ($tanggal = request('tanggal')) {
            $q->where('created_at', 'like', $tanggal . '%');
        }
        if ($alasan_id = request('alasan_id')) {
            $q->where('alasan_id', $alasan_id);
        }
        if ($status = request('status')) {
            $q->where('status', $status);
        }
        if ($processed_by = request('processed_by')) {
            $q->where('processed_by', $processed_by);
        }

        $permintaans = $q->orderBy('created_at', 'desc')->paginate(10);

        return view('permintaan.index', compact('permintaans', 'alasans', 'admins'));
    }

    public function create()
    {
        $alasans = Alasan::all();
        $users =  User::role('user')->get();

        return view('permintaan.create', compact('alasans', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_register' => 'required|string',
            'perubahan' => 'required|string',
            'alasan_id' => 'required|exists:alasans,id',
            'created_by' => Rule::requiredIf($request->user()->hasRole('admin'))
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

    public function selesai(Permintaan $permintaan)
    {
        if ($permintaan->status == StatusEnum::BARU->value) {
            $permintaan->status = StatusEnum::PROSES->value;
            $permintaan->processed_by = auth()->id();
            $permintaan->processed_at = now();
        } else {
            $permintaan->status = StatusEnum::SELESAI->value;
        }
        $permintaan->save();

        return redirect()->back()->with('success', 'Permintaan berhasil diselesaikan');
    }
}
