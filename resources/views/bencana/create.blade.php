<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Bencana') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Tambah Data Bencana</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('bencana.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_bencana" class="form-label">Nama Bencana:</label>
                                <input type="text" class="form-control" id="nama_bencana" name="nama_bencana" value="{{ old('nama_bencana') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lokasi_bencana" class="form-label">Lokasi Bencana:</label>
                                <input type="text" class="form-control" id="lokasi_bencana" name="lokasi_bencana" value="{{ old('lokasi_bencana') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="waktu_kejadian" class="form-label">Waktu Kejadian:</label>
                                <input type="datetime-local" class="form-control" id="waktu_kejadian" name="waktu_kejadian" value="{{ old('waktu_kejadian') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi (Opsional):</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_korban" class="form-label">Jumlah Korban (Opsional):</label>
                                <input type="number" class="form-control" id="jumlah_korban" name="jumlah_korban" value="{{ old('jumlah_korban') }}" min="0">
                            </div>

                            <div class="mb-3">
                                <label for="status_bencana" class="form-label">Status Bencana:</label>
                                <select class="form-control" id="status_bencana" name="status_bencana" required>
                                    <option value="selesai" {{ old('status_bencana') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="berlangsung" {{ old('status_bencana') == 'berlangsung' ? 'selected' : '' }}>Berlangsung</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="foto_bencana" class="form-label">Foto Bencana (Opsional):</label>
                                <input type="file" class="form-control" id="foto_bencana" name="foto_bencana">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('bencana.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>