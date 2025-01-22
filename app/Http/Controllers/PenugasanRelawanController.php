<?php

namespace App\Http\Controllers;

use App\Models\PenugasanRelawan;
use App\Models\Relawan;
use App\Models\Bencana;
use App\Models\PermintaanP3k;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenugasanRelawanController extends Controller
{
    public function index()
    {
        $penugasan = PenugasanRelawan::with(['relawan', 'bencana', 'permintaanP3k'])->get(); // Eager load relasi
        return view('penugasan_relawan.index', compact('penugasan'));
    }

    public function create()
    {
        $relawans = Relawan::where('status_relawan', 'aktif')->get();
        $bencanas = Bencana::where('status_bencana', 'berlangsung')->get();
        $permintaanP3ks = PermintaanP3k::where('status_permintaan', 'diterima')->get();
        return view('penugasan_relawan.create', compact('relawans', 'bencanas', 'permintaanP3ks'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'relawan_id' => 'required|exists:relawan,id',
            'jenis_penugasan' => 'required|in:bencana,p3k',
            'waktu_penugasan' => 'required|date',
            'status_penugasan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->jenis_penugasan == 'bencana') {
            $validator->addRules(['bencana_id' => 'required|exists:bencanas,id']);
        } else {
            $validator->addRules(['permintaan_p3k_id' => 'required|exists:permintaan_p3ks,id']);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        PenugasanRelawan::create($request->all());

        return redirect()->route('penugasan_relawan.index')->with('success', 'Penugasan berhasil ditambahkan.');
    }

    public function show(PenugasanRelawan $penugasanRelawan)
    {
        $penugasanRelawan->load(['relawan', 'bencana', 'permintaanP3k']);
        return view('penugasan_relawan.show', compact('penugasanRelawan'));
    }

    public function edit(PenugasanRelawan $penugasanRelawan)
    {
        $penugasanRelawan->load(['relawan', 'bencana', 'permintaanP3k']);
        $relawans = Relawan::where('status_relawan', 'aktif')->get();
        $bencanas = Bencana::where('status_bencana', 'berlangsung')->get();
        $permintaanP3ks = PermintaanP3k::where('status_permintaan', 'diterima')->get();
        return view('penugasan_relawan.edit', compact('penugasanRelawan','relawans', 'bencanas', 'permintaanP3ks'));
    }

    public function update(Request $request, PenugasanRelawan $penugasanRelawan)
    {
        $validator = Validator::make($request->all(), [
            'relawan_id' => 'required|exists:relawan,id',
            'jenis_penugasan' => 'required|in:bencana,p3k',
            'waktu_penugasan' => 'required|date',
            'status_penugasan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        if ($request->jenis_penugasan == 'bencana') {
            $validator->addRules(['bencana_id' => 'required|exists:bencanas,id']);
        } else {
            $validator->addRules(['permintaan_p3k_id' => 'required|exists:permintaan_p3ks,id']);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $penugasanRelawan->update($request->all());

        return redirect()->route('penugasan_relawan.index')->with('success', 'Penugasan berhasil diupdate.');
    }

    public function destroy(PenugasanRelawan $penugasanRelawan)
    {
        $penugasanRelawan->delete();
        return redirect()->route('penugasan_relawan.index')->with('success', 'Penugasan berhasil dihapus.');
    }
}