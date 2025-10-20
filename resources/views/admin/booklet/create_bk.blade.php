<x-app-layout>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Booklet</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
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
<div class="flex justify-center px-3 md:px-9 ml-64">
    <div class="w-full max-w-[90%] bg-white shadow-sm border-b border-gray-100 rounded-t-lg">
        <div class="px-6 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">BOOKLET SMART CITY</h2>
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
        <h2 class="text-xl font-bold">TAMBAHKAN DATA BOOKLET</h2>
        <a href="{{ route('admin.booklet.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('admin.booklet.store') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
        @csrf

        <!-- Card Body -->
        <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

          <!-- Judul -->
          <div>
            <label class="block text-lg font-medium px-1 mb-2">JUDUL</label>
            <input id="title" type="text" name="title" placeholder="MASUKAN JUDUL"
                   class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
          </div>

          <!-- Gambar & Status -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <!-- Upload Gambar -->
            <div>
              <label class="block text-sm font-medium mb-2">UNGGAH GAMBAR</label>
              <div id="imageContainer" class="w-full h-[10vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors cursor-pointer">
                <input id="imageInput" type="file" name="image" accept="image/*" class="hidden">
                <div id="imageArea" class="flex flex-col items-center justify-center w-full h-full">
                  <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl mb-2"></i>
                  <p class="text-gray-500 text-sm">Klik atau seret gambar di sini</p>
                </div>
                <div id="imagePreview" class="hidden mt-3">
                  <p class="text-sm text-blue-600"></p>
                </div>
              </div>
            </div>

            <!-- Status -->
            <div>
              <label class="block text-lg font-medium px-1 mb-1">STATUS</label>
              <div class="flex items-center space-x-6 mt-4">
                <label class="inline-flex items-center">
                  <input type="radio" name="status" value="publish" class="text-blue-600">
                  <span class="ml-2">PUBLISH</span>
                </label>
                <label class="inline-flex items-center">
                  <input type="radio" name="status" value="draft" class="text-blue-600">
                  <span class="ml-2">DRAFT</span>
                </label>
              </div>
            </div>
          </div>

          <!-- Upload PDF -->
          <div>
              <label class="block text-sm font-medium mb-2">UNGGAH FILE PDF</label>
              <div id="pdfContainer" class="w-full h-[25vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors cursor-pointer">
                <input id="pdfInput" type="file" name="file" accept="application/pdf" class="hidden">
                <div id="pdfArea" class="cursor-pointer flex flex-col items-center justify-center">
                  <i class="fas fa-file-pdf text-gray-400 text-3xl mb-2"></i>
                  <p class="text-gray-500 text-lg">Klik atau seret file PDF di sini</p>
                </div>
                <div id="pdfPreview" class="hidden mt-3">
                  <p class="text-sm text-blue-600"></p>
                </div>
              </div>
            </div>

        <!-- Footer Tombol -->
        <div class="px-6 py-4 border-t flex justify-end space-x-4">
          <a href="{{ route('admin.booklet.index') }}"
             class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
            SIMPAN
          </button>
        </div>
      </form>
    </div>
  </section>

  <!-- Script -->
  <script>
document.addEventListener('DOMContentLoaded', () => {
  // === Realtime Tanggal ===
  const tglEl = document.getElementById('tanggalSekarang');
  const bulan = ['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
  const d = new Date();
  tglEl.textContent = `${d.getDate()} ${bulan[d.getMonth()]} ${d.getFullYear()}`;

  // === Upload Gambar ===
  const imageContainer = document.getElementById('imageContainer');
  const imageInput = document.getElementById('imageInput');
  const imageArea = document.getElementById('imageArea');
  const imagePreview = document.getElementById('imagePreview');

  // Klik
  imageArea.addEventListener('click', () => imageInput.click());
  // Pilih file
  imageInput.addEventListener('change', (e) => handleImage(e.target.files[0]));
  // Drag & Drop
  imageContainer.addEventListener('dragover', (e) => {
    e.preventDefault();
    imageContainer.classList.add('drag-over');
  });
  imageContainer.addEventListener('dragleave', (e) => {
    e.preventDefault();
    imageContainer.classList.remove('drag-over');
  });
  imageContainer.addEventListener('drop', (e) => {
    e.preventDefault();
    imageContainer.classList.remove('drag-over');
    if (e.dataTransfer.files.length > 0) {
      handleImage(e.dataTransfer.files[0]);
    }
  });

  function handleImage(file) {
    if (!file || !file.type.startsWith('image/')) {
      alert('File harus berupa gambar.');
      imageInput.value = '';
      return;
    }
    imagePreview.classList.remove('hidden');
    imagePreview.querySelector('p').textContent = `Gambar dipilih: ${file.name}`;
    imageArea.classList.add('hidden');

    const dt = new DataTransfer();
    dt.items.add(file);
    imageInput.files = dt.files;
  }

  // === Upload PDF ===
const pdfContainer = document.getElementById('pdfContainer');
const pdfInput = document.getElementById('pdfInput');
const pdfArea = document.getElementById('pdfArea');
const pdfPreview = document.getElementById('pdfPreview');

// Klik seluruh container, bukan hanya area dalam
pdfContainer.addEventListener('click', () => pdfInput.click());

// Pilih file dari file manager
pdfInput.addEventListener('change', (e) => handlePDF(e.target.files[0]));

// Drag & Drop
pdfContainer.addEventListener('dragover', (e) => {
  e.preventDefault();
  pdfContainer.classList.add('drag-over');
});
pdfContainer.addEventListener('dragleave', (e) => {
  e.preventDefault();
  pdfContainer.classList.remove('drag-over');
});
pdfContainer.addEventListener('drop', (e) => {
  e.preventDefault();
  pdfContainer.classList.remove('drag-over');
  if (e.dataTransfer.files.length > 0) {
    handlePDF(e.dataTransfer.files[0]);
  }
});

function handlePDF(file) {
  if (!file || file.type !== 'application/pdf') {
    alert('File harus berupa PDF.');
    pdfInput.value = '';
    return;
  }
  if (file.size > 10 * 1024 * 1024) {
    alert('Ukuran file maksimal 10MB.');
    pdfInput.value = '';
    return;
  }

  // Tampilkan preview nama file
  pdfPreview.classList.remove('hidden');
  pdfPreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
  pdfArea.classList.add('hidden');

  // Set file ke input agar bisa dikirim saat submit
  const dt = new DataTransfer();
  dt.items.add(file);
  pdfInput.files = dt.files;
}
});
</script>
</body>
</x-app-layout>
