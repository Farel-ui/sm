<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - IGA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="icon" type="image/png" href="logo.svg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-200 min-h-screen font-sans">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-8xl mx-5 px-2 py-4 flex justify-between items-center">
            <h2 class="text-lg font-bold text-blue-600">DASHBOARD PESERTA IGA</h2>
            <div class="flex items-center space-x-4">
                <span class="text-blue-600 font-semibold">10 JUNI 2021</span>
                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <section class="flex justify-center items-center px-4 py-8">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg">
            <!-- Card Header -->
            <div class="bg-blue-600 text-white px-4 py-3 rounded-t-lg flex justify-between items-center">
                <h2 class="text-lg font-semibold">TAMBAHKAN DATA IGA</h2>
                <button class="text-white hover:text-gray-200 text-xl font-bold">&times;</button>
            </div>

            <!-- Form -->
            <form id="igaForm" class="p-4 space-y-4">
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium mb-2">JUDUL</label>
                    <input id="title" type="text" name="title" placeholder="MASUKAN JUDUL"
                           class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                </div>

                <!-- Perangkat Daerah -->
                <div>
                    <label class="block text-sm font-medium mb-2">PERANGKAT DAERAH</label>
                    <select id="institution" name="institution"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400">
                        <option value="">Pilih Perangkat Daerah</option>
                        <option value="DPMPTSP">DPMPTSP</option>
                        <option value="BPKSDM">BPKSDM</option>
                        <option value="KESRA">KESRA</option>
                        <option value="DINKES">DINKES</option>
                        <option value="BAPENDA">BAPENDA</option>
                        <option value="DINSOS">DINSOS</option>
                        <option value="DISHUB">DISHUB</option>
                        <option value="DISDUKCAPIL">DISDUKCAPIL</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium mb-2">STATUS</label>
                    <div class="flex space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="status" value="public" class="mr-2 text-blue-600" checked>
                            <span class="text-sm">PUBLIC</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="draft" class="mr-2 text-blue-600">
                            <span class="text-sm">DRAFT</span>
                        </label>
                    </div>
                </div>

                <!-- Upload File -->
                <div>
                    <label class="block text-sm font-medium mb-2">UNGGAH FILE</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                        <input id="image" type="file" name="image" accept="image/*" class="hidden">
                        <div id="uploadArea" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl mb-2"></i>
                            <p class="text-gray-500 text-sm">Klik untuk mengunggah file</p>
                        </div>
                        <div id="filePreview" class="hidden mt-3">
                            <p class="text-sm text-green-600"></p>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" id="batalBtn"
                            class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded text-sm">
                        BATAL
                    </button>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded text-sm">
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
            const institutionSelect = document.getElementById('institution');
            const imageInput = document.getElementById('image');
            const uploadArea = document.getElementById('uploadArea');
            const filePreview = document.getElementById('filePreview');
            const batalBtn = document.getElementById('batalBtn');

            // Upload area click handler
            uploadArea.addEventListener('click', function() {
                imageInput.click();
            });

            // File input change handler
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    // Validate file type
                    if (!file.type.startsWith('image/')) {
                        alert('File harus berupa gambar (JPG, PNG, dll).');
                        e.target.value = '';
                        return;
                    }

                    // Validate file size (max 5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('Ukuran file maksimal 5MB.');
                        e.target.value = '';
                        return;
                    }

                    // Show file preview
                    uploadArea.classList.add('hidden');
                    filePreview.classList.remove('hidden');
                    filePreview.querySelector('p').textContent = `File dipilih: ${file.name}`;
                } else {
                    // Reset to upload area
                    uploadArea.classList.remove('hidden');
                    filePreview.classList.add('hidden');
                }
            });

            // Form validation and submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let isValid = true;

                // Reset previous error states
                [titleInput, institutionSelect, imageInput].forEach(input => {
                    input.classList.remove('border-red-500', 'ring-red-500');
                });

                // Validate title
                if (!titleInput.value.trim()) {
                    titleInput.classList.add('border-red-500');
                    isValid = false;
                }

                // Validate institution
                if (!institutionSelect.value) {
                    institutionSelect.classList.add('border-red-500');
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
                    institution: institutionSelect.value,
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
</html>
