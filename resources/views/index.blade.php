<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <title>Buku</title>
</head>
<body>
<table class= "table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        <h1 align='center'>Daftar Buku</h1>
        <br>

        <p align='center'><a href="{{ route('buku.create') }}"> Tambah Buku </a> 
        </p>

        @foreach($data_buku as $buku)
        <tr>
            <td>{{$buku -> id}}</td>
            <td>{{$buku -> judul}}</td>
            <td>{{$buku -> penulis}}</td>
            <td>{{"Rp " .$buku -> harga}}</td>
            <td>{{$buku -> tgl_terbit}}</td>

            <td>
                <form action= "{{route('buku.destroy',$buku->id)}}" method="post">
                    @csrf
                    <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger">Hapus</button>
                </form>

                <br>

                <a href="{{route('buku.edit', ['id' => $buku->id]) }}" class="btn btn-primary">Edit</a>
                
            </td>

        </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <th> TOTAL </th>
            <th>{{ $jumlah_data }}</th>
            <th colspan="1"></th>
            <th>{{ $total_harga }}</th>
        </tr>
    </tfoot>

   
</table>
</body>
</html>
