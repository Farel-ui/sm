<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Assessment - Dashboard</title>
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
                    <div class="flex items-center">
                        <a href="{{ route('assessment') }}" class="mr-4 p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                            <i class="fas fa-arrow-left text-lg"></i>
                        </a>
                        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                            <div class="bg-yellow-500 p-2 rounded-lg mr-3">
                                <i class="fas fa-edit text-white"></i>
                            </div>
                            Edit Assessment
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
                                <a href="{{ route('assessment') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                    <i class="fas fa-home mr-2"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                                    <a href="{{ route('assessment') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600">
                                        Assessment
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

                <!-- Card Container -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl mt-6 card-hover fade-in border border-gray-100">
                    <!-- Card Header -->
                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                                <div class="bg-orange-500 p-2 rounded-lg mr-3">
                                    <i class="fas fa-pen text-white text-sm"></i>
                                </div>
                                Edit Assessment
                            </h3>
                            <div class="flex items-center space-x-3">
                                <div class="text-sm text-gray-500 bg-gray-100 px-3 py-2 rounded-lg">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    ID: {{ $assessment->id ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Container -->
                    <div class="p-8 bg-white">
                        <form method="POST" action="{{ route('assessment.update', $assessment->id) }}" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                                <!-- Color Field -->
                                <div class="space-y-2">
                                    <label for="color" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-paint-brush text-blue-500 mr-2"></i>
                                        Color
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="text" id="color" name="color"
                                           value="{{ old('color', $assessment->color) }}"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           placeholder="Enter assessment color" required>
                                    <p class="text-xs text-gray-500">Update the color of your assessment</p>
                                    @error('color')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Score Field -->
                                <div class="space-y-2">
                                    <label for="score" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-star text-green-500 mr-2"></i>
                                        Score
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="number" id="score" name="score"
                                           value="{{ old('score', $assessment->score) }}"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           placeholder="Enter assessment score" required>
                                    <p class="text-xs text-gray-500">Specify the score for this assessment</p>
                                    @error('score')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Year Field -->
                                <div class="space-y-2">
                                    <label for="year" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-calendar text-red-500 mr-2"></i>
                                        Year
                                        <span class="text-red-500 ml-1">*</span>
                                    </label>
                                    <input type="number" id="year" name="year"
                                           value="{{ old('year', $assessment->year) }}"
                                           class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                           placeholder="e.g., 2024" required>
                                    <p class="text-xs text-gray-500">Specify the year for this assessment</p>
                                    @error('year')
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
                                                Update Assessment
                                            </button>
                                            <button type="reset"
                                                    class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                                                <i class="fas fa-undo mr-2"></i>
                                                Reset
                                            </button>
                                        </div>
                                        <div class="flex space-x-4">
                                            <a href="{{ route('assessment') }}"
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
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Informasi Assessment</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
                                <div>
                                    <span class="font-medium">Dibuat:</span>
                                    {{ isset($assessment->created_at) ? $assessment->created_at->format('d M Y H:i') : 'N/A' }}
                                </div>
                                <div>
                                    <span class="font-medium">Diupdate:</span>
                                    {{ isset($assessment->updated_at) ? $assessment->updated_at->format('d M Y H:i') : 'N/A' }}
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

            // Add form validation
            const form = document.querySelector('form');
            const colorInput = document.getElementById('color');
            const scoreInput = document.getElementById('score');
            const yearInput = document.getElementById('year');

            form.addEventListener('submit', function(e) {
                let isValid = true;

                // Reset previous error styles
                [colorInput, scoreInput, yearInput].forEach(input => {
                    input.classList.remove('border-red-500', 'ring-red-500');
                });

                // Validate color
                if (!colorInput.value.trim()) {
                    colorInput.classList.add('border-red-500');
                    isValid = false;
                }

                // Validate score
                if (!scoreInput.value.trim() || scoreInput.value < 0) {
                    scoreInput.classList.add('border-red-500');
                    isValid = false;
                }

                // Validate year
                if (!yearInput.value.trim() || yearInput.value < 1900 || yearInput.value > new Date().getFullYear()) {
                    yearInput.classList.add('border-red-500');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields correctly.');
                }
            });
        });
    </script>
</body>
</html>
