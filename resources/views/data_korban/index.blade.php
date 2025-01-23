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
                        <h1 class="mb-4 text-2xl font-bold">Daftar Data Korban</h1>

                        @if (session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('data_korban.create') }}" class="btn btn-primary mb-4">Tambah Data Korban Baru</a>

                        <div class="overflow-x-auto"> {{-- Tambahkan div untuk overflow horizontal jika tabel terlalu lebar --}}
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2">No</th>
                                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                                        <th class="border border-gray-300 px-4 py-2">Usia</th>
                                        <th class="border border-gray-300 px-4 py-2">Jenis Kelamin</th>
                                        <th class="border border-gray-300 px-4 py-2">Alamat</th>
                                        <th class="border border-gray-300 px-4 py-2">Kondisi</th>
                                        <th class="border border-gray-300 px-4 py-2">Jumlah Korban</th>
                                        <th class="border border-gray-300 px-4 py-2">Keterangan</th>
                                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($dataKorbans->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center border border-gray-300 px-4 py-2">Tidak ada data korban.</td>
                                        </tr>
                                    @else
                                        @foreach ($dataKorbans as $korban)
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $korban->nama_korban }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $korban->umur ?? '-' }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $korban->jenis_kelamin ?? '-' }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $korban->alamat ?? '-' }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $korban->deskripsi ?? '-' }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $korban->jumlah_korban }}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    @if ($korban->bencana)
                                                        <span class="text-blue-500">Bencana: {{ $korban->bencana->nama_bencana }}</span>
                                                    @elseif ($korban->permintaanP3k)
                                                        <span class="text-green-500">P3K: {{ $korban->permintaanP3k->nama_kegiatan }}</span>
                                                    @else
                                                        <span class="text-gray-500">Tidak ada</span>
                                                    @endif
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <a href="{{ route('data_korban.show', $korban->id) }}" class="btn btn-sm btn-info mr-1">Detail</a>
                                                    <a href="{{ route('data_korban.edit', $korban->id) }}" class="btn btn-sm btn-warning mr-1">Edit</a>
                                                    <form action="{{ route('data_korban.destroy', $korban->id) }}" method="POST" class="inline">
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>