<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="py-16">
  <h2 class="text-3xl font-bold text-center mb-12">BOOKLET SMART CITY</h2>

  <div class="relative max-w-6xl mx-auto overflow-hidden" style="padding-top: 60px; padding-bottom: 60px;">
    <div class="swiper bookletSwiper pb-12">
      <div class="swiper-wrapper">
        @foreach ($booklets as $booklet)
        <div class="swiper-slide flex justify-center">
          <a href="{{ asset('storage/booklet/' . $booklet->file) }}" target="_blank"
             class="booklet-card rounded-xl shadow-md text-center text-white flex flex-col overflow-hidden cursor-pointer">
            <img src="{{ asset('images/booklet/' . $booklet->image) }}" alt="{{ $booklet->title }}"
                 class="w-full h-[420px] object-cover rounded-t-xl">
            <div class="p-4 flex-1 flex flex-col justify-between">
              <div>
                <h2 class="font-bold text-lg mb-2">{{ $booklet->title }}</h2>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>

      <!-- Navigasi -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-8"></div>
    </div>
  </div>
</section>

<style>

  .swiper-wrapper {
    padding-top: 20px; /* Beri ruang di bawah */
  }

  .booklet-card {
    width: 100%;
    max-width: 400px;
    height: 500px;
    background-color: #D6E4F0;
    transition: all 0.3s ease;
  }

  .swiper-slide-active .booklet-card {
    background-color: #1E60D5;
    transform: scale(1.05);
  }

  /* Tombol navigasi lebih tebal dan besar */
  .swiper-button-next,
  .swiper-button-prev {
    color: #1E60D5;
    font-weight: bold;
    width: 50px;
    height: 50px;
    border: 3px solid #1E60D5;
    border-radius: 50%;
    background-color: white;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  }

  .swiper-button-next::after,
  .swiper-button-prev::after {
    font-size: 20px;
    font-weight: bold;
  }

  /* Pagination agak ke bawah dan lebih besar */
  .swiper-pagination {
    position: relative;
    margin-top: 24px;
  }

  .swiper-pagination-bullet {
    width: 12px;
    height: 12px;
    background-color: #ccc;
    opacity: 1;
  }

  .swiper-pagination-bullet-active {
    background-color: #1E60D5;
  }
</style>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.bookletSwiper', {
      slidesPerView: 1,
      spaceBetween: 30,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        640: { slidesPerView: 1, spaceBetween: 20 },
        768: { slidesPerView: 2, spaceBetween: 30 },
        1024: { slidesPerView: 3, spaceBetween: 40 },
      },
    });
  });
</script>
