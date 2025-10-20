<x-app-layout>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Dimensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
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
<div class="flex justify-center px-3 md:px-9 ml-64">
    <div class="w-full max-w-[90%] bg-white shadow-sm border-b border-gray-100 rounded-t-lg">
        <div class="px-6 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">DIMENSION SMART CITY</h2>
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

  <!-- Form Box -->
  <section class="flex justify-center items-center px-3 md:px-9 py-10 ml-64">
    <div class="w-full max-w-[90%] bg-white rounded-lg shadow-lg">
      <!-- Header -->
      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-lg font-bold uppercase">EDIT DATA DIMENSI</h2>
        <a href="{{ route('admin.dimension.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
<form action="{{ route('admin.dimension.update', $dimension->id) }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-6">
  @csrf
  @method('PUT')

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <!-- Kiri -->
    <div class="flex flex-col gap-6">
      <!-- Nama Dimensi -->
      <div>
        <label for="name" class="block text-sm font-semibold mb-2 uppercase">NAMA DIMENSI</label>
        <input type="text" id="name" name="name" value="{{ old('name', $dimension->name) }}" required
               class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
        @error('name')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Gambar -->
      <div>
        <label for="image" class="block text-sm font-semibold mb-2 uppercase">UNGGAH GAMBAR (Opsional)</label>
        <div id="uploadContainer" class="w-full border border-gray-400 border-dashed rounded-md px-3 py-2 cursor-pointer">
          <input type="file" id="image" name="image" accept="image/*" class="hidden" />
          <div id="uploadArea" class="flex flex-col items-center justify-center w-full h-full py-3">
            <p class="text-gray-500 text-sm text-center">Klik atau seret file gambar di sini</p>
          </div>



          <div id="filePreview" class="hidden mt-3">
            <p class="text-sm text-green-600"></p>
          </div>
        </div>
        @error('image')
          <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>
       <!-- Preview Gambar Lama -->
          @if($dimension->image)
          <div class="mt-3">
            <p class="text-sm text-gray-600 mb-1">Gambar saat ini:</p>
            <img src="{{ asset('images/dimension/'.$dimension->image) }}" alt="Preview" class="w-40 rounded shadow">
          </div>
          @endif
    </div>

    <!-- Kanan: Deskripsi -->
    <div>
      <label for="description" class="block text-sm font-semibold mb-2 uppercase">DESKRIPSI</label>
      <textarea id="description" name="description" rows="5"
                class="w-full border border-gray-400 rounded-md px-3 py-4 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $dimension->description) }}</textarea>
      @error('description')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
      @enderror
    </div>
  </div>

  <!-- Video -->
  <div>
    <label for="video" class="block text-sm font-semibold mb-2 uppercase">UNGGAH VIDEO (Opsional)</label>
    <div id="uploadVideoContainer" class="w-full h-[25vh] border-2 border-dashed border-gray-400 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors cursor-pointer">
      <input id="video" type="file" name="video" accept="video/mp4,video/avi,video/mov,video/*" class="hidden">
      <div id="uploadVideoArea" class="flex flex-col items-center justify-center w-full h-full">
        <i class="fas fa-cloud-upload-alt text-center text-gray-400 text-3xl mb-2"></i>
        <p class="text-gray-500 text-lg">Klik atau seret file video di sini</p>
      </div>
      <div id="videoPreview" class="hidden mt-3">
        <p class="text-sm text-green-600"></p>
      </div>
    </div>
    @if($dimension->video)
      <div class="mt-3">
        <p class="text-sm text-gray-600 mb-1">Video saat ini:</p>
        <video src="{{ asset('storage/dimension/'.$dimension->video) }}" controls class="w-64 rounded shadow"></video>
      </div>
    @endif
    @error('video')
      <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
  </div>

  <!-- Tombol -->
  <div class="border-t flex justify-end space-x-4 pt-4">
    <a href="{{ route('admin.dimension.index') }}"
       class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-2 rounded font-semibold">
      BATAL
    </a>
    <button type="submit"
            class="bg-gradient-to-r from-yellow-400 to-yellow-600 hover:from-yellow-500 hover:to-yellow-500 text-white px-6 py-2 rounded font-semibold">
      UPDATE
    </button>
  </div>
</form>
  </section>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const tanggalEl = document.getElementById('tanggalSekarang');
  const namaBulan = ['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
  const today = new Date();
  tanggalEl.textContent = `${today.getDate()} ${namaBulan[today.getMonth()]} ${today.getFullYear()}`;

  const uploadContainer = document.getElementById('uploadContainer');
  const imageInput = document.getElementById('image');
  const uploadArea = document.getElementById('uploadArea');
  const filePreview = document.getElementById('filePreview');
  const uploadVideoContainer = document.getElementById('uploadVideoContainer');
  const videoInput = document.getElementById('video');
  const uploadVideoArea = document.getElementById('uploadVideoArea');
  const videoPreview = document.getElementById('videoPreview');

  uploadContainer.addEventListener('click', () => imageInput.click());
  uploadContainer.addEventListener('dragover', e => { e.preventDefault(); uploadContainer.classList.add('drag-over'); });
  uploadContainer.addEventListener('dragleave', e => { e.preventDefault(); uploadContainer.classList.remove('drag-over'); });
  uploadContainer.addEventListener('drop', e => {
    e.preventDefault(); uploadContainer.classList.remove('drag-over');
    const file = e.dataTransfer.files[0]; if (file) handleFile(file);
  });
  imageInput.addEventListener('change', e => { if (e.target.files[0]) handleFile(e.target.files[0]); });

  function handleFile(file) {
    if (!file.type.startsWith('image/')) { alert('File harus gambar.'); imageInput.value = ''; return; }
    if (file.size > 5*1024*1024) { alert('Maksimal 5MB'); imageInput.value=''; return; }
    uploadArea.classList.add('hidden');
    filePreview.classList.remove('hidden');
    filePreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
  }

  // Video upload events
  uploadVideoContainer.addEventListener('click', () => videoInput.click());

  uploadVideoContainer.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadVideoContainer.classList.add('drag-over');
  });

  uploadVideoContainer.addEventListener('dragleave', (e) => {
    e.preventDefault();
    uploadVideoContainer.classList.remove('drag-over');
  });

  uploadVideoContainer.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadVideoContainer.classList.remove('drag-over');
    const files = e.dataTransfer.files;
    if (files.length > 0) {
      handleVideoFile(files[0]);
    }
  });

  videoInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
      handleVideoFile(file);
    } else {
      videoPreview.classList.add('hidden');
      uploadVideoArea.classList.remove('hidden');
    }
  });

  function handleVideoFile(file) {
    if (!file.type.startsWith('video/')) {
      alert('File harus berupa video.');
      videoInput.value = '';
      return;
    }
    if (file.size > 50 * 1024 * 1024) {
      alert('Ukuran file maksimal 50MB.');
      videoInput.value = '';
      return;
    }
    // Create a DataTransfer to set the file
    const dt = new DataTransfer();
    dt.items.add(file);
    videoInput.files = dt.files;

    videoPreview.classList.remove('hidden');
    videoPreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
    uploadVideoArea.classList.add('hidden');
  }
});
</script>
</body>
</x-app-layout>
