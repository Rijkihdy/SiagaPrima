<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Permintaan P3K') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="mb-4 text-2xl font-bold">Edit Permintaan P3K</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('permintaan_p3k.update', $permintaanP3k->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="kebutuhan_p3k" class="form-label">Kebutuhan P3K:</label>
                                <textarea class="form-control" id="kebutuhan_p3k" name="kebutuhan_p3k" rows="3" required>{{ old('kebutuhan_p3k', $permintaanP3k->kebutuhan_p3k) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="waktu_pengajuan" class="form-label">Waktu Pengajuan:</label>
                                <input type="datetime-local" class="form-control" id="waktu_pengajuan" name="waktu_pengajuan" value="{{ old('waktu_pengajuan', $permintaanP3k->waktu_pengajuan ? $permintaanP3k->waktu_pengajuan->format('Y-m-d\TH:i') : null) }}" required> {{-- Format tanggal untuk input datetime-local --}}
                            </div>

                            <div class="mb-3">
                                <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan:</label>
                                <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value="{{ old('lokasi_kegiatan', $permintaanP3k->lokasi_kegiatan) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori:</label>
                                <select class="form-control" id="kategori" name="kategori" required>
                                    <option value="darurat" {{ old('kategori', $permintaanP3k->kategori) == 'darurat' ? 'selected' : '' }}>Darurat</option>
                                    <option value="non-darurat" {{ old('kategori', $permintaanP3k->kategori) == 'non-darurat' ? 'selected' : '' }}>Non-Darurat</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="detail_permintaan" class="form-label">Detail Permintaan (Opsional):</label>
                                <textarea class="form-control" id="detail_permintaan" name="detail_permintaan" rows="3">{{ old('detail_permintaan', $permintaanP3k->detail_permintaan) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="foto_p3k" class="form-label">Foto P3K (Opsional):</label>
                                <input type="file" class="form-control" id="foto_p3k" name="foto_p3k">
                                @if ($permintaanP3k->foto_p3k)
                                    <img src="{{ asset('storage/' . $permintaanP3k->foto_p3k) }}" alt="Foto P3K" class="mt-2" width="200">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('permintaan_p3k.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>