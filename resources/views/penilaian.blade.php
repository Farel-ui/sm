<?php
$judul = "Hasil Penilaian Smart City Kota Bogor";
// contoh data dari DB (Controller)
$penilaian = [
  ["tahun" => 2020, "nilai" => 3.12],
  ["tahun" => 2021, "nilai" => 3.33],
  ["tahun" => 2022, "nilai" => 3.46],
  ["tahun" => 2023, "nilai" => 3.35],
  ["tahun" => 2024, "nilai" => 3.57],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul; ?></title>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <style>
    body { font-family: 'Poppins', sans-serif; transition: background 0.3s, color 0.3s; }
    body.dark { background: #1f2937; color: #f9fafb; }
    .award-list li:hover { transform: scale(1.02); transition: 0.3s; color: #1d4ed8; }

    /* Lightbox */
    #lightbox { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
      background: rgba(0,0,0,0.9); justify-content: center; align-items: center; z-index: 999; }
    #lightbox img { max-width: 90%; max-height: 90%; border-radius: 10px; }

    /* Back to top button */
    #backToTop {
      display: none;
      position: fixed;
      bottom: 30px;
      right: 30px;
      background: #4e73df;
      color: white;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      transition: 0.3s;
      z-index: 9999;
    }
    #backToTop:hover {
      background: #2e59d9;
      transform: scale(1.1);
    }
  </style>
</head>
<body class="bg-gray-50">

  {{-- Navbar --}}
  @include('components.navbar')

  <!-- Judul -->
  <header class="bg-gray-100 border-2 border-black px-10 py-6 text-center 
                 rounded-[90px_0_90px_0] shadow-xl w-fit mx-auto my-10">
    <h1 class="text-3xl font-bold animate__animated animate__fadeInDown">
      HASIL PENILAIAN SMART CITY KOTA BOGOR
    </h1>
  </header>

  <!-- Chart -->
  <div class="max-w-5xl h-[500px] mx-auto mb-12">
    <canvas id="myChart"></canvas>
  </div>

  <!-- Penghargaan -->
  <div class="text-center bg-gray-300 text-black font-bold text-2xl py-4 mb-8">
    10 PENGHARGAAN RATING TRANSFORMASI DIGITAL
  </div>

  <!-- Wrapper Grid -->
  <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-1 items-start">

    <!-- FOTO (Kiri) -->
    <div class="h-[500px] rounded-xl bg-white shadow-md p-4 photo-box">
      <!-- Swiper Container -->
      <div class="swiper mySwiper h-full">
        <div class="swiper-wrapper">
          <div class="swiper-slide flex justify-center items-center">
            <img src="{{ asset('images/penilaian1.jpeg') }}" 
                 class="w-full h-full object-contain rounded-lg cursor-pointer transition bg-gray" 
                 alt="Penghargaan 1">
          </div>
          <div class="swiper-slide flex justify-center items-center">
            <img src="{{ asset('images/penilaian2.jpeg') }}" 
                 class="w-full h-full object-contain rounded-lg cursor-pointer transition bg-gray" 
                 alt="Penghargaan 2">
          </div>
        </div>

        <!-- Tombol Panah -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Pagination Bulat -->
        <div class="swiper-pagination"></div>
      </div>
    </div>

    <!-- TEKS (Kanan) -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
      <div class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-6 py-4 font-bold text-xl">
        Daftar Penghargaan
      </div>
      <div class="p-6">
        <ul class="award-list space-y-3 text-lg">
          <li>1. Kota Menuju Kota Cerdas <b>(Peringkat 3)</b></li>
          <li>2. Kota Ekonomi Cerdas <b>(Peringkat 2)</b></li>
          <li>3. Kota Masyarakat Cerdas <b>(Peringkat 4)</b></li>
          <li>4. Kota Lingkungan Cerdas <b>(Peringkat 5)</b></li>
          <li>5. Kota Mobilitas Cerdas <b>(Peringkat 5)</b></li>
          <li>6. Kota Kesehatan Cerdas <b>(Peringkat 1)</b></li>
          <li>7. Kota Tangguh <b>(Peringkat 2)</b></li>
          <li>8. Kota Tanggap Perubahan Iklim <b>(Peringkat 3)</b></li>
          <li>9. Kota Energi Cerdas <b>(Peringkat 2)</b></li>
          <li>10. Kota Kesiapan Digital Terbaik <b>(Peringkat 5)</b></li>
        </ul>
      </div>
    </div>

  </div>

  <!-- Lightbox -->
  <div id="lightbox"><img src="" alt=""></div>

  <!-- Back to top -->
  <div id="backToTop">
    <i class="fa-solid fa-arrow-up"></i>
  </div>

  {{-- Footer --}}
  @include('components.footer')

  <!-- Script Chart -->
  <script>
  const labels = @json(array_column($penilaian, 'tahun'));
  const dataValues = @json(array_column($penilaian, 'nilai'));

  const ctx = document.getElementById('myChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels,
      datasets: [{
        label: 'Jumlah Penilaian',
        data: dataValues,
        backgroundColor: '#4e73df'
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
        datalabels: {
          color: '#333',
          anchor: 'end',
          align: 'top',
          font: { size: 40, weight: 'bold' }
        }
      },
      animation: {
        duration: 1000,
        easing: 'easeOutBounce',
        delay: ctx => ctx.dataIndex * 300
      },
      scales: {
        y: { beginAtZero: true, max: 5, ticks: { stepSize: 1 } }
      }
    },
    plugins: [ChartDataLabels]
  });

  // Lightbox
  const imgs = document.querySelectorAll(".photo-box img");
  const lightbox = document.getElementById("lightbox");
  const lightImg = lightbox.querySelector("img");

  imgs.forEach(img => {
    img.addEventListener("click", () => {
      lightImg.src = img.src;
      lightbox.style.display = "flex";
    });
  });

  lightbox.addEventListener("click", () => lightbox.style.display = "none");

  // Back to top
  const backToTop = document.getElementById("backToTop");
  window.addEventListener("scroll", () => {
      if (window.scrollY > 300) {
          backToTop.style.display = "flex";
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

  // Swiper init + autoplay
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 3000, // 3 detik per slide
      disableOnInteraction: false, // tetap jalan meski di klik manual
    },
    speed: 1000 // transisi geser 1 detik biar smooth
  });
  </script>

</body>
</html>
