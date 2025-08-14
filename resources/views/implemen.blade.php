<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Smart City Kota Bogor</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
* { margin: 0; padding: 0; box-sizing: border-box; }
    body {

      font-family: arial, sans-serif;
      background: linear-gradient(to right, #f3f9ff, #eaf3fa);
      color: #333;
      overflow-x: hidden;
    }

    .wrapper {
      display: flex; flex-direction: column; align-items: center;
      padding: 2rem 1rem 4rem 1rem;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .header-container {
      background: linear-gradient(135deg, #b5d1f0, #c9dff6);
      padding: 3rem 2rem;
      border-radius: 0 0 2.5rem 2.5rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      text-align: center;
      margin-bottom: 40px;
      width: 100%; max-width: 900px;
      transition: background 0.3s ease;
    }

    .header-container h1 {
      font-weight: 700; font-size: 1.85rem;
      color: #2a2a2a; line-height: 1.4;
      text-transform: uppercase; letter-spacing: 1.4px;
    }

    .btn-group {
      display: flex; flex-wrap: wrap; justify-content: center;
      gap: 10px; margin-bottom: 40px; max-width: 900px;
    }

    .btn {
      background: linear-gradient(to right, #327af0, #5696ff);
      color: white; border: none; border-radius: 40px;
      padding: 12px 28px; font-size: 15px; font-weight: 590;
      cursor: pointer;
      box-shadow: 0 3px 8px rgba(50, 122, 240, 0.3);
      transition: all 0.3s ease-in-out;
    }

    .btn:hover { background: #0056b3; transform: scale(1.05); }

    .btn.selected {
      background: white; color: #327af0;
      border: 2px solid #327af0;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px; max-width: 800px; width: 100%;
      position: relative;
    }

    .box {
      background-color: #fff; border-radius: 1px;
      overflow: hidden;
      box-shadow: 0 8px 18px rgba(0, 0, 0, 0.06);
      position: relative;
    }
    .box:hover {
      background-color: #f1f1f1;
      box-shadow: 0 12px 20px rgba(0,0,0,0.15);
    }

    .box img {
      width: 100%; height: 450px;
      object-fit: cover; object-position: center;
      display: block;
    }

    .box.hide { display: none; }

    .nav-button {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 50%;
      cursor: pointer;
      z-index: 10;
      font-size: 16px;
    }

    .nav-button.left {
      left: 10px;
    }

    .nav-button.right {
      right: 10px;
    }

    @media (max-width: 600px) {
      .header-container h1 { font-size: 1.2rem; }
      .btn { font-size: 13px; padding: 8px 18px; }
      .box img { height: 200px; }
    }

    .box img.fade-out {
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .box img.fade-in {
      opacity: 1;
      transition: opacity 0.5s ease;
    }

    /* Tambahkan kode ini saja */
    .g {
      display: flex;
      justify-content: center;
    }
    .g img {
      display: block;
      margin: 0 auto;
    }

    /* ===== Animasi fade-in + slide-up untuk gambar bawah ===== */
    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .g img {
      opacity: 0;
      animation: fadeInUp 1s ease-in-out forwards;
    }


    .gambar img {
      width: 100%; height: 450px;
      object-fit: cover; object-position: center;
      display: block;
    }

    .gambar:hover {
      background-color: #f1f1f1;
      box-shadow: 0 12px 20px rgba(0,0,0,0.15);
    }
  </style>
</head>



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
  <li><a href="{{ url('/penilaian') }}">Penilaian</a></li>

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

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Smart City Kota Bogor</title>
  <link rel="stylesheet" href="dev.css">
  <style>

  </style>
</head>
<body>
  <div class="wrapper">
    <header class="header-container">
      <h1>IMPLEMENTASI PROGRAM SMART CITY<br>KOTA BOGOR</h1>
    </header>

    <div class="btn-group">
      <button class="btn selected" data-filter="all">TATA KELOLA CERDAS</button>
      <button class="btn" data-filter="DPMPSTP">EKONOMI CERDAS</button>
      <button class="btn" data-filter="BPKSDM">MEREK CERDAS</button>
      <button class="btn" data-filter="BAPENDA">MASYARAKAT CERDAS</button>
      <button class="btn" data-filter="DISKOMINFO">HIDUP CERDAS</button>
      <button class="btn" data-filter="DINKES">LINGKUNGAN CERDAS</button>
    </div>

    <div class="grid">
      <div class="box all">
        <img src="http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide4.JPG" alt="Smart Governance">
      </div>
      <div class="box DPMPSTP hide">
        <img src="http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide5.JPG" alt="Smart Economy">
      </div>
      <div class="box BPKSDM hide">
        <img src="http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide6.JPG" alt="Smart Branding">
      </div>
      <div class="box BAPENDA hide">
        <img src="http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide7.JPG" alt="Smart Living">
      </div>
      <div class="box DISKOMINFO hide">
        <button class="nav-button left" style="display: none;">←</button>
        <img src="http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide8.JPG" alt="Smart Environment">
        <button class="nav-button right" style="display: none;">→</button>
      </div>
      <div class="box DINKES hide">
        <button class="nav-button left" style="display: none;">←</button>
        <img src="http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide11.jpg" alt="Smart Society">
        <button class="nav-button right" style="display: none;">→</button>
      </div>
    </div>
  </div>

<div class="g">
  <div class="gambar">
    <img src="http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide13.jpg" alt="">
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.btn-group .btn');
  const boxes = document.querySelectorAll('.box');
  const slides = {
    DISKOMINFO: [
      "http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide8.JPG",
      "http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide9.JPG",
      "http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide10.JPG"
    ],
    DINKES: [
      "http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide10.JPG",
      "http://smartcity.kotabogor.go.id/assets/gambar/screen/Slide10.JPG"
    ]
  };

  let currentIndex = 0;
  let currentCategory = '';

  function updateSlider() {
    const box = document.querySelector(.box.${currentCategory});
    const img = box.querySelector('img');
    img.src = slides[currentCategory][currentIndex];
    img.alt = ${currentCategory} slide ${currentIndex + 1};

    const leftBtn = box.querySelector('.nav-button.left');
    const rightBtn = box.querySelector('.nav-button.right');
    if (slides[currentCategory].length > 1) {
      leftBtn.style.display = currentIndex > 0 ? 'block' : 'none';
      rightBtn.style.display = currentIndex < slides[currentCategory].length - 1 ? 'block' : 'none';
    } else {
      leftBtn.style.display = rightBtn.style.display = 'none';
    }
  }

  buttons.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.dataset.filter;
      currentCategory = filter;
      currentIndex = 0;
      buttons.forEach(b => b.classList.remove('selected'));
      btn.classList.add('selected');

      boxes.forEach(box => {
        box.classList.add('hide');
        if ((filter === 'all' && box.classList.contains('all')) || box.classList.contains(filter)) {
          box.classList.remove('hide');
        }
      });

      if (slides[filter]) updateSlider();
    });
  });

  document.querySelectorAll('.nav-button.left').forEach(button => {
    button.addEventListener('click', () => {
      if (currentIndex > 0) {
        currentIndex--;
        updateSlider();
      }
    });
  });

  document.querySelectorAll('.nav-button.right').forEach(button => {
    button.addEventListener('click', () => {
      if (currentIndex < slides[currentCategory].length - 1) {
        currentIndex++;
        updateSlider();
      }
    });
  });
});
</script>

@include('components.footer')


</body>
</html>
  </script>
</body>
</html>
