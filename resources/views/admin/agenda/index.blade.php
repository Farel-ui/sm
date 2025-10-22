<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Agenda - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
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

        /* Subtle animation for form elements */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
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
            border: none;
            cursor: pointer;
        }

        .btn-gradient:hover {
            background: linear-gradient(to right, #1e40af, #1e3a8a);
        }

        .btn-gradient i {
            margin-right: 0.5rem;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.625rem 1.5rem;
            transition: background 0.3s ease;
            display: inline-flex;
            align-items: center;
            border: none;
            cursor: pointer;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .btn-secondary i {
            margin-right: 0.5rem;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
            font-weight: 600;
            border-radius: 0.5rem;
            padding: 0.625rem 1.5rem;
            transition: background 0.3s ease;
            display: inline-flex;
            align-items: center;
            border: none;
            cursor: pointer;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-danger i {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body class="bg-blue-50 min-h-screen font-sans">
    <main class="pb-12 ml-64">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-blue-600 text-white flex justify-between items-center px-6 py-6 rounded-lg shadow-md">
                <!-- Kiri -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-calendar-alt text-3xl mr-2"></i>
                    <span class="font-semibold text-xl">Daftar Agenda Smart City</span>
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

            <!-- Action Buttons -->
            <div class="mt-6 flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.agenda.create') }}" class="btn-gradient">
                        <i class="fas fa-plus"></i>
                        Tambah Agenda
                    </a>
                    <a href="{{ route('dashboard') }}" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Dashboard
                    </a>
                </div>
                <div class="text-sm text-gray-600">
                    Total: {{ $agendas->total() }} agenda
                </div>
            </div>

            <!-- Agenda List -->
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl mt-6 card-hover fade-in border border-blue-100">
                <div class="p-8">
                    @if($agendas->count() > 0)
                        <div class="space-y-4">
                            @foreach($agendas as $agenda)
                                <div class="border border-gray-200 rounded-lg p-4 hover:bg-gray-50 transition">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-semibold text-gray-800">{{ $agenda->judul }}</h3>
                                            <p class="text-sm text-gray-600 mt-1">
                                                <i class="fas fa-calendar mr-2"></i>
                                                {{ \Carbon\Carbon::parse($agenda->tanggal)->format('l, d F Y') }}
                                            </p>
                                            <p class="text-xs text-gray-500 mt-1">
                                                Dibuat: {{ $agenda->created_at ? $agenda->created_at->format('d/m/Y H:i') : 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.agenda.edit', $agenda->id) }}"
                                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm font-medium transition">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm font-medium transition">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $agendas->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="fas fa-calendar-times text-6xl text-gray-300 mb-4"></i>
                            <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum ada agenda</h3>
                            <p class="text-gray-500 mb-6">Mulai tambahkan agenda pertama Anda untuk Smart City.</p>
                            <a href="{{ route('admin.agenda.create') }}" class="btn-gradient">
                                <i class="fas fa-plus"></i>
                                Tambah Agenda Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>
</html>
</x-app-layout>
