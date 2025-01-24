<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Daftar Data Korban') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Daftar Data Korban</h1>

                    <!-- Alert -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tombol Tambah Data Korban -->
                    <div class="mb-4">
                        <a href="{{ route('data_korban.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Tambah Data Korban Baru
                        </a>
                    </div>

                    <!-- Tabel Data Korban -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">No</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Nama</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Usia</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Jenis Kelamin</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Alamat</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Kondisi</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Keterangan</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataKorbans->isEmpty())
                                    <tr>
                                        <td colspan="9" class="px-4 py-2 text-center text-gray-600">Tidak ada data korban.</td>
                                    </tr>
                                @else
                                    @foreach ($dataKorbans as $korban)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2">{{ $korban->nama_korban }}</td>
                                            <td class="px-4 py-2">{{ $korban->umur ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $korban->jenis_kelamin ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $korban->alamat ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $korban->deskripsi ?? '-' }}</td>
                                            <td class="px-4 py-2">
                                                @if ($korban->bencana)
                                                    <span class="text-blue-500">Bencana: {{ $korban->bencana->nama_bencana }}</span>
                                                @elseif ($korban->permintaanP3k)
                                                    <span class="text-green-500">P3K: {{ $korban->permintaanP3k->detail_permintaan }}</span>
                                                @else
                                                    <span class="text-gray-500">Tidak ada</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-2 flex space-x-2">
                                                <a href="{{ route('data_korban.show', $korban->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded text-xs hover:bg-blue-600">
                                                    Detail
                                                </a>
                                                <a href="{{ route('data_korban.edit', $korban->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('data_korban.destroy', $korban->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus data korban ini?')">
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
</x-app-layout>
