<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Iga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.svg') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Custom scrollbar for modern browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f8fafc;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Subtle animation for table rows */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table-row {
            animation: fadeIn 0.3s ease-out;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        /* Gradient background */
        .gradient-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        /* Card hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow:
                0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Action buttons */
        .action-btn {
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .action-btn:hover {
            transform: scale(1.1);
        }

        /* Table enhancements */
        .table-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <!-- Main Content -->
    <main class="pb-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mt-5 fade-in">
                <div class="bg-blue-500 border border-blue-100 rounded-xl p-2">
                    <h1 class="text-xl font-bold text-white mb-2 flex items-center">
                        <div class="bg-blue-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-project-diagram text-white"></i>
                        </div>
                        Iga Dashboard
                    </h1>
                </div>
            </div>

            <!-- Card Container -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl mt-6 card-hover fade-in border border-blue-100">
                <!-- Card Header -->
                <div class="px-6 py-5 table-header">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-blue-500 flex items-center">
                            Data Iga Smart City
                        </h3>
                        <div class="flex items-center space-x-3">
                            <input type="text" id="searchInput" placeholder="Cari iga..."
                                   class="pl-4 pr-4 py-2.5 text-sm border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-blue-500 transition-all" />
                            <a href="{{ route('iga.create') }}"
                               class="px-6 py-2.5 bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                                <i class="fas fa-plus mr-2"></i> Tambah Baru
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-blue-500">
                        <thead class="table-header">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    Judul
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    Institusi
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="text-blue-400"></i>
                                        Status
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-500">
                            @if(isset($iga) && $iga->count() > 0)
                                @foreach ($iga as $index => $ig)
                                <tr class="table-row hover:bg-blue-50 transition-all duration-200 searchable-row">
                                     <td class="px-6 py-4 text-sm text-blue-500">{{ $index + $iga->firstItem() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-blue-500 searchable-title">
                                            {{ $ig->title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-blue-500">
                                            {{ $ig->institution }}
                                        </div>
                                    </td>
                                    <!-- Status -->
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $ig->status == 'public' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($ig->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-500">
                                        @if($ig->image ?? false)
                                            <img src="{{ asset('images/iga/' . $ig->image) }}" alt="Image" class="h-12 w-12 rounded-lg" />
                                        @else
                                            <span class="inline-flex items-center px-3 py-2 bg-blue-50 text-blue-500 rounded-lg">
                                                <i class="fas fa-image-slash mr-2"></i>
                                                Tidak ada gambar
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ asset('images/iga/' . $ig->image) }}" target="_blank"
                                               class="action-btn bg-blue-500 text-white hover:text-yellow-400" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('iga.edit', $ig->id ?? '#') }}"
                                               class="action-btn bg-blue-500 text-white hover:text-yellow-500"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('iga.destroy', $ig->id ?? '#') }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus iga ini?')"
                                                  class="inline">
                                                @csrf
                                                <button type="submit"
                                                        class="action-btn bg-blue-500 text-white hover:text-yellow-500"
                                                        title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                                                <i class="fas fa-folder-open text-blue-500 text-2xl"></i>
                                            </div>
                                            <h3 class="text-lg font-medium text-blue-500 mb-2">Belum ada iga</h3>
                                            <p class="text-blue-500 mb-4">Mulai dengan menambahkan iga pertama Anda</p>
                                            <a href="{{ route('iga.create') }}"
                                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                                                <i class="fas fa-plus mr-2"></i>
                                                Tambah Iga
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
            <div class="flex items-center justify-between">
        <!-- Mobile -->
        <div class="flex-1 flex justify-between sm:hidden">
            @if ($iga->onFirstPage())
                <span class="px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed">
                    Previous
                </span>
            @else
                <a href="{{ $iga->previousPageUrl() }}"
                   class="relative inline-flex items-center px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-blue-500 bg-white hover:bg-blue-50">
                    Previous
                </a>
            @endif

            @if ($iga->hasMorePages())
                <a href="{{ $iga->nextPageUrl() }}"
                   class="ml-3 relative inline-flex items-center px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-blue-500 bg-white hover:bg-blue-50">
                    Next
                </a>
            @else
                <span class="ml-3 px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed">
                    Next
                </span>
            @endif
        </div>

        <!-- Desktop -->
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-blue-500 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-blue-300"></i>
                    Menampilkan <span class="font-medium mx-1">{{ $iga->firstItem() }}</span>
                    - <span class="font-medium mx-1">{{ $iga->lastItem() }}</span>
                    dari <span class="font-medium mx-1">{{ $iga->total() }}</span> hasil
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                    {{-- Tombol Previous --}}
                    @if ($iga->onFirstPage())
                        <span class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-blue-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $iga->previousPageUrl() }}"
                           class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-blue-300 bg-white text-sm font-medium text-blue-500 hover:bg-blue-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Nomor Halaman --}}
                    @for ($i = 1; $i <= $iga->lastPage(); $i++)
                        @if ($i == $iga->currentPage())
                            <span aria-current="page"
                                class="z-10 bg-blue-100 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                {{ $i }}
                            </span>
                        @else
                            <a href="{{ $iga->url($i) }}"
                               class="bg-white border-blue-300 text-blue-500 hover:bg-blue-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                {{ $i }}
                            </a>
                        @endif
                    @endfor

                    {{-- Tombol Next --}}
                    @if ($iga->hasMorePages())
                        <a href="{{ $iga->nextPageUrl() }}"
                           class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-blue-300 bg-white text-sm font-medium text-blue-500 hover:bg-blue-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-blue-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </nav>
            </div>
        </div>
            </div>
        </div>
    </main>

    <script>
        // Search functionality
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            const searchableRows = document.querySelectorAll('.searchable-row');

            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();

                searchableRows.forEach(row => {
                    const title = row.querySelector('.searchable-title').textContent.toLowerCase();
                    if (title.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
</x-app-layout>
