<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Daftar Relawan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Daftar Relawan</h1>

                    <!-- Alert -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tombol Tambah Relawan -->
                    <div class="mb-4">
                        <a href="{{ route('relawan.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Tambah Relawan Baru
                        </a>
                    </div>

                    <!-- Tabel Data Relawan -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">No</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Nama Relawan</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Spesialisasi</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Jabatan</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Kontak</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Status</th>
                                    <th class="px-4 py-2 text-left font-medium text-gray-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($relawans->isEmpty())
                                    <tr>
                                        <td colspan="7" class="px-4 py-2 text-center text-gray-600">Tidak ada data relawan.</td>
                                    </tr>
                                @else
                                    @foreach ($relawans as $relawan)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2">{{ $relawan->nama_relawan }}</td>
                                            <td class="px-4 py-2">{{ $relawan->spesialisasi }}</td>
                                            <td class="px-4 py-2">{{ $relawan->jabatan }}</td>
                                            <td class="px-4 py-2">{{ $relawan->kontak }}</td>
                                            <td class="px-4 py-2">{{ $relawan->status_relawan }}</td>
                                            <td class="px-4 py-2 flex space-x-2">
                                                <a href="{{ route('relawan.show', $relawan->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded text-xs hover:bg-blue-600">
                                                    Detail
                                                </a>
                                                <a href="{{ route('relawan.edit', $relawan->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('relawan.destroy', $relawan->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus relawan ini?')">
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
