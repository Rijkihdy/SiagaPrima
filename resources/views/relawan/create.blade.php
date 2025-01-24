<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Pendaftaran Relawan') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Pendaftaran Relawan</h1>

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
                    <form action="{{ route('relawan.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="nama_relawan" class="block font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_relawan" id="nama_relawan" value="{{ old('nama_relawan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="spesialisasi" class="block font-medium text-gray-700">Spesialisasi (Opsional)</label>
                            <input type="text" name="spesialisasi" id="spesialisasi" value="{{ old('spesialisasi') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="jabatan" class="block font-medium text-gray-700">Jabatan (Opsional)</label>
                            <input type="text" name="jabatan" id="jabatan" value="{{ old('jabatan') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>

                        <div>
                            <label for="kontak" class="block font-medium text-gray-700">Nomor Kontak</label>
                            <input type="text" name="kontak" id="kontak" value="{{ old('kontak') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                        </div>

                        <div>
                            <label for="status_relawan" class="block font-medium text-gray-700">Status</label>
                            <select name="status_relawan" id="status_relawan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500" required>
                                <option value="aktif" {{ old('status_relawan') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="tidak aktif" {{ old('status_relawan') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div>

                        <div>
                            <label for="domisili" class="block font-medium text-gray-700">Domisili (Opsional)</label>
                            <input type="text" name="domisili" id="domisili" value="{{ old('domisili') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500">
                        </div>

                        <!-- Buttons -->
                        <div class="flex space-x-4">
                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Daftar
                            </button>
                            <a href="{{ route('relawan.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
