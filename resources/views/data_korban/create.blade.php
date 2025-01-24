<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Tambah Data Korban') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Tambah Data Korban</h1>

                    <!-- Error Alerts -->
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('data_korban.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Pilihan Bencana atau Permintaan P3K -->
                        <div>
                            <label class="block font-medium text-gray-700">Jenis Data Korban:</label>
                            <div class="mt-1 space-y-2">
                                <label class="flex items-center">
                                    <input type="radio" name="jenis_data" value="bencana" class="mr-2 focus:ring-red-500" onclick="toggleDropdown('bencana')" {{ old('jenis_data') == 'bencana' ? 'checked' : '' }} required>
                                    Data dari Bencana
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="jenis_data" value="permintaan_p3k" class="mr-2 focus:ring-red-500" onclick="toggleDropdown('permintaan_p3k')" {{ old('jenis_data') == 'permintaan_p3k' ? 'checked' : '' }}>
                                    Data dari Permintaan P3K
                                </label>
                            </div>
                        </div>

                        <!-- Dropdown Bencana -->
                        <div id="bencana_dropdown" class="hidden">
                            <label for="bencana_id" class="block font-medium text-gray-700">Bencana:</label>
                            <select id="bencana_id" name="bencana_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                                <option value="">Pilih Bencana</option>
                                @foreach ($bencanas as $bencana)
                                    <option value="{{ $bencana->id }}" {{ old('bencana_id') == $bencana->id ? 'selected' : '' }}>{{ $bencana->nama_bencana }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dropdown Permintaan P3K -->
                        <div id="permintaan_p3k_dropdown" class="hidden">
                            <label for="permintaan_p3k_id" class="block font-medium text-gray-700">Permintaan P3K:</label>
                            <select id="permintaan_p3k_id" name="permintaan_p3k_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                                <option value="">Pilih Permintaan P3K</option>
                                @foreach ($permintaanP3ks as $permintaanP3k)
                                    <option value="{{ $permintaanP3k->id }}" {{ old('permintaan_p3k_id') == $permintaanP3k->id ? 'selected' : '' }}>{{ $permintaanP3k->kebutuhan_p3k }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Form Data Lainnya -->
                        <div>
                            <label for="nama_korban" class="block font-medium text-gray-700">Nama Lengkap:</label>
                            <input type="text" id="nama_korban" name="nama_korban" value="{{ old('nama_korban') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="umur" class="block font-medium text-gray-700">Usia:</label>
                            <input type="number" id="umur" name="umur" value="{{ old('umur') }}" min="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="jenis_kelamin" class="block font-medium text-gray-700">Jenis Kelamin:</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label for="alamat" class="block font-medium text-gray-700">Alamat:</label>
                            <textarea id="alamat" name="alamat" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('alamat') }}</textarea>
                        </div>

                        <div>
                            <label for="deskripsi" class="block font-medium text-gray-700">Kondisi:</label>
                            <textarea id="deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div>
                            <label for="riwayat_penyakit" class="block font-medium text-gray-700">Riwayat Penyakit:</label>
                            <textarea id="riwayat_penyakit" name="riwayat_penyakit" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('riwayat_penyakit') }}</textarea>
                        </div>

                        <div>
                            <label for="rujukan" class="block font-medium text-gray-700">Rujukan:</label>
                            <textarea id="rujukan" name="rujukan" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">{{ old('rujukan') }}</textarea>
                        </div>

                        <div>
                            <label for="jumlah_korban" class="block font-medium text-gray-700">Jumlah Korban:</label>
                            <input type="number" id="jumlah_korban" name="jumlah_korban" value="{{ old('jumlah_korban', 1) }}" min="1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <!-- Buttons -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Simpan
                            </button>
                            <a href="{{ route('data_korban.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function toggleDropdown(type) {
            document.getElementById('bencana_dropdown').classList.add('hidden');
            document.getElementById('permintaan_p3k_dropdown').classList.add('hidden');
            
            if (type === 'bencana') {
                document.getElementById('bencana_dropdown').classList.remove('hidden');
            } else if (type === 'permintaan_p3k') {
                document.getElementById('permintaan_p3k_dropdown').classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>
