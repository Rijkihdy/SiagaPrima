<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajukan Permintaan P3K') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Ajukan Permintaan P3K</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('permintaan_p3k.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="kebutuhan_p3k" class="form-label">Kebutuhan P3K:</label>
                                <textarea class="form-control" id="kebutuhan_p3k" name="kebutuhan_p3k" rows="3" required>{{ old('kebutuhan_p3k') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="waktu_pengajuan" class="form-label">Waktu Pengajuan:</label>
                                <input type="datetime-local" class="form-control" id="waktu_pengajuan" name="waktu_pengajuan" value="{{ old('waktu_pengajuan') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi_kegiatan" class="form-label">Lokasi Kegiatan:</label>
                                <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value="{{ old('lokasi_kegiatan') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori:</label>
                                <select class="form-control" id="kategori" name="kategori" required>
                                    <option value="darurat" {{ old('kategori') == 'darurat' ? 'selected' : '' }}>Darurat</option>
                                    <option value="non-darurat" {{ old('kategori') == 'non-darurat' ? 'selected' : '' }}>Non-Darurat</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="detail_permintaan" class="form-label">Detail Permintaan (Opsional):</label>
                                <textarea class="form-control" id="detail_permintaan" name="detail_permintaan" rows="3">{{ old('detail_permintaan') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="foto_p3k" class="form-label">Foto P3K (Opsional):</label>
                                <input type="file" class="form-control" id="foto_p3k" name="foto_p3k">
                            </div>

                            <button type="submit" class="btn btn-primary">Ajukan</button>
                            <a href="{{ route('permintaan_p3k.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>