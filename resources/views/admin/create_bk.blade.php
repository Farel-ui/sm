<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Booklet</title>
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

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
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
        <header class="bg-white shadow-sm border-b border-gray-100 slide-in">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <div class="bg-blue-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-columns text-white"></i>
                        </div>
                        Booklet Dashboard
                    </h2>
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
                <!-- Welcome Message -->
                <div class="mt-6 fade-in">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            <i class="fas fa-rocket text-blue-500 mr-2"></i>
                            Welcome to Your Booklet Dashboard
                        </h3>
                        <p class="text-gray-600">Create and manage your booklets efficiently with our streamlined interface.</p>
                    </div>
                </div>

                <!-- Card Container -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl mt-6 card-hover fade-in border border-gray-100">
                    <!-- Card Header -->
                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <div class="bg-green-500 p-2 rounded-lg mr-3">
                                    <i class="fas fa-book text-white text-sm"></i>
                                </div>
                                Add New Booklet
                            </h3>
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="text" placeholder="Search booklet..."
                                           class="pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white input-focus transition-all">
                                </div>
                                <button class="p-2.5 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-lg transition-colors">
                                    <i class="fas fa-filter"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Form Container -->
                    <div class="p-8 bg-white">
                        <form method="POST" action="{{ route('booklet.store') }}" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                                <!-- Title Field -->
                                <div class="space-y-2">
                                    <label for="title" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-heading text-blue-500 mr-2"></i>
                                        Title
                                    </label>
                                    <input type="text" id="title" name="title"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           placeholder="Enter booklet title" required>
                                    <p class="text-xs text-gray-500">Specify the title for this booklet</p>
                                </div>

                                <!-- File Field -->
                                <div class="space-y-2">
                                    <label for="file" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-file-alt text-green-500 mr-2"></i>
                                        File
                                    </label>
                                    <input type="file" id="file" name="file"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           accept=".pdf" required>
                                    <p class="text-xs text-gray-500">Upload the PDF file for this booklet</p>
                                </div>

                                <!-- Image Field -->
                                <div class="space-y-2">
                                    <label for="image" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-image text-red-500 mr-2"></i>
                                        Image
                                    </label>
                                    <input type="file" id="image" name="image"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           accept="image/*">
                                    <p class="text-xs text-gray-500">Upload an image for this booklet (optional)</p>
                                </div>

                                <!-- Submit Button -->
                                <div class="lg:col-span-2 pt-4">
                                    <button type="submit"
                                            class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-semibold rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 btn-animate shadow-lg">
                                        <i class="fas fa-save mr-2"></i>
                                        Save Booklet
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 fade-in">
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 card-hover">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <i class="fas fa-file-alt text-blue-600 text-lg"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">Total Booklets</p>
                                    <p class="text-2xl font-bold text-gray-900">0</p>
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
                                    <p class="text-sm font-medium text-gray-500">Completed</p>
                                    <p class="text-2xl font-bold text-gray-900">0</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-100 card-hover">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="bg-yellow-100 p-3 rounded-lg">
                                        <i class="fas fa-clock text-yellow-600 text-lg"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-500">In Progress</p>
                                    <p class="text-2xl font-bold text-gray-900">0</p>
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
                                    <p class="text-sm font-medium text-gray-500">This Month</p>
                                    <p class="text-2xl font-bold text-gray-900">0</p>
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

            // Add form validation
            const form = document.querySelector('form');
            const titleInput = document.getElementById('title');
            const fileInput = document.getElementById('file');
            const imageInput = document.getElementById('image');

            form.addEventListener('submit', function(e) {
                let isValid = true;

                // Reset previous error styles
                [titleInput, fileInput, imageInput].forEach(input => {
                    input.classList.remove('border-red-500', 'ring-red-500');
                });

                // Validate title
                if (!titleInput.value.trim()) {
                    titleInput.classList.add('border-red-500');
                    isValid = false;
                }

                // Validate file
                if (!fileInput.files.length) {
                    fileInput.classList.add('border-red-500');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields correctly.');
                }
            });

            // Search functionality
            const searchInput = document.querySelector('input[placeholder="Search booklet..."]');
            searchInput.addEventListener('input', function(e) {
                console.log('Searching for:', e.target.value);
                // Search functionality would be implemented here
            });
        });
    </script>
</body>
</html>
