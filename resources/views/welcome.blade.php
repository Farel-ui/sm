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

  <!-- Konten Card & Gambar -->
  <div class="relative z-10 max-w-7xl mx-auto flex flex-col md:flex-row gap-15 items-stretch -mt-12 ">

    <!-- Kiri: Card Penjelasan -->
    <div class="bg-blue-600 text-white p-6 rounded-[20px] shadow-md flex flex-col justify-start h-full w-full min-h-[540px]">

      <h1 class="text-[32px] md:text-[64px] text-center font-bold leading-tight">
  <span class="block">SMART <span class="italic font-medium">CITY</span></span>
  <span class="block">
    <span class="italic font-medium">KOTA</span>
    <span class=" font-bold not-italic">BOGOR</span>
  </span>
</h1>

      <p class="text-[24px] text-center mt-5  leading-relaxed">
        Smart City Kota Bogor adalah inisiatif <br>
        transformasi digital yang bertujuan<br>
        meningkatkan kualitas pelayanan<br>
        publik, efisiensi pemerintahan, dan <br>
         kenyamanan hidup warga melalui <br>
         pemanfaatan teknologi informasi dan<br>
         komunikasi secara terpadu.
      </p>
    </div>

    <!-- Kanan: Gambar -->
    <div class="h-full w-full">
      <img src="{{ asset('images/kiyomasa.svg') }}" alt="Smart City" class="w-full h-full object-cover rounded-[20px] shadow-none">
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

    // ⬇️ Ini bagian penting: play video saat modal muncul
    player.play().catch(error => {
      console.warn("Autoplay diblokir oleh browser:", error);
    });
  }

  function closeVideo() {
    const modal = document.getElementById('videoModal');
    const player = document.getElementById('videoPlayer');

    modal.classList.add('hidden');
    player.pause();
    player.currentTime = 0;
    player.src = ""; // reset src biar nggak ngeload terus
  }
</script>

</section>
@include('components.vimi')
</section>

{{-- video --}}

<!-- Video Thumbnail + Player -->
<div id="videoContainer" class="relative w-full mt-20  overflow-hidden shadow-lg shadow-black/40 transition-transform duration-300 hover:scale-[1.02]">
  <!-- Thumbnail -->
  <div id="thumbnail" class="relative cursor-pointer group" onclick="playInlineVideo()">
    <img src="{{ asset('images/thumbnail.jpg') }}" alt="Thumbnail Video"
         class="w-full h-auto">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent flex items-center justify-center transition duration-300 group-hover:from-black/60">
      <span class="text-white text-5xl drop-shadow-lg">▶</span>
    </div>
  </div>

  <!-- Video -->
  <video id="inlineVideo" class="w-full hidden" controls>
    <source src="{{ asset('video/0807.mp4') }}" type="video/mp4">
    Browser kamu tidak mendukung video tag.
  </video>
</div>

<script>
function playInlineVideo() {
  document.getElementById('thumbnail').style.display = 'none';
  const video = document.getElementById('inlineVideo');
  video.classList.remove('hidden');
  video.play();
}
</script>


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
