<x-app-layout>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Penilaian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<!-- Header -->
<div class="flex justify-center px-3 md:px-9 ml-64">
    <div class="w-full max-w-[90%] bg-white shadow-sm border-b border-gray-100 rounded-t-lg">
        <div class="px-6 py-6 flex justify-between items-center">
            <h2 class="text-xl font-bold text-blue-700">PENILAIAN SMART CITY</h2>
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
        <div class="w-full max-w-[90%] h-[60vh] bg-white rounded-lg shadow-lg flex flex-col">

            <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
                <h2 class="text-lg font-semibold">EDIT DATA PENILAIAN</h2>
                <a href="{{ route('admin.penilaian.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
            </div>

            <!-- Form -->
            <form action="{{ route('admin.penilaian.update', $penilaian->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="page" value="{{ request('page') }}" />

                <!-- Card Body -->
                <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

                    <!-- Judul & Tahun -->
                    <div class="grid grid-cols-1  gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">NILAI</label>
                            <input type="text" id="score" name="score" value="{{ old('score', $penilaian->score) }}"
                                placeholder="MASUKAN NILAI"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">TAHUN</label>
                            <input type="text" id="year" name="year" value="{{ old('year', $penilaian->year) }}"
                                placeholder="MASUKAN TAHUN"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400" />
                        </div>
                    </div>
                </div>
                <!-- Footer Tombol -->
                <div class="px-6 py-56 flex justify-end space-x-4">
                    <a href="{{ route('admin.penilaian.index') }}"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
                    <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2 rounded">
                        SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/dayjs/dayjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs/locale/id.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            dayjs.locale('id');
            const tanggal = dayjs().format(' DD MMMM YYYY');
            document.getElementById('tanggalSekarang').textContent = tanggal;
        });
    </script>
</body>
</x-app-layout>
