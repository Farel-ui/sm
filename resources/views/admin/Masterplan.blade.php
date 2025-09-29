<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - Masterplan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}">
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1),
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

        /* Button gradient */
        .btn-gradient {
            background: linear-gradient(to right, #3b82f6, #1e40af);
            color: white;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.625rem 1.5rem;
            transition: background 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #1e40af, #1e3a8a);
        }
        .btn-gradient i {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body class="bg-blue-50 min-h-screen font-sans">
    <main class="pb-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mt-5 fade-in">
                <div class="bg-blue-500 border border-blue-100 rounded-xl p-2">
                    <h1 class="text-xl font-bold text-white mb-2 flex items-center">
                        <div class="bg-blue-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-project-diagram text-white"></i>
                        </div>
                        Masterplan Dashboard
                    </h1>
                </div>
            </div>

            <!-- Card Container -->
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl mt-6 card-hover fade-in border border-blue-100">
                <!-- Card Header -->
                <div class="px-6 py-5 table-header">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-blue-500 flex items-center">
                            Data Masterplan Smart City
                        </h3>
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <i class="fas fa-search absolute rounded-xl left-3 top-1/2 transform -translate-y-1/2 text-blue-600"></i>
                                <input type="text" placeholder="Pencarian" id="searchInput"
                                       class="pl-10 pr-8 py-2.5 text-blue-600  text-sm border border-blue-600 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-blue-500 transition-all" />
                            </div>
                            <a href="{{ route('masterplan.create') }}" class="btn-gradient  rounded-4xl">
                                <i class="fas fa-plus rounded-2xl"></i> Tambah Baru
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
                                    <div class="flex items-center">
                                        <i class="text-blue-400"></i>
                                        No.
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="text-blue-400"></i>
                                        Judul
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="text-blue-400"></i>
                                        Periode
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="text-blue-400"></i>
                                        Type
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="text-blue-400"></i>
                                        Status
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="text-blue-400"></i>
                                        Aksi
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-500">
                            @if(isset($masterplan) && $masterplan->count() > 0)
                                @foreach ($masterplan as $index => $mp)
                                <tr class="table-row hover:bg-blue-50 transition-all duration-200 searchable-row">
                                    <!-- No -->
                                    <td class="px-6 py-4 text-sm text-blue-500">{{ $index + $masterplan->firstItem() }}</td>

                                    <!-- Judul -->
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-blue-600 searchable-title">{{ $mp->title }}</div>
                                        <div class="text-xs text-blue-400"><i class="fas fa-tag mr-1"></i>Masterplan Document</div>
                                    </td>

                                    <!-- Periode -->
                                    <td class="px-6 py-4 text-sm text-blue-700">
                                        <i class="fas fa-calendar-alt mr-1"></i> {{ $mp->period }}
                                    </td>

                                    <!-- Type -->
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $mp->type == 'buku' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800' }}">
                                            {{ ucfirst($mp->type) }}
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $mp->status == 'publish' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($mp->status) }}
                                        </span>
                                    </td>
                                    <!-- Aksi -->
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <button class="action-btn bg-blue-500 text-white hover:text-yellow-500"
                                                    title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('masterplan.edit', $mp->id) }}?page={{ request('page', $masterplan->currentPage()) }}"
                                               class="action-btn bg-blue-500 text-white hover:text-yellow-500"
                                               title="Edit">
                                               <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('masterplan.destroy', [$mp->id, 'page' => $masterplan->currentPage()]) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus masterplan ini?')"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
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
                                                <i class="fas fa-folder-open text-blue-300 text-2xl"></i>
                                            </div>
                                            <h3 class="text-lg font-medium text-blue-500 mb-2">Belum ada masterplan</h3>
                                            <p class="text-blue-500 mb-4">Mulai dengan menambahkan masterplan pertama Anda</p>
                                            <a href="{{ route('masterplan.create') }}"
                                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                                                <i class="fas fa-plus mr-2"></i>
                                                Tambah Masterplan
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

               <!-- Pagination -->
        <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
            <div class="flex items-center justify-between">
        <!-- Mobile -->
        <div class="flex-1 flex justify-between sm:hidden">
            @if ($masterplan->onFirstPage())
                <span class="px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed">
                    Previous
                </span>
            @else
                <a href="{{ $masterplan->previousPageUrl() }}"
                   class="relative inline-flex items-center px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-blue-500 bg-white hover:bg-blue-50">
                    Previous
                </a>
            @endif

            @if ($masterplan->hasMorePages())
                <a href="{{ $masterplan->nextPageUrl() }}"
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
                    Menampilkan <span class="font-medium mx-1">{{ $masterplan->firstItem() }}</span>
                    - <span class="font-medium mx-1">{{ $masterplan->lastItem() }}</span>
                    dari <span class="font-medium mx-1">{{ $masterplan->total() }}</span> hasil
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                    {{-- Tombol Previous --}}
                    @if ($masterplan->onFirstPage())
                        <span class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-blue-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $masterplan->previousPageUrl() }}"
                           class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-blue-300 bg-white text-sm font-medium text-blue-500 hover:bg-blue-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Nomor Halaman --}}
                    @for ($i = 1; $i <= $masterplan->lastPage(); $i++)
                        @if ($i == $masterplan->currentPage())
                            <span aria-current="page"
                                class="z-10 bg-blue-100 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                {{ $i }}
                            </span>
                        @else
                            <a href="{{ $masterplan->url($i) }}"
                               class="bg-white border-blue-300 text-blue-500 hover:bg-blue-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                {{ $i }}
                            </a>
                        @endif
                    @endfor

                    {{-- Tombol Next --}}
                    @if ($masterplan->hasMorePages())
                        <a href="{{ $masterplan->nextPageUrl() }}"
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

                // Optional: update results count or other UI feedback here
            });
        });
    </script>
</body>
</html>
</x-app-layout>
