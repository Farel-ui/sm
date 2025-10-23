<x-app-layout>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    /* --- Style Tombol SweetAlert seperti Penilaian --- */
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
        justify-content: flex-end !important;
        padding: 10px 16px;
        margin: 0;
    }
</style>
</head>

<body class="min-h-screen p-4 bg-blue-50">
    <div class="ml-64">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="bg-blue-600 text-white flex justify-end items-center px-4 py-5 rounded-b-none rounded-lg shadow-sm mb-5">
            <div class="flex items-center space-x-2 text-lg">
                <span class="font-medium">ADMIN</span>
                <div class="w-px h-9 bg-white opacity-50"></div>
                    @if(Auth::user()->avatar)
            <!-- Jika user punya avatar -->
            <div class="w-10 h-10 rounded-full overflow-hidden flex items-center justify-center">
                <img
                    src="{{ asset('images/avatar/' . Auth::user()->avatar) }}"
                    alt="User Avatar"
                    class="w-full h-full object-cover">
            </div>
            @endif
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="bg-white shadow-md pt-16 pb-12 px-8">
            <div class="flex justify-center gap-3 mb-12">
                <a href="{{ route('profile.index') }}" class="px-6 py-2 bg-blue-100 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-200 transition">
                    Profil
                </a>
                <button id="deleteBtn" type="button" class="px-6 py-2 bg-blue-100 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-200 transition">
                    Hapus Avatar
                </button>
            </div>

            <!-- Form hapus avatar (hidden) -->
            <form id="delete-avatar-form"
                action="{{ route('profile.avatar.destroy') }}"
                method="POST"
                style="display:none;">
                @csrf
                @method('DELETE')
            </form>

                <!-- FORM 1: Update Profil -->
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PATCH')
            <div class="flex items-start gap-8">
                <!-- Avatar -->
                <div class="flex-shrink-0">
                    <div class="avatar-container relative cursor-pointer" id="avatarContainer">
                        <div class="w-40 h-40 bg-gray-300 m-6 rounded-full flex items-center justify-center overflow-hidden">
                            <img id="avatarPreview"
                                src="{{ Auth::user()->avatar ? asset('images/avatar/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
                                alt="Avatar"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="avatar-overlay absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 hover:opacity-100 transition">
                            <i class="fas fa-camera text-white text-2xl"></i>
                        </div>
                        <input type="file" id="avatarInput" name="avatar" accept="image/*" class="hidden">
                    </div>
                </div>

                <div class="flex-1 space-y-10">


                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                       class="w-full px-3 py-2 bg-gray-200 border-0 rounded text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                       class="w-full px-3 py-2 bg-gray-200 border-0 rounded text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="px-8 py-2 bg-blue-100 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-200 transition">
                                Simpan Profil
                            </button>
                        </div>
                    </form>

                    <!-- FORM 2: Update Password -->
                    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
                            <input type="password" name="current_password" id="update_password_current_password"
                                   class="w-full px-3 py-2 bg-gray-200 border-0 rounded text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                                <input type="password" name="password" id="update_password_password"
                                       class="w-full px-3 py-2 bg-gray-200 border-0 rounded text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="update_password_password_confirmation"
                                       class="w-full px-3 py-2 bg-gray-200 border-0 rounded text-sm focus:bg-white focus:ring-2 focus:ring-blue-500 outline-none transition">
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="px-8 py-2 bg-blue-100 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-200 transition">
                                Simpan Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const avatarInput = document.getElementById('avatarInput');
    const avatarPreview = document.getElementById('avatarPreview');
    const deleteBtn = document.getElementById('deleteBtn');

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

    // Hapus avatar pakai SweetAlert
    deleteBtn.addEventListener('click', function() {
        Swal.fire({
            html: `
                <div style="text-align: left;">
                    <h2 style="font-size: 18px; font-weight: 700; margin-bottom: 8px;">MENGHAPUS AVATAR</h2>
                    <p style="font-size: 18px; display: flex; align-items: center; gap: 6px;">
                        <i class="fas fa-trash" style="color: red; font-size: 18px;"></i>
                        Anda yakin ingin menghapus avatar tersebut!!
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
                document.getElementById('delete-avatar-form').submit();
            }
        });
    });
});
</script>

</body>
</html>
</x-app-layout>
