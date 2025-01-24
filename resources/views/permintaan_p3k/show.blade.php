<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Detail Permintaan P3K') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Detail Permintaan P3K</h1>

                    <!-- Card -->
                    <div class="space-y-4">
                        <div>
                            <h5 class="text-xl font-semibold">{{ $permintaanP3k->kebutuhan_p3k }}</h5>
                            <p class="text-lg"><strong>Waktu Pengajuan:</strong> {{ $permintaanP3k->waktu_pengajuan }}</p>
                            <p class="text-lg"><strong>Lokasi Kegiatan:</strong> {{ $permintaanP3k->lokasi_kegiatan }}</p>
                            <p class="text-lg"><strong>Kategori:</strong> {{ $permintaanP3k->kategori }}</p>
                            @if ($permintaanP3k->detail_permintaan)
                                <p class="text-lg"><strong>Detail Permintaan:</strong> {{ $permintaanP3k->detail_permintaan }}</p>
                            @endif
                            <p class="text-lg"><strong>Status Permintaan:</strong> {{ $permintaanP3k->status_permintaan }}</p>
                        </div>

                        @if ($permintaanP3k->foto_p3k)
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . $permintaanP3k->foto_p3k) }}" alt="Foto P3K" class="rounded shadow-md w-1/3">
                            </div>
                        @endif

                        <!-- Buttons -->
                        <div class="flex space-x-4 mt-6">
                            <a href="{{ route('permintaan_p3k.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Kembali ke Daftar
                            </a>
                            @if(Auth::user()->role != 'masyarakat')
                                <a href="{{ route('permintaan_p3k.edit', $permintaanP3k->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                    Edit
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
