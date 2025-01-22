<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Bencana') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Detail Bencana</h1>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bencana->nama_bencana }}</h5>

                                @if ($bencana->foto_bencana)
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('storage/' . $bencana->foto_bencana) }}" alt="Foto Bencana" class="img-fluid rounded" style="max-height: 300px;">
                                    </div>
                                @endif

                                <p class="card-text"><strong>Lokasi:</strong> {{ $bencana->lokasi_bencana }}</p>
                                <p class="card-text"><strong>Waktu Kejadian:</strong> {{ $bencana->waktu_kejadian ? $bencana->waktu_kejadian->format('d-m-Y H:i:s') : '-' }}</p> {{-- Format tanggal --}}
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>