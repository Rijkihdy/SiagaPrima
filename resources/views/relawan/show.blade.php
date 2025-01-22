@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Relawan</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $relawan->nama_relawan }}</h5>
                <p class="card-text"><strong>Spesialisasi:</strong> {{ $relawan->spesialisasi ?? '-' }}</p> {{-- Menangani nilai null --}}
                <p class="card-text"><strong>Jabatan:</strong> {{ $relawan->jabatan ?? '-' }}</p>       {{-- Menangani nilai null --}}
                <p class="card-text"><strong>Kontak:</strong> {{ $relawan->kontak }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $relawan->status_relawan }}</p>
                <p class="card-text"><strong>Domisili:</strong> {{ $relawan->domisili ?? '-' }}</p>     {{-- Menangani nilai null --}}

                <a href="{{ route('relawan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                <a href="{{ route('relawan.edit', $relawan->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection