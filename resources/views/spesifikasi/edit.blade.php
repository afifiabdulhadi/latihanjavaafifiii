@extends('template')
@section('judul_halaman','')
@section('konten')
<!-- resources/views/posts/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <titel>Edit Post</titel>
</head>
<body>
    <h1>Edit Post</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('spesifikasi.update', $spesifikasi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="brand">BRAND:</label>
            <input type="brand" id="brand" name="brand" value="{{ old('brand', $spesifikasi->brand) }}">
            @error('brand')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="model">MODEL:</label>
            <input type="text" id="model" name="model" value="{{ old('model', $spesifikasi->model) }}">
            @error('model')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="ram">RAM:</label>
            <input type="text" id="ram" name="ram" value="{{ old('ram', $spesifikasi->ram) }}">
            @error('ram')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="processor">PROCESSOR:</label>
            <input type="text" id="processor" name="processor" value="{{ old('processor', $spesifikasi->processor) }}">
            @error('processor')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="pixelkamera">PX KAMERA:</label>
            <input type="text" id="pixelkamera" name="pixelkamera" value="{{ old('pixelkamera', $spesifikasi->pixelkamera) }}">
            @error('pixelkamera')
                <p>{{ $message }}</p>
            @enderror
        </div>


        <button type="submit">Update Post</button>
    </form>
</body>
</html>
@endsection
