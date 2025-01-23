<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kontak Darurat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Edit Kontak Darurat</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('kontak_darurat.update', $kontakDarurat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama_kontak" class="form-label">Nama Instansi/Orang:</label>
                                <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" value="{{ old('nama_kontak', $kontakDarurat->nama_kontak) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_kontak" class="form-label">Nomor Telepon:</label>
                                <input type="text" class="form-control" id="no_kontak" name="no_kontak" value="{{ old('no_kontak', $kontakDarurat->no_kontak) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat:</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $kontakDarurat->alamat) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('kontak_darurat.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>