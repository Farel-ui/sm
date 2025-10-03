<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Masterplan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .drag-over {
      border-color: #3b82f6;
      background-color: #eff6ff;
    }
  </style>
</head>

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

<body class="bg-blue-50 min-h-screen font-sans">
  <section class="flex justify-center items-center px-4 md:px-10 py-6">
    <div class="w-full max-w-[95%] h-[82,5vh] bg-white rounded-lg shadow-lg flex flex-col">

      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-lg font-semibold">EDIT DATA MASTERPLAN</h2>
        <a href="{{ route('admin.masterplan') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('masterplan.update', $masterplan->id) }}?page={{ request('page') }}"
            method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="hidden" name="page" value="{{ request('page') }}">

        <!-- Card Body -->
        <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

          <!-- Judul & Tahun -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-semibold mb-1">JUDUL</label>
              <input type="text" id="title" name="title"
                     value="{{ old('title', $masterplan->title) }}"
                     placeholder="MASUKAN JUDUL"
                     class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            </div>
            <div>
              <label class="block text-sm font-semibold mb-1">TAHUN</label>
              <input type="text" id="period" name="period"
                     value="{{ old('period', $masterplan->period) }}"
                     placeholder="MASUKAN TAHUN"
                     class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            </div>
          </div>

          <!-- Type & Status -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- TYPE -->
            <div>
              <label class="block text-sm font-semibold mb-1">TYPE</label>
              <select name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                <option value="buku" {{ old('type', $masterplan->type) == 'buku' ? 'selected' : '' }}>BUKU</option>
                <option value="paparan" {{ old('type', $masterplan->type) == 'paparan' ? 'selected' : '' }}>PAPARAN</option>
              </select>
            </div>

            <!-- STATUS -->
            <div class="flex items-center space-x-6 mt-2">
              <label class="inline-flex items-center">
                <input type="radio" name="status" value="public"
                       {{ old('status', $masterplan->status) == 'public' ? 'checked' : '' }}
                       class="text-blue-600">
                <span class="ml-2">PUBLIC</span>
              </label>
              <label class="inline-flex items-center">
                <input type="radio" name="status" value="draft"
                       {{ old('status', $masterplan->status) == 'draft' ? 'checked' : '' }}
                       class="text-blue-600">
                <span class="ml-2">DRAFT</span>
              </label>
            </div>
          </div>

          <!-- Upload PDF -->
        <div>
            <label class="block text-sm font-medium mb-2">UNGGAH FILE PDF</label>

            @if($masterplan->file)
                <div class="mb-3">
                    <a href="{{ asset('storage/masterplans/'.$masterplan->file) }}" target="_blank"
                       class="text-blue-600 underline">
                       {{ $masterplan->file }}
                    </a>
                    <p class="text-xs text-gray-500 mt-1">File PDF saat ini</p>
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
        </div>

        <!-- Footer Tombol -->
        <div class="px-6 py-4 flex justify-end space-x-4">
          <a href="{{ route('admin.masterplan') }}"
             class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
          <button type="submit"
                  class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded">
            UPDATE
          </button>
        </div>
      </form>
    </div>
  </section>

  <script>
    // --- Realtime tanggal ---
    const tanggalEl = document.getElementById('tanggalSekarang');
    const bulan = ['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
    const t = new Date();
    tanggalEl.textContent = `${t.getDate()} ${bulan[t.getMonth()]} ${t.getFullYear()}`;

    document.addEventListener('DOMContentLoaded', () => {
      const fileInput = document.getElementById('file');
      const uploadArea = document.getElementById('uploadArea');
      const filePreview = document.getElementById('filePreview');

      uploadArea.addEventListener('click', () => fileInput.click());

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

      fileInput.addEventListener('change', function(e) {
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
          alert('File harus berformat PDF.');
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
    });
  </script>
</body>
</html>
