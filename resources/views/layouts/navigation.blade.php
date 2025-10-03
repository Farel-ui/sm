<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - penilaian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.svg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<nav class="flex">
    <!-- Sidebar (Statis) -->
    <div class="w-64 bg-white h-screen shadow-lg fixed left-0 top-0 z-50 border-r border-gray-200">

        <!-- Logo Section -->
        <div class="p-6 border-b border-gray-100 bg-white shadow-lg">
            <div class="flex items-center">
                <div>
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-16 h-16 object-contain" />
                </div>
                <div class="ml-2">
                    <h1 class="text-lg font-bold text-indigo-800 leading-tight">
                        SMART CITY<br>KOTA BOGOR
                    </h1>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            <!-- Dashboard -->
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('dashboard') ? 'text-white' : 'text-blue-600' }} fas fa-th-large text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('DASHBOARD') }}</span>
            </x-nav-link>

            <!-- Masterplan -->
            <x-nav-link :href="route('admin.masterplan')" :active="request()->routeIs('admin.masterplan*')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.masterplan*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.masterplan*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.masterplan*') ? 'text-white' : 'text-blue-600' }} fas fa-bullseye text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('MASTERPLAN') }}</span>
            </x-nav-link>

            <!-- IGA -->
            <x-nav-link :href="route('admin.iga')" :active="request()->routeIs('admin.iga*')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.iga*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.iga*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.iga*') ? 'text-white' : 'text-blue-600' }} fas fa-lightbulb text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('IGA') }}</span>
            </x-nav-link>

            <!-- Penilaian -->
            <x-nav-link :href="route('admin.penilaian')" :active="request()->routeIs('penilaian*')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.penilaian*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.penilaian*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.penilaian*') ? 'text-white' : 'text-blue-600' }} fas fa-th-large text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('PENILAIAN') }}</span>
            </x-nav-link>

            <!-- Booklet -->
            <x-nav-link :href="route('admin.booklet')" :active="request()->routeIs('admin.booklet*')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.booklet*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.booklet*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.booklet*') ? 'text-white' : 'text-blue-600' }} fas fa-bullseye text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('BOOKLET') }}</span>
            </x-nav-link>

            <!-- Quickwin -->
            <x-nav-link :href="route('admin.quickwin')" :active="request()->routeIs('admin.quickwin*')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.quickwin*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.quickwin*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.quickwin*') ? 'text-white' : 'text-blue-600' }} fas fa-lightbulb text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('QUICKWIN') }}</span>
            </x-nav-link>

            <!-- Dimension -->
            <x-nav-link :href="route('admin.dimension')" :active="request()->routeIs('dimension*')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.dimension*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.dimension*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.dimension*') ? 'text-white' : 'text-blue-600' }} fas fa-ruler-combined text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('DIMENSION') }}</span>
            </x-nav-link>

            <!-- Implementasi -->
            <x-nav-link :href="route('admin.implementasi')" :active="request()->routeIs('admin.implementasi*')"
                class="flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.implementasi*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.implementasi*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.implementasi*') ? 'text-white' : 'text-blue-600' }} fas fa-cogs text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('IMPLEMENTASI') }}</span>
            </x-nav-link>
        </nav>

        <!-- User Section -->
        <div class="p-4 border-t border-gray-100">
            <div class="mb-4 flex items-center">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                    <span class="text-white text-sm font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>
                <div class="ml-3">
                    <div class="font-medium text-sm text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center px-4 py-3 text-gray-600 hover:bg-red-50 hover:text-red-600 rounded-lg">
                    <i class="fas fa-sign-out-alt text-sm"></i>
                    <span class="ml-4 font-medium">{{ __('LOGOUT') }}</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="ml-64 flex-1">
        <!-- Isi konten utama di sini -->
    </div>
</nav>
