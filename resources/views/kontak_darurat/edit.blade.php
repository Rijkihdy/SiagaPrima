@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kontak Darurat</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kontak_darurat.update', $kontakDarurat->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- PENTING: Method PUT untuk update --}}

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Instansi/Orang:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $kontakDarurat->nama) }}" required>
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon:</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $kontakDarurat->nomor_telepon) }}" required>
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $kontakDarurat->alamat) }}</textarea>
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select class="form-control" id="kategori" name="kategori" required>
                    <option value="pemadam" {{ old('kategori', $kontakDarurat->kategori) == 'pemadam' ? 'selected' : '' }}>Pemadam Kebakaran</option>
                    <option value="polisi" {{ old('kategori', $kontakDarurat->kategori) == 'polisi' ? 'selected' : '' }}>Polisi</option>
                    <option value="rumah_sakit" {{ old('kategori', $kontakDarurat->kategori) == 'rumah_sakit' ? 'selected' : '' }}>Rumah Sakit</option>
                    <option value="bpbd" {{ old('kategori', $kontakDarurat->kategori) == 'bpbd' ? 'selected' : '' }}>BPBD</option>
                    <option value="lainnya" {{ old('kategori', $kontakDarurat->kategori) == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                {{-- Menggunakan old() dengan nilai default --}}
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('kontak_darurat.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection