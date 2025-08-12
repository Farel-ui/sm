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
@include('components.dimension')
@include('components.vimi')

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
