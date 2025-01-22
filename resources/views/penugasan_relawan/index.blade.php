@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Penugasan Relawan</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('penugasan_relawan.create') }}" class="btn btn-primary mb-3">Buat Penugasan Relawan Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Relawan</th>
                    <th>Bencana</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($penugasanRelawan->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data penugasan relawan.</td>
                    </tr>
                @else
                    @foreach ($penugasanRelawan as $penugasan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penugasan->relawan->nama_relawan }}</td> {{-- Menampilkan nama relawan --}}
                            <td>{{ $penugasan->bencana->nama_bencana }}</td> {{-- Menampilkan nama bencana --}}
                            <td>{{ $penugasan->tanggal_mulai }}</td>
                            <td>{{ $penugasan->tanggal_selesai }}</td>
                            <td>{{ $penugasan->status_penugasan }}</td>
                            <td>
                                <a href="{{ route('penugasan_relawan.show', $penugasan->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('penugasan_relawan.edit', $penugasan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('penugasan_relawan.destroy', $penugasan->id) }}" method="POST" class="d-inline">
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

        {{-- Pagination --}}
        {{ $penugasanRelawan->links() }}
    </div>
@endsection