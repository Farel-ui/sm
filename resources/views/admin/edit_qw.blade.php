<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit QuickWin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ route('quickwin') }}" class="mr-4 p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </a>
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <div class="bg-yellow-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-edit text-white"></i>
                        </div>
                        Edit QuickWin
                    </h2>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="pb-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
                <div class="bg-white shadow-sm rounded-xl border border-gray-100">
                    <div class="px-6 py-5 border-b border-gray-100">
                        <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                            <div class="bg-orange-500 p-2 rounded-lg mr-3">
                                <i class="fas fa-pen text-white text-sm"></i>
                            </div>
                            Edit QuickWin
                        </h3>
                    </div>

                    <div class="p-8">
                        <form method="POST" action="{{ route('quickwin.update', $quickwin->id) }}" enctype="multipart/form-data" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-heading text-blue-500 mr-2"></i> Title
                                </label>
                                <input type="text" id="title" name="title"
                                       value="{{ old('title', $quickwin->title) }}"
                                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500"
                                       placeholder="Enter quickwin title" required>
                                @error('title')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div>
                                <label for="image" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-image text-green-500 mr-2"></i> Image (Optional)
                                </label>
                                <input type="file" id="image" name="image" accept="image/*"
                                       class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg bg-gray-50">
                                @if(isset($quickwin->image) && $quickwin->image)
                                    <div class="mt-3">
                                        <img src="{{ asset('storage/quickwins/' . $quickwin->image) }}" alt="Current Image" class="w-40 rounded-lg border">
                                    </div>
                                @endif
                                @error('image')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-semibold text-gray-700">
                                    <i class="fas fa-align-left text-purple-500 mr-2"></i> Description
                                </label>
                                <textarea id="description" name="description" rows="5"
                                          class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500"
                                          placeholder="Enter description">{{ old('description', $quickwin->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Buttons -->
                            <div class="flex justify-between pt-4">
                                <button type="submit"
                                        class="inline-flex items-center px-8 py-3 border border-transparent text-sm font-semibold rounded-lg text-white bg-blue-600 hover:bg-blue-700">
                                    <i class="fas fa-save mr-2"></i>
                                    Update QuickWin
                                </button>
                                <a href="{{ route('quickwin') }}"
                                   class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-semibold rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
