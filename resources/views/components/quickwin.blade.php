<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<section class="py-16">
  <h2 class="text-3xl font-bold text-center mb-12">PROGRAM IMPLEMENTASI SMART CITY</h2>

  <div class="mx-12">

      <div class="relative max-w-7xl mx-auto px-20" style="padding-top: 60px; padding-bottom: 60px;">
        <div class="swiper quickwinSwiper pb-12">
          <div class="swiper-wrapper">
            @foreach($quickwins as $quickwin)
            <div class="swiper-slide">
              <div class="card rounded-xl shadow-md text-center text-white flex flex-col overflow-hidden mx-auto">
                <img src="{{ asset('images/quickwins/' . $quickwin->image) }}"
                     alt="{{ $quickwin->title }}"
                     class="w-full h-64 object-cover rounded-t-xl">
                <div class="p-4 flex-1 flex flex-col justify-between">
                  <div>
                    <h2 class="font-bold text-lg mb-2">{{ $quickwin->title }}</h2>
                    <p class="text-sm">{{ $quickwin->description }}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <!-- Navigasi -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>

          <!-- Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
  </div>
</section>

<style>
  .quickwinSwiper {
    padding-top: 30px;
    padding-bottom: 30px;
  }

  .swiper-wrapper {
    padding-top: 10px;
    padding-bottom: 10px;
  }

  .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .card {
    width: 100%;
    max-width: 350px;
    height: 400px;
    background-color: #D6E4F0;
    transition: all 0.3s ease;
  }

  .swiper-slide-active .card {
    background-color: #1E60D5;
    transform: scale(1.05);
  }

  /* Tombol navigasi */
  .quickwinSwiper .swiper-button-next,
  .quickwinSwiper .swiper-button-prev {
    color: #1E60D5;
    font-weight: bold;
    width: 50px;
    height: 50px;
    border: 3px solid #1E60D5;
    border-radius: 50%;
    background-color: white;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
  }

  .quickwinSwiper .swiper-button-next::after,
  .quickwinSwiper .swiper-button-prev::after {
    font-size: 20px;
    font-weight: bold;
  }

  .quickwinSwiper .swiper-button-prev {
    left: 0;
  }

  .quickwinSwiper .swiper-button-next {
    right: 0;
  }

  /* Pagination */
  .swiper-pagination {
    position: relative;
    margin-top: 32px;
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

  /* Responsive */
  @media (max-width: 1024px) {
    .quickwinSwiper .swiper-button-next,
    .quickwinSwiper .swiper-button-prev {
      width: 40px;
      height: 40px;
    }

    .quickwinSwiper .swiper-button-next::after,
    .quickwinSwiper .swiper-button-prev::after {
      font-size: 16px;
    }
  }
</style>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.quickwinSwiper', {
      slidesPerView: 3,
      spaceBetween: 40,
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
        320: {
          slidesPerView: 1,
          spaceBetween: 20,
          centeredSlides: true
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 30,
          centeredSlides: true
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 40,
          centeredSlides: true
        },
      },
    });
  });
</script>
