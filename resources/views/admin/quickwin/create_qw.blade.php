<x-app-layout>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Quick Wins</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<style>
    nav.bg-white.border-b {
        display: none !important;
    }

    .file-input:hover {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }
</style>

<!-- Header -->
<div class="flex justify-center px-3 md:px-9 ml-64">
    <div class="w-full max-w-[90%] bg-white shadow-sm border-b border-gray-100 rounded-t-lg">
        <div class="px-6 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">QUICK WINS SMART CITY</h2>
            <div class="flex items-center space-x-4">
                <span id="tanggalSekarang" class="text-blue-600 font-semibold"></span>
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
    </div>
</div>

  <!-- Form Section -->
  <section class="flex justify-center items-center px-3 md:px-9 py-6 ml-64">
    <div class="w-full max-w-[90%] h-[65,5vh] bg-white rounded-lg shadow-lg">
    <!-- Header -->
    <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-lg font-bold">TAMBAHKAN DATA QUICK WINS</h2>
        <a href="{{ route('admin.quickwin.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.quickwin.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Judul -->
        <div>
            <label class="block text-sm font-semibold mb-2">JUDUL</label>
            <input type="text" name="title" placeholder="MASUKAN JUDUL" required
                class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
        </div>

        <!-- Unggah Gambar -->
        <div class="" id="file-input">
            <label class="block text-sm font-semibold mb-2">UNGGAH GAMBAR</label>
            <div class="file-input w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500 cursor-pointer">
                <input type="file" name="image" accept="image/*" required class="hidden" />
                <div class="text-center py-2">
                    <p class="text-gray-500">Klik untuk memilih gambar</p>
                </div>
            </div>
            <p class="text-gray-400 text-sm mt-1">Maksimal ukuran file: 5MB</p>
        </div>
        </div>

        <!-- Status -->
        <div>
        <label class="block text-sm font-semibold mb-2">STATUS</label>
        <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
            <input type="radio" name="status" value="publish" class="text-blue-600" required />
            <span class="ml-2">PUBLISH</span>
            </label>
            <label class="inline-flex items-center">
            <input type="radio" name="status" value="draft" class="text-blue-600" />
            <span class="ml-2">DRAFT</span>
            </label>
        </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block text-sm font-semibold py-2 mb-2">DESKRIPSI</label>
          <textarea name="description" rows="4" placeholder="Tulis deskripsi di sini..." required
                    class="w-full max-w-[100%] h-[20vh] border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
        </div>

        <!-- Tombol -->
        <div class="px-6 py-4 border-t border-tv flex justify-end space-x-4">
          <a href="{{ route('admin.quickwin.index') }}"
             class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-2 rounded font-semibold">
            BATAL
          </a>
          <button type="submit"
                  class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded font-semibold">
            SIMPAN
          </button>
        </div>
      </form>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Set current date in header
      const tanggalEl = document.getElementById('tanggalSekarang');
      const namaBulan = [
        'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI',
        'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'
      ];
      const today = new Date();
      const tgl = today.getDate();
      const bln = namaBulan[today.getMonth()];
      const thn = today.getFullYear();
      tanggalEl.textContent = `${tgl} ${bln} ${thn}`;

      // Form validation
      const form = document.querySelector('form');
      const titleInput = form.querySelector('input[name="title"]');
      const imageInput = form.querySelector('input[name="image"]');
      const descInput = form.querySelector('textarea[name="description"]');
      const statusInputs = form.querySelectorAll('input[name="status"]');

      // Add click handler for file input
      const fileInputDiv = document.querySelector('.file-input');
      fileInputDiv.addEventListener('click', () => imageInput.click());

      form.addEventListener('submit', (e) => {
        let isValid = true;

        // Reset error styles
        [titleInput, descInput].forEach(input => {
          input.classList.remove('border-red-500', 'ring-red-500');
        });
        fileInputDiv.classList.remove('border-red-500', 'ring-red-500');

        // Validate title
        if (!titleInput.value.trim()) {
          titleInput.classList.add('border-red-500', 'ring-red-500');
          isValid = false;
        }

        // Validate image
        const file = imageInput.files[0];
        if (!file) {
          fileInputDiv.classList.add('border-red-500', 'ring-red-500');
          isValid = false;
        } else {
          if (!file.type.startsWith('image/')) {
            alert('File yang diunggah harus berupa gambar (jpg, png, dll).');
            isValid = false;
          }
          if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran gambar maksimal 5MB.');
            isValid = false;
          }
        }

        // Validate description
        if (!descInput.value.trim()) {
          descInput.classList.add('border-red-500', 'ring-red-500');
          isValid = false;
        }

        // Validate status
        let statusChecked = false;
        statusInputs.forEach(input => {
          if (input.checked) statusChecked = true;
        });
        if (!statusChecked) {
          alert('Harap pilih status publish atau draft.');
          isValid = false;
        }

        if (!isValid) {
          e.preventDefault();
          alert('Harap isi semua field yang wajib diisi dengan benar.');
        }
      });
    });
  </script>
</x-app-layout>
