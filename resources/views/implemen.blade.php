<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City Kota Bogor</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Tailwind CDN + Config -->
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              footerbg: "#D6E4F0",
            }
          }
        }
      }
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Animasi & Icon -->
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

        /* Hilangin scrollbar */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;  
            scrollbar-width: none;     
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
      <div class="bg-white rounded-2xl shadow-2xl overflow-hidden animate__animated animate__fadeInUp p-6">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          
          <!-- Kolom PDF -->
          <div class="md:col-span-2">
            <!-- Header PDF -->
            <div class="flex items-center justify-between bg-gradient-to-r from-blue-500 to-blue-800 px-6 py-4 rounded-t-xl">
              <div class="flex items-center gap-3 text-white">
                <i class="fa-solid fa-file-pdf text-2xl"></i>
                <div>
                  <h3 class="text-lg font-semibold">Implementasi Kota Bogor</h3>
                  <p class="text-sm opacity-80">Statistik Presen Kota Bogor</p>
                </div>
              </div>
              <a href="" 
                class="bg-white text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-gray-100 transition flex items-center gap-2 text-sm font-medium btn-glow"
                download>
                <i class="fa-solid fa-download"></i> Unduh PDF
              </a>
            </div>

            <!-- Frame PDF -->
            <div class="p-4 bg-gray-50 relative rounded-b-xl">
              <!-- Loader -->
              <div id="pdfLoader" class="loader"></div>

              <div class="border-2 border-gray-200 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition opacity-0" id="pdfWrapper">
                <embed 
                  src="https://pt-surabaya.go.id/wp-content/uploads/2009/02/tipilu-pn-sidoarjo.pdf" 
                  type="application/pdf"
                  class="w-full h-[600px] md:h-[800px]"
                  onload="hideLoader()"
                />
              </div>
              <p class="text-sm text-gray-500 text-center mt-3">
                Jika PDF tidak tampil, 
                <a href="https://pt-surabaya.go.id/wp-content/uploads/2009/02/tipilu-pn-sidoarjo.pdf" target="_blank" class="text-blue-600 hover:underline">
                  klik di sini
                </a> untuk membuka di tab baru.
              </p>
            </div>
          </div>

          <!-- Kolom Foto -->
          <div class="relative h-[900px] md:h-[900px] overflow-y-auto no-scrollbar flex flex-col gap-4">

            <!-- Foto 1 -->
            <a href="https://nusantaranews.co/sukses-implementasi-ekonomi-hijau-gubernur-khofifah-terima-penghargaan-menteri-perindustrian-ri/" 
              target="_blank" 
              class="relative block rounded-xl shadow-lg hover:shadow-xl transition overflow-hidden">
              <img src="https://nusantaranews.co/assets/uploads/2025/08/ekonomi-1.jpg" 
                  alt="Dokumentasi 1" 
                  class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
              <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                <h4 class="text-white font-semibold text-sm">
                  Sukses Implementasi Ekonomi Hijau, Gubernur Khofifah Terima Penghargaan Menteri Perindustrian RI
                </h4>
                <p class="text-gray-200 text-xs tanggal" data-date="2025-08-23"></p>
              </div>
            </a>

            <!-- Foto 2 -->
            <a href="https://www.kabarindoraya.com/gerakan-menuju-100-smart-city-indonesia-kota-bogor-jadi-laboratorium-kota-cerdas" 
              target="_blank" 
              class="relative block rounded-xl shadow-lg hover:shadow-xl transition overflow-hidden">
              <img src="https://www.kabarindoraya.com/media/images/2024/11/11673497a17b1f5.jpeg?location=13&width=&height=&quality=90&fit=1" 
                  alt="Dokumentasi 2" 
                  class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
              <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                <h4 class="text-white font-semibold text-sm">
                  Gerakan Menuju 100 Smart City Indonesia, Kota Bogor Jadi Laboratorium Kota Cerdas
                </h4>
                <p class="text-gray-200 text-xs tanggal" data-date="2025-08-23"></p>
              </div>
            </a>

            <!-- Foto 3 -->
            <a href="https://www.kabarindoraya.com/media/images/2025/05/11682dae7e8f14d.jpeg" 
              target="_blank" 
              class="relative block rounded-xl shadow-lg hover:shadow-xl transition overflow-hidden">
              <img src="https://www.kabarindoraya.com/media/images/2025/05/11682dae7e8f14d.jpeg" 
                  alt="Dokumentasi 3" 
                  class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
              <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                <h4 class="text-white font-semibold text-sm">
                  Beri Kemudahan Untuk Masyarakat, Dedie Rachim Luncurkan “Smart One Day Service” 
                </h4>
                <p class="text-gray-200 text-xs tanggal" data-date="2025-08-23"></p>
              </div>
            </a>

            <!-- Foto 4 -->
            <a href="https://ceklissatu.com/ceklis-bogor/disdukcapil-kota-bogor-percepat-aktivasi-ikd-ini-lokasi-dan-cara-daftarnya" 
              target="_blank" 
              class="relative block rounded-xl shadow-lg hover:shadow-xl transition overflow-hidden">
              <img src="https://static.ceklissatu.com/uploads/images/202508/image_870x_68a6f95e7b3da.webp" 
                  alt="Dokumentasi 4" 
                  class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
              <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                <h4 class="text-white font-semibold text-sm">
                  Disdukcapil Kota Bogor Percepat Aktivasi IKD, Ini Lokasi dan Cara Daftarnya
                </h4>
                <p class="text-gray-200 text-xs tanggal" data-date="2025-08-23"></p>
              </div>
            </a>

            <!-- Foto 5 -->
            <a href="https://rri.co.id/bogor/iptek/445379/evaluasi-tahap-ii-implementasi-smart-city-di-pemkot-bogor" 
              target="_blank" 
              class="relative block rounded-xl shadow-lg hover:shadow-xl transition overflow-hidden">
              <img src="https://cdn.rri.co.id/berita/46/images/1700061915407-I/k25122wc8d53fa3.jpeg" 
                  alt="Dokumentasi 5" 
                  class="w-full h-48 object-cover transition-transform duration-300 hover:scale-105">
              <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/70 to-transparent px-3 py-2">
                <h4 class="text-white font-semibold text-sm">
                  Evaluasi Tahap II Implementasi Smart City di Pemkot Bogor
                </h4>
                <p class="text-gray-200 text-xs tanggal" data-date="2025-08-23"></p>
              </div>
            </a>

          </div>
        </div>
      </div>
    </div>

    <!-- Back to top -->
    <div id="backToTop">
        <i class="fa-solid fa-arrow-up"></i>
    </div>

    <!-- FOOTER -->
    <footer class="w-full bg-footerbg mt-12 rounded-t-[50px]">
        @include('components.footer')
    </footer>

    <!-- JS -->
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

        // Hitung selisih tanggal
        function timeAgo(dateStr) {
            let now = new Date();
            let date = new Date(dateStr);
            let diffMs = now - date;
            let diffDays = Math.floor(diffMs / (1000 * 60 * 60 * 24));

            if (diffDays === 0) return "Hari ini";
            if (diffDays === 1) return "Kemarin";
            if (diffDays < 30) return diffDays + " hari yang lalu";
            if (diffDays < 365) return Math.floor(diffDays / 30) + " bulan yang lalu";
            return Math.floor(diffDays / 365) + " tahun yang lalu";
        }

        document.querySelectorAll(".tanggal").forEach(el => {
            let dateStr = el.getAttribute("data-date");
            el.textContent = timeAgo(dateStr);
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
