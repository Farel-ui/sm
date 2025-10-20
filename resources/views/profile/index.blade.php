<x-app-layout>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="min-h-screen p-4 bg-blue-50">
    <div class="max-w-3xl mx-auto">
        <!-- Top Header -->
        <div class="bg-blue-600 text-white flex justify-end items-center px-4 py-5 rounded-b-none rounded-lg shadow-sm mb-5">
            <div class="flex items-center space-x-2 text-lg">
                <span class="font-medium">ADMIN</span>
                <div class="w-px h-9 bg-white opacity-50"></div>
                <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-xs"></i>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white shadow-md pt-16 pb-12 px-8">
            <!-- Button Group -->
            <div class="flex justify-center gap-3 mb-2">
                <a href="{{ route('profile.edit') }}" type="button" class="px-6 py-2 bg-blue-100 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-200 transition">
                    Edit Profil
                </a>
            </div>

            <div class="flex items-start gap-8">
                <!-- Avatar Section -->
                <div class="flex-shrink-0">
                    <div class="avatar-container relative" id="avatarContainer">
                        <div class="w-40 h-40 bg-gray-300 m-8 rounded-full flex items-center justify-center overflow-hidden">
                            <img id="avatarPreview"
                                src="{{ Auth::user()->avatar ? asset('images/avatar/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                                alt="Avatar"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>

                    <div class="gap-9">
                        <!-- Nama -->
                        <div>
                            <label class="block text-lg font-medium text-gray-700 mb-1 mt-4">Nama</label>
                            <p class="text-xl font-bold mb-4">{{ Auth::user()->name }}</p>
                        </div>

                        <!-- E-mail -->
                        <div>
                            <label class="block text-lg font-medium text-gray-700 mb-1">E-mail</label>
                            <p class="text-xl font-bold">{{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const avatarContainer = document.getElementById('avatarContainer');
    const avatarInput = document.getElementById('avatarInput');
    const avatarPreview = document.getElementById('avatarPreview');

    // Klik avatar → buka file picker
    avatarContainer.addEventListener('click', function() {
        avatarInput.click();
    });

    // Preview otomatis setelah memilih file
    avatarInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                avatarPreview.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});
        const editBtn = document.getElementById('editBtn');
        const submitBtn = document.getElementById('submitBtn');
        const inputs = document.querySelectorAll('#profileForm input');
        const avatarInput = document.getElementById('avatarInput');
        const avatarPreview = document.getElementById('avatarPreview');
        const avatarContainer = document.querySelector('.avatar-container');

        let editing = false;

        editBtn.addEventListener('click', () => {
            editing = !editing;
            inputs.forEach(input => {
                if (input.name !== '_token' && input.name !== '_method') {
                    input.disabled = !editing;
                }
            });
            submitBtn.disabled = !editing;
        });

        avatarContainer.addEventListener('click', () => {
            if (editing) avatarInput.click();
        });

        avatarInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    avatarPreview.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
</x-app-layout>
