<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Relawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Daftar Relawan</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <a href="{{ route('relawan.create') }}" class="btn btn-primary mb-3">Tambah Relawan Baru</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Relawan</th>
                                    <th>Spesialisasi</th>
                                    <th>Jabatan</th>
                                    <th>Kontak</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($relawans->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data relawan.</td>
                                    </tr>
                                @else
                                    @foreach ($relawans as $relawan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $relawan->nama_relawan }}</td>
                                            <td>{{ $relawan->spesialisasi }}</td>
                                            <td>{{ $relawan->jabatan }}</td>
                                            <td>{{ $relawan->kontak }}</td>
                                            <td>{{ $relawan->status_relawan }}</td>
                                            <td>
                                                <a href="{{ route('relawan.show', $relawan->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                <a href="{{ route('relawan.edit', $relawan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('relawan.destroy', $relawan->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus relawan ini?')">Hapus</button>
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