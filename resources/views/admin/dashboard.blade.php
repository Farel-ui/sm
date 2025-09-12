<x-app-layout>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    /* Custom scrollbar for modern browsers */
    ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    ::-webkit-scrollbar-track {
        background: #f8fafc;
    }
    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    /* Subtle animation for table rows */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .table-row {
        animation: fadeIn 0.3s ease-out;
    }

    .fade-in {
        animation: fadeIn 0.5s ease-out;
    }

    /* Gradient background */
    .gradient-bg {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    /* Card hover effects */
    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Action buttons */
    .action-btn {
        padding: 8px;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    /* Table enhancements */
    .table-header {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }

    /* Chart container */
    .chart-container {
        position: center;
        height: 500px;
        width: 100%;
    }
</style>

<body class="bg-blue-100 min-h-screen p-3">
    <main class="pb-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Top Header -->
    <div class="bg-blue-600 text-white flex justify-end items-center px-4 py-2 rounded-lg shadow-sm mb-3">
        <div class="flex items-center space-x-2 text-sm">
            <span class="font-medium">ADMIN</span>
            <div class="w-px h-4 bg-white opacity-50"></div>
            <div class="w-6 h-6 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-xs"></i>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    <div class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-sm mb-3 fade-in">
        <p class="text-sm font-medium">Kamu berhasil login!</p>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-2">
        <!-- Chart Section -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow-sm p-4 card-hover">
                <h2 class="text-base font-bold text-gray-800 mb-3">Diagram Penilaian Smart City Kota Bogor</h2>
                <div class="chart-container">
                    <canvas id="assessmentChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm p-4 card-hover h-fit">
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
        </div>
        </div>
    </div>
    </main>

    <!-- Chart Script -->
    <script>
        const ctx = document.getElementById('assessmentChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($assessments->pluck('year')) !!},
                datasets: [{
                    label: 'Nilai',
                    data: {!! json_encode($assessments->pluck('score')) !!},
                    backgroundColor: {!! json_encode($assessments->pluck('color')) !!},
                    borderRadius: 2,
                    maxBarThickness: 35,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: '#1f2937',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        borderColor: '#374151',
                        borderWidth: 1,
                        cornerRadius: 6,
                        displayColors: false,
                        titleFont: {
                            size: 12
                        },
                        bodyFont: {
                            size: 11
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5,
                        grid: {
                            color: '#f3f4f6',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6b7280',
                            font: {
                                size: 10
                            },
                            stepSize: 1
                        }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            color: '#6b7280',
                            font: {
                                size: 10
                            }
                        }
                    }
                },
                layout: {
                    padding: {
                        top: 10,
                        bottom: 10,
                        left: 10,
                        right: 10
                    }
                }
            }
        });
    </script>
</body>
</html>

</x-app-layout>
