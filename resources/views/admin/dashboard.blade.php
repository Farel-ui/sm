<x-app-layout>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    /* Custom scrollbar */
    ::-webkit-scrollbar { width: 8px; height: 8px; }
    ::-webkit-scrollbar-track { background: #f8fafc; }
    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

    /* Animasi lembut */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .table-row { animation: fadeIn 0.3s ease-out; }
    .fade-in { animation: fadeIn 0.5s ease-out; }

    /* Gradient background */
    .gradient-bg {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    /* Card hover */
    .card-hover { transition: all 0.3s ease; }
    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1),
                    0 10px 10px -5px rgba(0,0,0,0.04);
    }

    /* Chart container */
    .chart-container {
        position: relative;
        height: 320px;
        width: 100%;
    }

    /* Radar chart - diperlebar */
    .radar-chart-container {
        position: relative;
        height: 280px; /* tinggi proporsional */
        width: 100%;   /* full lebar parent */
        max-width: 800px; /* batas maksimum agar tidak kepanjangan */
        margin: 0 auto;
    }

    .chart-wrapper {
        background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        border-radius: 12px;
        padding: 16px;
    }
</style>

<body class="bg-blue-100 min-h-screen p-3">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="bg-blue-600 text-white flex justify-end items-center px-4 py-5 rounded-lg shadow-sm mb-3">
            <div class="flex items-center space-x-2 text-lg">
                <span class="font-bold text-2xl">ADMIN</span>
                <div class="w-1 h-9 bg-white"></div>
                @if(Auth::user()->avatar)
                    <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center">
                        <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}"
                             alt="User Avatar"
                             class="w-full h-full object-cover">
                    </div>
                @endif
            </div>
        </div>

        <!-- Notifikasi -->
        <div class="bg-blue-600 text-white px-6 py-5 rounded-t-none rounded-lg shadow-sm mb-3 fade-in">
            <p class="text-lg font-medium">Kamu berhasil login!</p>
        </div>

        <!-- Grid utama -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-3">
            <!-- Diagram Penilaian -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-lg shadow-sm p-4 card-hover">
                    <h2 class="text-base font-bold text-gray-800 mb-3">
                        Diagram Penilaian Smart City Kota Bogor
                    </h2>
                    <div class="chart-wrapper">
                        <div class="chart-container">
                            <canvas id="penilaianChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm p-4 card-hover h-fit mb-3">
                    <h2 class="text-base font-bold text-gray-800 mb-3">Statistik Pengunjung</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Hari ini</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $stats['today'] ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Bulan ini</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $stats['month'] ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Tahun ini</span>
                            <span class="text-sm font-semibold text-gray-800">{{ $stats['year'] ?? 0 }}</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                            <span class="text-sm font-medium text-gray-800">Total</span>
                            <span class="text-sm font-bold text-blue-600">{{ $stats['total'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-sm p-4 card-hover h-fit">
                    <h2 class="text-base font-bold text-gray-800 mb-3">Agenda Smart City</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Evaluasi Tahap 2</span>
                            <span class="text-sm font-semibold text-gray-800">25 Okt 2025</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Upload Quick Win Baru</span>
                            <span class="text-sm font-semibold text-gray-800">10 Nov 2025</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600">Rapat Monitoring Tahunan</span>
                            <span class="text-sm font-semibold text-gray-800">20 Nov 2025</span>
                        </div>
                        <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                            <span class="text-sm font-medium text-gray-800">Agenda Berikutnya</span>
                            <span class="text-sm font-bold text-blue-600">5 Des 2025</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Ringkasan Penilaian Tahunan -->
            <div class="lg:col-span-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-3">
                    <div class="bg-white p-3 rounded-lg shadow-sm text-center">
                        <p class="text-gray-500 text-sm">Nilai Tertinggi</p>
                        <p class="text-2xl font-bold text-blue-600">{{ $penilaianStats['maxValue'] ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-400">Tahun {{ $penilaianStats['maxYear'] ?? 'N/A' }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg shadow-sm text-center">
                        <p class="text-gray-500 text-sm">Nilai Terendah</p>
                        <p class="text-2xl font-bold text-red-500">{{ $penilaianStats['minValue'] ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-400">Tahun {{ $penilaianStats['minYear'] ?? 'N/A' }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg shadow-sm text-center">
                        <p class="text-gray-500 text-sm">Rata-rata</p>
                        <p class="text-2xl font-bold text-green-600">{{ $penilaianStats['avgValue'] ?? 'N/A' }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-lg shadow-sm text-center">
                        <p class="text-gray-500 text-sm">Kenaikan Terakhir</p>
                        <p class="text-2xl font-bold text-blue-500">{{ $penilaianStats['increaseValue'] ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-400">dari tahun sebelumnya</p>
                    </div>
                </div>
            </div>

            <!-- Radar Chart -->
            <div class="lg:col-span-4">
                <div class="bg-white rounded-lg shadow-sm p-4 card-hover w-full">
                    <div class="flex justify-between items-center mb-3">
                        <h2 id="radarTitle" class="text-base font-bold text-gray-800">
                            Perbandingan Evaluasi Implementasi Smart City
                        </h2>
                        <div class="relative inline-block">
                        <select id="comparisonSelect"
                            class="appearance-none border border-gray-300 rounded-md text-sm font-medium text-gray-700 pl-3 pr-8 py-2 bg-white cursor-pointer hover:border-gray-400 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
                            <option value="2023-2024">2023 & 2024</option>
                            <option value="2022-2023">2022 & 2023</option>
                            <option value="2021-2022">2021 & 2022</option>
                        </select>
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class=" text-gray-500 text-xs"></i>
                        </span>
                    </div>

                    </div>
                    <div class="chart-wrapper">
                        <div class="radar-chart-container">
                            <canvas id="radarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- ================== SCRIPT ================== -->
<script>
    // Data for comparisons
    const radarLabels = ['BASELINE', 'OUTPUT', 'OUTCOME', 'IMPACT', 'QUICK WINS'];
    const data2021 = [3.0, 2.5, 3.5, 3.0, 4.0];
    const data2022 = [4.0, 3.0, 3.5, 3.0, 4.0];
    const data2023 = [3.7, 3.0, 3.2, 3.1, 3.8];
    const data2024 = [3.9, 3.5, 3.6, 3.5, 4.0];
    let radarChart;

    // Function to create or update radar chart
    function updateRadarChart(year1, year2, data1, data2) {
        const ctx = document.getElementById('radarChart').getContext('2d');
        if (radarChart) {
            radarChart.destroy();
        }
        radarChart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: radarLabels,
                datasets: [
                    {
                        label: year1,
                        data: data1,
                        borderColor: 'rgba(37,99,235,1)',
                        backgroundColor: 'rgba(37,99,235,0.2)',
                        pointBackgroundColor: 'rgba(37,99,235,1)',
                        borderWidth: 2,
                    },
                    {
                        label: year2,
                        data: data2,
                        borderColor: 'rgba(255,165,0,1)',
                        backgroundColor: 'rgba(255,165,0,0.2)',
                        pointBackgroundColor: 'rgba(255,165,0,1)',
                        borderWidth: 2,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        min: 0,
                        max: 4,
                        ticks: {
                            stepSize: 1,
                            color: '#64748b',
                            backdropColor: 'transparent'
                        },
                        grid: { color: '#e2e8f0' },
                        angleLines: { color: '#cbd5e1' },
                        pointLabels: {
                            color: '#334155',
                            font: { size: 14, weight: '600' }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: { font: { size: 16, weight: '600' } }
                    }
                }
            }
        });
    }

    // Initial chart
    updateRadarChart('2023', '2024', data2023, data2024);

    // Dropdown change event
    document.getElementById('comparisonSelect').addEventListener('change', function() {
        const value = this.value;
        const title = document.getElementById('radarTitle');
        if (value === '2023-2024') {
            title.textContent = 'Perbandingan Evaluasi Implementasi Smart City 2023 dan 2024';
            updateRadarChart('2023', '2024', data2023, data2024);
        } else if (value === '2022-2023') {
            title.textContent = 'Perbandingan Evaluasi Implementasi Smart City 2022 dan 2023';
            updateRadarChart('2022', '2023', data2022, data2023);
        } else if (value === '2021-2022') {
            title.textContent = 'Perbandingan Evaluasi Implementasi Smart City 2021 dan 2022';
            updateRadarChart('2021', '2022', data2021, data2022);
        }
    });

    // ===== Bar Chart (Penilaian Tahunan) =====
    const ctx = document.getElementById('penilaianChart').getContext('2d');
    const labels = {!! json_encode($penilaian->pluck('year')) !!};
    const scores = {!! json_encode($penilaian->pluck('score')) !!};
    const numericScores = scores.map(s => parseFloat(s) || 0);

    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, '#3b82f6');
    gradient.addColorStop(1, '#1d4ed8');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels,
            datasets: [{
                label: 'Nilai',
                data: numericScores,
                backgroundColor: gradient,
                borderRadius: 8,
                maxBarThickness: 50,
                borderSkipped: false,
                hoverBackgroundColor: '#2563eb'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: 'rgba(31,41,55,0.95)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#374151',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    padding: 12,
                    callbacks: {
                        label: c => 'Nilai: ' + c.parsed.y.toFixed(1)
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 4,
                    grid: { color: '#e5e7eb', drawBorder: false },
                    ticks: { color: '#6b7280', stepSize: 1, padding: 8 }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: '#374151', font: { weight: '600' } }
                }
            },
            animation: { duration: 1000, easing: 'easeInOutQuart' }
        },
        plugins: [{
            afterDatasetsDraw: chart => {
                const ctx = chart.ctx;
                chart.data.datasets.forEach((dataset, i) => {
                    const meta = chart.getDatasetMeta(i);
                    if (!meta.hidden) {
                        meta.data.forEach((bar, index) => {
                            const data = parseFloat(dataset.data[index]);
                            if (isNaN(data)) return;
                            ctx.fillStyle = '#1e40af';
                            ctx.font = 'bold 14px sans-serif';
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';
                            const x = bar.x, y = bar.y - 8;
                            const text = data.toFixed(1);
                            const textWidth = ctx.measureText(text).width;
                            const padding = 6;
                            ctx.fillStyle = '#dbeafe';
                            ctx.beginPath();
                            ctx.roundRect(x - textWidth/2 - padding, y - 18, textWidth + padding*2, 20, 4);
                            ctx.fill();
                            ctx.fillStyle = '#1e40af';
                            ctx.fillText(text, x, y - 4);
                        });
                    }
                });
            }
        }]
    });

    // Polyfill untuk roundRect
    if (!CanvasRenderingContext2D.prototype.roundRect) {
        CanvasRenderingContext2D.prototype.roundRect = function(x,y,w,h,r){
            if (w<2*r) r=w/2; if (h<2*r) r=h/2;
            this.moveTo(x+r,y);
            this.arcTo(x+w,y,x+w,y+h,r);
            this.arcTo(x+w,y+h,x,y+h,r);
            this.arcTo(x,y+h,x,y,r);
            this.arcTo(x,y,x+w,y,r);
            this.closePath(); return this;
        };
    }
</script>
</body>
</html>
</x-app-layout>
