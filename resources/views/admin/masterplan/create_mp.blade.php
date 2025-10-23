    <x-app-layout>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Masterplan</title>
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
                <h2 class="text-xl font-bold text-blue-700">MASTERPLAN SMART CITY</h2>
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
        <div class="w-full max-w-[90%] h-[80vh] bg-white rounded-lg shadow-lg flex flex-col">
        <!-- Card Header -->
        <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
            <h2 class="text-xl font-bold">TAMBAHKAN DATA MASTERPLAN</h2>
            <a href="{{ route('admin.masterplan.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
        </div>

        <!-- Form -->
        <form action="{{ route('admin.masterplan.store') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
            @csrf

            <!-- Card Body -->
            <div class="flex-1 overflow-y-auto px-6 py-10 space-y-6">

            <!-- Judul & Tahun -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div>
                <label class="block text-lg font-medium px-1 mb-2">JUDUL</label>
                <input id="title" type="text" name="title" placeholder="MASUKAN JUDUL"
                        class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
                </div>
                <div>
                <label class="block text-lg font-medium px-1 mb-2">TAHUN</label>
                <input id="period" type="text" name="period" placeholder="MASUKAN TAHUN"
                        class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
                </div>
            </div>

            <!-- Tanggal & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Tanggal -->
                <div>
                <label class="block text-lg font-medium px-1 mb-1">KATEGORI</label>
                <select name="type" required
                       class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
                       <option value="buku">BUKU</option>
                    <option value="paparan">PAPARAN</option>
                </select>
                </div>

                <!-- Status -->
                <div>
                <label class="block text-lg font-medium px-1 mb-1">STATUS</label>
                <div class="flex items-center space-x-6 mt-2">
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
                <div>
        <label class="block text-lg font-medium px-1 mb-1">Tanggal</label>
        <input type="date" name="tanggal"
            class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400"
            value="{{ old('tanggal') }}">
    </div>
            </div>

            <!-- Upload PDF -->
                   <div>
  <label class="block text-sm font-medium mb-2">UNGGAH FILE</label>
  <div id="uploadContainer" class="w-full max-w-[100%] h-[25vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors cursor-pointer">
    <input id="file" type="file" name="file" accept="application/pdf" class="hidden">
    <div id="uploadArea" class="flex flex-col items-center justify-center w-full h-full">
      <i class="fas fa-cloud-upload-alt text-center text-gray-400 text-3xl mb-2"></i>
      <p class="text-gray-500 text-lg">Klik atau seret file di sini</p>
    </div>
    <div id="filePreview" class="hidden mt-3">
      <p class="text-sm text-green-600"></p>
    </div>
  </div>
</div>

            </div>

            <!-- Footer Tombol -->
            <div class="px-6 py-4 border-t border-tv flex justify-end space-x-4">
            <a href="{{ route('admin.masterplan.index') }}"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                SIMPAN
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
        const periodInput = document.getElementById('period');
        const fileInput = document.getElementById('file');
        const uploadArea = document.getElementById('uploadArea');
        const filePreview = document.getElementById('filePreview');

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

        // Drag and drop events
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.parentElement.classList.add('drag-over');
        });

        uploadArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            uploadArea.parentElement.classList.remove('drag-over');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.parentElement.classList.remove('drag-over');
            const files = e.dataTransfer.files;
            if (files.length > 0) {
            handleFile(files[0]);
            }
        });

        // Preview & validasi file PDF
        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
            handleFile(file);
            } else {
            filePreview.classList.add('hidden');
            uploadArea.classList.remove('hidden');
            }
        });

        function handleFile(file) {
            if (file.type !== 'application/pdf') {
            alert('File harus berupa PDF.');
            fileInput.value = '';
            return;
            }
            if (file.size > 10 * 1024 * 1024) {
            alert('Ukuran file maksimal 10MB.');
            fileInput.value = '';
            return;
            }
            // Create a DataTransfer to set the file
            const dt = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;

            filePreview.classList.remove('hidden');
            filePreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
            uploadArea.classList.add('hidden');
        }

        // Validasi form saat submit
        form.addEventListener('submit', (e) => {
            let isValid = true;
            [titleInput, periodInput].forEach(input => {
            input.classList.remove('border-red-500');
            if (!input.value.trim()) {
                input.classList.add('border-red-500');
                isValid = false;
            }
            });

            if (!fileInput.value) {
            alert('Harap unggah file PDF terlebih dahulu.');
            isValid = false;
            }

            if (!isValid) {
            e.preventDefault();
            }
        });
        });
    </script>
    </body>
    </x-app-layout>
