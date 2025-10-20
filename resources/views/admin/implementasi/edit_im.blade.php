<x-app-layout>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Implementasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-blue-100 min-h-screen font-sans">
  <!-- Header -->
<div class="flex justify-center px-3 md:px-9 ml-64">
    <div class="w-full max-w-[90%] bg-white shadow-sm border-b border-gray-100 rounded-t-lg">
        <div class="px-6 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">IMPLEMENTASI SMART CITY</h2>
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
    <div class="w-full max-w-[90%] h-[75vh] bg-white rounded-lg shadow-lg flex flex-col">
      <!-- Card Header -->
      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-xl font-bold">EDIT DATA IMPLEMENTASI</h2>
        <a href="{{ route('admin.implementasi.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('admin.implementasi.update', $implementasi->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
        @csrf
        @method('PUT')

        <!-- Card Body -->
        <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

          <!-- Title & Status -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
              <label class="block text-lg font-medium px-1 mb-2">JUDUL</label>
              <input id="title" type="text" name="title" value="{{ old('title', $implementasi->title) }}"
                     class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400" required>
            </div>
            <div>
              <label class="block text-lg font-medium px-1 mb-1">STATUS</label>
              <div class="flex items-center space-x-6 mt-2">
                <label class="inline-flex items-center">
                  <input type="radio" name="status" value="publish" {{ old('status', $implementasi->status) == 'publish' ? 'checked' : '' }} class="text-blue-600" required>
                  <span class="ml-2">PUBLISH</span>
                </label>
                <label class="inline-flex items-center">
                  <input type="radio" name="status" value="draft" {{ old('status', $implementasi->status) == 'draft' ? 'checked' : '' }} class="text-blue-600" required>
                  <span class="ml-2">DRAFT</span>
                </label>
              </div>
            </div>
          </div>

          <!-- Upload PDF -->
          <div>
            <label class="block text-sm font-medium mb-2">UNGGAH FILE PDF</label>
            @if($implementasi->file)
                <div class="mb-3">
                    <a href="{{ asset('storage/implemen/'.$implementasi->file) }}" target="_blank"
                       class="text-blue-600 underline">
                       {{ $implementasi->file }}
                    </a>
                    <p class="text-xs text-gray-500 mt-1">File PDF saat ini</p>
                </div>
            @endif
            <div class="w-full max-w-[100%] h-[30vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center justify-center flex flex-col items-center">
              <input id="file" type="file" name="file" accept="application/pdf" class="hidden">
              <div id="uploadArea" class="cursor-pointer flex flex-col items-center justify-center">
                <i class="fas fa-cloud-upload-alt text-center text-gray-400 text-3xl mb-2"></i>
                <p class="text-gray-500 text-lg">Klik untuk mengunggah file</p>
              </div>
              <div id="filePreview" class="hidden mt-3">
                <p class="text-sm text-green-600"></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Footer Buttons -->
        <div class="px-6 py-4 border-t flex justify-end space-x-4">
          <a href="{{ route('admin.implementasi.index') }}"
             class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">KELUAR</a>
          <button type="submit"
                  class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded">
            UPDATE
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
    const currentFile = document.getElementById('currentFile');

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
  });
</script>
</body>
</x-app-layout>
