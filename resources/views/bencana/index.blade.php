<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Bencana') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Daftar Bencana</h1>

                    <!-- Alert -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tombol Tambah -->
                    <div class="mb-4">
                        <a href="{{ route('bencana.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                            Tambah Bencana Baru
                        </a>
                    </div>

                    <!-- Tabel Data -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-red-600">
                                <tr>
                                    <th class="px-4 py-2 text-left font-medium text-white">No</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Nama Bencana</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Lokasi</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Waktu Kejadian</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Deskripsi</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Foto Bencana</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Jumlah Korban</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Status</th>
                                    <th class="px-4 py-2 text-left font-medium text-white">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($bencanas->isEmpty())
                                    <tr>
                                        <td colspan="9" class="px-4 py-2 text-center text-gray-600">Tidak ada data bencana.</td>
                                    </tr>
                                @else
                                    @foreach ($bencanas as $bencana)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2">{{ $bencana->nama_bencana }}</td>
                                            <td class="px-4 py-2">{{ $bencana->lokasi_bencana }}</td>
                                            <td class="px-4 py-2">{{ $bencana->waktu_kejadian }}</td>
                                            <td class="px-4 py-2">{{ $bencana->deskripsi }}</td>
                                            <td class="px-4 py-2">
                                                @if ($bencana->foto_bencana)
                                                    <img src="{{ asset('storage/' . $bencana->foto_bencana) }}" alt="Foto Bencana" class="h-16 w-16 object-cover rounded">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="px-4 py-2">{{ $bencana->jumlah_korban ?? '-' }}</td>
                                            <td class="px-4 py-2">{{ $bencana->status_bencana }}</td>
                                            <td class="px-4 py-2 flex space-x-2">
                                                <a href="{{ route('bencana.show', $bencana->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded text-xs hover:bg-blue-600">
                                                    Detail
                                                </a>
                                                <a href="{{ route('bencana.edit', $bencana->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-xs hover:bg-yellow-600">
                                                    Edit
                                                </a>
                                                <form action="{{ route('bencana.destroy', $bencana->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded text-xs hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus bencana ini?')">
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
