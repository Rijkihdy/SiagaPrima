<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Penugasan Relawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="mb-4 text-2xl font-bold">Daftar Penugasan Relawan</h1>

                        @if (session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('penugasan_relawan.create') }}" class="btn btn-primary mb-4">Buat Penugasan Relawan Baru</a>

                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-collapse border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 px-4 py-2">No</th>
                                        <th class="border border-gray-300 px-4 py-2">Relawan</th>
                                        <th class="border border-gray-300 px-4 py-2">Jenis Penugasan</th>
                                        <th class="border border-gray-300 px-4 py-2">Keterangan Penugasan</th>
                                        <th class="border border-gray-300 px-4 py-2">Status</th>
                                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($penugasan->isEmpty())
                                        <tr>
                                            <td colspan="8" class="text-center border border-gray-300 px-4 py-2">Tidak ada data penugasan relawan.</td>
                                        </tr>
                                    @else
                                        @foreach ($penugasan as $penugasan)
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $penugasan->relawan->nama_relawan }}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    @if ($penugasan->bencana_id)
                                                        Bencana
                                                    @elseif ($penugasan->permintaan_p3k_id)
                                                        P3K
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    @if ($penugasan->bencana_id)
                                                        {{ $penugasan->bencana->nama_bencana }}
                                                    @elseif ($penugasan->permintaan_p3k_id)
                                                        {{ $penugasan->permintaanP3k->kebutuhan_p3k }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2">{{ $penugasan->status_penugasan }}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <a href="{{ route('penugasan_relawan.edit', $penugasan->id) }}" class="btn btn-sm btn-warning mr-1">Edit</a>
                                                    <form action="{{ route('penugasan_relawan.destroy', $penugasan->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus penugasan ini?')">Hapus</button>
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