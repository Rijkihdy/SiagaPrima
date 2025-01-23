<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Permintaan P3K') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="mb-4 text-2xl font-bold">Daftar Permintaan P3K</h1>

                        @if (session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('permintaan_p3k.create') }}" class="btn btn-primary mb-4">Ajukan Permintaan P3K Baru</a>

                        <div class="overflow-x-auto"> {{-- Tambahkan div untuk overflow horizontal --}}
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2">No</th>
                                        <th class="border border-gray-300 px-4 py-2">Kebutuhan P3K</th>
                                        <th class="border border-gray-300 px-4 py-2">Waktu Pengajuan</th>
                                        <th class="border border-gray-300 px-4 py-2">Lokasi Kegiatan</th>
                                        <th class="border border-gray-300 px-4 py-2">Kategori</th>
                                        <th class="border border-gray-300 px-4 py-2">Status</th>
                                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($permintaan->isEmpty())
                                        <tr>
                                            <td colspan="7" class="text-center border border-gray-300 px-4 py-2">Tidak ada data permintaan P3K.</td>
                                        </tr>
                                    @else
                                        @foreach ($permintaan as $p3k)
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $p3k->kebutuhan_p3k }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $p3k->waktu_pengajuan }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $p3k->lokasi_kegiatan }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $p3k->kategori }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $p3k->status_permintaan }}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <a href="{{ route('permintaan_p3k.show', $p3k->id) }}" class="btn btn-sm btn-info mr-1">Detail</a>
                                                    <a href="{{ route('permintaan_p3k.edit', $p3k->id) }}" class="btn btn-sm btn-warning mr-1">Edit</a>
                                                    <form action="{{ route('permintaan_p3k.destroy', $p3k->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan ini?')">Hapus</button>
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