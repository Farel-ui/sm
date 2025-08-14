<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Iga - Dashboard</title>
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

        /* Subtle animation for elements */
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Input focus effects */
        .input-focus {
            transition: all 0.2s ease;
        }

        .input-focus:focus {
            transform: scale(1.02);
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
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-100 fade-in">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="{{ route('iga') }}" class="mr-4 p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fas fa-arrow-left text-lg"></i>
                        </a>
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <div class="bg-yellow-500 p-2 rounded-lg mr-3">
                                <i class="fas fa-edit text-white"></i>
                            </div>
                            Edit Iga
                        </h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            <span id="currentDate"></span>
                        </div>
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-gray-600 text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="pb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Breadcrumb -->
                <div class="mt-6 fade-in">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{ route('iga') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                    <i class="fas fa-home mr-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                    <a href="{{ route('iga') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600">
                                        Iga
                                    </a>
                                </div>
                            </li>
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                    <span class="ml-1 text-sm font-medium text-gray-500">Edit</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <!-- Current File Info -->
                @if(isset($iga->image) && $iga->image)
                <div class="mt-6 fade-in">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <i class="fas fa-image text-blue-600 text-lg"></i>
                                </div>
                            </div>
                            <div class="ml-4 flex-1">
                                <h3 class="text-lg font-semibold text-blue-900 mb-2">Image Saat Ini</h3>
                                <p class="text-blue-700 mb-3">{{ $iga->image }}</p>
                                <div class="flex space-x-3">
                                    <a href="{{ asset('storage/igas/' . $iga->image) }}" target="_blank"
                                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                                        <i class="fas fa-eye mr-2"></i>
                                        Lihat Gambar
                                    </a>
                                    <a href="{{ asset('storage/igas/' . $iga->image) }}" download
                                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-lg hover:bg-green-700 transition-colors">
                                        <i class="fas fa-download mr-2"></i>
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Card Container -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl mt-6 card-hover fade-in border border-gray-100">
                    <!-- Card Header -->
                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <div class="bg-orange-500 p-2 rounded-lg mr-3">
                                    <i class="fas fa-pen text-white text-sm"></i>
                                </div>
                                Edit Iga
                            </h3>
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" placeholder="Search iga..."
                                           class="pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white input-focus transition-all">
                                </div>
                                <div class="text-sm text-gray-500 bg-gray-100 px-3 py-2 rounded-lg">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    ID: {{ $iga->id ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Container -->
                    <div class="p-8 bg-white">
                        <form method="POST" action="{{ route('iga.update', $iga->id) }}" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                          

                            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                                <!-- Title Field -->
                                <div class="space-y-2">
                                    <label for="title" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-heading text-blue-500 mr-2"></i>
                                        Title
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="text" id="title" name="title"
                                           value="{{ old('title', $iga->title) }}"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           placeholder="Enter iga title" required>
                                    <p class="text-xs text-gray-500">Update the title of your iga</p>
                                    @error('title')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Institution Field -->
                                <div class="space-y-2">
                                    <label for="institution" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-building text-green-500 mr-2"></i>
                                        Institution
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="text" id="institution" name="institution"
                                           value="{{ old('institution', $iga->institution) }}"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           placeholder="Enter institution name" required>
                                    <p class="text-xs text-gray-500">Specify the institution related to this iga</p>
                                    @error('institution')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="lg:col-span-2 space-y-2">
                                    <label for="image" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-image text-red-500 mr-2"></i>
                                        Update Image (Optional)
                                    </label>
                                    <div class="relative">
                                        <input type="file" id="image" name="image" accept="image/*"
                                               class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    </div>
                                    <p class="text-xs text-gray-500 flex items-center">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Leave empty to keep current image. Only image files are accepted. Max file size: 10MB
                                    </p>
                                    @error('image')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Action Buttons -->
                                <div class="lg:col-span-2 pt-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex space-x-4">
                                            <button type="submit"
                                                    class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-semibold rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 btn-animate shadow-lg">
                                                <i class="fas fa-save mr-2"></i>
                                                Update Iga
                                            </button>
                                            <button type="reset"
                                                    class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                                                <i class="fas fa-undo mr-2"></i>
                                                Reset
                                            </button>
                                        </div>
                                        <div class="flex space-x-4">
                                            <a href="{{ route('iga') }}"
                                               class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                                                <i class="fas fa-times mr-2"></i>
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Additional Info Card -->
                <div class="mt-6 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl p-6 fade-in">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="bg-gray-200 p-3 rounded-lg">
                                <i class="fas fa-info-circle text-gray-600 text-lg"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Iga</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-medium">Dibuat:</span>
                                    {{ isset($iga->created_at) ? $iga->created_at->format('d M Y H:i') : 'N/A' }}
                                </div>
                                <div>
                                    <span class="font-medium">Diupdate:</span>
                                    {{ isset($iga->updated_at) ? $iga->updated_at->format('d M Y H:i') : 'N/A' }}
                                </div>
                                <div>
                                    <span class="font-medium">Status:</span>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Active
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Set current date
        document.addEventListener('DOMContentLoaded', () => {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('currentDate').textContent = now.toLocaleDateString('en-US', options);
        });
    </script>
</body>
</html>
