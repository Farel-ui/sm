<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Masterplan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-blue-50 min-h-screen font-sans">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-8xl mx-5 px-2 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">DASHBOARD MASTERPLAN</h2>
            <div class="flex items-center space-x-4">
                <span class="text-blue-600 font-semibold">10 JUNI 2021</span>
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-blue-600"></i>
                </div>
            </div>
        </div>
    </header>
  <section class="flex justify-center items-center px-3 md:px-9 py-6">
    <div class="w-full max-w-[90%] h-[80vh] bg-white rounded-lg shadow-lg flex flex-col">

  <!-- Card Header -->
  <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
    <h2 class="text-xl font-bold">TAMBAHKAN DATA MASTERPLAN</h2>
    <a href="{{ route('admin.masterplan') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
  </div>

  <!-- Form -->
  <form action="{{ route('masterplan.store') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
    @csrf

    <!-- Card Body -->
    <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

      <!-- Judul & Tahun -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-lg font-medium mb-1">JUDUL</label>
          <input id="title" type="text" name="title" placeholder="MASUKAN JUDUL"
                 class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>
        <div>
          <label class="block text-lg font-medium mb-1">TAHUN</label>
          <input id="period" type="text" name="period" placeholder="MASUKAN TAHUN"
                 class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>
      </div>

      <!-- Type & Status -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Type -->
        <select name="type" required class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
          <option value="buku">BUKU</option>
          <option value="paparan">PAPARAN</option>
        </select>
        
        <!-- Status -->
        <div class="flex items-center space-x-6 mt-2">
          <label class="inline-flex items-center">
            <input type="radio" name="status" value="public" class="text-blue-600">
            <span class="ml-2">PUBLIC</span>
          </label>
          <label class="inline-flex items-center">
            <input type="radio" name="status" value="draft" class="text-blue-600">
            <span class="ml-2">DRAFT</span>
          </label>
        </div>

      </div>

      <!-- Upload PDF -->
      <div>
        <label class="block font-medium mb-2 text-lg">UNGGAH PDF FILE</label>
        <input id="file" type="file" name="file" accept="application/pdf"
               class="w-full border rounded px-4 py-3 text-base h-14 focus:outline-none focus:ring focus:border-blue-400 cursor-pointer" />
      </div>

    </div>

    <!-- Footer Tombol -->
    <div class="px-6 py-4 border-t flex justify-end space-x-4">
      <a href="{{ route('admin.masterplan') }}"
         class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
      <button type="submit"
              class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
        SIMPAN
      </button>
    </div>
  </form>
</div>

  </section>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.querySelector('form');
      const titleInput = document.getElementById('title');
      const periodInput = document.getElementById('period');
      const fileInput = document.getElementById('file');

      form.addEventListener('submit', function(e) {
        let isValid = true;

        [titleInput, periodInput, fileInput].forEach(input => {
          input.classList.remove('border-red-500', 'ring-red-500');
        });

        if (!titleInput.value.trim()) {
          titleInput.classList.add('border-red-500');
          isValid = false;
        }

        if (!periodInput.value.trim()) {
          periodInput.classList.add('border-red-500');
          isValid = false;
        }

        if (!fileInput.value) {
          fileInput.classList.add('border-red-500');
          isValid = false;
        }

        if (!isValid) {
          e.preventDefault();
          alert('Harap isi semua field wajib.');
        }
      });

      fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
          if (file.type !== 'application/pdf') {
            alert('File harus berformat PDF.');
            e.target.value = '';
            return;
          }
          if (file.size > 10 * 1024 * 1024) {
            alert('Ukuran file maksimal 10MB.');
            e.target.value = '';
            return;
          }
        }
      });
    });
  </script>
</body>
</html>
