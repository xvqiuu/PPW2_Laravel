{{-- @extends('layouts.master') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
    {{-- @extends('layouts.master') --}}

    {{-- @section('content') --}}
    <h1>Edit Buku</h1>

    <form method="POST" action="{{ route('buku.update', ['id' => $buku->id]) }}" class="form">
        @csrf
        @method('PUT')

        <!-- Tambahkan input fields untuk mengedit atribut buku -->
        <div>
            <label for="judul">Judul:</label>
            <input type="text" name="judul" value="{{ $buku->judul }}">
        </div>
        
        <div>
            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" value="{{ $buku->penulis }}">
        </div>
        
        <div>
            <label for="harga">Harga:</label>
            <input type="text" name="harga" value="{{ $buku->harga }}">
        </div>
        

        <!-- Tambahkan tombol "Simpan Perubahan" -->
        <button type="submit">Simpan Perubahan</button>
    </form>
    {{-- @endsection --}}
</body>
</html>

