<?php

namespace App\Http\Controllers;

use App\Models\KontakDarurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KontakDaruratController extends Controller
{
    public function index()
    {
        $kontakDarurats = KontakDarurat::all();
        return view('kontak_darurat.index', compact('kontakDarurats'));
    }

    public function create()
    {
        return view('kontak_darurat.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kontak' => 'required|string|max:255', 
            'no_kontak' => 'required|string|max:255',
            'alamat' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        KontakDarurat::create($request->all());

        return redirect()->route('kontak_darurat.index')->with('success', 'Kontak darurat berhasil ditambahkan.');
    }

    public function show(KontakDarurat $kontakDarurat)
    {
        return view('kontak_darurat.show', compact('kontakDarurat'));
    }

    public function edit(KontakDarurat $kontakDarurat)
    {
        return view('kontak_darurat.edit', compact('kontakDarurat'));
    }

    public function update(Request $request, KontakDarurat $kontakDarurat)
    {
        $validator = Validator::make($request->all(), [
            'nama_kontak' => 'required|string|max:255', 
            'no_kontak' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $kontakDarurat->update($request->all());

        return redirect()->route('kontak_darurat.index')->with('success', 'Kontak darurat berhasil diupdate.');
    }

    public function destroy(KontakDarurat $kontakDarurat)
    {
        $kontakDarurat->delete();
        return redirect()->route('kontak_darurat.index')->with('success', 'Kontak darurat berhasil dihapus.');
    }
}