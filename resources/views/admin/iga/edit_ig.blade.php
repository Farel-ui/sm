<x-app-layout>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit IGA</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .drag-over {
      border-color: #3b82f6;
      background-color: #eff6ff;
    }
    .file-input:hover {
      border-color: #3b82f6;
      background-color: #eff6ff;
    }
  </style>
</head>
<body class="bg-blue-100 min-h-screen font-sans">
    <!-- Header -->
<div class="flex justify-center px-3 md:px-9 ml-64">
    <div class="w-full max-w-[90%] bg-white shadow-sm border-b border-gray-100 rounded-t-lg">
        <div class="px-6 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">IGA SMART CITY</h2>
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


  <section class="flex justify-center items-center px-3 md:px-9 py-6 ml-64">
    <div class="w-full max-w-[90%] h-[82,5vh] bg-white rounded-lg shadow-lg flex flex-col">

  <!-- Card Header -->
  <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
    <h2 class="text-xl font-bold">EDIT DATA IGA</h2>
    <a href="{{ route('admin.iga.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
  </div>

  <!-- Form Edit -->
  <form id="igaForm" action="{{ route('admin.iga.update', $iga->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
    @csrf
    @method('PUT')

    <!-- Card Body -->
    <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

      <!-- Judul & Instansi -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <div>
          <label class="block text-lg font-medium px-1 mb-2">JUDUL</label>
          <input id="title" type="text" name="title" value="{{ old('title', $iga->title) }}"
                 class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
          <label class="block text-lg font-medium px-1 mb-2">PERANGKAT DAERAH</label>
          <input id="institution" type="text" name="institution" placeholder="MASUKAN PERANGKAT DAERAH"
                 value="{{ old('institution', $iga->institution) }}"
                 class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
        </div>
      </div>

      <!-- Status -->
      <div>
        <label class="block text-lg font-medium px-1 mb-1">STATUS</label>
        <div class="flex items-center space-x-6 mt-2">
          <label class="inline-flex items-center">
            <input type="radio" name="status" value="publish" {{ $iga->status == 'publish' ? 'checked' : '' }} class="text-blue-600">
            <span class="ml-2">PUBLISH</span>
          </label>
          <label class="inline-flex items-center">
            <input type="radio" name="status" value="draft" {{ $iga->status == 'draft' ? 'checked' : '' }} class="text-blue-600">
            <span class="ml-2">DRAFT</span>
          </label>
        </div>
      </div>

      <!-- Upload Gambar -->
      <div>
        <label class="block text-sm font-medium mb-2">GAMBAR (opsional)</label>
        @if($iga->image)
                    <div class="mb-3">
                        <img src="{{ asset('images/iga/'.$iga->image) }}" alt="Gambar Lama" class="w-32 h-32 object-cover rounded-lg shadow">
                        <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                    </div>
                @endif
        <div id="uploadContainer" class="w-full max-w-[100%] h-[25vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors cursor-pointer file-input">
                <input id="image" type="file" name="image" accept="image/*" class="hidden">
                <div id="uploadArea" class="flex flex-col items-center justify-center w-full h-full">
                    <i class="fas fa-cloud-upload-alt text-center text-gray-400 text-3xl mb-2"></i>
                    <p class="text-gray-500 text-lg">Klik atau seret file di sini</p>
                    <p class="text-gray-400 text-sm mt-1">Maksimal ukuran file: 5MB</p>
                </div>
                <div id="filePreview" class="hidden mt-3">
                    <p class="text-sm text-blue-600"></p>
                </div>
            </div>
      </div>
    </div>

    <!-- Footer Tombol -->
    <div class="px-6 py-4 border-t flex justify-end space-x-4">
      <a href="{{ route('admin.iga.index') }}"
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
    document.addEventListener('DOMContentLoaded', () => {
      const imageInput = document.getElementById('image');
      const uploadContainer = document.getElementById('uploadContainer');
      const uploadArea = document.getElementById('uploadArea');
      const filePreview = document.getElementById('filePreview');

      uploadContainer.addEventListener('click', () => imageInput.click());

      uploadContainer.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadContainer.classList.add('drag-over');
      });
      uploadContainer.addEventListener('dragleave', (e) => {
        e.preventDefault();
        uploadContainer.classList.remove('drag-over');
      });
      uploadContainer.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadContainer.classList.remove('drag-over');
        const file = e.dataTransfer.files[0];
        handleFile(file);
      });

      imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        handleFile(file);
      });

      function handleFile(file) {
        if (!file) return;
        if (!file.type.startsWith('image/')) {
          alert('File harus berupa gambar');
          imageInput.value = '';
          return;
        }
        if (file.size > 5 * 1024 * 1024) {
          alert('Maksimal 5MB');
          imageInput.value = '';
          return;
        }

        uploadArea.classList.add('hidden');
        filePreview.classList.remove('hidden');
        filePreview.innerHTML = `<p class="text-sm text-blue-600">File dipilih: ${file.name}</p>`;
      }

      // Tanggal header
      const tanggalEl = document.getElementById('tanggalSekarang');
      const bulan = ['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
      const today = new Date();
      tanggalEl.textContent = `${today.getDate()} ${bulan[today.getMonth()]} ${today.getFullYear()}`;
    });
  </script>
</body>
</x-app-layout>
