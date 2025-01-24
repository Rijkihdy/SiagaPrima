<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Detail Relawan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Detail Relawan</h1>

                    <!-- Detail Card -->
                    <div class="space-y-4">
                        <!-- Informasi Relawan -->
                        <div>
                            <p class="text-lg"><strong>Nama Relawan:</strong> {{ $relawan->nama_relawan }}</p>
                            <p class="text-lg"><strong>Spesialisasi:</strong> {{ $relawan->spesialisasi ?? '-' }}</p>
                            <p class="text-lg"><strong>Jabatan:</strong> {{ $relawan->jabatan ?? '-' }}</p>
                            <p class="text-lg"><strong>Kontak:</strong> {{ $relawan->kontak }}</p>
                            <p class="text-lg"><strong>Status:</strong> {{ $relawan->status_relawan }}</p>
                            <p class="text-lg"><strong>Domisili:</strong> {{ $relawan->domisili ?? '-' }}</p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex space-x-4">
                            <a href="{{ route('relawan.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Kembali ke Daftar
                            </a>
                            <a href="{{ route('relawan.edit', $relawan->id) }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
