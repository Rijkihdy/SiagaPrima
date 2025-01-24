<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Daftar Permintaan P3K') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Daftar Permintaan P3K</h1>

                    <!-- Alert -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tombol Tambah Permintaan -->
                    <div class="mb-4">
                        <a href="{{ route('permintaan_p3k.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Ajukan Permintaan P3K Baru
                        </a>
                    </div>

                    <!-- Tabel Data Permintaan P3K -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">No</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Kebutuhan P3K</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Waktu Pengajuan</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Lokasi Kegiatan</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Kategori</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Status</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($permintaan->isEmpty())
                                    <tr>
                                        <td colspan="7" class="px-4 py-2 text-center text-gray-600">Tidak ada data permintaan P3K.</td>
                                    </tr>
                                @else
                                    @foreach ($permintaan as $p3k)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2">{{ $p3k->kebutuhan_p3k }}</td>
                                            <td class="px-4 py-2">{{ $p3k->waktu_pengajuan }}</td>
                                            <td class="px-4 py-2">{{ $p3k->lokasi_kegiatan }}</td>
                                            <td class="px-4 py-2">{{ $p3k->kategori }}</td>
                                            <td class="px-4 py-2">{{ $p3k->status_permintaan }}</td>
                                            <td class="px-4 py-2 flex space-x-2">
                                                <a href="{{ route('permintaan_p3k.show', $p3k->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded text-xs hover:bg-blue-600">
                                                    Detail
                                                </a>
                                                <a href="{{ route('permintaan_p3k.edit', $p3k->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('permintaan_p3k.destroy', $p3k->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus permintaan ini?')">
                                                        Hapus
                                                    </button>
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
