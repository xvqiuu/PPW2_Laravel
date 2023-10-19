{{-- @extends('layouts.master') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Update</title>
</head>
<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; background-color: #0D617D;  color: white;" class="container-sm">
    {{-- @extends('layouts.master') --}}

    {{-- @section('content') --}}
    <br>
    <h1 align="center" style="font-weight: bold; font-size:xx-large; color: white;">Edit Buku</h1>
    <br>

    <form method="POST" action="{{ route('buku.update', ['id' => $buku->id]) }}" class="form">
        @csrf
        @method('PUT')
        <table class="table table-bordered" style="color: white; font-weight:bold; font-size:large;">
            <tr>
                <td><label for="judul">Judul</label></td>
                <td><input type="text" name="judul" value="{{ $buku->judul }}"  class="form-control" style="color:black;"></td>
            </tr>
            <tr>
                <td><label for="penulis">Penulis</label></td>
                <td><input type="text" name="penulis" value="{{ $buku->penulis }}" class="form-control" style="color:black;"></td>
            </tr>
            <tr>
                <td><label for="harga">Harga</label></td>
                <td><input type="text" name="harga" value="{{ $buku->harga }}"  class="form-control" placeholder=" "></td>
            </tr>
            <tr>
                <td><label for="tgl_terbit">Tanggal Terbit</label></td>
                <td><input type="date" id="tgl_terbit" name="tgl_terbit" class="date form-control" placeholder="dd/mm/yyyy"></td>
            </tr>
            <tr>
                <td align="right" colspan="2">
                    <!-- Tambahkan tombol "Simpan Perubahan" -->
                    <button type="submit" class="btn" style="background-color:#04364A; color: white;">Simpan Perubahan</button>
                </td>
            </tr>
        </table>
    </form>
    {{-- @endsection --}}

</div>
</body>
</html>