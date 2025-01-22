<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class BencanaController extends Controller
{
    public function index()
    {
        $bencanas = Bencana::all();
        return view('bencana.index', compact('bencanas'));
    }

    public function create()
    {
        return view('bencana.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_bencana' => 'required|string|max:255',
            'lokasi_bencana' => 'required|string',
            'waktu_kejadian' => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto_bencana' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_korban' => 'nullable|integer|min:0',
            'status_bencana' => 'required|in:selesai,berlangsung',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if ($request->hasFile('foto_bencana')) {
            $path = $request->file('foto_bencana')->store('public/foto_bencana');
            $data['foto_bencana'] = str_replace('public/', '', $path);
        }

        Bencana::create($data);

        return redirect()->route('bencana.index')->with('success', 'Data bencana berhasil ditambahkan.');
    }

    public function show(Bencana $bencana)
    {
        return view('bencana.show', compact('bencana'));
    }

    public function edit(Bencana $bencana)
    {
        return view('bencana.edit', compact('bencana'));
    }

    public function update(Request $request, Bencana $bencana)
    {
        $validator = Validator::make($request->all(), [
            'nama_bencana' => 'required|string|max:255',
            'lokasi_bencana' => 'required|string',
            'waktu_kejadian' => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto_bencana' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jumlah_korban' => 'nullable|integer|min:0',
            'status_bencana' => 'required|in:selesai,berlangsung',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if ($request->hasFile('foto_bencana')) {
            // Hapus foto lama jika ada
            if ($bencana->foto_bencana) {
                Storage::delete('public/'.$bencana->foto_bencana);
            }
            $path = $request->file('foto_bencana')->store('public/foto_bencana');
            $data['foto_bencana'] = str_replace('public/', '', $path);
        }

        $bencana->update($data);

        return redirect()->route('bencana.index')->with('success', 'Data bencana berhasil diupdate.');
    }

    public function destroy(Bencana $bencana)
    {
        if ($bencana->foto_bencana) {
            Storage::delete('public/'.$bencana->foto_bencana);
        }
        $bencana->delete();
        return redirect()->route('bencana.index')->with('success', 'Data bencana berhasil dihapus.');
    }
}