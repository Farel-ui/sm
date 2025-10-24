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
         body {
        padding-top: 80px; /* Ruang untuk fixed navbar */
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
        </style>

</head>

<body class="overflow-x-hidden">
    @include('components.navbar')
<section class="relative font-poppins pt-24 pb-20 px-4 md:px-20">
  <!-- 🔵 Background -->
  <div class="absolute top-0 left-0 right-0 bottom-0 w-[95%] md:w-[90%] mx-auto bg-gradient-to-br from-blue-200 to-blue-200 rounded-b-[40px] md:rounded-b-[100px] z-0"></div>

  <!-- Konten -->
  <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-2 gap-3 sm:gap-6 items-center -mt-6 md:-mt-12 px-2 sm:px-4 md:px-0">

    <!-- Kiri: Card Teks -->
    <div class="bg-blue-600 text-white p-3 sm:p-5 md:p-6 rounded-[12px] md:rounded-[20px] shadow-md flex flex-col justify-start h-full w-full min-h-[180px] sm:min-h-[280px] md:min-h-[540px]">
      <h1 class="text-[14px] sm:text-[22px] md:text-[64px] text-center font-bold leading-tight">
        <span class="block">SMART <span class="italic font-medium">CITY</span></span>
        <span class="block">
          <span class="italic font-medium">KOTA</span>
          <span class="font-bold not-italic">BOGOR</span>
        </span>
      </h1>

      <p class="text-[11px] sm:text-[15px] md:text-[24px] text-center mt-2 sm:mt-3 md:mt-5 leading-relaxed">
        Smart City Kota Bogor adalah inisiatif<br>
        transformasi digital yang bertujuan<br>
        meningkatkan kualitas pelayanan<br>
        publik, efisiensi pemerintahan,<br>
        dan kenyamanan hidup warga<br>
        melalui pemanfaatan teknologi<br>
        informasi dan komunikasi secara<br>
        terpadu.
      </p>
    </div>

    <!-- Kanan: Card Gambar -->
    <div class="rounded-[12px] md:rounded-[20px] shadow-md h-full w-full min-h-[180px] sm:min-h-[280px] md:min-h-[540px] flex items-center justify-center">
      <img src="{{ asset('images/smar.jpg') }}"
           alt="Smart City"
           class="w-full h-full object-cover rounded-[12px] md:rounded-[20px]">
    </div>

  </div>
</section>


@include('components.dimension')
@include('components.vimi')

<section class="video-section relative w-full mt-10">
  <!-- Thumbnail -->
  <div id="thumbnail" class="relative cursor-pointer w-full">
    <img
      src="{{ asset('images/thumbnail.jpg') }}"
      alt="Video Thumbnail"
      class="w-full h-auto object-cover">
    <!-- Tombol play -->
    <button
      onclick="playInlineVideo()"
      class="absolute inset-0 flex items-center justify-center text-white text-6xl bg-black bg-opacity-30 hover:bg-opacity-40 transition">
      ▶
    </button>
  </div>

  <!-- Video (hidden awalnya) -->
  <div id="videoWrapper" class="hidden relative w-full">
    <!-- Loading Spinner -->
    <div id="videoLoader" class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 z-20">
      <div class="loader-spinner"></div>
    </div>
    
    <video
      id="inlineVideo"
      class="w-full h-auto object-cover"
      controls
      playsinline
      preload="metadata">
      <source src="{{ asset('video/0807.mp4') }}" type="video/mp4">
      Browser tidak mendukung video ini.
    </video>
    
    <!-- Tombol Close/Stop -->
    <button
      onclick="stopInlineVideo()"
      class="absolute top-4 right-4 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-lg transition flex items-center gap-2 z-10">
      <i class="fas fa-times"></i> Tutup Video
    </button>
  </div>
</section>

<style>
  .loader-spinner {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #2563eb;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
</style>

@include('components.igi')
@include('components.quickwin')
<section class="bg-blue-100 py-12 px-4">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8">
      ROAD MAP JANGKA PANJANG MENENGAH E-GOV DAN SMART CITY
    </h2>

    <div class="overflow-x-auto">
      <img src="{{ asset('images/roadmap.jpg') }}" alt="Roadmap Smart City"
           class="mx-auto w-full max-w-4xl rounded-lg shadow-lg">
    </div>
  </div>
</section>


@include('components.booklet')

<div id="backToTop">
        <i class="fa-solid fa-arrow-up"></i>
    </div>


@include('components.footer')

<script>
   function playInlineVideo() {
  const thumbnail = document.getElementById('thumbnail');
  const videoWrapper = document.getElementById('videoWrapper');
  const video = document.getElementById('inlineVideo');
  const loader = document.getElementById('videoLoader');

  // Sembunyikan thumbnail
  thumbnail.style.display = 'none';

  // Tampilkan video wrapper
  videoWrapper.classList.remove('hidden');
  
  // Tampilkan loader
  loader.style.display = 'flex';

  // Event: video siap diputar
  video.addEventListener('canplay', function() {
    loader.style.display = 'none';
  }, { once: true });

  // Event: video sudah cukup buffer
  video.addEventListener('canplaythrough', function() {
    loader.style.display = 'none';
  }, { once: true });

  // Mulai play video
  video.play().catch(function(error) {
    console.error('Error playing video:', error);
    loader.style.display = 'none';
  });
}

function stopInlineVideo() {
  const thumbnail = document.getElementById('thumbnail');
  const videoWrapper = document.getElementById('videoWrapper');
  const video = document.getElementById('inlineVideo');

  // Stop dan reset video
  video.pause();
  video.currentTime = 0;

  // Sembunyikan video wrapper
  videoWrapper.classList.add('hidden');

  // Tampilkan kembali thumbnail
  thumbnail.style.display = 'block';
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
</script>

</body>
</html>
</body>
