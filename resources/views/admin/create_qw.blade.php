<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - QuickWin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Animations */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideIn { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        .fade-in { animation: fadeIn 0.5s ease-out; }
        .slide-in { animation: slideIn 0.6s ease-out; }

        /* Gradient background */
        .gradient-bg { background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); }

        /* Hover effects */
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); }

        /* Input focus */
        .input-focus { transition: all 0.2s ease; }
        .input-focus:focus { transform: scale(1.02); }

        /* Button animation */
        .btn-animate { position: relative; overflow: hidden; transition: all 0.3s ease; }
        .btn-animate::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.5s; }
        .btn-animate:hover::before { left: 100%; }
        .btn-animate:hover { transform: translateY(-1px); box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05); }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-100 slide-in">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 flex items-center justify-between">
                <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                    <div class="bg-blue-500 p-2 rounded-lg mr-3">
                        <i class="fas fa-bolt text-white"></i>
                    </div>
                    QuickWin Dashboard
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
        </header>

        <!-- Main Content -->
        <main class="pb-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Welcome -->
                <div class="mt-6 fade-in">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-100 rounded-xl p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">
                            <i class="fas fa-rocket text-blue-500 mr-2"></i>
                            Welcome to Your QuickWin Dashboard
                        </h3>
                        <p class="text-gray-600">Create and manage QuickWins easily with our streamlined interface.</p>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="bg-white overflow-hidden shadow-sm rounded-xl mt-6 card-hover fade-in border border-gray-100">
                    <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white flex justify-between items-center">
                        <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                            <div class="bg-green-500 p-2 rounded-lg mr-3">
                                <i class="fas fa-plus text-white text-sm"></i>
                            </div>
                            Add New QuickWin
                        </h3>
                    </div>

                    <!-- Form -->
                    <div class="p-8 bg-white">
                        <form method="POST" action="{{ route('quickwin.store') }}" enctype="multipart/form-data" class="space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                                <!-- Title -->
                                <div class="space-y-2">
                                    <label for="title" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-heading text-blue-500 mr-2"></i>
                                        Title
                                    </label>
                                    <input type="text" id="title" name="title"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                        placeholder="Enter quickwin title">
                                    <p class="text-xs text-gray-500">Give your quickwin a descriptive title</p>
                                </div>

                                <!-- Image -->
                                <div class="space-y-2">
                                    <label for="image" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-image text-green-500 mr-2"></i>
                                        Upload Image
                                    </label>
                                    <div class="relative">
                                        <input type="file" id="image" name="image" accept="image/*"
                                            class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    </div>
                                    <p class="text-xs text-gray-500 flex items-center">
                                        <i class="fas fa-info-circle mr-1"></i>
                                        Only image files are accepted. Max file size: 5MB
                                    </p>
                                </div>

                                <!-- Description -->
                                <div class="lg:col-span-2 space-y-2">
                                    <label for="description" class="block text-sm font-semibold text-gray-700 flex items-center">
                                        <i class="fas fa-align-left text-purple-500 mr-2"></i>
                                        Description
                                    </label>
                                    <textarea id="description" name="description" rows="4"
                                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 input-focus transition-all bg-white text-gray-800 placeholder-gray-400"
                                        placeholder="Enter quickwin description"></textarea>
                                    <p class="text-xs text-gray-500">Provide a short description for this quickwin</p>
                                </div>

                                <!-- Submit -->
                                <div class="lg:col-span-2 pt-4">
                                    <button type="submit"
                                        class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-semibold rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 btn-animate shadow-lg">
                                        <i class="fas fa-save mr-2"></i>
                                        Save QuickWin
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Set current date
            const now = new Date();
            document.getElementById('currentDate').textContent = now.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

            // Form validation
            const form = document.querySelector('form');
            const titleInput = document.getElementById('title');
            const imageInput = document.getElementById('image');
            const descInput = document.getElementById('description');

            form.addEventListener('submit', function(e) {
                let isValid = true;

                // Reset styles
                [titleInput, imageInput, descInput].forEach(input => {
                    input.classList.remove('border-red-500', 'ring-red-500');
                });

                // Validate title
                if (!titleInput.value.trim()) {
                    titleInput.classList.add('border-red-500');
                    isValid = false;
                }

                // Validate image
                const file = imageInput.files[0];
                if (!file) {
                    imageInput.classList.add('border-red-500');
                    isValid = false;
                } else {
                    if (!file.type.startsWith('image/')) {
                        alert('Please upload a valid image file.');
                        isValid = false;
                    }
                    if (file.size > 5 * 1024 * 1024) {
                        alert('Image size must be less than 5MB.');
                        isValid = false;
                    }
                }

                // Validate description
                if (!descInput.value.trim()) {
                    descInput.classList.add('border-red-500');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        });
    </script>
</body>
</html>
