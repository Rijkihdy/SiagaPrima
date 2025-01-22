<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Relawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Detail Relawan</h1>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $relawan->nama_relawan }}</h5>
                                <p class="card-text"><strong>Spesialisasi:</strong> {{ $relawan->spesialisasi ?? '-' }}</p>
                                <p class="card-text"><strong>Jabatan:</strong> {{ $relawan->jabatan ?? '-' }}</p>
                                <p class="card-text"><strong>Kontak:</strong> {{ $relawan->kontak }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ $relawan->status_relawan }}</p>
                                <p class="card-text"><strong>Domisili:</strong> {{ $relawan->domisili ?? '-' }}</p>

                                <a href="{{ route('relawan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                                <a href="{{ route('relawan.edit', $relawan->id) }}" class="btn btn-warning">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>