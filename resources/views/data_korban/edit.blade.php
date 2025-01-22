<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Korban') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Edit Data Korban</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('data_korban.update', $dataKorban->id) }}" method="POST" enctype="multipart/form-data"> {{-- Tambahkan enctype untuk upload file --}}
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="bencana_id" class="form-label">Bencana:</label>
                                <select class="form-control" id="bencana_id" name="bencana_id" required>
                                    <option value="">Pilih Bencana</option>
                                    @foreach ($bencanas as $bencana)
                                        <option value="{{ $bencana->id }}" {{ old('bencana_id', $dataKorban->bencana_id) == $bencana->id ? 'selected' : '' }}> {{-- Tambahkan old dan default value --}}
                                            {{ $bencana->nama_bencana }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama_korban" class="form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control" id="nama_korban" name="nama_korban" value="{{ old('nama_korban', $dataKorban->nama_korban) }}" required> {{-- Sesuaikan dengan nama di database --}}
                            </div>

                            <div class="mb-3">
                                <label for="umur" class="form-label">Usia:</label>
                                <input type="number" class="form-control" id="umur" name="umur" value="{{ old('umur', $dataKorban->umur) }}" min="0"> {{-- Usia boleh null --}}
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"> {{-- Jenis Kelamin boleh null --}}
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="laki-laki" {{ old('jenis_kelamin', $dataKorban->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="perempuan" {{ old('jenis_kelamin', $dataKorban->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $dataKorban->alamat) }}</textarea> {{-- Alamat boleh null --}}
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Kondisi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $dataKorban->deskripsi) }}</textarea> {{-- Gunakan nama yang benar: deskripsi --}}
                            </div>

                            <div class="mb-3">
                                <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit:</label>
                                <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" rows="3">{{ old('riwayat_penyakit', $dataKorban->riwayat_penyakit) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="rujukan" class="form-label">Rujukan:</label>
                                <textarea class="form-control" id="rujukan" name="rujukan" rows="3">{{ old('rujukan', $dataKorban->rujukan) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="foto_korban" class="form-label">Foto Korban:</label>
                                <input type="file" class="form-control" id="foto_korban" name="foto_korban">
                                @if ($dataKorban->foto_korban)
                                    <img src="{{ asset('storage/' . $dataKorban->foto_korban) }}" alt="Foto Korban" width="200">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="no_telp_korban" class="form-label">Nomor Telepon:</label>
                                <input type="text" class="form-control" id="no_telp_korban" name="no_telp_korban" value="{{ old('no_telp_korban', $dataKorban->no_telp_korban) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('data_korban.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>