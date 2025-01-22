@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Data Korban</h1>

        <div class="card">
            <div class="card-header">
                {{ $korban->nama }}
            </div>
            <div class="card-body">
                <p class="card-text"><strong>Usia:</strong> {{ $korban->usia }}</p>
                <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $korban->jenis_kelamin }}</p>
                <p class="card-text"><strong>Alamat:</strong> {{ $korban->alamat }}</p>
                <p class="card-text"><strong>Kondisi:</strong> {{ $korban->kondisi }}</p>

                <a href="{{ route('data_korban.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                <a href="{{ route('data_korban.edit', $korban->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
@endsection