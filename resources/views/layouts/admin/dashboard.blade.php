@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>
    <ul class="list-disc ml-6 text-blue-700">
        <li><a href="{{ route('masterplans.index') }}">Kelola Masterplan</a></li>
        <li><a href="{{ route('quickwins.index') }}">Kelola Quick Win</a></li>
        <li><a href="{{ route('dimensions.index') }}">Kelola Dimensi</a></li>
        <li><a href="{{ route('booklets.index') }}">Kelola Booklet</a></li>
        <li><a href="{{ route('igas.index') }}">Kelola Peserta IGA</a></li>
        <li><a href="{{ route('assessments.index') }}">Kelola Penilaian</a></li>
    </ul>
</div>
@endsection
