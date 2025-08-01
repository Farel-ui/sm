<section class="py-16">
  <h2 class="text-3xl font-bold text-center mb-12">PROGRAM IMPLEMENTASI SMART CITY</h2>

  <div class="relative max-w-7xl mx-auto overflow-hidden" id="slider-wrapper">
    <div id="slider" class="flex transition-transform duration-700 ease-in-out w-max">
      {{-- Card akan dimasukkan lewat JS --}}
    </div>

    <!-- Navigasi -->
    <div class="absolute top-1/2 left-0 transform -translate-y-1/2 z-10">
      <button id="prevBtn"
        class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-blue-700">
        ←
      </button>
    </div>
    <div class="absolute top-1/2 right-0 transform -translate-y-1/2 z-10">
      <button id="nextBtn"
        class="bg-blue-600 text-white w-10 h-10 rounded-full flex items-center justify-center shadow-md hover:bg-blue-700">
        →
      </button>
    </div>
  </div>
</section>

<style>
  .card {
    transition: transform 0.5s ease, opacity 0.5s ease, background-color 0.5s ease;
    width: 100%;
    max-width: 384px;
    min-width: 384px;
    transform: scale(0.85);
    opacity: 0.6;
    background-color: #D6E4F0;
  }

  .card.active {
    transform: scale(1);
    opacity: 1;
    background-color: #1E60D5;
    z-index: 10;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const cardData = @json($quickwins);
    const slider = document.getElementById('slider');
    const wrapper = document.getElementById('slider-wrapper');

    const cardWidth = 384 + 32;
    let index = 1;
    const total = cardData.length;

    const createCard = (data) => {
      const card = document.createElement('div');
      card.className = 'card rounded-xl shadow-md text-center mx-4 text-white';
      card.innerHTML = `
        <img src="{{ asset('') }}${data.image}" alt="${data.title}" class="w-full h-64 object-cover rounded-t-xl">
        <div class="p-4">
          <h2 class="font-bold text-lg mb-2">${data.title}</h2>
          <p class="text-sm">${data.description}</p>
        </div>
      `;
      return card;
    };

    // Clone for looping
    slider.appendChild(createCard(cardData[total - 1]));
    cardData.forEach(item => slider.appendChild(createCard(item)));
    slider.appendChild(createCard(cardData[0]));

    const cards = () => Array.from(slider.children);

    function updateSlider(animate = true) {
      const offset = -(index * cardWidth - wrapper.offsetWidth / 2 + cardWidth / 2);
      slider.style.transition = animate ? 'transform 0.6s ease-in-out' : 'none';
      slider.style.transform = `translateX(${offset}px)`;

      cards().forEach((card, i) => {
        card.classList.remove('active');
        if (i === index) card.classList.add('active');
      });
    }

    document.getElementById('nextBtn').addEventListener('click', () => {
      if (index <= total) index++;
      updateSlider();
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
      if (index >= 0) index--;
      updateSlider();
    });

    slider.addEventListener('transitionend', () => {
      if (index === 0) {
        index = total;
        updateSlider(false);
      } else if (index === total + 1) {
        index = 1;
        updateSlider(false);
      }
    });

    window.addEventListener('resize', () => updateSlider(false));
    updateSlider(false);
  });
</script>
