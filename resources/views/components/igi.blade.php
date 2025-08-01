<section class="py-16 bg-gray-100">
  <div class="max-w-6xl mx-auto px-4">
    <!-- Judul -->
    <h2 class="text-3xl font-bold mb-8 text-left">PESERTA IGA 2020</h2>

    <!-- Galeri 3 Pertama -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 gap-6" id="iga-gallery">
      @foreach ($igas->take(3) as $data)
        <div class="box bg-black rounded-lg overflow-hidden shadow-md transition hover:scale-105 cursor-pointer">
          <img src="{{ $data->image }}" alt="{{ $data->title }}"
               class="w-full h-84 object-cover">
        </div>
      @endforeach
    </div>

    <!-- Tombol Selengkapnya -->
    <div class="mt-8 text-center">
      <a href="{{ url('/iga') }}" 
         class="inline-block bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-800 transition">
        Lihat Selengkapnya
      </a>
    </div>
  </div>
</section>
