@extends('admin.layouts.app') <!-- layout admin -->

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-bold mb-4">Masterplan Admin</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Institution</th>
                    <th>Image</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @php $start = $masterplans->firstItem() ?? 1; @endphp
                @forelse($masterplans as $index => $mp)
                    <tr>
                        <td>{{ $start + $index }}</td>
                        <td>{{ $mp->title }}</td>
                        <td>{{ $mp->institution }}</td>
                        <td>
                            @if($mp->image)
                                <img src="{{ asset('storage/masterplans/'.$mp->image) }}" class="h-12 w-12 rounded-lg object-cover">
                            @else
                                <span>No image</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.masterplan.edit', $mp->id) }}">Edit</a>
                            <form action="{{ route('admin.masterplan.destroy', $mp->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Belum ada masterplan</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex justify-between">
        <a href="{{ $masterplans->previousPageUrl() }}" class="{{ $masterplans->onFirstPage() ? 'opacity-50 pointer-events-none' : '' }}">← Prev</a>
        <a href="{{ $masterplans->nextPageUrl() }}" class="{{ $masterplans->hasMorePages() ? '' : 'opacity-50 pointer-events-none' }}">Next →</a>
    </div>
</div>
@endsection
