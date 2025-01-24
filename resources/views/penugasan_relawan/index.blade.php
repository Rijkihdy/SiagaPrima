<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Daftar Penugasan Relawan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Daftar Penugasan Relawan</h1>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add New Button -->
                    <div class="mb-4">
                        <a href="{{ route('penugasan_relawan.create') }}" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Buat Penugasan Relawan Baru
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Relawan</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Jenis Penugasan</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Keterangan Penugasan</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($penugasan->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center border border-gray-300 px-4 py-2">Tidak ada data penugasan relawan.</td>
                                    </tr>
                                @else
                                    @foreach ($penugasan as $item)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $item->relawan->nama_relawan }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                @if ($item->bencana_id)
                                                    Bencana
                                                @elseif ($item->permintaan_p3k_id)
                                                    P3K
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                @if ($item->bencana_id)
                                                    {{ $item->bencana->nama_bencana }}
                                                @elseif ($item->permintaan_p3k_id)
                                                    {{ $item->permintaanP3k->kebutuhan_p3k }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $item->status_penugasan }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('penugasan_relawan.edit', $item->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('penugasan_relawan.destroy', $item->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onclick="return confirm('Apakah Anda yakin ingin menghapus penugasan ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
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
