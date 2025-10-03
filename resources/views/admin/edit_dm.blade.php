<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Data Dimensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.svg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-blue-100 min-h-screen font-sans">

  <!-- Header -->
  <header class="bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-8xl mx-5 px-2 py-6 flex justify-between items-center">
      <h2 class="text-xl font-bold text-blue-700">DIMENSI SMART CITY</h2>
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
    <div class="w-full max-w-[75%] bg-white rounded-lg shadow-lg">
      <!-- Header -->
      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-lg font-bold uppercase">EDIT DATA DIMENSI</h2>
        <a href="{{ route('admin.dimension') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('dimension.update', $dimension->id) }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Nama Dimensi -->
          <div>
            <label for="name" class="block text-sm font-semibold mb-2 uppercase">NAMA DIMENSI</label>
            <input type="text" id="name" name="name" value="{{ old('name', $dimension->name) }}" placeholder="MASUKAN NAMA DIMENSI" required
                   class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
            @error('name')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Deskripsi -->
          <div>
            <label for="description" class="block text-sm font-semibold mb-2 uppercase">DESKRIPSI</label>
            <textarea id="description" name="description" rows="4" placeholder="Masukan deskripsi"
                      class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $dimension->description) }}</textarea>
            @error('description')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <!-- Unggah Gambar -->
        <div>
          <label for="image" class="block text-sm font-semibold mb-2 uppercase">UNGGAH GAMBAR</label>
          <input type="file" id="image" name="image" accept="image/*"
                 class="w-full border border-gray-400 border-dashed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
          <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar</p>
          @if($dimension->image)
            <div class="mb-3">
              <img src="{{ asset('images/dimension/' . $dimension->image) }}" alt="Gambar Saat Ini" class="max-h-32 rounded-lg shadow">
              <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
            </div>
          @endif
          @error('image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Unggah Video -->
        <div>
          <label for="video" class="block text-sm font-semibold mb-2 uppercase">UNGGAH VIDEO</label>
          <input type="file" id="video" name="video" accept="video/*"
                 class="w-full border border-gray-400 border-dashed rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
          <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti video</p>
          @if($dimension->video)
            <div class="mb-3">
              <video width="200" controls>
                <source src="{{ asset('storage/dimensions/videos/' . $dimension->video) }}" type="video/mp4" />
                Your browser does not support the video tag.
              </video>
              <p class="text-xs text-gray-500 mt-1">Video saat ini</p>
            </div>
          @endif
          @error('video')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
          @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-4 pt-4">
          <a href="{{ route('admin.dimension') }}"
             class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-2 rounded font-semibold">
            BATAL
          </a>
          <button type="submit"
                  class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-2 rounded font-semibold">
            UPDATE
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
      const nameInput = form.querySelector('input[name="name"]');
      const imageInput = form.querySelector('input[name="image"]');
      const descInput = form.querySelector('textarea[name="description"]');

      form.addEventListener('submit', (e) => {
        let isValid = true;

        // Reset error styles
        [nameInput, imageInput, descInput].forEach(input => {
          input.classList.remove('border-red-500', 'ring-red-500');
        });

        // Validate name
        if (!nameInput.value.trim()) {
          nameInput.classList.add('border-red-500', 'ring-red-500');
          isValid = false;
        }

        // Validate image (only if a new file is selected)
        const file = imageInput.files[0];
        if (file) {
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

        if (!isValid) {
          e.preventDefault();
          alert('Harap isi semua field yang wajib diisi dengan benar.');
        }
      });
    });
  </script>

</body>
</html>
