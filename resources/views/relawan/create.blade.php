@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pendaftaran Relawan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('relawan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_relawan" class="form-label">Nama Lengkap:</label>
                <input type="text" class="form-control" id="nama_relawan" name="nama_relawan" value="{{ old('nama_relawan') }}" required>
            </div>

            <div class="mb-3">
                <label for="spesialisasi" class="form-label">Spesialisasi (Opsional):</label>
                <input type="text" class="form-control" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi') }}">
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan (Opsional):</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Nomor Kontak:</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak') }}" required>
            </div>

            <div class="mb-3">
                <label for="status_relawan" class="form-label">Status:</label>
                <select class="form-control" id="status_relawan" name="status_relawan" required>
                    <option value="aktif" {{ old('status_relawan') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ old('status_relawan') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="domisili" class="form-label">Domisili (Opsional):</label>
                <input type="text" class="form-control" id="domisili" name="domisili" value="{{ old('domisili') }}">
            </div>

            <button type="submit" class="btn btn-primary">Daftar</button>
            <a href="{{ route('relawan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection