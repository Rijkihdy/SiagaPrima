<?php

namespace App\Http\Controllers;

use App\Models\PermintaanP3k;
use App\Models\User; // Import model User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; // Import Auth
use Illuminate\Support\Facades\Storage;

class PermintaanP3kController extends Controller
{
    public function index()
    {
        // Jika user adalah masyarakat, tampilkan permintaannya sendiri
        if (Auth::user()->role == 'masyarakat') {
            $permintaan = PermintaanP3k::where('user_id', Auth::id())->get();
        } else {
            $permintaan = PermintaanP3k::all();
        }
        return view('permintaan_p3k.index', compact('permintaan'));
    }

    public function create()
    {
        return view('permintaan_p3k.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kebutuhan_p3k' => 'required|string',
            'waktu_pengajuan' => 'required|date',
            'lokasi_kegiatan' => 'required|string',
            'kategori' => 'required|in:darurat,non-darurat',
            'detail_permintaan' => 'nullable|string',
            'foto_p3k' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['user_id'] = Auth::id(); // Set user_id otomatis
        if ($request->hasFile('foto_p3k')) {
            $path = $request->file('foto_p3k')->store('public/foto_p3k'); // Simpan foto
            $data['foto_p3k'] = str_replace('public/', '', $path);
        }

        PermintaanP3k::create($data);

        return redirect()->route('permintaan_p3k.index')->with('success', 'Permintaan P3K berhasil diajukan.');
    }

    public function show(PermintaanP3k $permintaanP3k)
    {
        return view('permintaan_p3k.show', compact('permintaanP3k'));
    }

    public function edit(PermintaanP3k $permintaanP3k)
    {
        return view('permintaan_p3k.edit', compact('permintaanP3k'));
    }

    public function update(Request $request, PermintaanP3k $permintaanP3k)
    {
        $validator = Validator::make($request->all(), [
            'kebutuhan_p3k' => 'required|string',
            'waktu_pengajuan' => 'required|date',
            'lokasi_kegiatan' => 'required|string',
            'kategori' => 'required|in:darurat,non-darurat',
            'detail_permintaan' => 'nullable|string',
            'foto_p3k' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        if ($request->hasFile('foto_p3k')) {
            //Hapus foto lama jika ada
            if ($permintaanP3k->foto_p3k) {
                Storage::delete('public/'.$permintaanP3k->foto_p3k);
            }
            $path = $request->file('foto_p3k')->store('public/foto_p3k');
            $data['foto_p3k'] = str_replace('public/', '', $path);
        }

        $permintaanP3k->update($data);

        return redirect()->route('permintaan_p3k.index')->with('success', 'Permintaan P3K berhasil diupdate.');
    }

    public function destroy(PermintaanP3k $permintaanP3k)
    {
        //Hapus foto jika ada
        if ($permintaanP3k->foto_p3k) {
            Storage::delete('public/'.$permintaanP3k->foto_p3k);
        }
        $permintaanP3k->delete();
        return redirect()->route('permintaan_p3k.index')->with('success', 'Permintaan P3K berhasil dihapus.');
    }
}