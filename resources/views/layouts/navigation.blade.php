<nav class="bg-red-600 h-screen w-64 fixed top-0 left-0 text-white overflow-y-auto">
    <div class="flex flex-col items-center justify-center h-24 bg-red-600 pt-6">
        <div class="bg-white rounded-full p-3 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-15V4.058a1.5 1.5 0 00-1.5-1.5H5.058a1.5 1.5 0 00-1.5 1.5V19.942a1.5 1.5 0 001.5 1.5H18.942a1.5 1.5 0 001.5-1.5V4.5z" />
            </svg>
        </div>
        <span class="text-2xl font-bold">Siaga Prima</span>
    </div>

    <ul class="mt-6 space-y-3 px-4">
        <li>
            <a href="{{ route('dashboard') }}"
               class="block py-2 px-6 text-lg rounded-full transition-all duration-200
               {{ request()->routeIs('dashboard') ? 'bg-white text-red-600 font-medium' : 'hover:bg-white hover:text-red-600 hover:font-medium' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('bencana.index') }}"
               class="block py-2 px-6 text-lg rounded-full transition-all duration-200
               {{ request()->routeIs('bencana.*') ? 'bg-white text-red-600 font-medium' : 'hover:bg-white hover:text-red-600 hover:font-medium' }}">
                Bencana
            </a>
        </li>
        <li>
            <a href="{{ route('relawan.index') }}"
               class="block py-2 px-6 text-lg rounded-full transition-all duration-200
               {{ request()->routeIs('relawan.*') ? 'bg-white text-red-600 font-medium' : 'hover:bg-white hover:text-red-600 hover:font-medium' }}">
                Relawan
            </a>
        </li>
        <li>
            <a href="{{ route('permintaan_p3k.index') }}"
               class="block py-2 px-6 text-lg rounded-full transition-all duration-200
               {{ request()->routeIs('permintaan_p3k.*') ? 'bg-white text-red-600 font-medium' : 'hover:bg-white hover:text-red-600 hover:font-medium' }}">
                Permintaan P3K
            </a>
        </li>
        <li>
            <a href="{{ route('data_korban.index') }}"
               class="block py-2 px-6 text-lg rounded-full transition-all duration-200
               {{ request()->routeIs('data_korban.*') ? 'bg-white text-red-600 font-medium' : 'hover:bg-white hover:text-red-600 hover:font-medium' }}">
                Data Korban
            </a>
        </li>
        <li>
            <a href="{{ route('kontak_darurat.index') }}"
               class="block py-2 px-6 text-lg rounded-full transition-all duration-200
               {{ request()->routeIs('kontak_darurat.*') ? 'bg-white text-red-600 font-medium' : 'hover:bg-white hover:text-red-600 hover:font-medium' }}">
                Kontak Darurat
            </a>
        </li>
        <li>
            <a href="{{ route('penugasan_relawan.index') }}"
               class="block py-2 px-6 text-lg rounded-full transition-all duration-200
               {{ request()->routeIs('penugasan_relawan.*') ? 'bg-white text-red-600 font-medium' : 'hover:bg-white hover:text-red-600 hover:font-medium' }}">
                Penugasan Relawan
            </a>
        </li>
    </ul>

    <div class="absolute bottom-0 w-full">
        <div class="py-4 px-6 border-t border-red-700 bg-red-600">
            <div class="mb-2">{{ Auth::user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left text-lg hover:bg-white hover:text-red-600 rounded-full hover:font-medium">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>