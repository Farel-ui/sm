<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Smart City Kota Bogor</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
  <main>
    @yield('content')
  </main>
</body>
</html>

@include('components.navbar')
<style>
    body {
      margin: 0;
        font-family: 'Segoe UI', Arial, sans-serif;
        background-color: #f7f7f7;
    }

    .masterplan-box p {
        margin-top: 8px;
        font-size: 20px;
        padding: 0 20px;
        line-height: 1.5;
        font-weight: 500;
    }
        .masterplan-box {
        width: 100%;
        background: linear-gradient(to right, #0072ff, #00c6ff);
        color: white;
        padding: 20px 30px;
        border-radius: 5px;
    }
    

    .masterplan-box h2 {
        margin: 10px 0 10px;
        font-size: 48px;
        font-weight: bold;
        text-align: center;
        margin-right: 740px;
    }

        .tab-container {
        width: 100%;
        text-align: center;
        margin-top: 50px;
        margin-bottom: 50px;
        border-bottom: 1px solid #ddd;
    }

    .tab-container a {
        display: inline-block;
        padding: 10px 20px;
        font-size: 24px;
        text-decoration: none;
        color: black;
        font-weight: bold;
        transition: 0.3s;
    }

    .tab-container a.active {
        color: #0066ff;
        border-bottom: 3px solid #0066ff;
    }

    .tab-container a:hover {
        color: #0066ff;
    }
    
    .table-container {
    width: 80%;           /* 🔹 cuma setengah lebar layar */
    max-height: 400px;    /* 🔹 biar tabel ga kepanjangan */
    margin: 40px auto;    /* 🔹 posisikan ke tengah */
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    overflow-x : hidden;
    overflow-y: auto;
    border: 1px solid #ddd;
    }



    table {
      width: 100%;
      border-collapse: collapse;
      table-layout: fixed; /* biar kolom rata */
    }

    thead {
    background-color: #1666e3;
    color: white;
    position: sticky;  /* 🔹 biar header nempel */
    top: 0;            /* 🔹 posisinya di atas */
    z-index: 10;
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      font-size: 20px;
      text-align: left;
    }

    th:first-child, td:first-child {
      width: 60px;
      text-align: center;
    }

    th:last-child, td:last-child {
      width: 140px;
      text-align: center;
    }

    tbody tr:hover {
      background-color: #f0f4ff;
      transition: 0.2s;
    }

    /* Search di pojok kanan */
    .search-cell {
      text-align: right;
    }

    .search-box {
      position: relative;
      display: inline-block;
      width: 100%;
      max-width: 350px;
    }

.search-box input {
    width: 100%;
    padding: 8px 10px 8px 40px;
    border-radius: 6px;
    border: 1px solid #ccc;
    outline: none;
    font-size: 14px;
    box-sizing: border-box;
    background-color: #f9f9f9; /* default abu muda */
    transition: background-color 0.2s ease, border 0.2s ease;
}
.search-box input:focus {
    background-color: #a7a7a7ff; /* biru muda pas aktif */
    border: 2px solid #ffffffff;
}

/* styling pesan kosong */
.no-data {
    text-align: center;
    font-style: italic;
    color: #888;
    background-color: #f7f7f7; 
}


    .search-box i {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #666;
    }

    .eye-icon {
      font-size: 18px;
      color: #007bff;
      margin-left: 6px;
      vertical-align: middle;
      cursor: pointer;
      transition: transform 0.2s ease, color 0.2s ease;
    }

    .eye-icon:hover {
      transform: scale(1.2);
      color: #004bb5;
    }

    /* Styling default tombol lihat */
.table-container a {
  color: #007bff;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s ease;
}

/* Saat cursor hover */
.table-container a:hover {
  color: #ff6600;       /* ganti warna teks */
  text-decoration: underline; /* bisa underline biar jelas */
}

/* Kalau mau efek lebih "tombol" */
.table-container a {
  padding: 6px 12px;
  border-radius: 6px;
  background: transparent;
}

.table-container a:hover {
  color: #0252a7ff;          /* teks putih */
}



</style>
</head>
<body>
  <div class="masterplan-box">
    <h2>MASTERPLAN</h2>
    <p>
        Masterplan adalah rencana induk yang memberikan gambaran keseluruhan dari sebuah proyek atau kawasan, <br> termasuk rencana penggunaan lahan, infrastruktur, fasilitas umum, dan lain-lain
    </p>
</div>

<div class="tab-container">
  <a href="{{ route('masterplano') }}" class="{{ request()->routeIs('masterplano') ? 'active' : '' }}">MASTERPLAN</a>
  <a href="{{ route('paparan') }}" class="{{ request()->routeIs('paparan') ? 'active' : '' }}">PAPARAN</a>
  </div>


<div class="table-container">
  <table id="dataTable">
    <thead>
      <tr>
        <th style="width: 150px; text-align:center;">TAHUN</th>
        <th style="width: auto;">JUDUL</th>
        <th class="search-cell" style="width: 200px;">
          <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Pencarian...">
          </div>
        </th>
      </tr>
    </thead>
    <tbody>
      <tbody>
  <tr>
    <td style="text-align:center;">2017</td>
    <td>Analisis Strategi Smart City Kota Bogor Tahun 2017</td>
    <td>
      <a href="https://smartcity.kotabogor.go.id/assets/BOOKLET/buku-1.-analisis-strategis-smart-city-kota-bogor.pdf" target="_blank">Lihat</a>
      <i class="fas fa-eye eye-icon"></i>
    </td>
  </tr>
  <tr>
    <td style="text-align:center;">2017</td>
    <td>Newsletter Executive Summary Smart City Kota Bogor</td>
    <td>
      <a href="https://smartcity.kotabogor.go.id/assets/BOOKLET/buku-2.-masterplan-smart-city-kota-bogor.pdf" target="_blank">Lihat</a>
      <i class="fas fa-eye eye-icon"></i>
    </td>
  </tr>
  <tr>
    <td style="text-align:center;">2023</td>
    <td>Analisis Strategi Smart City Kota Bogor</td>
    <td>
      <a href="https://smartcity.kotabogor.go.id/assets/BOOKLET/newsletter-executive-summary-smart-city-kota-bogor.pdf" target="_blank">Lihat</a>
      <i class="fas fa-eye eye-icon"></i>
    </td>
  </tr>
    <tr>
    <td style="text-align:center;">2023</td>
    <td>Rencana Induk Smart City Kota Bogor Tahun</td>
    <td>
      <a href="https://smartcity.kotabogor.go.id/assets/BOOKLET/buku-3.smart-city-kota-bogor.pdf" target="_blank">Lihat</a>
      <i class="fas fa-eye eye-icon"></i>
    </td>
  </tr>
  <tr>
    <td style="text-align:center;">2023</td>
    <td>Executive Summary Rencana Induk Smart City Kota Bogor</td>
    <td>
      <a href="https://smartcity.kotabogor.go.id/assets/BOOKLET/buku-4.smart-city-kota-bogor.pdf" target="_blank">Lihat</a>
      <i class="fas fa-eye eye-icon"></i>
    </td>
  </tr>
  <td style="text-align:center;">2023</td>
    <td>Dokumen Quickwins Kota Bogor R5</td>
    <td>
      <a href="https://smartcity.kotabogor.go.id/assets/BOOKLET/dokumenQuickwins.pdf" target="_blank">Lihat</a>
      <i class="fas fa-eye eye-icon"></i>
    </td>
  </tr>
    </tbody>
  </table>
</div>


  <script>
    // Script pencarian
document.getElementById('searchInput').addEventListener('keyup', function () {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#dataTable tbody tr');
    let tbody = document.querySelector('#dataTable tbody');
    let matchFound = false;

    // hapus pesan kosong kalau ada
    let noDataRow = document.querySelector('.no-data');
    if (noDataRow) {
        noDataRow.remove();
    }

    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        if (text.includes(filter)) {
            row.style.display = '';
            matchFound = true;
        } else {
            row.style.display = 'none';
        }
    });

    // kalau tidak ada hasil → tambahin row dummy
    if (!matchFound) {
        let tr = document.createElement('tr');
        tr.classList.add('no-data');
        let td = document.createElement('td');
        td.colSpan = 3; // jumlah kolom tabel
        td.textContent = 'Data tidak ditemukan';
        tr.appendChild(td);
        tbody.appendChild(tr);
    }
});

  </script>
    @include('components.footer')
</body>
</html>
