<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Masterplan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-blue-50 min-h-screen font-sans">
  <section class="flex justify-center items-center px-4 md:px-10 py-6">
    <div class="w-full max-w-[95%] h-[85vh] bg-white rounded-lg shadow-lg flex flex-col">

  <!-- Card Header -->
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
          <input type="text" id="title" name="title" value="{{ old('title', $masterplan->title) }}" placeholder="MASUKAN JUDUL"
                 class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">TAHUN</label>
          <input type="text" id="period" name="period" value="{{ old('period', $masterplan->period) }}" placeholder="MASUKAN TAHUN"
                 class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
        </div>
      </div>

      <!-- Type & Status -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold mb-1">TYPE</label>
          <select name="type" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
            <option value="buku" {{ old('type', $masterplan->type) == 'buku' ? 'selected' : '' }}>BUKU</option>
            <option value="paparan" {{ old('type', $masterplan->type) == 'paparan' ? 'selected' : '' }}>PAPARAN</option>
          </select>
        </div>

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
        <label class="block font-medium mb-2 text-lg">UNGGAH PDF FILE (Kosongkan jika tidak diganti)</label>
        <input type="file" id="file" name="file" accept="application/pdf"
               class="w-full border rounded px-4 py-3 text-base h-14 focus:outline-none focus:ring focus:border-blue-400 cursor-pointer" />
        @if($masterplan->file)
          <p class="text-sm text-gray-500 mt-2">
            File saat ini:
            <a href="{{ asset('storage/'.$masterplan->file) }}" target="_blank" class="text-blue-600 underline">Lihat PDF</a>
          </p>
        @endif
      </div>

    </div>

    <!-- Footer Tombol -->
    <div class="px-6 py-4  flex justify-end space-x-4">
      <a href="{{ route('admin.masterplan') }}"
         class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
      <button type="submit"
              class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
        UPDATE
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

        [titleInput, periodInput].forEach(input => {
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

        if (!isValid) {
          e.preventDefault();
          alert('Harap isi semua field wajib.');
        }
      });

      if (fileInput) {
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
      }
    });
  </script>
</body>
</html>
