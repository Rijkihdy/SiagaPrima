<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Detail Bencana') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Detail Bencana</h1>

                    <!-- Detail Card -->
                    <div class="space-y-6">
                        <!-- Foto Bencana -->
                        @if ($bencana->foto_bencana)
                            <div class="text-center">
                                <img src="{{ asset('storage/' . $bencana->foto_bencana) }}" alt="Foto Bencana" class="mx-auto rounded shadow-md max-h-64 object-cover">
                            </div>
                        @endif

                        <!-- Informasi Bencana -->
                        <div>
                            <p class="text-lg"><strong>Nama Bencana:</strong> {{ $bencana->nama_bencana }}</p>
                            <p class="text-lg"><strong>Lokasi:</strong> {{ $bencana->lokasi_bencana }}</p>
                            <p class="text-lg"><strong>Waktu Kejadian:</strong> {{ $bencana->waktu_kejadian ? $bencana->waktu_kejadian->format('d-m-Y H:i:s') : '-' }}</p>
                            @if ($bencana->deskripsi)
                                <p class="text-lg"><strong>Deskripsi:</strong> {{ $bencana->deskripsi }}</p>
                            @endif
                            <p class="text-lg"><strong>Jumlah Korban:</strong> {{ $bencana->jumlah_korban ?? '-' }}</p>
                            <p class="text-lg"><strong>Status:</strong> {{ $bencana->status_bencana }}</p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex space-x-4">
                            <a href="{{ route('bencana.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Kembali ke Daftar
                            </a>
                            <a href="{{ route('bencana.edit', $bencana->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
