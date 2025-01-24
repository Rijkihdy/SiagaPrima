<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Edit Data Bencana') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Edit Data Bencana</h1>

                    <!-- Error Alerts -->
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('bencana.update', $bencana->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nama_bencana" class="block font-medium text-gray-700">Nama Bencana</label>
                            <input type="text" name="nama_bencana" id="nama_bencana" value="{{ old('nama_bencana', $bencana->nama_bencana) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="lokasi_bencana" class="block font-medium text-gray-700">Lokasi Bencana</label>
                            <input type="text" name="lokasi_bencana" id="lokasi_bencana" value="{{ old('lokasi_bencana', $bencana->lokasi_bencana) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="waktu_kejadian" class="block font-medium text-gray-700">Waktu Kejadian</label>
                            <input type="datetime-local" name="waktu_kejadian" id="waktu_kejadian" value="{{ old('waktu_kejadian', $bencana->waktu_kejadian ? $bencana->waktu_kejadian->format('Y-m-d\TH:i') : null) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="deskripsi" class="block font-medium text-gray-700">Deskripsi (Opsional)</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('deskripsi', $bencana->deskripsi) }}</textarea>
                        </div>

                        <div>
                            <label for="jumlah_korban" class="block font-medium text-gray-700">Jumlah Korban (Opsional)</label>
                            <input type="number" name="jumlah_korban" id="jumlah_korban" value="{{ old('jumlah_korban', $bencana->jumlah_korban) }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="status_bencana" class="block font-medium text-gray-700">Status Bencana</label>
                            <select name="status_bencana" id="status_bencana" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                                <option value="selesai" {{ old('status_bencana', $bencana->status_bencana) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="berlangsung" {{ old('status_bencana', $bencana->status_bencana) == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                            </select>
                        </div>

                        <div>
                            <label for="foto_bencana" class="block font-medium text-gray-700">Foto Bencana (Opsional)</label>
                            <input type="file" name="foto_bencana" id="foto_bencana" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            @if ($bencana->foto_bencana)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $bencana->foto_bencana) }}" alt="Foto Bencana" class="h-32 w-32 object-cover rounded">
                                </div>
                            @endif
                        </div>

                        <!-- Buttons -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('bencana.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
