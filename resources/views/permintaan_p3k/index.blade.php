@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Permintaan P3K</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('permintaan_p3k.create') }}" class="btn btn-primary mb-3">Ajukan Permintaan P3K Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kebutuhan P3K</th>
                    <th>Waktu Pengajuan</th>
                    <th>Lokasi Kegiatan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($permintaan->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data permintaan P3K.</td>
                    </tr>
                @else
                    @foreach ($permintaan as $p3k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p3k->kebutuhan_p3k }}</td>
                            <td>{{ $p3k->waktu_pengajuan }}</td>
                            <td>{{ $p3k->lokasi_kegiatan }}</td>
                            <td>{{ $p3k->kategori }}</td>
                            <td>{{ $p3k->status_permintaan }}</td>
                            <td>
                                <a href="{{ route('permintaan_p3k.show', $p3k->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('permintaan_p3k.edit', $p3k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('permintaan_p3k.destroy', $p3k->id) }}" method="POST" class="d-inline">
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

        {{-- Pagination --}}
        {{-- {{ $permintaan->links() }} --}}
    </div>
@endsection