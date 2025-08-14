<aside class="w-64 bg-black dark:bg-black border-r border-gray-200 dark:border-gray-700 flex flex-col">
    <!-- Logo -->
    <div class="flex items-center px-4 py-2 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-center">
            <a href="{{ route('dashboard') }}" class="flex items-center justify-center">
                <img src="{{ asset('images/POGO.svg') }}" alt="Logo" class="h-15 w-auto">
            </a>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('dashboard') }}"
           class="text-white block px-4 py-2 rounded hover:bg-blue-700 {{ request()->routeIs('dashboard') ? 'bg-blue-700' : '' }}">
            Dashboard
        </a>

        <a href="{{ route('masterplan') }}"
           class="text-white block px-4 py-2 rounded hover:bg-blue-700 {{ request()->routeIs('masterplan') ? 'bg-blue-700' : '' }}">
            Masterplan
        </a>

        <a href="{{ route('iga') }}"
           class="text-white block px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('iga') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
            IGA
        </a>

        <a href="{{ route('penilaian') }}"
           class="text-white block px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700 {{ request()->routeIs('penilaian') ? 'bg-gray-200 dark:bg-gray-700' : '' }}">
            Penilaian
        </a>

        <a href="{{ route('iga') }}"
           class="text-white block px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
            Booklet
        </a>

        <a href="{{ route('iga') }}"
           class="text-white block px-4 py-2 rounded hover:bg-gray-100 dark:hover:bg-gray-700">
            Quickwin
        </a>
    </nav>

    <!-- Profile & Logout -->
    <div class="border-t border-gray-200 dark:border-gray-700 p-4">
        @auth
            <div class="mb-3">
                <div class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full px-4 py-2 text-sm text-left rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                    Log Out
                </button>
            </form>
        @else
            <div class="mb-3">
                <div class="text-sm font-medium text-gray-800 dark:text-gray-200">Tamu</div>
                <div class="text-xs text-gray-500">Belum login</div>
            </div>
            <a href="{{ route('login') }}"
               class="block w-full px-4 py-2 text-sm text-left rounded hover:bg-gray-100 dark:hover:bg-gray-700">
                Login
            </a>
        @endauth
    </div>
</aside>
