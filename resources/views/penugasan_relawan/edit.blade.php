@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Penugasan Relawan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('penugasan_relawan.update', $penugasanRelawan->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- PENTING: Method PUT untuk update --}}

            <div class="mb-3">
                <label for="relawan_id" class="form-label">Relawan:</label>
                <select class="form-control" id="relawan_id" name="relawan_id" required>
                    <option value="">Pilih Relawan</option>
                    @foreach ($relawans as $relawan)
                        <option value="{{ $relawan->id }}" {{ old('relawan_id', $penugasanRelawan->relawan_id) == $relawan->id ? 'selected' : '' }}>{{ $relawan->nama_relawan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="bencana_id" class="form-label">Bencana:</label>
                <select class="form-control" id="bencana_id" name="bencana_id" required>
                    <option value="">Pilih Bencana</option>
                    @foreach ($bencanas as $bencana)
                        <option value="{{ $bencana->id }}" {{ old('bencana_id', $penugasanRelawan->bencana_id) == $bencana->id ? 'selected' : '' }}>{{ $bencana->nama_bencana }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $penugasanRelawan->tanggal_mulai) }}" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_selesai" class="form-label">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $penugasanRelawan->tanggal_selesai) }}" required>
            </div>

            <div class="mb-3">
                <label for="status_penugasan" class="form-label">Status Penugasan:</label>
                <select class="form-control" id="status_penugasan" name="status_penugasan" required>
                    <option value="ditugaskan" {{ old('status_penugasan', $penugasanRelawan->status_penugasan) == 'ditugaskan' ? 'selected' : '' }}>Ditugaskan</option>
                    <option value="selesai" {{ old('status_penugasan', $penugasanRelawan->status_penugasan) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="batal" {{ old('status_penugasan', $penugasanRelawan->status_penugasan) == 'batal' ? 'selected' : '' }}>Batal</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('penugasan_relawan.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection