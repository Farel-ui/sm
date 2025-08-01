<section class="py-16">
  <h2 class="text-3xl font-bold text-center mb-12">BOOKLET SMART CITY</h2>

  <div class="relative max-w-7xl mx-auto overflow-hidden pb-10" id="booklet-slider-wrapper">
    <div id="booklet-slider" class="flex transition-transform duration-700 ease-in-out w-max">
      @foreach ($booklets as $booklet)
        <a href="{{ asset('storage/' . $booklet->file) }}" target="_blank"
           class="booklet-card text-center mx-4 rounded-xl overflow-hidden shadow-md cursor-pointer">
          <img src="{{ asset($booklet->image) }}" alt="{{ $booklet->title }}"
               class="w-full h-[420px] object-cover">
          <div class="p-4 font-bold text-lg title">{{ $booklet->title }}</div>
        </a>
      @endforeach
    </div>

    <!-- Navigasi -->
    <div class="absolute top-1/2 left-0 transform -translate-y-1/2 z-10">
      <button id="prevBookletBtn"
        class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-blue-700">
        ←
      </button>
    </div>
    <div class="absolute top-1/2 right-0 transform -translate-y-1/2 z-10">
      <button id="nextBookletBtn"
        class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-blue-700">
        →
      </button>
    </div>
  </div>
</section>


<style>
  .booklet-card {
    transition: transform 0.5s ease, opacity 0.5s ease, background-color 0.5s ease;
    width: 100%;
    max-width: 400px;
    min-width: 400px;
    transform: scale(0.85);
    opacity: 0.6;
    background-color: #D6E4F0;
  }

  .booklet-card.active {
    transform: scale(1);
    opacity: 1;
    background-color: #1E60D5;
    z-index: 10;
  }

  .booklet-card .title {
    transition: color 0.3s ease;
  }

  .booklet-card.active .title {
    color: white;
  }
</style>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const bookletSlider = document.getElementById('booklet-slider');
    const bookletWrapper = document.getElementById('booklet-slider-wrapper');
    const bookletCards = bookletSlider.children;

    const bookletCardWidth = 400 + 32;
    let bookletIndex = 1;
    const totalBooklet = bookletCards.length;

    function updateBookletSlider(animate = true) {
      const offset = -(bookletIndex * bookletCardWidth - bookletWrapper.offsetWidth / 2 + bookletCardWidth / 2);
      bookletSlider.style.transition = animate ? 'transform 0.6s ease-in-out' : 'none';
      bookletSlider.style.transform = `translateX(${offset}px)`;

      Array.from(bookletCards).forEach((card, i) => {
        card.classList.remove('active');
        if (i === bookletIndex) card.classList.add('active');
      });
    }

    document.getElementById('nextBookletBtn').addEventListener('click', () => {
      if (bookletIndex < totalBooklet - 1) bookletIndex++;
      updateBookletSlider();
    });

    document.getElementById('prevBookletBtn').addEventListener('click', () => {
      if (bookletIndex > 0) bookletIndex--;
      updateBookletSlider();
    });

    window.addEventListener('resize', () => updateBookletSlider(false));
    updateBookletSlider(false);
  });
</script>
