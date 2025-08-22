<?php
// Judulnya bisa dinamis kalau mau
$judul = "Hasil Penilaian Smart City Kota Bogor";
?>

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <title><?= $judul; ?></title>
</head>
<body>
@include('components.navbar')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        background: linear-gradient(135deg, #f0f4f8, #e8f0ff);
    }

    
    header {
        background: #f0f4f8; /* warna isi background */
        border: 3px solid #000000ff; /* stroke tebal biru */
        padding: 20px 50px;
        text-align: center;
        border-radius: 90px 0px 90px 0px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        margin: 30px auto;
        margin-left: 50px;
        width: fit-content; /* lebar menyesuaikan teks */
    }
    h1 {
        font-size: 2.2em;
        font-weight: 700;
        color: #000000ff;
        margin: 0;
    }

    .header-box {
            background-color: #d9d9d9; /* abu-abu */
            color: #000;
            font-weight: bold;
            text-align: center;
            padding: 12px 20px;
            font-size: 40px;
            margin: 20px auto;
    }

    .title-box {
        display: inline-block;
        background: white;
        border: 2px solid #2196f3; /* warna biru garis */
        border-top-left-radius: 0;
        border-top-right-radius: 40px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        padding: 8px 20px;
        font-weight: bold;
        color: #000;
        font-size: 18px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .chart-container {
        width: 900px;
        height: 500px;
        margin: 60px auto;
    }

    .name {
        text-align: center;
        font-size: 1.5em;
        font-weight: bold;
        color: #000000ff;
        margin-top: 20px;
    }

        .image-row {
            display: flex;
            justify-content: center;
            gap: 70px;
            margin-top: 60px;
            flex-wrap: wrap;
        }
        .image-row img {
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

    .award-list {
        font-size: 1rem;
        line-height: 1.6;
        padding-left: 250px;
        margin-top: 20px;
    }

    .award-list li {
        margin-bottom: 6px;
    }

    @media (max-width: 600px) {
        .images img {
            max-width: 100%;
        }
        .award-list {
            font-size: 0.95rem;
        }
    }

    
</style>
    </head>

    <header>
    <h1>
        HASIL PENILAIAN SMART CITY KOTA BOGOR
    </h1>
</header>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2020', '2021', '2022', '2023', '2024'],
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: ['3.12', '3.33', '3.46', '3.35', '3.57'],
                    backgroundColor: '#4e73df',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: {
                        color: '#147bcfff',
                        anchor: 'end',
                        align: 'top',
                        font: {
                            size: 45,
                            weight: 'bold'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,       // ✅ Nilai awal sumbu Y
                        max: 5,      // ✅ Nilai maksimal sumbu Y
                        ticks: {
                            stepSize: 1, // ✅ Jarak antar angka
                            font: {
                                size: 18
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 25
                            }
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

<div class="header-box">
    10 PENGHARGAAN RATING TRANSFORMASI DIGITAL
</div>

<!-- Wrapper untuk layout 2 kolom -->
<div class="max-w-6xl mx-auto mt-10 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
  
<!-- Kolom Foto Penghargaan -->
<div class="photo-box">
  <div class="photo-list">
    <img src="{{ asset('images/penilaian1.jpeg') }}" alt="Penghargaan 1">
    <img src="{{ asset('images/penilaian2.jpeg') }}" alt="Penghargaan 1">
  </div>
</div>

<style>
  /* Box scrollable */
  .photo-box {
    width: 100%;
    height: 570px;          /* tinggi box */
    overflow-y: auto;       /* bisa discroll */
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    background: #fff;
  }

  /* Hilangin scrollbar */
  .photo-box::-webkit-scrollbar {
    display: none;
  }
  .photo-box {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  /* Container gambar */
  .photo-list {
    display: flex;
    flex-direction: column;
    gap: 12px;
    padding: 12px;
  }
  
</style>


<!-- Tambahin CSS ini -->
<style>
  /* Hilangkan scrollbar di semua browser */
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hide {
    -ms-overflow-style: none;  /* IE & Edge */
    scrollbar-width: none;     /* Firefox */
  }
</style>





  <!-- Daftar Penghargaan -->
  <div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-gray-600 to-gray-700 text-white px-6 py-4 font-bold text-xl">
      Daftar Penghargaan
    </div>
    <div class="p-6">
      <ul class="space-y-3 text-lg">
        <li class="flex justify-between border-b pb-2">
          <span>1. Kota Menuju Kota Cerdas</span>
          <span class="font-bold text-blue-700">(Peringkat 3)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>2. Kota Ekonomi Cerdas</span>
          <span class="font-bold text-green-700">(Peringkat 2)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>3. Kota Masyarakat Cerdas</span>
          <span class="font-bold text-purple-700">(Peringkat 4)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>4. Kota Lingkungan Cerdas</span>
          <span class="font-bold text-green-900">(Peringkat 5)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>5. Kota Mobilitas Cerdas</span>
          <span class="font-bold text-indigo-700">(Peringkat 5)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>6. Kota Kesehatan Cerdas</span>
          <span class="font-bold text-red-700">(Peringkat 1)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>7. Kota Tangguh</span>
          <span class="font-bold text-yellow-700">(Peringkat 2)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>8. Kota Tanggap Perubahan Iklim</span>
          <span class="font-bold text-teal-700">(Peringkat 3)</span>
        </li>
        <li class="flex justify-between border-b pb-2">
          <span>9. Kota Energi Cerdas</span>
          <span class="font-bold text-orange-700">(Peringkat 2)</span>
        </li>
        <li class="flex justify-between">
          <span>10. Kota Kesiapan Digital Terbaik</span>
          <span class="font-bold text-pink-700">(Peringkat 5)</span>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Script Slideshow -->
<script>
  let slideIndex = 0;
  const slides = document.querySelector(".slideshow");
  const totalSlides = slides.children.length;

  function showSlides() {
    slideIndex++;
    if (slideIndex >= totalSlides) slideIndex = 0;
    slides.style.transform = `translateX(-${slideIndex * 100}%)`;
  }

  setInterval(showSlides, 3000); // Ganti slide tiap 3 detik
</script>



    @include('components.footer')
</div>
</body>
</html>