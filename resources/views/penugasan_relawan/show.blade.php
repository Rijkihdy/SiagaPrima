@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Penugasan Relawan</h1>

        <div class="card">
            <div class="card-header">
                Penugasan #{{ $penugasanRelawan->id }}
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Relawan:</strong> {{ $penugasanRelawan->relawan->nama_relawan }}</p>
                <p class="card-text"><strong>Bencana:</strong> {{ $penugasanRelawan->bencana->nama_bencana }}</p>
                <p class="card-text"><strong>Tanggal Mulai:</strong> {{ $penugasanRelawan->tanggal_mulai }}</p>
                <p class="card-text"><strong>Tanggal Selesai:</strong> {{ $penugasanRelawan->tanggal_selesai }}</p>
                <p class="card-text"><strong>Status:</strong> {{ $penugasanRelawan->status_penugasan }}</p>

                <a href="{{ route('penugasan_relawan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                <a href="{{ route('penugasan_relawan.edit', $penugasanRelawan->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection