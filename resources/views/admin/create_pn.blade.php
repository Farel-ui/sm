<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Penilaian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<!-- Header -->
<header class="bg-white shadow-sm border-b border-gray-100">
    <div class="max-w-8xl mx-5 px-2 py-6 flex justify-between items-center">
        <h2 class="text-xl font-bold text-blue-700">DASBOARD PENILAIAN SMART CITY</h2>
        <div class="flex items-center space-x-4">
            <span class="text-blue-600 font-semibold">
                {{ \Carbon\Carbon::now()->translatedFormat(' d F Y') }}
            </span>


            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-blue-600"></i>
            </div>
        </div>
    </div>
</header>

<body class="bg-blue-50 min-h-screen font-sans">
    <section class="flex justify-center items-center px-4 md:px-10 py-6">
        <div class="w-full max-w-[70%] h-[60vh] bg-white rounded-lg shadow-lg flex flex-col">

            <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
                <h2 class="text-lg font-semibold">EDIT DATA PENILAIAN</h2>
                <a href="{{ route('admin.penilaian') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
            </div>

            <!-- Form -->
            <form action="{{ route('penilaian.store') }}?page={{ request('page') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="page" value="{{ request('page') }}">

                <!-- Card Body -->
                <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

                    <!-- Judul & Tahun -->
                    <div class="grid grid-cols-1  gap-4">
                        <div>
                            <label class="block text-sm font-semibold mb-1">NILAI</label>
                            <input type="text" id="title" name="score" value="{{ old('score') }}"
                                placeholder="MASUKAN NILAI"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-1">TAHUN</label>
                            <input type="text" id="period" name="year" value="{{ old('year') }}"
                                placeholder="MASUKAN TAHUN"
                                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400">
                        </div>
                    </div>
                </div>
                <!-- Footer Tombol -->
                <div class="px-6 py-56 flex justify-end space-x-4">
                    <a href="{{ route('admin.penilaian') }}"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
                    <button type="submit"
                        class="bg-blue-700 hover:bg-blue-500 text-white font-semibold px-6 py-2 rounded">
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


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fileInput = document.getElementById('file');
            const uploadArea = document.getElementById('uploadArea');
            const filePreview = document.getElementById('filePreview');

            uploadArea.addEventListener('click', () => fileInput.click());

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

                    filePreview.classList.remove('hidden');
                    filePreview.querySelector('p').textContent = File dipilih: $ {
                        file.name
                    };
                    uploadArea.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
