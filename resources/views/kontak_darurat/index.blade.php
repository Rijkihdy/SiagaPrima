@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Kontak Darurat</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('kontak_darurat.create') }}" class="btn btn-primary mb-3">Tambah Kontak Darurat Baru</a>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Instansi/Orang</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($kontakDarurat->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data kontak darurat.</td>
                    </tr>
                @else
                    @foreach ($kontakDarurat as $kontak)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kontak->nama }}</td>
                            <td>{{ $kontak->nomor_telepon }}</td>
                            <td>{{ $kontak->alamat }}</td>
                            <td>{{ $kontak->kategori }}</td>
                            <td>
                                <a href="{{ route('kontak_darurat.show', $kontak->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('kontak_darurat.edit', $kontak->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('kontak_darurat.destroy', $kontak->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak darurat ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $kontakDarurat->links() }}
    </div>
@endsection