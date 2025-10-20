<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - QuickWin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.5s ease-out; }
        .table-row { animation: fadeIn 0.3s ease-out; }

        /* Gradient */
        .gradient-bg { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); }

        /* Card hover */
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); }

        /* Buttons */
        .action-btn { padding: 8px; border-radius: 8px; transition: all 0.2s ease; }
        .action-btn:hover { transform: scale(1.1); }

        /* Header Table */
        .table-header { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); }

        /* Gradient button */
        .btn-gradient {
            background: linear-gradient(to right, #3b82f6, #1e40af);
            color: white; font-weight: 600;
            border-radius: 0.5rem; padding: 0.625rem 1.5rem;
            display: inline-flex; align-items: center;
        }
        .btn-gradient:hover { background: linear-gradient(to right, #1e40af, #1e3a8a); }
        .btn-gradient i { margin-right: 0.5rem; }
        .swal2-confirm-btn {
            background-color: red;
            color: white;
            font-weight: 600;
            padding: 6px 20px;
            border-radius: 20px;
            border: none;
            margin-left: 5px;
            cursor: pointer;
        }
        .swal2-confirm-btn:hover {
            background-color: #d60000;
        }

        /* Tombol Batal */
        .swal2-cancel-btn {
            background-color: #5e2b2b;
            color: white;
            font-weight: 600;
            padding: 6px 20px;
            border-radius: 20px;
            border: none;
            margin-right: 5px;
            cursor: pointer;
        }
        .swal2-cancel-btn:hover {
            background-color: #4b1e1e;
        }
        .swal2-actions {
            width: 100%;
            display: flex !important;
            justify-content: flex-end !important; /* Geser ke kanan */
            padding: 10px 16px;
            margin: 0;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">

    <main class="pb-12 ml-64">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="bg-blue-600 text-white flex justify-between items-center px-6 py-6 rounded-lg shadow-md">
        <!-- Kiri -->
        <div class="flex items-center space-x-2">
                <i class="fas fa-bullseye text-3xl mr-2"></i>
            <span class="font-semibold text-xl">Dashboard Quick Wins Smart City</span>
        </div>
        <!-- Kanan -->
        <div class="flex items-center space-x-3">
            <span class="font-bold text-2xl tracking-widest">ADMIN</span>
            <div class="w-1 h-9 bg-white"></div>
            @if(Auth::user()->avatar)
                <!-- Jika user punya avatar -->
                <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center">
                    <img
                        src="{{ asset('images/avatar/' . Auth::user()->avatar) }}"
                        alt="User Avatar"
                        class="w-full h-full object-cover">
                </div>
            @endif
    </div>
</div>


            <!-- Card List -->
            <div class="mt-6 bg-white shadow-sm rounded-xl border border-blue-100 overflow-hidden card-hover fade-in">
                <!-- Card Header -->
                <div class="px-6 py-5 table-header flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-blue-500 flex items-center">
                         Daftar QuickWin
                    </h3>
                    <div class="flex items-center space-x-3">
                        <div class="relative">
                            <i class="fas fa-search absolute rounded-xl left-3 top-1/2 transform -translate-y-1/2 text-blue-600"></i>
                            <input type="text" placeholder="Cari quickwin..." id="searchInput"
                                   class="pl-10 pr-8 py-2.5 text-blue-600  text-sm border border-blue-600 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-blue-500 transition-all" />
                        </div>
                        <a href="{{ route('admin.quickwin.create') }}" class="btn-gradient">
                            <i class="fas fa-plus"></i> Tambah Baru
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-blue-500">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">Gambar</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-blue-500 uppercase tracking-wider">Deskripsi</th>
                                <th scope="col" class="px-6 py-4 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">
                                    <div class="flex items-center justify-center">
                                        <i class="text-blue-400"></i>
                                        Status
                                    </div>
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-blue-500 uppercase tracking-wider">aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-blue-500">
                            @forelse ($quickwins as $index => $qw)
                                <tr class="table-row hover:bg-blue-50 transition-all duration-200 searchable-row">
                                    <td class="px-6 py-4 text-sm text-blue-500">{{ $index + $quickwins->firstItem() }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-blue-500 searchable-title">{{ $qw->title }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('images/quickwins/' . $qw->image) }}" alt="{{ $qw->title }}"
                                            class="h-16 w-16 rounded-lg object-cover border border-blue-200">
                                    </td>
                                    <td class="px-6 py-4 text-sm text-blue-400">{{ $qw->description }}</td>
                                    <!-- Status -->
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $qw->status == 'publish' ?
                                        'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ ucfirst($qw->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ asset('images/quickwins/' . $qw->image  ) }}" target="_blank"
                                            class="action-btn bg-blue-500 text-white hover:text-yellow-400" title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.quickwin.edit', $qw->id ?? '#') }}"
                                            class="action-btn bg-blue-500 text-white hover:text-yellow-500"
                                            title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <!-- Tombol Hapus -->
                                            @if(auth()->user()->role === 'super_admin')
                                            <button type="button"
                                                    onclick="confirmDelete({{ $qw->id }})"
                                                    class="action-btn bg-blue-500 text-white hover:text-red-500"
                                                    title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                            <!-- Form hapus (hidden) -->
                                            <form id="delete-form-{{ $qw->id }}"
                                                  action="{{ route('admin.quickwin.destroy', $qw->id) }}"
                                                  method="POST"
                                                  style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                                                <i class="fas fa-folder-open text-blue-300 text-2xl"></i>
                                            </div>
                                            <h3 class="text-lg font-medium text-blue-500 mb-2">Belum ada QuickWin</h3>
                                            <p class="text-blue-500 mb-4">Mulai dengan menambahkan QuickWin pertama Anda</p>
                                            <a href="{{ route('admin.quickwin.create') }}" class="btn-gradient">
                                                <i class="fas fa-plus"></i> Tambah QuickWin
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination (sama gaya dengan Masterplan) -->
                @if ($quickwins->hasPages())
                    <div class="px-6 py-4 border-t border-blue-100 bg-blue-50">
                        <div class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between sm:hidden">
                                @if ($quickwins->onFirstPage())
                                    <span class="px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed">Previous</span>
                                @else
                                    <a href="{{ $quickwins->previousPageUrl() }}"
                                        class="relative inline-flex items-center px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-blue-500 bg-white hover:bg-blue-50">Previous</a>
                                @endif
                                @if ($quickwins->hasMorePages())
                                    <a href="{{ $quickwins->nextPageUrl() }}"
                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-blue-500 bg-white hover:bg-blue-50">Next</a>
                                @else
                                    <span
                                    class="ml-3 px-4 py-2 border border-blue-300 text-sm font-medium rounded-md text-gray-400 bg-gray-100 cursor-not-allowed">Next</span>
                                @endif
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <p class="text-sm text-blue-500 flex items-center">
                                    <i class="fas fa-info-circle mr-2 text-blue-300"></i>
                                    Menampilkan <span class="font-medium mx-1">{{ $quickwins->firstItem() }}</span>
                                    - <span class="font-medium mx-1">{{ $quickwins->lastItem() }}</span>
                                    dari <span class="font-medium mx-1">{{ $quickwins->total() }}</span> hasil
                                </p>
                                <nav class="relative z-0 inline-flex rounded-lg shadow-sm -space-x-px" aria-label="Pagination">
                                    @if ($quickwins->onFirstPage())
                                        <span class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-blue-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed">
                                            <i class="fas fa-chevron-left"></i></span>
                                    @else
                                        <a href="{{ $quickwins->previousPageUrl() }}"
                                            class="relative inline-flex items-center px-3 py-2 rounded-l-lg border border-blue-300 bg-white text-sm font-medium text-blue-500 hover:bg-blue-50">
                                            <i class="fas fa-chevron-left"></i></a>
                                    @endif

                                    @for ($i = 1; $i <= $quickwins->lastPage(); $i++)
                                        @if ($i == $quickwins->currentPage())
                                            <span aria-current="page"
                                            class="z-10 bg-blue-100 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ $i }}</span>
                                        @else
                                            <a href="{{ $quickwins->url($i) }}"
                                                class="bg-white border-blue-300 text-blue-500 hover:bg-blue-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">{{ $i }}</a>
                                        @endif
                                    @endfor

                                    @if ($quickwins->hasMorePages())
                                        <a href="{{ $quickwins->nextPageUrl() }}"
                                            class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-blue-300 bg-white text-sm font-medium text-blue-500 hover:bg-blue-50"><i class="fas fa-chevron-right"></i></a>
                                    @else
                                        <span
                                        class="relative inline-flex items-center px-3 py-2 rounded-r-lg border border-blue-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed"><i class="fas fa-chevron-right"></i></span>
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <script>
        function confirmDelete(id) {
    Swal.fire({
        html: `
            <div style="text-align: left;">
                <h2 style="font-size: 18px; font-weight: 700; margin-bottom: 8px;">MENGHAPUS DATA</h2>
                <p style="font-size: 18px; display: flex; align-items: center; gap: 6px;">
                    <i class="fas fa-trash" style="color: red; font-size: 18px;"></i>
                    Anda yakin ingin menghapus data tersebut!!
                </p>
            </div>
        `,
        position: 'top',
        showCancelButton: true,
        showConfirmButton: true,
        reverseButtons: true,
        confirmButtonText: 'HAPUS',
        cancelButtonText: 'BATAL',
        buttonsStyling: false,
        customClass: {
            popup: 'rounded-xl shadow-md',
            confirmButton: 'swal2-confirm-btn',
            cancelButton: 'swal2-cancel-btn'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
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
