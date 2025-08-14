<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
        <h2 class="text-lg font-bold mb-6">Admin Panel</h2>
        <nav class="space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-700">Dashboard</a>
            <a href="{{ route('masterplan') }}" class="block px-3 py-2 rounded hover:bg-gray-700">Masterplan</a>
            <a href="{{ route('iga') }}" class="block px-3 py-2 rounded hover:bg-gray-700">IGA</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>
