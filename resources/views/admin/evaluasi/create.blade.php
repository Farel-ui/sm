<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Data Evaluasi - Admin</title>
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

        /* Form styling */
        .form-input {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            padding: 0.75rem;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
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
    </style>
</head>
<body class="bg-blue-50 min-h-screen font-sans">
    <main class="pb-12 ml-64">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-blue-600 text-white flex justify-between items-center px-6 py-6 rounded-lg shadow-md">
                <!-- Kiri -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-chart-line text-3xl mr-2"></i>
                    <span class="font-semibold text-xl">Tambah Data Evaluasi Baru</span>
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

            <!-- Form Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-2xl mt-6 card-hover fade-in border border-blue-100">
                <form action="{{ route('admin.evaluasi.store') }}" method="POST" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tahun -->
                        <div class="md:col-span-2">
                            <label for="tahun" class="form-label">
                                <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>Tahun Evaluasi
                            </label>
                            <input type="number" id="tahun" name="tahun" value="{{ old('tahun') }}"
                                   class="form-input w-full @error('tahun') border-red-500 @enderror"
                                   placeholder="Masukkan tahun evaluasi" min="2000" max="{{ date('Y') + 1 }}" required>
                            @error('tahun')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Baseline -->
                        <div>
                            <label for="baseline" class="form-label">
                                <i class="fas fa-chart-bar mr-2 text-blue-500"></i>Baseline
                            </label>
                            <input type="number" step="0.1" id="baseline" name="baseline" value="{{ old('baseline') }}"
                                   class="form-input w-full @error('baseline') border-red-500 @enderror"
                                   placeholder="0.0 - 4.0" min="0" max="4">
                            @error('baseline')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Output -->
                        <div>
                            <label for="output" class="form-label">
                                <i class="fas fa-chart-line mr-2 text-blue-500"></i>Output
                            </label>
                            <input type="number" step="0.1" id="output" name="output" value="{{ old('output') }}"
                                   class="form-input w-full @error('output') border-red-500 @enderror"
                                   placeholder="0.0 - 4.0" min="0" max="4">
                            @error('output')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Outcome -->
                        <div>
                            <label for="outcome" class="form-label">
                                <i class="fas fa-chart-pie mr-2 text-blue-500"></i>Outcome
                            </label>
                            <input type="number" step="0.1" id="outcome" name="outcome" value="{{ old('outcome') }}"
                                   class="form-input w-full @error('outcome') border-red-500 @enderror"
                                   placeholder="0.0 - 4.0" min="0" max="4">
                            @error('outcome')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Impact -->
                        <div>
                            <label for="impact" class="form-label">
                                <i class="fas fa-bullseye mr-2 text-blue-500"></i>Impact
                            </label>
                            <input type="number" step="0.1" id="impact" name="impact" value="{{ old('impact') }}"
                                   class="form-input w-full @error('impact') border-red-500 @enderror"
                                   placeholder="0.0 - 4.0" min="0" max="4">
                            @error('impact')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quick Wins -->
                        <div class="md:col-span-2">
                            <label for="quick_wins" class="form-label">
                                <i class="fas fa-trophy mr-2 text-blue-500"></i>Quick Wins
                            </label>
                            <input type="number" step="0.1" id="quick_wins" name="quick_wins" value="{{ old('quick_wins') }}"
                                   class="form-input w-full @error('quick_wins') border-red-500 @enderror"
                                   placeholder="0.0 - 4.0" min="0" max="4">
                            @error('quick_wins')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.evaluasi.index') }}" class="btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn-gradient">
                            <i class="fas fa-save"></i>
                            Simpan Data Evaluasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
</x-app-layout>
