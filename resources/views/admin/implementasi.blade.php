<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Implementasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Fade animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.5s ease-out; }

        /* Card hover */
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 20px 25px -5px rgba(0,0,0,.1), 0 10px 10px -5px rgba(0,0,0,.04); }

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
        .btn-gradient:hover { background: linear-gradient(to right, #1e40af, #1e3a8a); }
        .btn-gradient i { margin-right: 0.5rem; }

        /* Action buttons */
        .action-btn {
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        .action-btn:hover { transform: scale(1.1); }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen">

    <main class="pb-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mt-6 fade-in">
                <div class="bg-blue-600 border border-blue-600 rounded-xl p-5 text-white">
                    <h1 class="text-2xl font-bold flex items-center">
                        <i class="fas fa-file-pdf mr-3"></i>
                        Implementasi Dashboard
                </div>
            </div>

            <!-- Card Container -->
            <div class="bg-white overflow-hidden shadow-sm rounded-xl mt-6 card-hover fade-in border border-blue-100">
                <!-- Header -->
                <div class="px-6 py-5 border-b border-blue-600 flex justify-between items-center ">
                    <h3 class="text-lg font-semibold text-blue-600 flex items-center">
                        <i class="fas fa-list mr-2 text-blue-500"></i>
                        Daftar Implementasi
                    </h3>
                    <div class="flex items-center space-x-3">
                        <input type="text" id="searchInput" placeholder="Cari implementasi..."
                               class="pl-4 pr-4 py-2.5 text-sm border border-blue-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-blue-500 transition-all" />
                        <a href="{{ route('implementasi.create') }}" class="btn-gradient">
                            <i class="fas fa-plus"></i> Tambah Baru
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-blue-600">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-600 uppercase">File</th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="text-blue-400"></i>
                                        Status
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-600 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-100">
                            @forelse($implementasi as $index => $im)
                                <tr class="hover:bg-blue-50 fade-in searchable-row">
                                    <td class="px-6 py-4 text-sm text-blue-600">{{ $index+1 }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-blue-800 searchable-title">{{ $im->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-blue-500">
                                            {{ $im->file ?? 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $im->status == 'publish' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($im->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ asset('storage/implemen/' . $im->file) }}" target="_blank"
                                               class="action-btn bg-blue-500 text-white hover:text-yellow-400" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('implementasi.edit', $im->id) }}"
                                               class="action-btn bg-blue-500 text-white hover:text-yellow-400" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('implementasi.destroy', $im->id) }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="action-btn bg-blue-500 text-white hover:text-yellow-400" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-blue-500">
                                            <i class="fas fa-folder-open text-4xl mb-3 text-blue-300"></i>
                                            <p class="mb-2">Belum ada implementasi</p>
                                            <a href="{{ route('implementasi.create') }}"
                                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                                                <i class="fas fa-plus mr-2"></i> Tambah Implementasi
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
