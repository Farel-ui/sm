<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center group">
                        <div class="bg-white p-2 rounded-xl shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105 border border-gray-100">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="block h-8 w-8 object-contain" />
                        </div>
                        <div class="ml-3 hidden md:block">
                            <h1 class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                                Dashboard
                            </h1>
                            <p class="text-xs text-gray-500">Management System</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex items-center">
                    <!-- Dashboard Link -->
                    <div class="relative group">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-blue-50 hover:text-blue-700 {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700 shadow-sm' : 'text-gray-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-home mr-2 text-sm"></i>
                                {{ __('Dashboard') }}
                            </div>
                        </x-nav-link>
                    </div>

                    <!-- Masterplan Link -->
                    <div class="relative group">
                        <x-nav-link :href="route('masterplan')" :active="request()->routeIs('masterplan*')"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-green-50 hover:text-green-700 {{ request()->routeIs('masterplan*') ? 'bg-green-100 text-green-700 shadow-sm' : 'text-gray-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-project-diagram mr-2 text-sm"></i>
                                {{ __('Masterplan') }}
                            </div>
                        </x-nav-link>
                    </div>

                    <!-- IGA Link -->
                    <div class="relative group">
                        <x-nav-link :href="route('iga')" :active="request()->routeIs('iga*')"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-purple-50 hover:text-purple-700 {{ request()->routeIs('iga*') ? 'bg-purple-100 text-purple-700 shadow-sm' : 'text-gray-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-chart-line mr-2 text-sm"></i>
                                {{ __('IGA') }}
                            </div>
                        </x-nav-link>
                    </div>

                    <!-- Assessment Link -->
                    <div class="relative group">
                        <x-nav-link :href="route('assessment')" :active="request()->routeIs('assessment*')"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-orange-50 hover:text-orange-700 {{ request()->routeIs('assessment*') ? 'bg-orange-100 text-orange-700 shadow-sm' : 'text-gray-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-check-circle mr-2 text-sm"></i>
                                {{ __('Assessment') }}
                            </div>
                        </x-nav-link>
                    </div>

                    <!-- Booklet Link -->
                    <div class="relative group">
                        <x-nav-link :href="route('booklet')" :active="request()->routeIs('booklet*')"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-teal-50 hover:text-teal-700 {{ request()->routeIs('booklet*') ? 'bg-teal-100 text-teal-700 shadow-sm' : 'text-gray-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-book mr-2 text-sm"></i>
                                {{ __('Booklet') }}
                            </div>
                        </x-nav-link>
                    </div>

                    <!-- Quickwin Link -->
                    <div class="relative group">
                        <x-nav-link :href="route('quickwin')" :active="request()->routeIs('quickwin*')"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-pink-50 hover:text-pink-700 {{ request()->routeIs('quickwin*') ? 'bg-pink-100 text-pink-700 shadow-sm' : 'text-gray-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-lightbulb mr-2 text-sm"></i>
                                {{ __('Quickwin') }}
                            </div>
                        </x-nav-link>
                    </div>

                    <!-- Dimension Link -->
                    <div class="relative group">
                        <x-nav-link :href="route('dimension')" :active="request()->routeIs('dimension*')"
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 hover:bg-indigo-50 hover:text-indigo-700 {{ request()->routeIs('dimension*') ? 'bg-indigo-100 text-indigo-700 shadow-sm' : 'text-gray-600' }}">
                            <div class="flex items-center">
                                <i class="fas fa-ruler-combined mr-2 text-sm"></i>
                                {{ __('Dimension') }}
                            </div>
                        </x-nav-link>
                    </div>
                </div>
            </div>

            <!-- Right side menu -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
               

                <!-- Settings Dropdown -->
                <div class="relative" x-data="{ dropdownOpen: false }">
                    <button @click="dropdownOpen = !dropdownOpen"
                            class="inline-flex items-center px-4 py-2 border border-gray-200 text-sm leading-4 font-medium rounded-lg text-gray-600 bg-white hover:bg-gray-50 hover:text-gray-800 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-3">
                                <span class="text-white text-sm font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <div class="text-left hidden lg:block">
                                <div class="font-semibold">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-500">Administrator</div>
                            </div>
                        </div>
                        <div class="ms-2">
                            <svg class="fill-current h-4 w-4 transition-transform duration-200"
                                 :class="{ 'rotate-180': dropdownOpen }"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="dropdownOpen"
                         @click.away="dropdownOpen = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-1 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-1 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-lg shadow-lg z-50"
                         style="display: none;">

                        <div class="py-2">
                            <!-- User Info Header -->
                            <div class="px-4 py-3 border-b border-gray-100">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-white font-semibold">
                                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                                        <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Menu Items -->
                            <div class="py-2">
                                <a href="{{ route('profile.edit') }}"
                                   class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                                    <i class="fas fa-user-circle mr-3 text-gray-400"></i>
                                    {{ __('Profile Settings') }}
                                </a>

                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                                    <i class="fas fa-cog mr-3 text-gray-400"></i>
                                    Account Settings
                                </a>

                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors duration-200">
                                    <i class="fas fa-question-circle mr-3 text-gray-400"></i>
                                    Help & Support
                                </a>
                            </div>

                            <!-- Logout -->
                            <div class="border-t border-gray-100 pt-2">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200 text-left">
                                        <i class="fas fa-sign-out-alt mr-3"></i>
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-100">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <!-- Mobile Dashboard Link -->
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                  class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-home mr-3"></i>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- Mobile Masterplan Link -->
            <x-responsive-nav-link :href="route('masterplan')" :active="request()->routeIs('masterplan*')"
                                  class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('masterplan*') ? 'bg-green-100 text-green-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-project-diagram mr-3"></i>
                {{ __('Masterplan') }}
            </x-responsive-nav-link>

            <!-- Mobile IGA Link -->
            <x-responsive-nav-link :href="route('iga')" :active="request()->routeIs('iga*')"
                                  class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('iga*') ? 'bg-purple-100 text-purple-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-chart-line mr-3"></i>
                {{ __('IGA') }}
            </x-responsive-nav-link>

            <!-- Mobile Assessment Link -->
            <x-responsive-nav-link :href="route('assessment')" :active="request()->routeIs('assessment*')"
                                  class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('assessment*') ? 'bg-orange-100 text-orange-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-check-circle mr-3"></i>
                {{ __('Assessment') }}
            </x-responsive-nav-link>

            <!-- Mobile Booklet Link -->
            <x-responsive-nav-link :href="route('booklet')" :active="request()->routeIs('booklet*')"
                                  class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('booklet*') ? 'bg-teal-100 text-teal-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-book mr-3"></i>
                {{ __('Booklet') }}
            </x-responsive-nav-link>

            <!-- Mobile Quickwin Link -->
            <x-responsive-nav-link :href="route('quickwin')" :active="request()->routeIs('quickwin*')"
                                  class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('quickwin*') ? 'bg-pink-100 text-pink-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-lightbulb mr-3"></i>
                {{ __('Quickwin') }}
            </x-responsive-nav-link>

            <!-- Mobile Dimension Link -->
            <x-responsive-nav-link :href="route('dimension')" :active="request()->routeIs('dimension*')"
                                  class="flex items-center py-3 px-4 rounded-lg {{ request()->routeIs('dimension*') ? 'bg-indigo-100 text-indigo-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <i class="fas fa-ruler-combined mr-3"></i>
                {{ __('Dimension') }}
            </x-responsive-nav-link>
        </div>

        <!-- Mobile User Settings -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4 py-3">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-semibold text-lg">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center py-2 px-4 rounded-lg text-gray-600 hover:bg-gray-50">
                    <i class="fas fa-user-circle mr-3"></i>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Mobile Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="flex items-center py-2 px-4 rounded-lg text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</
