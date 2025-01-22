<?php

namespace App\Http\Controllers;

use App\Models\DataKorban;
use App\Models\Bencana; // Import model Bencana
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DataKorbanController extends Controller
{
    public function index()
    {
        $dataKorbans = DataKorban::with('bencana')->get(); // Eager loading untuk relasi bencana
        return view('data_korban.index', compact('dataKorbans'));
    }

    public function create()
    {
        $bencanas = Bencana::all(); // Mengambil semua data bencana untuk ditampilkan di form
        return view('data_korban.create', compact('bencanas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bencana_id' => 'required|exists:bencanas,id', // Validasi relasi dengan tabel bencana
            'nama_korban' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_telp_korban' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'umur' => 'nullable|integer|min:0',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'foto_korban' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rujukan' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if ($request->hasFile('foto_korban')) {
            $path = $request->file('foto_korban')->store('public/foto_korban');
            $data['foto_korban'] = str_replace('public/', '', $path);
        }

        DataKorban::create($data);

        return redirect()->route('data_korban.index')->with('success', 'Data korban berhasil ditambahkan.');
    }

    public function show(DataKorban $dataKorban)
    {
        $dataKorban->load('bencana');
        return view('data_korban.show', compact('dataKorban'));
    }

    public function edit(DataKorban $dataKorban)
    {
        $dataKorban->load('bencana');
        $bencanas = Bencana::all();
        return view('data_korban.edit', compact('dataKorban', 'bencanas'));
    }

    public function update(Request $request, DataKorban $dataKorban)
    {
        $validator = Validator::make($request->all(), [
            'bencana_id' => 'required|exists:bencanas,id',
            'nama_korban' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_telp_korban' => 'nullable|string|max:20',
            'deskripsi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'umur' => 'nullable|integer|min:0',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'foto_korban' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rujukan' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        if ($request->hasFile('foto_korban')) {
            if ($dataKorban->foto_korban) {
                Storage::delete('public/'.$dataKorban->foto_korban);
            }
            $path = $request->file('foto_korban')->store('public/foto_korban');
            $data['foto_korban'] = str_replace('public/', '', $path);
        }

        $dataKorban->update($data);

        return redirect()->route('data_korban.index')->with('success', 'Data korban berhasil diupdate.');
    }

    public function destroy(DataKorban $dataKorban)
    {
        if ($dataKorban->foto_korban) {
            Storage::delete('public/'.$dataKorban->foto_korban);
        }
        $dataKorban->delete();
        return redirect()->route('data_korban.index')->with('success', 'Data korban berhasil dihapus.');
    }
}