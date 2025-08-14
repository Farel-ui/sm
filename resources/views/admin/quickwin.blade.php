<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor - QuickWin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    @include('layouts.navigation')

    <main class="pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mt-6">
                <div class="bg-gradient-to-r from-green-50 to-green-100 border border-green-200 rounded-xl p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2 flex items-center">
                        <div class="bg-green-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-bolt text-white"></i>
                        </div>
                        QuickWin Dashboard
                    </h1>
                    <p class="text-gray-600">Kelola dan pantau semua QuickWin dengan mudah</p>
                </div>
            </div>

            <!-- Card List -->
            <div class="mt-6 bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                        <i class="fas fa-list mr-2 text-green-500"></i> Daftar QuickWin
                    </h3>
                    <a href="{{ route('quickwin.create') }}"
                       class="px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg hover:bg-green-700 shadow">
                        <i class="fas fa-plus mr-2"></i> Tambah Baru
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Image</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Title</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Description</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($quickwins as $index => $qw)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('storage/quickwins/' . $qw->image) }}" alt="{{ $qw->title }}"
                                             class="h-16 w-16 rounded-lg object-cover border">
                                    </td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $qw->title }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $qw->description }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('quickwin.edit', $qw->id) }}"
                                           class="text-yellow-600 hover:text-yellow-800 mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('quickwin.destroy', $qw->id) }}" method="POST" class="inline"
                                              onsubmit="return confirm('Yakin ingin menghapus QuickWin ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 mx-2">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">Belum ada QuickWin</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
