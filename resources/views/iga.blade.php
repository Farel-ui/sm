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
<section class="py-16 bg-gray-100" x-data="{ open: false, photo: '' }">
  <div class="max-w-6xl mx-auto px-4">
    <!-- Judul -->
    <h2 class="text-3xl font-bold mb-4 text-left">PESERTA IGA 2020</h2>

    <!-- Filter di bawah judul, rata kiri -->
    <div class="flex flex-wrap gap-2 mb-6">
  <button data-filter="all"
    class="btn-filter bg-blue-600 text-white rounded-full px-5 py-2 text-sm hover:bg-blue-800">
    SEMUA
  </button>
  @foreach ($igas->pluck('institution')->unique() as $instansi)
    <button data-filter="{{ $instansi }}"
      class="btn-filter bg-blue-600 text-white rounded-full px-5 py-2 text-sm hover:bg-blue-800">
      {{ strtoupper($instansi) }}
    </button>
  @endforeach
</div>



    <!-- Galeri -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-6" id="iga-gallery">
      @foreach ($igas as $data)
        <div class="box {{ $data->institution }} bg-black rounded-lg overflow-hidden shadow-md transition hover:scale-105 cursor-pointer">
          <img src="{{ $data->image }}" alt="{{ $data->title }}"
               class="w-full h-84 object-cover"
               @click="photo = '{{ $data->image }}'; open = true">
        </div>
      @endforeach
    </div>
  </div>

  <!-- Lightbox (tidak gelap penuh) -->

  </div>
  @include('components.footer')
</section>


<script>
  document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.btn-filter');
    const boxes = document.querySelectorAll('.box');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        const filter = btn.getAttribute('data-filter');
        boxes.forEach(box => {
          if (filter === 'all' || box.classList.contains(filter)) {
            box.classList.remove('hidden');
          } else {
            box.classList.add('hidden');
          }
        });
      });
    });
  });
</script>