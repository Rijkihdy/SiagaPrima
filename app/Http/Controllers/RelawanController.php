<?php

namespace App\Http\Controllers;

use App\Models\Relawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RelawanController extends Controller
{
    public function index()
    {
        $relawans = Relawan::all();
        return view('relawan.index', compact('relawans'));
    }

    public function create()
    {
        return view('relawan.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_relawan' => 'required|string|max:255',
            'spesialisasi' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:20',
            'status_relawan' => 'required|in:aktif,tidak aktif',
            'domisili' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Relawan::create($request->all());

        return redirect()->route('relawan.index')->with('success', 'Relawan berhasil ditambahkan.');
    }

    public function show(Relawan $relawan)
    {
        return view('relawan.show', compact('relawan'));
    }

    public function edit(Relawan $relawan)
    {
        return view('relawan.edit', compact('relawan'));
    }

    public function update(Request $request, Relawan $relawan)
    {
        $validator = Validator::make($request->all(), [
            'nama_relawan' => 'required|string|max:255',
            'spesialisasi' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:20',
            'status_relawan' => 'required|in:aktif,tidak aktif',
            'domisili' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $relawan->update($request->all());

        return redirect()->route('relawan.index')->with('success', 'Relawan berhasil diupdate.');
    }

    public function destroy(Relawan $relawan)
    {
        $relawan->delete();
        return redirect()->route('relawan.index')->with('success', 'Relawan berhasil dihapus.');
    }
}