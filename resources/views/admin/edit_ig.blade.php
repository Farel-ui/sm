<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - IGA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-blue-100 min-h-screen font-sans">

  <!-- Header -->
  <header class="bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-8xl mx-5 px-2 py-6 flex justify-between items-center">
      <h2 class="text-xl font-bold text-blue-700">DASHBOARD IGA</h2>
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
        <h2 class="text-xl font-bold">EDIT DATA IGA</h2>
        <a href="{{ route('admin.iga') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('iga.update', $iga->id) }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col" id="igaForm">
        @csrf
        @method('PUT')

        <!-- Card Body -->
        <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

          <!-- Judul & Perangkat Daerah -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
              <label class="block text-lg font-medium px-1 mb-2">JUDUL</label>
              <input id="title" type="text" name="title"
                     value="{{ old('title', $iga->title) }}"
                     class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
            </div>

            <div>
              <label class="block text-lg font-medium px-1 mb-2">PERANGKAT DAERAH</label>
              <select id="institution" name="institution"
                      class="w-full border border-black rounded-xl px-3 py-3 text-sm focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                <option value="">Pilih Perangkat Daerah</option>
                @foreach (['DPMPTSP','BPKSDM','KESRA','DINKES','BAPENDA','DINSOS','DISHUB','DISDUKCAPIL'] as $instansi)
                  <option value="{{ $instansi }}" {{ old('institution', $iga->institution) == $instansi ? 'selected' : '' }}>{{ $instansi }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <!-- Status -->
          <div>
            <label class="block text-lg font-medium px-1 mb-1">STATUS</label>
            <div class="flex items-center space-x-6 mt-2">
              <label class="inline-flex items-center">
                <input type="radio" name="status" value="public" class="text-blue-600"
                  {{ old('status', $iga->status) == 'public' ? 'checked' : '' }}>
                <span class="ml-2">PUBLIC</span>
              </label>
              <label class="inline-flex items-center">
                <input type="radio" name="status" value="draft" class="text-blue-600"
                  {{ old('status', $iga->status) == 'draft' ? 'checked' : '' }}>
                <span class="ml-2">DRAFT</span>
              </label>
            </div>
          </div>

          <!-- Upload Gambar -->
          <div>
            <label class="block text-sm font-medium mb-2">UNGGAH GAMBAR</label>

            @if($iga->image)
              <div class="mb-3 text-left">
                <img src="{{ asset('images/iga/'.$iga->image) }}"
                     alt="Gambar Saat Ini"
                     class="max-h-40 rounded-lg shadow">
                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
              </div>
            @endif


            <div class="w-full h-[25vh] border-2 border-dashed border-gray-300 rounded-lg p-8
                        text-center flex flex-col items-center justify-center">
              <input id="image" type="file" name="image" accept="image/*" class="hidden">
              <div id="imageUploadArea" class="cursor-pointer flex flex-col items-center justify-center">
                <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-2"></i>
                <p class="text-gray-500 text-lg">Klik untuk mengganti gambar</p>
              </div>
              <div id="imagePreview" class="hidden mt-4 flex flex-col items-center">
                <img id="previewThumbnail" src="" alt="Preview Gambar" class="max-h-40 rounded-lg shadow mb-2">
                <p class="text-sm text-green-600"></p>
              </div>
            </div>
          </div>

        </div>

        <!-- Footer Tombol -->
        <div class="px-6 py-4 border-t flex justify-end space-x-4">
          <a href="{{ route('admin.iga') }}" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
          <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded">
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

    // --- Upload Gambar Preview ---
    const imageInput = document.getElementById('image');
    const imageUploadArea = document.getElementById('imageUploadArea');
    const imagePreview = document.getElementById('imagePreview');
    const previewThumbnail = document.getElementById('previewThumbnail');

    imageUploadArea.addEventListener('click', () => imageInput.click());

    imageInput.addEventListener('change', (e) => {
      const file = e.target.files[0];
      if (file) {
        if (!file.type.startsWith('image/')) {
          alert('File harus berupa gambar.');
          e.target.value = '';
          return;
        }
        if (file.size > 5 * 1024 * 1024) {
          alert('Ukuran file maksimal 5MB.');
          e.target.value = '';
          return;
        }
        const reader = new FileReader();
        reader.onload = (ev) => {
          previewThumbnail.src = ev.target.result;
          imagePreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
          imagePreview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
      } else {
        imagePreview.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
