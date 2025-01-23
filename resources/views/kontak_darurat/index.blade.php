<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kontak Darurat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Daftar Kontak Darurat</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('kontak_darurat.create') }}" class="btn btn-primary mb-3">Tambah Kontak Darurat Baru</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi/Orang</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($kontakDarurats->isEmpty()) 
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data kontak darurat.</td>
                                    </tr>
                                @else
                                    @foreach ($kontakDarurats as $kontak)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kontak->nama_kontak }}</td>
                                            <td>{{ $kontak->no_kontak }}</td>
                                            <td>{{ $kontak->alamat }}</td>
                                            <td>
                                                <a href="{{ route('kontak_darurat.edit', $kontak->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('kontak_darurat.destroy', $kontak->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak darurat ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>