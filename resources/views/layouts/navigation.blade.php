<nav x-data="{ sidebarOpen: true }" class="flex">
    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'w-64' : 'w-16'"
         class="bg-white h-screen shadow-lg transition-all duration-300 fixed left-0 top-0 z-50 border-m border-gray-200">

        <div class="p-6 border-b border-gray-100 bg-white shadow-lg">
    <div class="flex items-center">
        <div>
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-16 h-16 object-contain" />
        </div>
        <div x-show="sidebarOpen" class="ml-2">
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
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('dashboard') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <i class="{{ request()->routeIs('dashboard') ? 'text-white' : 'text-blue-600' }} fas fa-th-large text-sm"></i>
                </div>
                <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('DASHBOARD') }}</span>
            </x-nav-link>

            <!-- Masterplan -->
            <x-nav-link :href="route('admin.masterplan')"
                :active="request()->routeIs('admin.masterplan*')"
                class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group
                       {{ request()->routeIs('admin.masterplan*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.masterplan*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <i class="{{ request()->routeIs('admin.masterplan*') ? 'text-white' : 'text-blue-600' }} fas fa-bullseye text-sm"></i>
                </div>
                <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('MASTERPLAN') }}</span>
            </x-nav-link>
            <!-- IGA -->
            <x-nav-link :href="route('admin.iga')" :active="request()->routeIs('admin.iga*')"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.iga*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.iga*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <i class="{{ request()->routeIs('admin.iga*') ? 'text-white' : 'text-blue-600' }} fas fa-lightbulb text-sm"></i>
                </div>
                <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('IGA') }}</span>
            </x-nav-link>

            <!-- Penilaian -->
            <x-nav-link :href="route('penilaian')" :active="request()->routeIs('penilaian*')"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('penilaian*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('penilaian*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <i class="{{ request()->routeIs('penilaian*') ? 'text-white' : 'text-blue-600' }} fas fa-th-large text-sm"></i>
                </div>
                <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('PENILAIAN') }}</span>
            </x-nav-link>

            <!-- Booklet -->
            <x-nav-link :href="route('admin.booklet')" :active="request()->routeIs('booklet*')"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('admin.booklet*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('admin.booklet*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <i class="{{ request()->routeIs('admin.booklet*') ? 'text-white' : 'text-blue-600' }} fas fa-bullseye text-sm"></i>
                </div>
                <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('BOOKLET') }}</span>
            </x-nav-link>

            <!-- Quickwin -->
            <x-nav-link :href="route('quickwin')" :active="request()->routeIs('quickwin*')"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('quickwin*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('quickwin*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <i class="{{ request()->routeIs('quickwin*') ? 'text-white' : 'text-blue-600' }} fas fa-lightbulb text-sm"></i>
                </div>
                <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('QUICKWIN') }}</span>
            </x-nav-link>

            <!-- Dimension -->
            <x-nav-link :href="route('dimension')" :active="request()->routeIs('dimension*')"
                       class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group {{ request()->routeIs('dimension*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
                <div class="{{ request()->routeIs('dimension*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }} p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
                    <i class="{{ request()->routeIs('dimension*') ? 'text-white' : 'text-blue-600' }} fas fa-ruler-combined text-sm"></i>
                </div>
                <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('DIMENSION') }}</span>
            </x-nav-link>

            <!-- Implementasi -->
<x-nav-link :href="route('admin.implementasi')"
    :active="request()->routeIs('admin.implementasi*')"
    class="flex items-center px-4 py-3 rounded-lg transition-all duration-200 group
           {{ request()->routeIs('admin.implementasi*') ? 'bg-blue-600 text-white shadow-lg' : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">
    <div class="{{ request()->routeIs('admin.implementasi*') ? 'bg-white bg-opacity-20' : 'bg-blue-100' }}
                p-2 rounded-lg group-hover:bg-blue-200 transition-colors">
        <i class="{{ request()->routeIs('admin.implementasi*') ? 'text-white' : 'text-blue-600' }} fas fa-cogs text-sm"></i>
    </div>
    <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('IMPLEMENTASI') }}</span>
</x-nav-link>


        <!-- User Section -->
        <div class="p-4 border-t border-gray-100">
            <!-- User Info (collapsed state) -->
            <div x-show="!sidebarOpen" class="flex justify-center mb-4">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                    <span class="text-white text-sm font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>
            </div>

            <!-- User Info (expanded state) -->
            <div x-show="sidebarOpen" class="mb-4">
                <div class="flex items-center">
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
            </div>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full flex items-center px-4 py-3 text-gray-600 hover:bg-red-50 hover:text-red-600 rounded-lg transition-all duration-200">
                    <i class="fas fa-sign-out-alt text-sm"></i>
                    <span x-show="sidebarOpen" class="ml-4 font-medium">{{ __('LOGOUT') }}</span>
                </button>
            </form>
        </div>

        <!-- Toggle Button -->
        <button @click="sidebarOpen = !sidebarOpen"
                class="absolute -right-3 top-20 bg-white border border-gray-200 rounded-full p-2 shadow-md hover:shadow-lg transition-all duration-200">
            <i :class="sidebarOpen ? 'fa-chevron-left' : 'fa-chevron-right'" class="fas text-gray-600 text-xs"></i>
        </button>
    </div>

    <!-- Main Content Wrapper -->
    <div :class="sidebarOpen ? 'ml-64' : 'ml-16'" class="flex-1 transition-all duration-300">
        <!-- Top Header -->


        <!-- Mobile Navigation Menu (Hidden by default, shown when sidebar is collapsed on mobile) -->
        <div class="sm:hidden bg-white border-t border-gray-100" style="display: none;">
            <div class="pt-2 pb-3 space-y-1 px-4">
                <!-- Mobile Navigation Links would go here if needed -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</nav>
