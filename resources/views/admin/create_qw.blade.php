<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Data Quick Wins</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-blue-100 min-h-screen font-sans">

  <!-- Header -->
  <header class="bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-8xl mx-5 px-2 py-6 flex justify-between items-center">
      <h2 class="text-xl font-bold text-blue-700">QUICK WINS SMART CITY</h2>
      <div class="flex items-center space-x-4">
        <span id="tanggalSekarang" class="text-blue-600 font-semibold"></span>
        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
          <i class="fas fa-user text-blue-600"></i>
        </div>
      </div>
    </div>
  </header>

  <!-- Form Box -->
  <section class="flex justify-center items-center px-3 md:px-9 py-10">
    <div class="w-full max-w-[75%] h-[60vh] bg-white rounded-lg shadow-lg">
      <!-- Header -->
      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-lg font-bold">TAMBAHKAN DATA QUICK WINS</h2>
        <a href="{{ route('admin.quickwin') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('quickwin.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Judul -->
          <div>
            <label class="block text-sm font-semibold mb-2">JUDUL</label>
            <input type="text" name="title" placeholder="MASUKAN JUDUL" required
                   class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
          </div>

          <!-- Unggah Gambar -->
          <div>
            <label class="block text-sm font-semibold mb-2">UNGGAH GAMBAR</label>
            <input type="file" name="image" accept="image/*" required
                   class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
          </div>
        </div>

        <!-- Status -->
        <div>
          <label class="block text-sm font-semibold mb-2">STATUS</label>
          <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
              <input type="radio" name="status" value="public" class="text-blue-600" required />
              <span class="ml-2">PUBLIC</span>
            </label>
            <label class="inline-flex items-center">
              <input type="radio" name="status" value="draft" class="text-blue-600" />
              <span class="ml-2">DRAFT</span>
            </label>
          </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block text-sm font-semibold mb-2">DESKRIPSI</label>
          <textarea name="description" rows="4" placeholder="Tulis deskripsi di sini..." required
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500"></textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end space-x-4 pt-4">
          <a href="{{ route('admin.quickwin') }}"
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

      form.addEventListener('submit', (e) => {
        let isValid = true;

        // Reset error styles
        [titleInput, imageInput, descInput].forEach(input => {
          input.classList.remove('border-red-500', 'ring-red-500');
        });

        // Validate title
        if (!titleInput.value.trim()) {
          titleInput.classList.add('border-red-500', 'ring-red-500');
          isValid = false;
        }

        // Validate image
        const file = imageInput.files[0];
        if (!file) {
          imageInput.classList.add('border-red-500', 'ring-red-500');
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

</body>
</html>
