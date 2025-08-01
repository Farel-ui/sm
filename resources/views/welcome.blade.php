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
</head>
@include('components.navbar')
<body>
<section class="relative font-poppins overflow-hidden pt-24 pb-20 px-4 md:px-20">
  <!-- 🔵 Background Gradien Biru Rounded -->
  <div class="absolute top-0 left-0 right-0 bottom-0 w-[90%] mx-auto bg-gradient-to-br from-blue-200 to-blue-200 rounded-b-[60px] z-0"></div>

  <!-- Konten Card -->
  <div class="relative z-10 max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-center -mt-12">
    
    <!-- Kiri: Card Penjelasan -->
    <div class="bg-blue-600 text-white p-10 rounded-[20px] shadow-md min-h-[500px] flex flex-col justify-start">
      <h1 class="text-4xl md:text-5xl text-center font-bold leading-tight">
        <span class="block">SMART <span class="italic font-medium">CITY</span></span>
        <span class="block">
          <span class="italic font-medium">KOTA</span>
          <span class=" font-bold not-italic">BOGOR</span>
        </span>
      </h1>
      <p class="text-base md:text-3xl text-center mt-7">
        Smart City Kota Bogor adalah inisiatif transformasi digital yang bertujuan meningkatkan kualitas pelayanan <br>publik, efisiensi pemerintahan, dan kenyamanan hidup warga melalui pemanfaatan teknologi informasi dan komunikasi secara terpadu.
      </p>
    </div>

    <!-- Kanan: Gambar -->
    <div class="min-h-[500px]">
      <img src="{{ asset('images/e.svg') }}" alt="Smart City" class="w-full h-full object-cover rounded-[20px] shadow-lg">
    </div>
    
  </div>
</section>

<section id="dimensi" class="py-16">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold mb-12">DIMENSI SMART CITY</h2>

    <div class="flex flex-wrap justify-center gap-6">
      @foreach ($dimensions as $dimension)
        <div class="bg-blue-600 text-white rounded-2xl w-[300px] p-6 shadow-lg flex flex-col items-center text-center">
          <img src="{{ asset($dimension->image) }}" alt="{{ $dimension->name }}" class="w-[111px] h-[73px] mb-4">
          <h3 class="text-xl font-semibold mb-2">{{ $dimension->name }}</h3>
          <p class="text-sm mb-4">{!! $dimension->description !!}</p>
          <button onclick="showVideo('{{ asset($dimension->video) }}')" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-yellow-400 hover:text-white transition text-sm font-bold">
            Selengkapnya
          </button>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Modal Video -->
  <div id="videoModal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50">
    <div id="videoContainer" class="relative w-[90%] max-w-3xl">
      <video id="videoPlayer" controls class="w-full rounded-xl shadow-lg">
        <source src="" type="video/mp4">
        Browser tidak mendukung video ini.
      </video>
      <button onclick="closeVideo()" class="absolute top-2 right-2 bg-white text-black px-3 py-1 rounded-full font-bold">X</button>
    </div>
  </div>

  <script>
    function showVideo(path) {
      const modal = document.getElementById('videoModal');
      const container = document.getElementById('videoContainer');
      const player = document.getElementById('videoPlayer');

      player.src = path;
      modal.classList.remove('hidden');

      container.classList.remove('animate-slide-in');
      void container.offsetWidth; // reflow
      container.classList.add('animate-slide-in');
    }

    function closeVideo() {
      const modal = document.getElementById('videoModal');
      const player = document.getElementById('videoPlayer');

      modal.classList.add('hidden');
      player.pause();
      player.currentTime = 0;
    }
  </script>
</section>

<!-- Visi & Misi Section Tengah Halaman -->
<section class="max-w-5xl mx-auto px-7 py-[100px] bg-gradient-to-r from-blue-200 via-blue-200 to-blue-200 rounded-[100px] shadow-inner relative overflow-hidden">
    <div class="flex flex-col md:flex-row items-center justify-center gap-72 relative z-20">

        <!-- Visi -->
        <div class="bg-blue-600 text-white p-6 rounded-lg w-64 h-[260px] text-center shadow-lg z-20 flex flex-col justify-center">
            <h2 class="text-2xl font-bold mb-3">VISI</h2>
            <p class="text-xl leading-relaxed">Terwujudnya Kota Bogor sebagai Kota Ramah Keluarga.</p>
        </div>

        <!-- Misi -->
        <div class="bg-blue-600 text-white p-6 rounded-lg w-64 h-[260px] text-center shadow-lg z-20 flex flex-col justify-center">
            <h2 class="text-2xl font-bold mb-3">MISI</h2>
            <ul class="text-left list-disc ml-5 text-[17px] leading-relaxed">
                <li>Mewujudkan Kota Yang Sehat</li>
                <li>Mewujudkan Kota Yang Cerdas</li>
                <li>Mewujudkan Kota Yang Sejahtera</li>
            </ul>
        </div>
    </div>

</section>
<br><br>
<section class="video-section">
  <video autoplay muted loop playsinline>
    <source src="{{ asset('video/kotabogor.mp4') }}" type="video/mp4">
    Browser tidak mendukung video ini.
  </video>
</section>
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
@include('components.footer')
</body>
</html>
</body>
