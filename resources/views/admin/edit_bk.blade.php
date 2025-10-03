<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Booklet</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
      <h2 class="text-xl font-bold text-blue-700">DASHBOARD BOOKLET</h2>
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
    <div class="w-full max-w-[75%] h-[82,5vh] bg-white rounded-lg shadow-lg flex flex-col">
      <!-- Card Header -->
      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-xl font-bold">TAMBAHKAN DATA BOOKLET</h2>
        <a href="{{ route('admin.booklet') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <form action="{{ route('booklet.update', $booklet->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
    @csrf
    @method('PUT')

    <!-- Card Body -->
    <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

        <!-- Judul -->
        <div>
            <label class="block text-lg font-medium px-1 mb-2">JUDUL</label>
            <input id="title" type="text" name="title"
                   value="{{ old('title', $booklet->title) }}"
                   placeholder="MASUKAN JUDUL"
                   class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <!-- Gambar & Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Upload Gambar -->
            <div>
                <label class="block text-sm font-medium mb-2">UNGGAH GAMBAR</label>

                @if($booklet->image)
                    <div class="mb-3">
                        <img src="{{ asset('images/booklet/'.$booklet->image) }}" alt="Gambar Lama" class="w-32 h-32 object-cover rounded-lg shadow">
                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                    </div>
                @endif

                <div>
                    <label class="block text-sm font-medium mb-2">UNGGAH FILE</label>
                    <div id="uploadContainer" class="w-full max-w-[100%] h-[25vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors cursor-pointer">
                        <input id="file" type="file" name="file" accept="application/pdf" class="hidden">
                        <div id="uploadArea" class="flex flex-col items-center justify-center w-full h-full">
                            <i class="fas fa-cloud-upload-alt text-center text-gray-400 text-3xl mb-2"></i>
                            <p class="text-gray-500 text-lg">Klik atau seret file di sini</p>
                        </div>
                        <div id="filePreview" class="hidden mt-3">
                            <p class="text-sm text-green-600"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-lg font-medium px-1 mb-1">STATUS</label>
                <div class="flex items-center space-x-6 mt-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="public"
                               class="text-blue-600"
                               {{ $booklet->status == 'public' ? 'checked' : '' }}>
                        <span class="ml-2">PUBLIC</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="status" value="draft"
                               class="text-blue-600"
                               {{ $booklet->status == 'draft' ? 'checked' : '' }}>
                        <span class="ml-2">DRAFT</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Upload PDF -->
        <div>
            <label class="block text-sm font-medium mb-2">UNGGAH FILE PDF</label>

            @if($booklet->file)
                <div id="uploadContainer" class="mb-3">
                    <a href="{{ asset('pdf/booklet/'.$booklet->file) }}" target="_blank"
                       class="text-blue-600 underline">
                       {{ $booklet->file }}
                    </a>
                    <p class="text-xs text-gray-500 mt-1">File PDF saat ini</p>
                </div>
            @endif

            <div class="w-full h-[25vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors">
                <input id="file" type="file" name="file" accept="application/pdf" class="hidden">
                <div id="fileUploadArea" class="cursor-pointer flex flex-col items-center justify-center">
                    <i class="fas fa-file-pdf text-gray-400 text-3xl mb-2"></i>
                    <p class="text-gray-500 text-lg">Klik atau seret file PDF di sini</p>
                </div>
                <div id="filePreview" class="hidden mt-3">
                    <p class="text-sm text-green-600"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Tombol -->
    <div class="px-6 py-4 border-t flex justify-end space-x-4">
        <a href="{{ route('admin.booklet') }}"
           class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
        <button type="submit"
                class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded">
            UPDATE
        </button>
    </div>
</form>

    </div>
  </section>

  <!-- Script -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // 📅 Realtime Tanggal
      const tglEl = document.getElementById('tanggalSekarang');
      const bulan = ['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
      const d = new Date();
      tglEl.textContent = `${d.getDate()} ${bulan[d.getMonth()]} ${d.getFullYear()}`;

      // 🖼 Upload Gambar
      const imgInput = document.getElementById('image');
      const imgUploadArea = document.getElementById('imageUploadArea');
      const imgPreview = document.getElementById('imagePreview');

      imgUploadArea.addEventListener('click', () => imgInput.click());
      imgInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
          imgPreview.classList.remove('hidden');
          imgPreview.querySelector('p').textContent = `Gambar dipilih: ${file.name}`;
          imgUploadArea.classList.add('hidden');
        }
      });

      // 📄 Upload PDF
      const fileInput = document.getElementById('file');
      const fileUploadArea = document.getElementById('fileUploadArea');
      const filePreview = document.getElementById('filePreview');

      fileUploadArea.addEventListener('click', () => fileInput.click());

      // Drag and drop events
      fileUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUploadArea.parentElement.classList.add('drag-over');
      });

      fileUploadArea.addEventListener('dragleave', (e) => {
        e.preventDefault();
        fileUploadArea.parentElement.classList.remove('drag-over');
      });

      fileUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUploadArea.parentElement.classList.remove('drag-over');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
          handleFile(files[0]);
        }
      });

      fileInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
          handleFile(file);
        } else {
          filePreview.classList.add('hidden');
          fileUploadArea.classList.remove('hidden');
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
        fileUploadArea.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
