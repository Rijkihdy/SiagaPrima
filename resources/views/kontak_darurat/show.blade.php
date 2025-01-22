@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Kontak Darurat</h1>

        <div class="card">
            <div class="card-header">
                {{ $kontakDarurat->nama }}
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Nomor Telepon:</strong> {{ $kontakDarurat->nomor_telepon }}</p>
                <p class="card-text"><strong>Alamat:</strong> {{ $kontakDarurat->alamat }}</p>
                <p class="card-text"><strong>Kategori:</strong> {{ $kontakDarurat->kategori }}</p>

                <a href="{{ route('kontak_darurat.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                <a href="{{ route('kontak_darurat.edit', $kontakDarurat->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection