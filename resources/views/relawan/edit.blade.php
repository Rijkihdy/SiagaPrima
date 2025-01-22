@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Data Relawan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('relawan.update', $relawan->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting: Method PUT untuk update --}}

            <div class="mb-3">
                <label for="nama_relawan" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_relawan" name="nama_relawan" value="{{ old('nama_relawan', $relawan->nama_relawan) }}" required>
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="spesialisasi" class="form-label">Spesialisasi (Opsional):</label>
                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi', $relawan->spesialisasi) }}">
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan (Opsional):</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $relawan->jabatan) }}">
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Nomor Kontak:</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak', $relawan->kontak) }}" required>
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="status_relawan" class="form-label">Status:</label>
                <select class="form-control" id="status_relawan" name="status_relawan" required>
                    <option value="aktif" {{ old('status_relawan', $relawan->status_relawan) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status_relawan', $relawan->status_relawan) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="domisili" class="form-label">Domisili (Opsional):</label>
                <input type="text" class="form-control" id="domisili" name="domisili" value="{{ old('domisili', $relawan->domisili) }}">
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('relawan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection