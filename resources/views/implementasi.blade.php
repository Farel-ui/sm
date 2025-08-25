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

        /* Loader */
        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #2563eb;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: auto;
            margin-top: 50px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg);}
            100% { transform: rotate(360deg);}
        }

        /* Back to top */
        #backToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #2563eb;
            color: white;
            padding: 12px 15px;
            border-radius: 999px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            cursor: pointer;
            display: none;
            transition: all 0.3s ease;
        }
        #backToTop:hover {
            background: #1e40af;
            transform: scale(1.1);
        }

        /* Glow button */
        .btn-glow:hover {
            box-shadow: 0 0 15px rgba(59,130,246,0.7);
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

    <!-- Konten PDF + Foto -->
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
                   class="bg-white text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition flex items-center gap-2 text-sm font-medium btn-glow"
                   download>
                   <i class="fa-solid fa-download"></i> Unduh PDF
                </a>
            </div>

            <!-- Isi: PDF + Galeri -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6 bg-gray-50 relative">

                <!-- PDF -->
                <div class="md:col-span-2">
                    <!-- Loader -->
                    <div id="pdfLoader" class="loader"></div>

                    <div class="border-2 border-gray-200 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition opacity-0" id="pdfWrapper">
                        <embed 
                            src="https://pt-surabaya.go.id/wp-content/uploads/2009/02/tipilu-pn-sidoarjo.pdf" 
                            type="application/pdf"
                            class="w-full h-[500px] md:h-[800px]"
                            onload="hideLoader()"
                        />
                    </div>
                    <p class="text-sm text-gray-500 text-center mt-3">
                        Jika PDF tidak tampil, <a href="https://pt-surabaya.go.id/wp-content/uploads/2009/02/tipilu-pn-sidoarjo.pdf" target="_blank" class="text-blue-600 hover:underline">klik di sini</a> untuk membuka di tab baru.
                    </p>
                </div>

                <!-- Foto Galeri -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-gray-700 mb-2 text-center">Dokumentasi</h3>
                    <img src="https://source.unsplash.com/400x300/?city,1" alt="Dokumentasi 1" 
                        class="w-full h-40 object-cover rounded-xl shadow-md transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                    <img src="https://source.unsplash.com/400x300/?building,2" alt="Dokumentasi 2" 
                        class="w-full h-40 object-cover rounded-xl shadow-md transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                    <img src="https://source.unsplash.com/400x300/?technology,3" alt="Dokumentasi 3" 
                        class="w-full h-40 object-cover rounded-xl shadow-md transform transition duration-500 hover:scale-105 hover:shadow-2xl">
                </div>

            </div>
        </div>
    </div>

    <!-- Back to top -->
    <div id="backToTop">
        <i class="fa-solid fa-arrow-up"></i>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <!-- JS Tambahan -->
    <script>
        // Loader PDF
        function hideLoader() {
            document.getElementById("pdfLoader").style.display = "none";
            let pdf = document.getElementById("pdfWrapper");
            pdf.classList.remove("opacity-0");
            pdf.classList.add("animate__animated","animate__fadeIn");
        }

        // Back to top
        const backToTop = document.getElementById("backToTop");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                backToTop.style.display = "block";
            } else {
                backToTop.style.display = "none";
            }
        });
        backToTop.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });

        // Animasi scroll
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate__animated","animate__fadeInUp");
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll("section, .bg-white").forEach(el => observer.observe(el));
    </script>
</body>
</html>
