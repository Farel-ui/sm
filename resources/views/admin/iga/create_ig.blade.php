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
    .file-input:hover {
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
            <h2 class="text-xl font-bold text-blue-700">IGA SMART CITY</h2>
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

  <section class="flex justify-center items-center px-3 md:px-9 py-6 ml-64">
    <div class="w-full max-w-[90%] h-[80vh] bg-white rounded-lg shadow-lg flex flex-col">

  <!-- Card Header -->
  <div class="bg-blue-600 text-white px-6 py-4 rounded-t-lg flex justify-between items-center">
    <h2 class="text-xl font-bold">TAMBAHKAN DATA IGA</h2>
    <a href="{{ route('admin.iga.index') }}" class="text-white hover:text-gray-200 text-xl">&times;</a>
  </div>

  <!-- Form -->
  <form action="{{ route('admin.iga.store') }}" method="POST" enctype="multipart/form-data" class="flex-1 flex flex-col">
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
        <!-- Perangkat Daerah -->
                <div>
                    <label class="block text-lg font-medium px-1 mb-2">PERANGKAT DAERAH</label>
                    <input id="institution" type="text" name="institution" placeholder="MASUKAN PERANGKAT DAERAH"
                           class="w-full border border-black rounded-xl px-3 py-3 focus:outline-none focus:ring focus:border-blue-400">
                </div>
      </div>

      <!-- Type & Status -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
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
        </div>
                <!-- Upload PDF -->
                 <div>
                    <label class="block text-sm font-medium mb-2">UNGGAH FILE</label>
            <div id="uploadContainer" class="w-full max-w-[100%] h-[25vh] border-2 border-dashed border-gray-300 rounded-lg p-8 text-center flex flex-col items-center justify-center transition-colors cursor-pointer file-input">
                <input id="image" type="file" name="image" accept="image/*" class="hidden">
                <div id="uploadArea" class="flex flex-col items-center justify-center w-full h-full">
                    <i class="fas fa-cloud-upload-alt text-center text-gray-400 text-3xl mb-2"></i>
                    <p class="text-gray-500 text-lg">Klik atau seret file di sini</p>
                    <p class="text-gray-400 text-sm mt-1">Maksimal ukuran file: 5MB</p>
                </div>
                <div id="filePreview" class="hidden mt-3">
                    <p class="text-sm text-blue-600"></p>
                </div>
            </div>
                </div>

    </div>

    <!-- Footer Tombol -->
    <div class="px-6 py-4 border-t flex justify-end space-x-4">
      <a href="{{ route('admin.iga.index') }}"
         class="bg-red-600 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded">BATAL</a>
      <button type="submit"
              class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
        SIMPAN
      </button>
    </div>
  </form>
</div>

  </section>

   <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('igaForm');
            const titleInput = document.getElementById('title');
            const institutionInput = document.getElementById('institution');
            const imageInput = document.getElementById('image');
            const uploadArea = document.getElementById('uploadArea');
            const filePreview = document.getElementById('filePreview');
            const batalBtn = document.getElementById('batalBtn');

            // Upload area click handler
            const uploadContainer = document.getElementById('uploadContainer');
            uploadContainer.addEventListener('click', () => imageInput.click());

            // Drag and drop events
            uploadContainer.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadContainer.classList.add('drag-over');
            });

            uploadContainer.addEventListener('dragleave', (e) => {
                e.preventDefault();
                uploadContainer.classList.remove('drag-over');
            });

            uploadContainer.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadContainer.classList.remove('drag-over');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFile(files[0]);
                }
            });

            // File input change handler
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    handleFile(file);
                } else {
                    // Reset to upload area
                    uploadArea.classList.remove('hidden');
                    filePreview.classList.add('hidden');
                }
            });

            function handleFile(file) {
                if (!file.type.startsWith('image/')) {
                    alert('File harus berupa gambar (JPG, PNG, dll).');
                    imageInput.value = '';
                    return;
                }

                if (file.size > 5 * 1024 * 1024) {
                    alert('Ukuran file maksimal 5MB.');
                    imageInput.value = '';
                    return;
                }

                // Create a DataTransfer to set the file
                const dt = new DataTransfer();
                dt.items.add(file);
                imageInput.files = dt.files;

                // Show file preview
                uploadArea.classList.add('hidden');
                filePreview.classList.remove('hidden');
                filePreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
            }

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

            // Form validation and submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;

                // Reset previous error states
                [titleInput, institutionInput, imageInput].forEach(input => {
                    input.classList.remove('border-red-500', 'ring-red-500');
                });

                // Validate title
                if (!titleInput.value.trim()) {
                    titleInput.classList.add('border-red-500');
                    isValid = false;
                }

                // Validate institution
                if (!institutionInput.value.trim()) {
                    institutionInput.classList.add('border-red-500');
                    isValid = false;
                }

                // Validate file upload
                if (!imageInput.value) {
                    uploadArea.parentElement.classList.add('border-red-500');
                    isValid = false;
                } else {
                    uploadArea.parentElement.classList.remove('border-red-500');
                }

                if (!isValid) {
                    alert('Harap isi semua field yang wajib diisi.');
                    return;
                }

                // Simulate form submission
                const formData = {
                    title: titleInput.value.trim(),
                    institution: institutionInput.value.trim(),
                    status: document.querySelector('input[name="status"]:checked').value,
                    image: imageInput.files[0]?.name || ''
                };

                console.log('Data yang akan dikirim:', formData);

                // Show success message
                alert('Data berhasil disimpan!');

                // Reset form
                form.reset();
                uploadArea.classList.remove('hidden');
                filePreview.classList.add('hidden');
            });

            // Cancel button handler
            batalBtn.addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin membatalkan? Data yang sudah diisi akan hilang.')) {
                    form.reset();
                    uploadArea.classList.remove('hidden');
                    filePreview.classList.add('hidden');
                }
            });

            // Close button handler
            document.querySelector('.text-xl.font-bold').addEventListener('click', function() {
                if (confirm('Apakah Anda yakin ingin menutup form ini?')) {
                    // In a real application, this would redirect or close the modal
                    window.history.back();
                }
            });
        });
    </script>
</body>
</x-app-layout>
