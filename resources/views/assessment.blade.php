<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City Kota Bogor</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
@include('components.navbar')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>

    {{-- section penilaian --}}

    <section class="penghargaan-section">
    <h2>
  10 PENGHARGAAN RATING TRANSFORMASI DIGITAL DAN KOTA<br>
  CERDAS INDONESIA KOTA BOGOR TAHUN 2021
</h2>


    <div class="penghargaan-images">
        <img src="{{ asset('images/piala.jpg') }}" alt="Piala">
        <img src="{{ asset('images/piaganm.jpg') }}" alt="Piagam">
    </div>

    <ol class="penghargaan-list">
        <li>Kategori Kota Menuju Kota Cerdas (Peringkat 3)</li>
        <li>Kategori Kota Ekonomi Cerdas (Peringkat 2)</li>
        <li>Kategori Kota Masyarakat Cerdas (Peringkat 3)</li>
        <li>Kategori Kota Lingkungan Cerdas (Peringkat 4)</li>
        <li>Kategori Kota Mobilitas Cerdas (Peringkat 5)</li>
        <li>Kategori Kota Kesehatan Cerdas (Peringkat 4)</li>
        <li>Kategori Kota Pemerintahan Cerdas (Peringkat 2)</li>
        <li>Kategori Kota Tangguh pada Penyelenggaraan Smart City (Peringkat 2)</li>
        <li>Kategori Kota Cerdas Terbaik (Peringkat 3)</li>
        <li>Kategori Kota Keuangan Digital Terbaik (Peringkat 3)</li>
    </ol>
</section>

{{-- diagram --}}
<section class="py-10 px-4 bg-white">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">HASIL PENILAIAN SMART CITY KOTA BOGOR</h2>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">

        <canvas id="smartCityChart"></canvas>
    </div>
</section>


{{-- footer --}}
@include('components.footer')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>
</body>
<script>
  const navbar = document.getElementById("navbar");
  const menuText = document.getElementById("menuText");
  let isScrolled = false;

  window.addEventListener("scroll", function () {
    if (window.scrollY > 50 && !isScrolled) {
      navbar.classList.remove("bg-transparent");
      navbar.classList.add("bg-blue-600", "shadow-md", "animate-slide-down");

      // Ubah warna teks menu jadi putih
      menuText.classList.remove("text-blue-700");
      menuText.classList.add("text-white");

      isScrolled = true;
    } else if (window.scrollY <= 50 && isScrolled) {
      navbar.classList.remove("bg-blue-600", "shadow-md", "animate-slide-down");
      navbar.classList.add("bg-transparent");

      // Kembalikan warna teks menu jadi biru
      menuText.classList.remove("text-white");
      menuText.classList.add("text-blue-700");

      isScrolled = false;
    }
  });
</script>
<script>
  const ctx = document.getElementById('smartCityChart').getContext('2d');

  const tahun = {!! json_encode($charts->pluck('tahun')) !!};
  const nilai = {!! json_encode($charts->pluck('nilai')) !!};
  const sisa = nilai.map(n => 5 - n);

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: tahun,
      datasets: [
        {
          label: 'Nilai Tercapai',
          data: nilai,
          backgroundColor: '#007bff',
          stack: 'Stack 0',
        },
        {
          label: 'Sisa ke Target',
          data: sisa,
          backgroundColor: '#d3d3d3',
          stack: 'Stack 0',
        }
      ]
    },
    options: {
      responsive: true,
      scales: {
        x: {
          stacked: true,
          ticks: {
            color: '#007bff',
            font: {
              weight: 'bold',
              size: 12
            }
          },
          grid: {
            display: false
          }
        },
        y: {
          stacked: true,
          beginAtZero: true,
          max: 5,
          ticks: {
            stepSize: 1,
            color: '#007bff',
            font: {
              size: 12
            },
            callback: function(value) {
              return value.toFixed(1);
            }
          },
          grid: {
            color: '#ddd'
          }
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              const label = context.dataset.label;
              const value = context.raw;
              return `${label}: ${value}`;
            }
          }
        },
        legend: {
          display: false
        }
      }
    }
  });
</script>





    <style>
        *.penghargaan-section {
    background-color: #D6E4F0;
    padding: 60px 20px;
    text-align: center;

}

.penghargaan-section h2 {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 40px;

    color: #3B3B3B;
}

.penghargaan-images {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 40px;
    margin-bottom: 30px;
}

.penghargaan-images img {
    max-width: 300px;
    height: auto;

}

.penghargaan-list {
    max-width: 700px;
    margin: 0 auto;
    text-align: left;
    padding-left: 30px;
    font-size: 16px;
    color: #333;
    line-height: 1.7;
}


/* style data */

.smartcity-section {
  padding: 80px 20px;
  background-color: #ffffff;
  text-align: center;
}

.smartcity-title {
  font-size: 32px;
  font-weight: bold;
  color: #3B3B3B;
  margin-top: 50px;
  font-family: 'Poppins', sans-serif;
}

.chart-container {
  display: flex;
  gap: 5px;
  justify-content: center;
  align-items: flex-end;
  flex-wrap: wrap;
}

.chart-bar {
  display: flex;
  flex-direction: column;
  align-items: center;
  animation: rise 0.6s ease-out forwards;
  transform: translateY(40px);
  margin: 0; /* hilangkan jarak antar bar */
}

/* Tambahan animasi naik dari bawah */
@keyframes rise {
  from {
    transform: translateY(40px);
  }
  to {
    transform: translateY(0);
  }
}

.top-info {
  text-align: center;
  margin-bottom: 8px;
}

.chart-bar .value {
  font-weight: bold;
  font-size: 64px;
  color: #3B3B3B;
}

.chart-bar .label {
  font-size: 13px;
  font-weight: 500;
  color: #3B3B3B;
  margin-top: 0px;
}

/* Animasikan tinggi batang grafik dari 0 ke target */
.chart-bar .bar {
  width: 213px;
  height: 0;
  background-color: #1E60D5;
  border-radius: 0;
  animation: growUp 0.8s ease-out forwards;
}

/* Tambahkan animasi tumbuh ke atas */
@keyframes growUp {
  from {
    height: 0;
  }
  to {
    height: var(--bar-height);
  }
}

.chart-bar .year {
  font-size: 48px;
  font-weight: bold;
  background-color: #d9d9d9;
  padding: 20px 52px;
  border-radius: 0 0 15px 15px;
}

        .top-info {
            text-align: center;
            margin-bottom: 15px;
            z-index: 2;
            position: relative;
        }

        .chart-bar .value {
            font-weight: 800;
            font-size: clamp(48px, 6vw, 64px);
            color: #2d3748;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            display: block;
        }

        .chart-bar .label {
            font-size: 13px;
            font-weight: 600;
            color: #4a5568;
            margin-top: 8px;
            line-height: 1.3;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Enhanced bar with database colors */
        .chart-bar .bar {
            width: 180px;
            height: 0;
            border-radius: 15px 15px 0 0;
            animation: growUp 1.5s ease-out forwards;
            animation-delay: calc(var(--delay) + 0.3s);
            position: relative;
            overflow: hidden;
            box-shadow: 0 -5px 15px rgba(0,0,0,0.1);
        }

        .chart-bar .bar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 30px;
            background: linear-gradient(180deg, rgba(255,255,255,0.3) 0%, transparent 100%);
            border-radius: 15px 15px 0 0;
        }

        @keyframes growUp {
            from {
                height: 0;
            }
            to {
                height: var(--bar-height);
            }
        }

        .chart-bar .year {
            font-size: clamp(32px, 4vw, 48px);
            font-weight: 800;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            padding: 20px 45px;
            border-radius: 0 0 15px 15px;
            margin-top: 0;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border: 2px solid rgba(255,255,255,0.8);
            transition: all 0.3s ease;
        }

        .chart-bar:hover .year {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        /* Progress Indicators */
        .progress-indicators {
            display: flex;
            justify-content: center;
            gap: 60px;
            flex-wrap: wrap;
            margin-top: 60px;
            position: relative;
            z-index: 1;
        }

        .progress-item {
            text-align: center;
        }

        .progress-circle {
            position: relative;
            margin-bottom: 20px;
        }

        .progress-ring {
            transform: rotate(-90deg);
        }

        .progress-ring-circle {
            fill: transparent;
            stroke: #e2e8f0;
            stroke-width: 6;
            stroke-dasharray: 339.292;
            stroke-dashoffset: calc(339.292 - (339.292 * var(--progress)) / 100);
            stroke-linecap: round;
            transition: stroke-dashoffset 2s ease-in-out;
            animation: progressAnimation 2s ease-in-out forwards;
        }

        @keyframes progressAnimation {
            from {
                stroke-dashoffset: 339.292;
            }
            to {
                stroke-dashoffset: calc(339.292 - (339.292 * var(--progress)) / 100);
            }
        }

        .progress-ring-circle {
            stroke: url(#gradient);
        }

        .progress-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: 700;
            color: #2d3748;
        }

        .progress-label {
            font-size: 14px;
            font-weight: 600;
            color: #4a5568;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .chart-container {
                gap: 10px;
            }

            .chart-bar .bar {
                width: 120px;
            }

            .progress-indicators {
                gap: 40px;
            }

            .penghargaan-images {
                gap: 30px;
            }

            .award-image {
                max-width: 250px;
            }
        }

        @media (max-width: 480px) {
            .chart-container {
                gap: 8px;
            }

            .chart-bar .bar {
                width: 80px;
            }

            .chart-bar .year {
                padding: 15px 25px;
                font-size: 28px;
            }

            .award-image {
                max-width: 200px;
            }
        }
    </style>

    <!-- Add gradient definitions for progress circles -->
    <svg width="0" height="0">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" style="stop-color:#4facfe;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#00f2fe;stop-opacity:1" />
            </linearGradient>
        </defs>
    </svg>

</body>
</html>
