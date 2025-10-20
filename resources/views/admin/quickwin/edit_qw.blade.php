<x-app-layout>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Quick Wins</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-blue-100 min-h-screen font-sans">

<!-- Header -->
<div class="flex justify-center px-3 md:px-9 ml-64">
    <div class="w-full max-w-[90%] bg-white shadow-sm border-b border-gray-100 rounded-t-lg">
        <div class="px-6 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">QUICK WINS SMART CITY</h2>
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
    <div class="w-full max-w-[90%] h-[80vh] bg-white rounded-lg shadow-lg">
      <!-- Header -->
      <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
        <h2 class="text-lg font-bold">EDIT DATA QUICK WINS</h2>
        <a href="{{ route('admin.quickwin.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
      </div>

      <!-- Form -->
      <form action="{{ route('admin.quickwin.update', $quickwin->id) }}" method="POST" enctype="multipart/form-data" class="px-6 py-6 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Judul -->
          <div>
            <label class="block text-sm font-semibold mb-2">JUDUL</label>
            <input type="text" name="title" value="{{ old('title', $quickwin->title) }}" placeholder="MASUKAN JUDUL" required
                   class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
          </div>

          <!-- Unggah Gambar -->
          <div>
            <label class="block text-sm font-semibold mb-2">UNGGAH GAMBAR</label>

            <input type="file" name="image" accept="image/*"
                   class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500" />
            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar</p>
            @if($quickwin->image)
              <div class="mb-3">
                <img src="{{ asset('images/quickwins/'.$quickwin->image) }}" alt="Gambar Saat Ini" class="max-h-32 rounded-lg shadow">
                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
              </div>
            @endif
          </div>
        </div>

        <!-- Status -->
        <div>
        <label class="block text-sm font-semibold mb-2">STATUS</label>
        <div class="flex items-center space-x-6">
            <label class="inline-flex items-center">
            <input type="radio" name="status" value="publish" class="text-blue-600"
                {{ old('status', $quickwin->status) === 'publish' ? 'checked' : '' }} />
            <span class="ml-2">PUBLISH</span>
            </label>
            <label class="inline-flex items-center">
            <input type="radio" name="status" value="draft" class="text-blue-600"
                {{ old('status', $quickwin->status) === 'draft' ? 'checked' : '' }} />
            <span class="ml-2">DRAFT</span>
            </label>
        </div>
        </div>

        <!-- Deskripsi -->
        <div>
        <label class="block text-sm font-semibold mb-2">DESKRIPSI</label>
        <textarea name="description" rows="4" placeholder="Tulis deskripsi di sini..." required
                    class="w-full max-w-[100%] h-[20vh] border border-gray-400 rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description', $quickwin->description) }}</textarea>
        </div>

        <!-- Tombol -->
        <div class="border-t flex justify-end space-x-4 pt-4">
        <a href="{{ route('admin.quickwin.index') }}"
            class="bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 text-white px-6 py-2 rounded font-semibold">
            BATAL
        </a>
        <button type="submit"
                class="bg-gradient-to-r from-yellow-400 to-yellow-500 hover:from-yellow-600 hover:to-yellow-600 text-white px-6 py-2 rounded font-semibold">
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
      tanggalEl.textContent = `${today.getDate()} ${namaBulan[today.getMonth()]} ${today.getFullYear()}`;
    });
  </script>

</body>
</x-app-layout>
