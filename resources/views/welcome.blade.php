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
  <div class="absolute top-0 left-0 right-0 bottom-0 w-[90%] mx-auto bg-gradient-to-br from-blue-200 to-blue-200 rounded-b-[100px] z-0"></div>

  <!-- Konten Card -->
  <div class="relative z-10 max-w-7xl mx-auto grid md:grid-cols-2 gap-5 items-center -mt-12">

    <!-- 🔹 Kiri: Card Penjelasan -->
    <div class="bg-blue-600 text-white p-6 rounded-[20px] shadow-md flex flex-col justify-start h-full w-full min-h-[540px]">

      <h1 class="text-[32px] md:text-[64px] text-center font-bold leading-tight">
        <span class="block">SMART <span class="italic font-medium">CITY</span></span>
        <span class="block">
          <span class="italic font-medium">KOTA</span>
          <span class=" font-bold not-italic">BOGOR</span>
        </span>
      </h1>

      <p class="text-[24px] text-center mt-5 leading-relaxed">
        Smart City Kota Bogor adalah inisiatif <br>
        transformasi digital yang bertujuan<br>
        meningkatkan kualitas pelayanan<br>
        publik, efisiensi pemerintahan, dan <br>
        kenyamanan hidup warga melalui <br>
        pemanfaatan teknologi informasi dan<br>
        komunikasi secara terpadu.
      </p>
    </div>

    <!-- 🔹 Kanan: Card Gambar (samain ukuran sama kiri) -->
   <div class="p-0 rounded-[20px] shadow-md h-full w-full min-h-[540px] flex items-center justify-center">
  <img src="{{ asset('images/smar.jpg') }}"
       alt="Smart City"
       class="w-full h-full object-cover rounded-[20px]">
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
  <video
    id="inlineVideo"
    class="hidden w-full h-auto object-cover"
    muted
    loop
    playsinline>
    <source src="{{ asset('video/0807.mp4') }}" type="video/mp4">
    Browser tidak mendukung video ini.
  </video>
</section>

<script>
function playInlineVideo() {
  const thumbnail = document.getElementById('thumbnail');
  const video = document.getElementById('inlineVideo');

  // sembunyikan thumbnail
  thumbnail.style.display = 'none';

  // tampilkan video dan mulai main
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
