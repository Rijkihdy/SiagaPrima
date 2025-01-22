@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Permintaan P3K</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $permintaanP3k->kebutuhan_p3k }}</h5>
                <p class="card-text"><strong>Waktu Pengajuan:</strong> {{ $permintaanP3k->waktu_pengajuan }}</p>
                <p class="card-text"><strong>Lokasi Kegiatan:</strong> {{ $permintaanP3k->lokasi_kegiatan }}</p>
                <p class="card-text"><strong>Kategori:</strong> {{ $permintaanP3k->kategori }}</p>
                @if ($permintaanP3k->detail_permintaan)
                    <p class="card-text"><strong>Detail Permintaan:</strong> {{ $permintaanP3k->detail_permintaan }}</p>
                @endif
                <p class="card-text"><strong>Status Permintaan:</strong> {{ $permintaanP3k->status_permintaan }}</p>

                @if ($permintaanP3k->foto_p3k)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $permintaanP3k->foto_p3k) }}" alt="Foto P3K" class="img-fluid">
                    </div>
                @endif
                <a href="{{ route('permintaan_p3k.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>

                @if(Auth::user()->role != 'masyarakat')
                  <a href="{{ route('permintaan_p3k.edit', $permintaanP3k->id) }}" class="btn btn-warning">Edit</a>
                @endif

            </div>
        </div>
    </div>
@endsection