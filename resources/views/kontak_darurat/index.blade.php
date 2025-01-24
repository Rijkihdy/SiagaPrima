<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-red-600 p-4 rounded">
            {{ __('Daftar Kontak Darurat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto px-6">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-6">Daftar Kontak Darurat</h1>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Add New Button -->
                    <div class="mb-4">
                        <a href="{{ route('kontak_darurat.create') }}" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Tambah Kontak Darurat Baru
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left">No</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Nama Instansi/Orang</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Nomor Telepon</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Alamat</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($kontakDarurats->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center border border-gray-300 px-4 py-2">
                                            Tidak ada data kontak darurat.
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($kontakDarurats as $kontak)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $kontak->nama_kontak }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $kontak->no_kontak }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $kontak->alamat }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('kontak_darurat.edit', $kontak->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('kontak_darurat.destroy', $kontak->id) }}" method="POST" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2" onclick="return confirm('Apakah Anda yakin ingin menghapus kontak darurat ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
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
