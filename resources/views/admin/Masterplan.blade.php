<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Masterplan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .table-row {
            animation: fadeIn 0.3s ease-out;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .slide-in {
            animation: slideIn 0.6s ease-out;
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Button animations */
        .btn-animate {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-animate::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-animate:hover::before {
            left: 100%;
        }

        .btn-animate:hover {
            transform: translateY(-1px);
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
    @include('layouts.navigation')

    <!-- Main Content -->
    <main class="pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mt-6 fade-in">
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-xl p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2 flex items-center">
                        <div class="bg-blue-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-project-diagram text-white"></i>
                        </div>
                        Masterplan Dashboard
                    </h1>
                    <p class="text-gray-600">Kelola dan pantau semua masterplan Anda dengan mudah</p>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 fade-in">
                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 card-hover">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <i class="fas fa-file-alt text-blue-600 text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Masterplan</p>
                                <p class="text-2xl font-bold text-gray-900">{{ isset($masterplan) ? $masterplan->count() : 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 card-hover">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-green-100 p-3 rounded-lg">
                                    <i class="fas fa-check-circle text-green-600 text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Aktif</p>
                                <p class="text-2xl font-bold text-gray-900">{{ isset($masterplan) ? $masterplan->count() : 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 card-hover">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-yellow-100 p-3 rounded-lg">
                                    <i class="fas fa-file-pdf text-yellow-600 text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">With Files</p>
                                <p class="text-2xl font-bold text-gray-900">{{ isset($masterplan) ? $masterplan->where('file', '!=', null)->count() : 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 card-hover">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-purple-100 p-3 rounded-lg">
                                    <i class="fas fa-calendar-week text-purple-600 text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Bulan Ini</p>
                                <p class="text-2xl font-bold text-gray-900">{{ isset($masterplan) ? $masterplan->where('created_at', '>=', now()->startOfMonth())->count() : 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Container -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl mt-6 card-hover fade-in border border-gray-100">
                <!-- Card Header -->
                <div class="px-6 py-5 border-b border-gray-100 table-header">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                            <div class="bg-indigo-500 p-2 rounded-lg mr-3">
                                <i class="fas fa-list text-white text-sm"></i>
                            </div>
                            Daftar Masterplan
                        </h3>
                        <div class="flex items-center space-x-3">
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" placeholder="Cari masterplan..." id="searchInput"
                                       class="pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white transition-all">
                            </div>
                            <a href="{{ route('masterplan.create') }}"
                               class="px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all btn-animate shadow-lg">
                                <i class="fas fa-plus mr-2"></i> Tambah Baru
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Table Container -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="table-header">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-hashtag mr-2 text-gray-400"></i>
                                        No.
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-heading mr-2 text-gray-400"></i>
                                        Title
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-calendar mr-2 text-gray-400"></i>
                                        Period
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-file-pdf mr-2 text-gray-400"></i>
                                        File
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center">
                                        <i class="fas fa-clock mr-2 text-gray-400"></i>
                                        Last Updated
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="fas fa-cogs mr-2 text-gray-400"></i>
                                        Actions
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if(isset($masterplan) && $masterplan->count() > 0)
                                @foreach ($masterplan as $index => $mp)
                                <tr class="table-row hover:bg-blue-50 transition-all duration-200 searchable-row">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="bg-gray-100 px-3 py-1 rounded-full text-xs font-medium">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center shadow-sm">
                                                <i class="fas fa-file-alt text-blue-600 text-lg"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900 searchable-title">
                                                    {{ $mp->title }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    <i class="fas fa-tag mr-1"></i>Masterplan Document
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-calendar-alt mr-1"></i>
                                            {{ $mp->period ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($mp->file ?? false)
                                            <a href="{{ asset('storage/masterplans/' . $mp->file) }}"
                                               class="inline-flex items-center px-3 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors font-medium">
                                                <i class="fas fa-file-pdf mr-2"></i>
                                                Lihat PDF
                                            </a>
                                        @else
                                            <span class="inline-flex items-center px-3 py-2 bg-gray-50 text-gray-500 rounded-lg">
                                                <i class="fas fa-file-times mr-2"></i>
                                                No file
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <i class="fas fa-history mr-2 text-gray-400"></i>
                                            <span>{{ isset($mp->updated_at) ? date('d M Y', strtotime($mp->updated_at)) : 'N/A' }}</span>
                                        </div>
                                        <div class="text-xs text-gray-400 mt-1">
                                            {{ isset($mp->updated_at) ? date('H:i', strtotime($mp->updated_at)) : '' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <button class="action-btn bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700"
                                                    title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <a href="{{ route('masterplan.edit', $mp->id ?? '#') }}"
                                               class="action-btn bg-yellow-50 text-yellow-600 hover:bg-yellow-100 hover:text-yellow-700"
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('masterplan.destroy', $mp->id ?? '#') }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus masterplan ini?')"
                                                  class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="action-btn bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700"
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
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <i class="fas fa-folder-open text-gray-400 text-2xl"></i>
                                            </div>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada masterplan</h3>
                                            <p class="text-gray-500 mb-4">Mulai dengan menambahkan masterplan pertama Anda</p>
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
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </button>
                            <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </button>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700 flex items-center">
                                    <i class="fas fa-info-circle mr-2 text-gray-400"></i>
                                    Menampilkan <span class="font-medium mx-1">{{ isset($masterplan) ? $masterplan->count() : 0 }}</span> dari <span class="font-medium mx-1">{{ isset($masterplan) ? $masterplan->count() : 0 }}</span> hasil
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                                    <button class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        1
                                    </button>
                                    <button class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        2
                                    </button>
                                    <button class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        3
                                    </button>
                                    <button class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
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

                // Update results count
                const visibleRows = Array.from(searchableRows).filter(row => row.style.display !== 'none');
                console.log(`Showing ${visibleRows.length} results for "${searchTerm}"`);
            });

            // Add smooth hover effects
            const rows = document.querySelectorAll('.table-row');
            rows.forEach(row => {
                row.style.transition = 'all 0.2s ease';
            });

            // Action button tooltips
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.1)';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                });
            });
        });
    </script>
</body>
</html>
