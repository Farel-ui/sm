<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Chart</title>
</head>
<body>
    <h1>Edit Data Chart</h1>

    {{-- Tampilkan pesan error jika ada --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('chart.update', $chart->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="tahun">Tahun:</label>
        <input type="number" name="tahun" value="{{ $chart->tahun }}" required><br><br>

        <label for="nilai">Nilai:</label>
        <input type="number" step="0.01" name="nilai" value="{{ $chart->nilai }}" required><br><br>

        <button type="submit">Update</button>
        <a href="{{ route('chart.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
</body>
</html>
