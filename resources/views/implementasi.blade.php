<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City Kota Bogor</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Efek glowing animasi */
        .glow-text {
            animation: glow 2s ease-in-out infinite alternate;
        }
        @keyframes glow {
            from { text-shadow: 0 0 10px #facc15, 0 0 20px #fbbf24, 0 0 30px #f59e0b; }
            to { text-shadow: 0 0 20px #fde047, 0 0 30px #facc15, 0 0 40px #fbbf24; }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Judul -->
    <section class="text-center py-12">
        <h2 class="text-3xl md:text-5xl font-extrabold bg-gradient-to-r from-blue-500 to-blue-700 text-transparent bg-clip-text animate__animated animate__fadeInDown">
            IMPLEMENTASI SMART CITY <span class=" text-yellow-400">KOTA BOGOR</span>
        </h2>
        <p class="mt-3 text-gray-600 text-lg animate__animated animate__fadeIn animate__delay-1s">
            Dokumen penilaian & pengembangan Smart City Kota Bogor
        </p>
    </section>

    <!-- Konten PDF -->
    <div class="max-w-6xl mx-auto px-4 pb-16">
        <div class="bg-white rounded-2xl shadow-2xl overflow-hidden animate__animated animate__fadeInUp">

            <!-- Header PDF -->
            <div class="flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-800 px-6 py-4">
                <div class="flex items-center gap-3 text-white">
                    <i class="fa-solid fa-file-pdf text-2xl"></i>
                    <div>
                        <h3 class="text-lg font-semibold">Implementasi Kota Bogor</h3>
                        <p class="text-sm opacity-80">Statistik Presen Kota Bogor </p>
                    </div>
                </div>
                <a href="" 
                   class="bg-white text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition flex items-center gap-2 text-sm font-medium"
                   download>
                   <i class="fa-solid fa-download"></i> Unduh PDF
                </a>
            </div>

            <!-- Frame PDF -->
            <div class="p-6 bg-gray-50">
                <div class="border-2 border-gray-200 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                    <embed 
                        src="https://pt-surabaya.go.id/wp-content/uploads/2009/02/tipilu-pn-sidoarjo.pdf" 
                        type="application/pdf"
                        class="w-full h-[100px] md:h-[800px]"
                    />
                </div>
                <p class="text-sm text-gray-500 text-center mt-3">
                    Jika PDF tidak tampil, <a href="https://pt-surabaya.go.id/wp-content/uploads/2009/02/tipilu-pn-sidoarjo.pdf" target="_blank" class="text-blue-600 hover:underline">klik di sini</a> untuk membuka di tab baru.
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

</body>
</html>
