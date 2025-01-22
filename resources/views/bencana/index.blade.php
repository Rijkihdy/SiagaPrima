@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Bencana</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('bencana.create') }}" class="btn btn-primary mb-3">Tambah Bencana Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bencana</th>
                    <th>Lokasi</th>
                    <th>Waktu Kejadian</th>
                    <th>Jumlah Korban</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($bencanas->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data bencana.</td>
                    </tr>
                @else
                    @foreach ($bencanas as $bencana)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bencana->nama_bencana }}</td>
                            <td>{{ $bencana->lokasi_bencana }}</td>
                            <td>{{ $bencana->waktu_kejadian }}</td>
                            <td>{{ $bencana->jumlah_korban ?? '-' }}</td> {{-- Menangani nilai null --}}
                            <td>{{ $bencana->status_bencana }}</td>
                            <td>
                                <a href="{{ route('bencana.show', $bencana->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('bencana.edit', $bencana->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('bencana.destroy', $bencana->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus bencana ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $bencanas->links() }}
    </div>
@endsection