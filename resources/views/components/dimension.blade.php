
<section id="dimensi" class="py-16">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-bold mb-12">DIMENSI SMART CITY</h2>

    <div class="flex flex-wrap justify-center gap-6">
      @foreach ($dimensions as $dimension)
        <div class="bg-blue-600 text-white rounded-2xl w-[300px] p-6 shadow-lg flex flex-col items-center text-center">
          <img src="{{ asset('images/dimension/' . $dimension->image) }}" alt="{{ $dimension->name }}" class="w-[111px] h-[73px] mb-4">
          <h3 class="text-xl font-semibold mb-2">{{ $dimension->name }}</h3>
          <p class="text-sm mb-4">{!! $dimension->description !!}</p>
          <button onclick="showVideo('{{ asset('storage/video/' . $dimension->video) }}')" class="bg-white text-blue-600 px-4 py-2 rounded-lg hover:bg-yellow-400 hover:text-white transition text-sm font-bold">
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
            <source src="" type="video/mp4" id="videoSource">
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
    const source = document.getElementById('videoSource');

    source.src = path;
    player.load(); // reload video
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
