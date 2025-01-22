<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Data Korban') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Daftar Data Korban</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('data_korban.create') }}" class="btn btn-primary mb-3">Tambah Data Korban Baru</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Usia</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Kondisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataKorbans->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data korban.</td>
                                    </tr>
                                @else
                                    @foreach ($dataKorbans as $korban)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $korban->nama_korban }}</td>
                                            <td>{{ $korban->umur }}</td>
                                            <td>{{ $korban->jenis_kelamin }}</td>
                                            <td>{{ $korban->alamat }}</td>
                                            <td>{{ $korban->deskripsi }}</td>
                                            <td>
                                                <a href="{{ route('data_korban.show', $korban->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('data_korban.edit', $korban->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('data_korban.destroy', $korban->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data korban ini?')">Hapus</button>
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