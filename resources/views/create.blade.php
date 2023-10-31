<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <title>Create</title>
</head>
<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; background-color: #0D617D;  color: white;">
<div class="container-sm">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <h1 align="center" style="font-weight: bold; font-size:xx-large;">Tambah Buku</h1>
    <br>
    <form method="post" action="{{ route('buku.store') }}">
        @csrf
        <table class="table table-bordered" style="color: white; font-weight:bold; font-size:large;">
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" class="form-control"  placeholder=" "></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" class="form-control"  placeholder=" "></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" class="form-control"  placeholder=" "></td>
            </tr>
            <tr>
                <td>Tanggal Terbit</td>
                <td><input type="date" id="tgl_terbit" name="tgl_terbit" class="date form-control" placeholder="dd/mm/yyyy"></td>
            </tr>
            <tr>   
                <td align="right" colspan="2">
                    <button type="submit" class="btn" style="background-color:#04364A; color: white;">Simpan</button>
                    <a href="/buku" class="btn btn-secondary" style=" color:white;">&nbsp; Batal &nbsp;</a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
