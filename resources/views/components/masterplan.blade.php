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
              <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                 class="text-gray-600 text-xs font-semibold hover:text-blue-600 transition-colors duration-200">
                LIHAT SELENGKAPNYA &gt;&gt;
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endforeach

    {{-- == PAPARAN MASTERPLAN == --}}
    @php
      $paparans = $masterplans->where('type', 'paparan');
    @endphp

    @if ($paparans->count())
      <div class="mb-10">
        <!-- Judul Paparan -->
        <div class="bg-gray-200 text-xl font-bold px-10 py-2 rounded-tr-3xl rounded-bl-3xl rounded-tl-none rounded-br-none mx-auto w-full mb-4">
          POWERPOINT
        </div>

        <!-- Grid Paparan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          @foreach ($paparans as $item)
            <div class="border border-gray-500 rounded-tr-3xl rounded-bl-3xl rounded-tl-none rounded-br-none px-4 py-4 shadow-sm hover:shadow-md transition">
              <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->title }}</h3>
              <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                 class="text-gray-600 text-xs font-semibold hover:text-green-600 transition-colors duration-200">
                LIHAT SELENGKAPNYA &gt;&gt;
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endif

  </div>
</section>