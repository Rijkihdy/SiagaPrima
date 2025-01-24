<?php

namespace App\Http\Controllers;

use App\Models\DataKorban;
use App\Models\Bencana; 
use App\Models\PermintaanP3k;
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
        $bencanas = Bencana::all();
        $permintaanP3ks = PermintaanP3k::all();
        return view('data_korban.create', compact('bencanas', 'permintaanP3ks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_korban' => 'required|string|max:255',
            'umur' => 'nullable|integer|min:0',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'alamat' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'rujukan' => 'nullable|string',
            'foto_korban' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_telp_korban' => 'nullable|string',
            'jumlah_korban' => 'required|integer|min:1',
            'bencana_id' => 'nullable|exists:bencanas,id',
            'permintaan_p3k_id' => 'nullable|exists:permintaan_p3ks,id',
        ], [
            'bencana_id.exists' => 'Bencana yang dipilih tidak valid.',
            'permintaan_p3k_id.exists' => 'Permintaan P3K yang dipilih tidak valid.',
        ]);

        // Validasi Kunci: Memastikan salah satu ID diisi
        if (is_null($request->bencana_id) && is_null($request->permintaan_p3k_id)) {
            return back()->withInput()->withErrors([
                'bencana_id' => 'Harus memilih Bencana atau Permintaan P3K.', // Pesan error yang lebih spesifik
                'permintaan_p3k_id' => 'Harus memilih Bencana atau Permintaan P3K.', // Pesan error yang sama untuk kedua field
            ]);
        }

        $dataKorban = new DataKorban;
        $dataKorban->fill($request->except('foto_korban')); // Mass assignment, kecuali foto

        if ($request->hasFile('foto_korban')) {
            $path = $request->file('foto_korban')->store('foto_korban', 'public');
            $dataKorban->foto_korban = $path;
        }

        $dataKorban->save();

        return redirect()->route('data_korban.index')->with('success', 'Data Korban Berhasil Ditambahkan');
    }


    public function show(DataKorban $dataKorban)
    {
        $dataKorban->load('bencana');
        return view('data_korban.show', compact('dataKorban'));
    }

    public function edit(DataKorban $dataKorban)
    {
        // Load relasi bencana dan permintaan P3K
        $dataKorban->load(['bencana', 'permintaanP3k']);
        
        // Ambil semua data bencana dan permintaan P3K
        $bencanas = Bencana::select('id', 'nama_bencana')->get();
        $permintaanP3ks = PermintaanP3k::select('id', 'kebutuhan_p3k')->get();
    
        // Cek jika tidak ada data bencana atau permintaan P3K
        if ($bencanas->isEmpty() && $permintaanP3ks->isEmpty()) {
            return redirect()->route('data_korban.index')->with('error', 'Tidak ada data bencana atau permintaan P3K yang tersedia.');
        }
    
        // Kirim data ke view
        return view('data_korban.edit', compact('dataKorban', 'bencanas', 'permintaanP3ks'));
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