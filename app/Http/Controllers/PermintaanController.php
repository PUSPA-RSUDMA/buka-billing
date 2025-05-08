<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
        return view('permintaan.index');
    }

    public function create()
    {
        return view('permintaan.create');
    }

    public function store(Request $request)
    {
        // Logic to store the request
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
