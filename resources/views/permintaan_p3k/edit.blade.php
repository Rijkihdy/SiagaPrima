<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Edit Permintaan P3K') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Edit Permintaan P3K</h1>

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
                    <form action="{{ route('permintaan_p3k.update', $permintaanP3k->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="kebutuhan_p3k" class="block font-medium text-gray-700">Kebutuhan P3K</label>
                            <textarea name="kebutuhan_p3k" id="kebutuhan_p3k" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>{{ old('kebutuhan_p3k', $permintaanP3k->kebutuhan_p3k) }}</textarea>
                        </div>

                        <div>
                            <label for="waktu_pengajuan" class="block font-medium text-gray-700">Waktu Pengajuan</label>
                            <input type="datetime-local" name="waktu_pengajuan" id="waktu_pengajuan" value="{{ old('waktu_pengajuan', $permintaanP3k->waktu_pengajuan ? $permintaanP3k->waktu_pengajuan->format('Y-m-d\TH:i') : null) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="lokasi_kegiatan" class="block font-medium text-gray-700">Lokasi Kegiatan</label>
                            <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan" value="{{ old('lokasi_kegiatan', $permintaanP3k->lokasi_kegiatan) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="kategori" class="block font-medium text-gray-700">Kategori</label>
                            <select name="kategori" id="kategori" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                                <option value="darurat" {{ old('kategori', $permintaanP3k->kategori) == 'darurat' ? 'selected' : '' }}>Darurat</option>
                                <option value="non-darurat" {{ old('kategori', $permintaanP3k->kategori) == 'non-darurat' ? 'selected' : '' }}>Non-Darurat</option>
                            </select>
                        </div>

                        <div>
                            <label for="detail_permintaan" class="block font-medium text-gray-700">Detail Permintaan (Opsional)</label>
                            <textarea name="detail_permintaan" id="detail_permintaan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('detail_permintaan', $permintaanP3k->detail_permintaan) }}</textarea>
                        </div>

                        <div>
                            <label for="foto_p3k" class="block font-medium text-gray-700">Foto P3K (Opsional)</label>
                            <input type="file" name="foto_p3k" id="foto_p3k" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                            @if ($permintaanP3k->foto_p3k)
                                <div class="mt-3">
                                    <img src="{{ asset('storage/' . $permintaanP3k->foto_p3k) }}" alt="Foto P3K" class="h-32 w-32 object-cover rounded shadow-md">
                                </div>
                            @endif
                        </div>

                        <!-- Buttons -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('permintaan_p3k.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
