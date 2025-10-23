<x-app-layout>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen p-4 bg-blue-50 ml-64">
    <div class="ml-64">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="bg-blue-600 text-white flex justify-end items-center px-4 py-5 rounded-lg shadow-sm mb-5">
            <div class="flex items-center space-x-2 text-lg">
                <span class="font-medium">ADMIN</span>
                <div class="w-px h-9 bg-white opacity-50"></div>
                @if(Auth::user()->avatar)
                <div class="w-10 h-10 rounded-full overflow-hidden flex items-center justify-center">
                    <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}"
                         alt="User Avatar"
                         class="w-full h-full object-cover">
                </div>
                @endif
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="bg-white shadow-md pt-16 pb-12 px-8">
            <!-- Tombol Edit Profil -->
            <div class="flex justify-center mb-8">
                <a href="{{ route('profile.edit') }}"
                   class="px-8 py-2 bg-blue-100 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-200 transition">
                    Edit Profil
                </a>
            </div>

            <div class="flex items-start gap-12">
                <!-- Avatar -->
                <div class="flex-shrink-0">
                    <div class="w-40 h-40 bg-gray-300 rounded-full flex items-center justify-center overflow-hidden">
                        <img src="{{ Auth::user()->avatar ? asset('images/avatar/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                             alt="Avatar"
                             class="w-full h-full object-cover">
                    </div>
                </div>

                <!-- Info Section -->
                <div class="flex-1 space-y-6">
                    <!-- Nama -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Nama</label>
                        <p class="text-xl font-bold text-gray-900">{{ Auth::user()->name }}</p>
                    </div>

                    <!-- E-mail -->
                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">E-mail</label>
                        <p class="text-xl font-bold text-gray-900">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
</x-app-layout>
