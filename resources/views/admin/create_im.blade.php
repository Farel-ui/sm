<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Implementasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    .drag-over {
      border-color: #3b82f6;
      background-color: #eff6ff;
    }
  </style>
</head>
<body class="bg-blue-100 min-h-screen font-sans">
  <!-- Header -->
  <header class="bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-8xl mx-5 px-2 py-6 flex justify-between items-center">
      <h2 class="text-xl font-bold text-blue-700">PROGRAM IMPLEMENTASI SMART CITY</h2>
      <div class="flex items-center space-x-4">
        <span id="tanggalSekarang" class="text-blue-600 font-semibold"></span>
        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
          <i class="fas fa-user text-blue-600"></i>
        </div>
      </div>
    </div>
  </header>

  <!-- Form Section -->
  <section class="flex justify-center items-center px-3 md:px-9 py-6">
    <div class="w-full max-w-[75%] h-[60vh] bg-white rounded-lg shadow-lg flex flex-col">
      <!-- Card Header -->
      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-xl font-bold">TAMBAHKAN DATA IMPLEMENTASI</h2>
        <a href="{{ route('implementasi') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('implementasi.store') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
        @csrf

        <!-- Card Body -->
        <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

          <!-- Title & Status -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
              <label class="block text-lg font-medium px-1 mb-2">JUDUL</label>
              <input id="title" type="text" name="title" placeholder="MASUKAN JUDUL"
                     class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400" required>
            </div>
            <div>
              <label class="block text-lg font-medium px-1 mb-1">STATUS</label>
              <div class="flex items-center space-x-6 mt-2">
                <label class="inline-flex items-center">
                  <input type="radio" name="status" value="public" class="text-blue-600" required>
                  <span class="ml-2">PUBLIC</span>
                </label>
                <label class="inline-flex items-center">
                  <input type="radio" name="status" value="draft" class="text-blue-600" required>
                  <span class="ml-2">DRAFT</span>
                </label>
              </div>
            </div>
          </div>

          <!-- Upload PDF -->
          <div>
            <label class="block text-sm font-medium mb-2">UNGGAH FILE PDF</label>
            <div class="w-full max-w-[100%] h-[82,5 vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center justify-center flex flex-col items-center transition-colors">
              <input id="file" type="file" name="file" accept="application/pdf" class="hidden" required>
              <div id="uploadArea" class="cursor-pointer flex flex-col items-center justify-center">
                <i class="fas fa-cloud-upload-alt text-center text-gray-400 text-3xl mb-2"></i>
                <p class="text-gray-500 text-lg">Klik atau seret file di sini</p>
              </div>
              <div id="filePreview" class="hidden mt-3">
                <p class="text-sm text-green-600"></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer Buttons -->
        <div class="px-6 py-4 border-t flex justify-end space-x-4">
          <a href="{{ route('implementasi') }}"
             class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">KELUAR</a>
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
            SIMPAN
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- Script Upload & Validation -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.querySelector('form');
      const titleInput = document.getElementById('title');
      const fileInput = document.getElementById('file');
      const uploadArea = document.getElementById('uploadArea');
      const filePreview = document.getElementById('filePreview');

      // Klik area upload → buka file picker
      uploadArea.addEventListener('click', () => fileInput.click());

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

      // Drag and drop events
      uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.parentElement.classList.add('drag-over');
      });

      uploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadArea.parentElement.classList.remove('drag-over');
      });

      uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.parentElement.classList.remove('drag-over');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
          handleFile(files[0]);
        }
      });

      // Preview & validasi file PDF
      fileInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
          handleFile(file);
        } else {
          filePreview.classList.add('hidden');
          uploadArea.classList.remove('hidden');
        }
      });

      function handleFile(file) {
        if (file.type !== 'application/pdf') {
          alert('File harus berupa PDF.');
          fileInput.value = '';
          return;
        }
        if (file.size > 10 * 1024 * 1024) {
          alert('Ukuran file maksimal 10MB.');
          fileInput.value = '';
          return;
        }
        // Create a DataTransfer to set the file
        const dt = new DataTransfer();
        dt.items.add(file);
        fileInput.files = dt.files;

        filePreview.classList.remove('hidden');
        filePreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
        uploadArea.classList.add('hidden');
      }

      // Validasi form saat submit
      form.addEventListener('submit', (e) => {
        let isValid = true;
        if (!titleInput.value.trim()) {
          titleInput.classList.add('border-red-500');
          isValid = false;
        } else {
          titleInput.classList.remove('border-red-500');
        }

        if (!fileInput.value) {
          alert('Harap unggah file PDF terlebih dahulu.');
          isValid = false;
        }

        if (!isValid) {
          e.preventDefault();
        }
      });
    });
  </script>
</body>
</html>
