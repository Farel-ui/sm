<!-- Navbar Wrapper -->
<div id="navbar" class="sticky top-0 z-50 w-full h-20 flex items-center px-4 bg-transparent transition-all duration-300 ease-in-out">

  <!-- Jajar Genjang (Trapezoid) di Kiri -->
  <div class="absolute top-0 left-0 h-20 w-[220px] bg-white z-0"
       style="clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);">
  </div>

  <!-- Isi Navbar -->
  <div class="relative z-10 flex items-center w-full">
    <!-- Logo + Teks -->
    <a href="{{ url('/') }}" class="flex items-center space-x-5 text-blue-700">
      <img src="/images/logo.png" alt="Logo" class="h-12 w-12">
      <span class="text-blue-600 text-xl font-bold leading-tight">
        KOTA<br>BOGOR
      </span>
    </a>

   <!-- Tambahkan x-data ke parent UL jika belum -->
<ul id="menuText" class="flex space-x-12 text-sxl font-medium relative z-10 ml-16 transition-colors duration-300 text-blue-700" x-data="{ openDropdown: false }">
  <li><a href="{{ url('/') }}">Home</a></li>
  <li><a href="#">Program Implementasi</a></li>
  <li><a href="{{ url('/assessment') }}">Penilaian</a></li>

  <!-- Dropdown Dokumen -->
<li class="relative" x-data="{ open: false }">
  <button @click="open = !open" class="flex items-center gap-1 hover:text-blue-500 focus:outline-none">
    Dokumen
    <!-- Panah (Chevron Down) -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-transform duration-200"
         :class="{ 'rotate-180': open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
    </svg>
  </button>
  <ul
    x-show="open"
    x-transition
    @click.outside="open = false"
    class="absolute left-0 mt-2 w-64 bg-white text-blue-700 dark:text-white rounded-md shadow-md text-sm z-50 transition-colors duration-300 dropdown-menu"
  >
    <li>
      <a href="{{ url('/masterplan/buku') }}" class="block px-4 py-2 hover:bg-blue-100">
        Masterplan Buku
      </a>
    </li>
    <li>
      <a href="{{ url('/masterplan/paparan') }}" class="block px-4 py-2 hover:bg-blue-100">
        Paparan Masterplan
      </a>
    </li>
  </ul>
</li>

  <li><a href="https://bsw.kotabogor.go.id/">Layanan+</a></li>
</ul>


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  </div>
</div>
  <script>
  const navbar = document.getElementById("navbar");
  const menuText = document.getElementById("menuText");
  const dropdownMenus = document.querySelectorAll(".dropdown-menu");

  function updateNavbarStyle() {
    if (window.scrollY > 50) {
      navbar.classList.remove("bg-transparent");
      navbar.classList.add("bg-blue-600", "shadow-md", "animate-slide-down");

      menuText.classList.remove("text-blue-700");
      menuText.classList.add("text-white");

      dropdownMenus.forEach(menu => {
        menu.classList.remove("bg-white", "text-blue-700");
        menu.classList.add("bg-blue-700", "text-white");

        const links = menu.querySelectorAll("a");
        links.forEach(link => {
          link.classList.remove("text-blue-700", "hover:bg-blue-100");
          link.classList.add("text-white", "hover:bg-blue-500");
        });
      });

    } else {
      navbar.classList.remove("bg-blue-600", "shadow-md", "animate-slide-down");
      navbar.classList.add("bg-transparent");

      menuText.classList.remove("text-white");
      menuText.classList.add("text-blue-700");

      dropdownMenus.forEach(menu => {
        menu.classList.remove("bg-blue-700", "text-white");
        menu.classList.add("bg-white", "text-blue-700");

        const links = menu.querySelectorAll("a");
        links.forEach(link => {
          link.classList.remove("text-white", "hover:bg-blue-500");
          link.classList.add("text-blue-700", "hover:bg-blue-100");
        });
      });
    }
  }

  // Jalankan saat scroll dan saat awal load
  window.addEventListener("scroll", updateNavbarStyle);
  window.addEventListener("DOMContentLoaded", updateNavbarStyle);
</script>
