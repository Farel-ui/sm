<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City Kota Bogor</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
@include('components.navbar')
<section id="masterplans" class="py-16 bg-white">
  <div class="max-w-7xl mx-auto px-6">

    <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center">
      MASTERPLAN SMART CITY KOTA BOGOR
    </h2>

    {{-- == MASTERPLAN BUKU PER PERIODE == --}}
    @foreach ($masterplans->where('type', 'buku')->groupBy('period') as $period => $items)
      <div class="mb-12">
        <!-- Judul Periode -->
        <div class="bg-gray-200 text-xl font-bold px-10 py-2 rounded-tr-3xl rounded-bl-3xl rounded-tl-none rounded-br-none mx-auto w-full text-left mb-4">
          MASTERPLAN SMART CITY KOTA BOGOR {{ strtoupper($period) }}
        </div>

        <!-- Daftar Buku -->
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
          @foreach ($items as $item)
            <div class="border border-gray-500 rounded-tr-3xl rounded-bl-3xl rounded-tl-none rounded-br-none px-4 py-4 shadow-sm hover:shadow-md transition">
              <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->title }}</h3>
              <a href="{{ asset('storage/masterplans/' . $item->file) }}" target="_blank"
                 class="text-gray-600 text-xs font-semibold hover:text-blue-600 transition-colors duration-200">
                LIHAT SELENGKAPNYA &gt;&gt;
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endforeach
</div>
</section>
