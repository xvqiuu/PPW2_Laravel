<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <title>Buku</title>
</head>
<body style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;" class="container-sm">

<table class= "table table-bordered"  style="background-color:#219C90; color: white;">
    <thead style="background-color: #037E72;">
        <tr align="center">
            <th>Id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tanggal Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody align="center">
        @if(Session::has('pesan'))
            <div class="alert alert-success">{{Session::get('pesan')}}</div>
        @endif
        <br>
        <h1 align='center' style="font-size:xx-large; font-weight: medium;">Daftar Buku</h1>
        <br>
        
        <h1 align='left' style="font-size: large; font-weight: medium;"><a class="btn" style="background-color: #219C90; color: white; font-weight: bold;" href="{{ route('buku.create') }}"> Tambah Buku </a> 
        </h1>

        <br>
        <div style="font-size:large; font-weight: medium;">{{ "Jumlah Buku : " .$jumlah_buku ." buku"}}</div>
        
        <div align="center"> {{ $data_buku -> links() }}</div>  

        <form action="{{ route('buku.search')}}" method="get">
            @csrf
            <input type="text" name="kata" class="form-control" placeholder= "Cari ....." style=" width:40%;
                display: inline; margin-top: 10px; margin-bottom: 10px; float: rigth;">
        </form>

        @foreach($data_buku as $buku)
        <tr>
            <td>{{$buku -> id}}</td>
            <td align="left">{{$buku -> judul}}</td>
            <td align="left">{{$buku -> penulis}}</td>
            
            <!-- number_format digunakan untuk memformat angka pada kolom harga -->
            <td>{{"Rp ".number_format($buku -> harga, 0, ',', '.')}}</td> 
            <td>{{\Carbon\Carbon::parse($buku->tgl_terbit)->format('dd/mm/yyyy') }}</td>

            <td>
                <form action= "{{route('buku.destroy',$buku->id)}}" method="post">
                    @csrf
                    <button onClick="return confirm('Yakin mau dihapus?')" class="btn btn-danger" style="font-weight: 700;">Hapus</button>
                </form>

                <br>

                <a href="{{route('buku.edit', ['id' => $buku->id]) }}" class="btn" style="background-color:#EE9322; color:white; font-weight:700;">&nbsp; Edit &nbsp;</a>
                
            </td>

        </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr  align="center">
            <th> Jumlah </th>
            <th>{{ $jumlah_data }}</th>
            <th colspan="1"></th>
            <th> {{"Rp " .number_format($total_harga, 0, ',', '.') }}</th>
            <th colspan="1"></th>
        </tr>
    </tfoot>

</table>
</body>
</html>
