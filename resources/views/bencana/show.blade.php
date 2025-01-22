@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Bencana</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $bencana->nama_bencana }}</h5>

                @if ($bencana->foto_bencana)
                    <div class="mb-3 text-center"> {{-- Menambahkan text-center untuk memusatkan gambar --}}
                        <img src="{{ asset('storage/' . $bencana->foto_bencana) }}" alt="Foto Bencana" class="img-fluid rounded" style="max-height: 300px;"> {{-- Membatasi tinggi gambar --}}
                    </div>
                @endif

                <p class="card-text"><strong>Lokasi:</strong> {{ $bencana->lokasi_bencana }}</p>
                <p class="card-text"><strong>Waktu Kejadian:</strong> {{ $bencana->waktu_kejadian }}</p>
                @if ($bencana->deskripsi)
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $bencana->deskripsi }}</p>
                @endif
                <p class="card-text"><strong>Jumlah Korban:</strong> {{ $bencana->jumlah_korban ?? '-' }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $bencana->status_bencana }}</p>

                <a href="{{ route('bencana.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                <a href="{{ route('bencana.edit', $bencana->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection