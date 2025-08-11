<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City Kota Bogor</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
@include('components.navbar')
<body>

    {{-- section penilaian --}}
    <section class="penghargaan-section">
        <div class="container mx-auto px-4">
            <h2 class="awards-title">
                10 PENGHARGAAN RATING TRANSFORMASI DIGITAL DAN KOTA<br>
                CERDAS INDONESIA KOTA BOGOR TAHUN 2021
            </h2>

            <div class="penghargaan-images">
                <div class="award-image-container">
                    <img src="{{ asset('images/penilaian1.jpeg') }}" alt="Piala" class="award-image">
                </div>
                <div class="award-image-container">
                    <img src="{{ asset('images/penilaian2.jpeg') }}" alt="Piagam" class="award-image">
                </div>
            </div>

            <ol class="penghargaan-list">
                <li><span class="award-number">1</span>Kategori Kota Menuju Kota Cerdas (Peringkat 3)</li>
                <li><span class="award-number">2</span>Kategori Kota Ekonomi Cerdas (Peringkat 2)</li>
                <li><span class="award-number">3</span>Kategori Kota Masyarakat Cerdas (Peringkat 3)</li>
                <li><span class="award-number">4</span>Kategori Kota Lingkungan Cerdas (Peringkat 4)</li>
                <li><span class="award-number">5</span>Kategori Kota Mobilitas Cerdas (Peringkat 5)</li>
                <li><span class="award-number">6</span>Kategori Kota Kesehatan Cerdas (Peringkat 4)</li>
                <li><span class="award-number">7</span>Kategori Kota Pemerintahan Cerdas (Peringkat 2)</li>
                <li><span class="award-number">8</span>Kategori Kota Tangguh pada Penyelenggaraan Smart City (Peringkat 2)</li>
                <li><span class="award-number">9</span>Kategori Kota Cerdas Terbaik (Peringkat 3)</li>
                <li><span class="award-number">10</span>Kategori Kota Keuangan Digital Terbaik (Peringkat 3)</li>
            </ol>
        </div>
    </section>

    {{-- Enhanced Smart City Chart Section dengan Database --}}
    <section class="smartcity-section">
        <div class="container mx-auto px-4">
            <div class="chart-wrapper">
                <div class="chart-container">
                    @foreach ($assessments as $index => $data)
                        @php
                            $barHeight = $data->score * 80; // Adjusted multiplier for better proportion
                            $delay = ($index + 1) * 0.1; // Staggered animation delay
                        @endphp
                        <div class="chart-bar" style="--bar-height: {{ $barHeight }}px; --delay: {{ $delay }}s;">
                            <div class="top-info">
                                <div class="value">{{ $data->score }}</div>
                                <div class="label">HASIL SMART CITY<br>TAHUN {{ $data->year }}</div>
                            </div>
                            <div class="bar" style="background: {{ $data->color }}; background: linear-gradient(135deg, {{ $data->color }} 0%, {{ $data->color }}AA 100%);"></div>
                            <div class="year" style="color: {{ $data->color }}">{{ $data->year }}</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <h2 class="smartcity-title">
                HASIL PENILAIAN SMART CITY KOTA BOGOR
            </h2>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
        }

        /* Enhanced Awards Section */
        .penghargaan-section {
            background: #D6E4F0;
            padding: 80px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .penghargaan-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .awards-title {
            font-size: clamp(24px, 4vw, 36px);
            font-weight: 800;
            margin-bottom: 50px;
            color: black;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }

        .penghargaan-images {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 40px;
            position: relative;
            z-index: 1;
        }

        .award-image-container {
            position: relative;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .award-image-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .award-image {
            max-width: 300px;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .penghargaan-list {
            max-width: 900px;
            margin: 0 auto;
            text-align: left;
            padding: 0;
            font-size: 17px;
            color: black;
            line-height: 2.2;
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 50px 40px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 45px rgba(0,0,0,0.1);
        }

        .penghargaan-list li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            transition: all 0.4s ease;
            padding: 15px 20px;
            border-radius: 12px;
            font-weight: 500;
            border-left: 4px solid transparent;
        }

        .penghargaan-list li:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(15px);
            border-left-color: #00f2fe;
            box-shadow: 0 8px 25px rgba(0,242,254,0.2);
        }

        .award-number {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            font-size: 14px;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(79, 172, 254, 0.3);
        }

        /* Enhanced Smart City Section */
        .smartcity-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            position: relative;
            overflow: hidden;
        }

        .smartcity-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(0,0,0,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
            pointer-events: none;
        }

        .chart-wrapper {
            background: white;
            border-radius: 25px;
            padding: 50px 30px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.1);
            margin-bottom: 60px;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .smartcity-title {
            font-size: clamp(28px, 4vw, 40px);
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 40px;
            font-family: 'Poppins', sans-serif;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .chart-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            align-items: flex-end;
            flex-wrap: wrap;
            padding: 20px 0;
            position: relative;
        }

        .chart-container::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, #e2e8f0 50%, transparent 100%);
        }

        .chart-bar {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: slideUp 1s ease-out forwards;
            animation-delay: var(--delay);
            transform: translateY(50px);
            opacity: 0;
            position: relative;
            margin: 0;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
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
