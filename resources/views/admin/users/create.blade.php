<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah User - Admin</title>
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

        /* File input styling */
        .file-input {
            border: 2px dashed #cbd5e1;
            border-radius: 0.5rem;
            padding: 1rem;
            text-align: center;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .file-input:hover {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }

        .file-input.dragover {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }
    </style>
</head>
<body class="bg-blue-50 min-h-screen font-sans">
    <main class="pb-12 ml-64">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="bg-blue-600 text-white flex justify-between items-center px-6 py-6 rounded-lg shadow-md">
                <!-- Kiri -->
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-plus text-3xl mr-2"></i>
                    <span class="font-semibold text-xl">Tambah User Baru</span>
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
                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="form-label">
                                <i class="fas fa-user mr-2 text-blue-500"></i>Nama Lengkap
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   class="form-input w-full @error('name') border-red-500 @enderror"
                                   placeholder="Masukkan nama lengkap" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope mr-2 text-blue-500"></i>Email
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="form-input w-full @error('email') border-red-500 @enderror"
                                   placeholder="Masukkan alamat email" required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="form-label">
                                <i class="fas fa-lock mr-2 text-blue-500"></i>Password
                            </label>
                            <input type="password" id="password" name="password"
                                   class="form-input w-full @error('password') border-red-500 @enderror"
                                   placeholder="Masukkan password" required>
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="form-label">
                                <i class="fas fa-lock mr-2 text-blue-500"></i>Konfirmasi Password
                            </label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-input w-full"
                                   placeholder="Konfirmasi password" required>
                        </div>

                        <!-- Role -->
                        <div>
                            <label for="role" class="form-label">
                                <i class="fas fa-user-shield mr-2 text-blue-500"></i>Role
                            </label>
                            <select id="role" name="role"
                                    class="form-input w-full @error('role') border-red-500 @enderror" required>
                                <option value="">Pilih Role</option>
                                <option value="ADMIN" {{ old('role') == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                                <option value="SUPERADMIN" {{ old('role') == 'SUPERADMIN' ? 'selected' : '' }}>Super Admin</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Avatar -->
                        <div class="md:col-span-2">
                            <label for="avatar" class="form-label">
                                <i class="fas fa-image mr-2 text-blue-500"></i>Avatar (Opsional)
                            </label>
                            <div class="file-input" id="file-drop-zone">
                                <input type="file" id="avatar" name="avatar" accept="image/*"
                                       class="hidden" onchange="previewImage(event)">
                                <div class="text-center">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p class="text-gray-600">Klik untuk memilih gambar atau seret ke sini</p>
                                    <p class="text-sm text-gray-500">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                                <div id="image-preview" class="hidden mt-4">
                                    <img id="preview-img" src="" alt="Preview" class="max-w-xs mx-auto rounded-lg shadow-md">
                                </div>
                            </div>
                            @error('avatar')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('admin.users.index') }}" class="btn-secondary">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="btn-gradient">
                            <i class="fas fa-save"></i>
                            Simpan User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Image preview functionality
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        }

        // Drag and drop functionality
        const dropZone = document.getElementById('file-drop-zone');
        const fileInput = document.getElementById('avatar');

        dropZone.addEventListener('click', () => fileInput.click());

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                previewImage({ target: fileInput });
            }
        });

        // Password confirmation validation
        document.getElementById('password_confirmation').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;

            if (password !== confirmPassword) {
                this.setCustomValidity('Password tidak cocok');
            } else {
                this.setCustomValidity('');
            }
        });
    </script>
</body>
</html>
</x-app-layout>
