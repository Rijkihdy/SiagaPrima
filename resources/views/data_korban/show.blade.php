<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Data Korban') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Detail Data Korban</h1>

                        <div class="card">
                            <div class="card-header">
                                {{ $dataKorban->nama_korban }}
                            </div>
                            <div class="card-body">
                                <p class="card-text"><strong>Bencana:</strong> {{ $dataKorban->bencana->nama_bencana ?? '-' }}</p> {{-- Menampilkan nama bencana --}}
                                <p class="card-text"><strong>Usia:</strong> {{ $dataKorban->umur ?? '-' }}</p>
                                <p class="card-text"><strong>Jenis Kelamin:</strong> {{ $dataKorban->jenis_kelamin ?? '-' }}</p>
                                <p class="card-text"><strong>Alamat:</strong> {{ $dataKorban->alamat ?? '-' }}</p>
                                <p class="card-text"><strong>Kondisi/Deskripsi:</strong> {{ $dataKorban->deskripsi ?? '-' }}</p>
                                <p class="card-text"><strong>No. Telepon:</strong> {{ $dataKorban->no_telp_korban ?? '-' }}</p>
                                <p class="card-text"><strong>Riwayat Penyakit:</strong> {{ $dataKorban->riwayat_penyakit ?? '-' }}</p>
                                <p class="card-text"><strong>Rujukan:</strong> {{ $dataKorban->rujukan ?? '-' }}</p>
                                @if ($dataKorban->foto_korban)
                                    <img src="{{ asset('storage/' . $dataKorban->foto_korban) }}" alt="Foto Korban" width="200">
                                @else
                                    <p class="card-text"><strong>Foto:</strong> Tidak ada foto</p> {{-- Menampilkan pesan jika tidak ada foto --}}
                                @endif

                                <a href="{{ route('data_korban.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                                <a href="{{ route('data_korban.edit', $dataKorban->id) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>