<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Penugasan Relawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="mb-4 text-2xl font-bold">Buat Penugasan Relawan</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('penugasan_relawan.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="relawan_id" class="form-label">Relawan:</label>
                                <select class="form-control" id="relawan_id" name="relawan_id" required>
                                    <option value="">Pilih Relawan</option>
                                    @foreach ($relawans as $relawan)
                                        <option value="{{ $relawan->id }}" {{ old('relawan_id') == $relawan->id ? 'selected' : '' }}>{{ $relawan->nama_relawan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Penugasan:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_penugasan" id="bencanaRadio" value="bencana" {{ old('jenis_penugasan') == 'bencana' ? 'checked' : '' }} onclick="togglePenugasan()">
                                    <label class="form-check-label" for="bencanaRadio">Bencana</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_penugasan" id="p3kRadio" value="p3k" {{ old('jenis_penugasan') == 'p3k' ? 'checked' : '' }} onclick="togglePenugasan()">
                                    <label class="form-check-label" for="p3kRadio">Permintaan P3K</label>
                                </div>
                            </div>

                            <div class="mb-3" id="bencanaField" style="display: {{ old('jenis_penugasan') == 'bencana' ? 'block' : 'none' }}">
                                <label for="bencana_id" class="form-label">Bencana:</label>
                                <select class="form-control" id="bencana_id" name="bencana_id">
                                    <option value="">Pilih Bencana</option>
                                    @foreach ($bencanas as $bencana)
                                        <option value="{{ $bencana->id }}" {{ old('bencana_id') == $bencana->id ? 'selected' : '' }}>{{ $bencana->nama_bencana }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3" id="p3kField" style="display: {{ old('jenis_penugasan') == 'p3k' ? 'block' : 'none' }}">
                                <label for="permintaan_p3k_id" class="form-label">Permintaan P3K:</label>
                                <select class="form-control" id="permintaan_p3k_id" name="permintaan_p3k_id">
                                    <option value="">Pilih Permintaan P3K</option>
                                    @foreach ($permintaanP3ks as $permintaanP3k)
                                        <option value="{{ $permintaanP3k->id }}" {{ old('permintaan_p3k_id') == $permintaanP3k->id ? 'selected' : '' }}>{{ $permintaanP3k->kebutuhan_p3k }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai:</label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai:</label>
                                <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status_penugasan" class="form-label">Status Penugasan:</label>
                                <select class="form-control" id="status_penugasan" name="status_penugasan" required>
                                    <option value="ditugaskan" {{ old('status_penugasan') == 'ditugaskan' ? 'selected' : '' }}>Ditugaskan</option>
                                    <option value="selesai" {{ old('status_penugasan') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="batal" {{ old('status_penugasan') == 'batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('penugasan_relawan.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePenugasan() {
            const bencanaRadio = document.getElementById('bencanaRadio');
            const p3kRadio = document.getElementById('p3kRadio');
            const bencanaField = document.getElementById('bencanaField');
            const p3kField = document.getElementById('p3kField');

            if (bencanaRadio.checked) {
                bencanaField.style.display = 'block';
                p3kField.style.display = 'none';
                document.getElementById('permintaan_p3k_id').removeAttribute('required');
                document.getElementById('bencana_id').setAttribute('required', 'required');
            } else if (p3kRadio.checked) {
                p3kField.style.display = 'block';
                bencanaField.style.display = 'none';
                document.getElementById('bencana_id').removeAttribute('required');
                document.getElementById('permintaan_p3k_id').setAttribute('required', 'required');
            }
        }
    </script>
</x-app-layout>