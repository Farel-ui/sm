<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex flex-row">
    <!-- Sidebar -->
    <aside class="flex flex-col w-64 bg-white shadow-lg">
        <div class="flex items-center justify-center h-20 border-b">
            <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
                <div class="bg-white p-2 rounded-xl shadow">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-10 object-contain">
                </div>
                <div>
                    <h1 class="text-lg font-bold text-indigo-600">Dashboard</h1>
                    <p class="text-xs text-gray-500">Management System</p>
                </div>
            </a>
        </div>

        <ul class="flex flex-col py-6 space-y-1">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-indigo-600 font-semibold' : 'text-gray-600' }}">
                    <i class="bx bx-home text-xl mr-3"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('masterplan') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 {{ request()->routeIs('masterplan*') ? 'bg-gray-100 text-green-600 font-semibold' : 'text-gray-600' }}">
                    <i class="bx bx-project text-xl mr-3"></i>
                    <span>Masterplan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('iga') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 {{ request()->routeIs('iga*') ? 'bg-gray-100 text-purple-600 font-semibold' : 'text-gray-600' }}">
                    <i class="bx bx-line-chart text-xl mr-3"></i>
                    <span>IGA</span>
                </a>
            </li>
            <li>
                <a href="{{ route('assessment') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 {{ request()->routeIs('assessment*') ? 'bg-gray-100 text-orange-600 font-semibold' : 'text-gray-600' }}">
                    <i class="bx bx-check-circle text-xl mr-3"></i>
                    <span>Assessment</span>
                </a>
            </li>
            <li>
                <a href="{{ route('booklet') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 {{ request()->routeIs('booklet*') ? 'bg-gray-100 text-teal-600 font-semibold' : 'text-gray-600' }}">
                    <i class="bx bx-book text-xl mr-3"></i>
                    <span>Booklet</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dimension') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 {{ request()->routeIs('dimension*') ? 'bg-gray-100 text-indigo-600 font-semibold' : 'text-gray-600' }}">
                    <i class="bx bx-ruler text-xl mr-3"></i>
                    <span>Dimension</span>
                </a>
            </li>
             <li>
                <a href="{{ route('quickwin') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 {{ request()->routeIs('quickwin*') ? 'bg-gray-100 text-teal-600 font-semibold' : 'text-gray-600' }}">
                    <i class="bx bx-book text-xl mr-3"></i>
                    <span>Quickwin</span>
                </a>
            </li>
            <li class="mt-6 border-t pt-4">
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center h-12 px-4 transition hover:bg-gray-100 text-gray-600">
                    <i class="bx bx-user text-xl mr-3"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center h-12 px-4 transition hover:bg-gray-100 text-red-600">
                        <i class="bx bx-log-out text-xl mr-3"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>

</body>
</html>
