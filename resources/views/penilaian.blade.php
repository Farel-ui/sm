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

<!-- Foto Penghargaan -->
<div class="image-row">
    <img src="{{ asset('images/penilaian1.jpeg') }}" alt="Penghargaan 1">
    <img src="{{ asset('images/penilaian2.jpeg') }}" alt="Penghargaan 2">
</div>

<!-- Daftar Penghargaan -->
<section class="max-w-2xl mx-auto mt-10">
  <details
    class="group bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl shadow-lg overflow-hidden transition"
  >
    <summary
      class="flex items-center justify-between px-10 py-3 cursor-pointer select-none font-semibold text-lg group-open:bg-gray-700 transition"
    >
      <span>Lihat Semua Penghargaan</span>
      <svg
        class="w-5 h-5 transform transition-transform duration-300 group-open:rotate-180"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        viewBox="0 0 24 24"
      >
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
      </svg>
    </summary>

    <div class="bg-white text-gray-800 px-6 py-4">
      <ol class="list-decimal list-inside space-y-2">
        <li>Kategori Kota Menuju Kota Cerdas <span class="font-bold text-blue-700">(Peringkat 3)</span></li>
        <li>Kategori Kota Ekonomi Cerdas <span class="font-bold text-green-700">(Peringkat 2)</span></li>
        <li>Kategori Kota Masyarakat Cerdas <span class="font-bold text-purple-700">(Peringkat 4)</span></li>
        <li>Kategori Kota Lingkungan Cerdas <span class="font-bold text-green-900">(Peringkat 5)</span></li>
        <li>Kategori Kota Mobilitas Cerdas <span class="font-bold text-indigo-700">(Peringkat 5)</span></li>
        <li>Kategori Kota Kesehatan Cerdas <span class="font-bold text-red-700">(Peringkat 1)</span></li>
        <li>Kategori Kota Tangguh <span class="font-bold text-yellow-700">(Peringkat 2)</span></li>
        <li>Kategori Kota Tanggap Perubahan Iklim <span class="font-bold text-teal-700">(Peringkat 3)</span></li>
        <li>Kategori Kota Energi Cerdas <span class="font-bold text-orange-700">(Peringkat 2)</span></li>
        <li>Kategori Kota Kesiapan Digital Terbaik <span class="font-bold text-pink-700">(Peringkat 5)</span></li>
      </ol>
    </div>
  </details>
</section>

    @include('components.footer')
</div>
</body>
</html>