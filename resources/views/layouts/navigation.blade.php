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
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('dashboard') ? 'text-white' : 'text-blue-600' }} fas fa-th-large text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('DASHBOARD') }}</span>
            </x-nav-link>

            <!-- Masterplan -->
            <x-nav-link :href="route('admin.masterplan.index')" :active="request()->routeIs('admin.masterplan.*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.masterplan.*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.masterplan.*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.masterplan.*') ? 'text-white' : 'text-blue-600' }} fas fa-bullseye text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('MASTERPLAN') }}</span>
            </x-nav-link>

            <!-- IGA -->
            <x-nav-link :href="route('admin.iga.index')" :active="request()->routeIs('admin.iga.*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.iga.*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.iga.*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.iga.*') ? 'text-white' : 'text-blue-600' }} fas fa-lightbulb text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('IGA') }}</span>
            </x-nav-link>

            <!-- Penilaian -->
            @if(auth()->user()->role === 'SUPERADMIN')
            <x-nav-link :href="route('admin.penilaian.index')" :active="request()->routeIs('admin.penilaian.*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.penilaian.*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.penilaian.*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.penilaian.*') ? 'text-white' : 'text-blue-600' }} fas fa-star text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('PENILAIAN') }}</span>
            </x-nav-link>
            @endif

            <!-- Booklet -->
            <x-nav-link :href="route('admin.booklet.index')" :active="request()->routeIs('admin.booklet.*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.booklet.*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.booklet.*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.booklet.*') ? 'text-white' : 'text-blue-600' }} fas fa-book text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('BOOKLET') }}</span>
            </x-nav-link>

            <!-- Quickwin -->
            <x-nav-link :href="route('admin.quickwin.index')" :active="request()->routeIs('admin.quickwin.index.*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.quickwin.*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.quickwin.*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.quickwin.*') ? 'text-white' : 'text-blue-600' }} fas fa-lightbulb text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('QUICKWIN') }}</span>
            </x-nav-link>

            <!-- Dimension -->
            <x-nav-link :href="route('admin.dimension.index')" :active="request()->routeIs('dimension*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.dimension.index*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.dimension.index*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.dimension.index*') ? 'text-white' : 'text-blue-600' }} fas fa-ruler-combined text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('DIMENSION') }}</span>
            </x-nav-link>

            <!-- Implementasi -->
            <x-nav-link :href="route('admin.implementasi.index')" :active="request()->routeIs('admin.implementasi*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.implementasi.index*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.implementasi.index*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.implementasi.index*') ? 'text-white' : 'text-blue-600' }} fas fa-cogs text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('IMPLEMENTASI') }}</span>
            </x-nav-link>

            <!-- Users -->
            @if(auth()->user()->role === 'SUPERADMIN')
            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')"
                class="w-full flex items-center px-4 py-3 rounded-lg group
                {{ request()->routeIs('admin.users.*') ? 'bg-blue-600 text-white shadow-lg'
                : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.users.*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg">
                    <i class="{{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-blue-600' }} fas fa-users text-sm"></i>
                </div>
                <span class="ml-4 font-medium">{{ __('USERS') }}</span>
            </x-nav-link>
            @endif
    </div>

    <!-- Main Content -->
    <div class="ml-64 flex-1">
        <!-- Isi konten utama di sini -->
    </div>
</nav>
