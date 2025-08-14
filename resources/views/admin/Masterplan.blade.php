{{-- resources/views/masterplan/index.blade.php --}}
<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Welcome -->
   <div class="rounded-xl p-6" style="background-color: #1E60D5;">
    <h1 class="text-2xl font-bold text-white mb-2 flex items-center">
        <div class="p-2 rounded-lg mr-3 bg-cover bg-center"
             style="background-image: url('{{ asset('images/iconmasterplan.svg') }}')">
            <i class="fas fa-project-diagram text-white"></i>
        </div>
        Masterplan Dashboard
    </h1>
</div>


{{-- card data --}}

<!-- Container Card -->
<div class="flex gap-4 mt-6">
  <!-- Card 1 -->
  <div class="bg-blue-700 shadow-lg rounded-xl p-4 flex-1">
    <h3 class="text-white text-lg font-semibold mb-1">Total masterplan</h3>
    <p class="text-white text-sm">data 1</p>
  </div>

  <!-- Card 2 -->
  <div class="bg-blue-700 shadow-lg rounded-xl p-4 flex-1">
    <h3 class="text-white text-lg font-semibold mb-1">Masterplan aktif</h3>
    <p class="text-white text-sm">data 2</p>
  </div>

  <!-- Card 3 -->
  <div class="bg-blue-700 shadow-lg rounded-xl p-4 flex-1">
    <h3 class="text-white text-lg font-semibold mb-1">Masterplan tidak aktif</h3>
    <p class="text-white text-sm">data 3</p>
  </div>

  <!-- Card 4 -->
  <div class="bg-blue-700 shadow-lg rounded-xl p-4 flex-1">
    <h3 class="text-white text-lg font-semibold mb-1">Bulan ini</h3>
    <p class="text-white text-sm">data 4</p>
  </div>
</div>





    <!-- Card -->
            <div class="bg-white overflow-hidden shadow-sm rounded-t-xl mt-6 border border-gray-100">
    <!-- Header section -->
    <div class="px-6 py-5 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <!-- Kiri: Judul -->
            <h3 class="text-xl font-semibold text-gray-800">Daftar Masterplan</h3>

            <!-- Kanan: Tambah Baru + Search -->
            <div class="flex items-center gap-8">
                <input id="searchInput" type="text" placeholder="Cari..."
                       class="w-56 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <a href="{{ route('masterplan.create') }}"
                   class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-semibold rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow">
                    <i class="fas fa-plus mr-2"></i> Tambah Baru
                </a>
            </div>
        </div>
    </div>
</div>


        <!-- Table -->
        <div class="overflow-x-auto">
            @php
                // Start number aman: jika paginated pakai firstItem(), jika tidak mulai dari 1
                $start = method_exists($masterplan, 'firstItem') ? $masterplan->firstItem() : 1;
            @endphp
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No.</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Institution</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                    @forelse ($masterplan as $index => $mp)
                        <tr class="hover:bg-blue-50 transition">
                            <td class="px-6 py-4">{{ $start + $index }}</td>
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $mp->title }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $mp->institution }}</td>
                            <td class="px-6 py-4">
                                @if($mp->image)
                                    <img src="{{ asset('storage/masterplans/' . $mp->image) }}" class="h-12 w-12 rounded-lg object-cover border border-gray-200">
                                @else
                                    <span class="text-gray-500 italic">No image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('masterplan.edit', $mp->id) }}" class="text-yellow-600 hover:text-yellow-700" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('masterplan.destroy', $mp->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                                <i class="fas fa-folder-open text-3xl mb-2 text-gray-400"></i>
                                <p>Belum ada masterplan</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>



        <!-- Pagination: Prev / Next -->
        @if (method_exists($masterplan, 'hasPages') && $masterplan->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                <div class="text-sm text-gray-600">
                    Menampilkan
                    {{ method_exists($masterplan,'firstItem') ? $masterplan->firstItem() : 1 }}
                    –
                    {{ method_exists($masterplan,'lastItem') ? $masterplan->lastItem() : $masterplan->count() }}
                    {{ method_exists($masterplan,'total') ? 'dari '.$masterplan->total().' data' : 'data' }}
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ $masterplan->previousPageUrl() }}"
                       class="px-3 py-2 rounded-lg border border-gray-300 text-sm hover:bg-gray-50
                              {{ $masterplan->onFirstPage() ? 'pointer-events-none opacity-50' : '' }}">
                        ← Prev
                    </a>
                    <a href="{{ $masterplan->nextPageUrl() }}"
                       class="px-3 py-2 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700
                              {{ $masterplan->hasMorePages() ? '' : 'pointer-events-none opacity-50' }}">
                        Next →
                    </a>
                </div>
            </div>
        @endif
    </div>

    <!-- Client-side search (opsional) -->
    <script>
        const input = document.getElementById('searchInput');
        if (input) {
            input.addEventListener('input', function () {
                const term = this.value.toLowerCase();
                document.querySelectorAll('#tableBody tr').forEach(tr => {
                    tr.style.display = tr.innerText.toLowerCase().includes(term) ? '' : 'none';
                });
            });
        }
    </script>
</x-app-layout>
