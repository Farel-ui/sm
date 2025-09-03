<!-- Navbar Wrapper -->
<div id="navbar" class="sticky top-0 z-50 w-full h-20 flex items-center px-4 bg-transparent transition-all duration-300 ease-in-out">

  <!-- Jajar Genjang (Trapezoid) di Kiri -->
  <div class="absolute top-0 left-0 h-20 w-[260px] bg-white z-0"
       style="clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);">
  </div>

  <!-- Isi Navbar -->
  <div class="relative z-10 flex items-center w-full">
    <!-- Logo + Teks -->
    <a href="{{ url('/') }}" class="flex items-center space-x-2 text-blue-700">
      <img src="/images/logolo.svg" alt="Logo" class="h-16 w-16">
      <span class="text-indigo-800 text-lg font-bold leading-tight">
        SMART CITY<br>KOTA BOGOR
      </span>
    </a>

    <!-- Menu Desktop -->
    <ul id="menuText" class="hidden md:flex space-x-12 text-sxl font-medium relative z-10 ml-16 transition-colors duration-300 text-blue-700">
      <li><a href="{{ url('/') }}">Beranda</a></li>
      <li><a href="{{ url('/implementasi') }}">Program Implementasi</a></li>
      <li><a href="{{ url('/penilaian') }}">Penilaian</a></li>
      <li><a href="{{ url('/Dokumen') }}">Dokumen</a></li>
      <li><a href="https://bsw.kotabogor.go.id/">Layanan+</a></li>
    </ul>

    <!-- Tombol Hamburger (Mobile) -->
    <button id="hamburger" class="ml-auto md:hidden flex flex-col space-y-1.5 focus:outline-none">
      <span class="block w-7 h-0.5 bg-blue-700 transition-all"></span>
      <span class="block w-7 h-0.5 bg-blue-700 transition-all"></span>
      <span class="block w-7 h-0.5 bg-blue-700 transition-all"></span>
    </button>
  </div>
</div>

<!-- Menu Mobile -->
<div id="mobileMenu" class="hidden md:hidden bg-white shadow-lg">
  <ul class="flex flex-col space-y-4 p-4 text-blue-700 font-medium">
    <li><a href="{{ url('/') }}">Beranda</a></li>
    <li><a href="{{ url('/implementasi') }}">Program Implementasi</a></li>
    <li><a href="{{ url('/penilaian') }}">Penilaian</a></li>
    <li><a href="{{ url('/Dokumen') }}">Dokumen</a></li>
    <li><a href="https://bsw.kotabogor.go.id/">Layanan+</a></li>
  </ul>
</div>

<script>
  const navbar = document.getElementById("navbar");
  const menuText = document.getElementById("menuText");
  const hamburger = document.getElementById("hamburger");
  const mobileMenu = document.getElementById("mobileMenu");

  function updateNavbarStyle() {
    if (window.scrollY > 50) {
      navbar.classList.remove("bg-transparent");
      navbar.classList.add("bg-blue-600", "shadow-md", "animate-slide-down");

      menuText.classList.remove("text-blue-700");
      menuText.classList.add("text-white");

      hamburger.querySelectorAll("span").forEach(bar => {
        bar.classList.remove("bg-blue-700");
        bar.classList.add("bg-white");
      });
    } else {
      navbar.classList.remove("bg-blue-600", "shadow-md", "animate-slide-down");
      navbar.classList.add("bg-transparent");

      menuText.classList.remove("text-white");
      menuText.classList.add("text-blue-700");

      hamburger.querySelectorAll("span").forEach(bar => {
        bar.classList.remove("bg-white");
        bar.classList.add("bg-blue-700");
      });
    }
  }

  window.addEventListener("scroll", updateNavbarStyle);
  window.addEventListener("DOMContentLoaded", updateNavbarStyle);

  // Toggle menu mobile
  hamburger.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
  });
</script>
