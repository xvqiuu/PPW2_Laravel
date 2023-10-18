<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Buku;

class BukuController extends Controller
{
    public function index(){
        // mengambil data yang berada didalam tabel buku di database
        $data_buku = Buku::all();

        // menghitung jumlah baris
        $jumlah_data = Buku::count();

        // menghitung total harga
        $total_harga = 0;
        foreach ($data_buku as $buku) {
            $total_harga += $buku->harga;
        }

        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id','asc') -> paginate($batas);
        $no_buku = $batas * ($data_buku -> currentPage() - 1);

        // me-return hasilnya menggunakan sebuah view
        return view('index', compact('data_buku', 'jumlah_data', 'total_harga', 'jumlah_buku', 'no_buku'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $buku = new Buku;
        $buku -> judul = $request -> judul;
        $buku -> penulis = $request -> penulis;
        $buku -> harga = $request -> harga;
        $buku -> tgl_terbit = $request -> tgl_terbit;

        $pesan = [
            'required' => 'Kolom judul wajib diisi.',
            'string' => 'Kolom penulis harus berupa teks.',
            'max' => [
                'string' => 'Kolom penulis tidak boleh lebih dari :30 karakter.',
            ],
            'numeric' => 'Kolom harga harus berupa angka.',
            'date' => 'Kolom tanggal terbit harus berupa tanggal.',
        ];
        
        $atribut = [
            'judul' => 'Judul Buku',
            'penulis' => 'Penulis',
            'harga' => 'Harga',
            'tgl_terbit' => 'Tanggal Terbit',
        ];
        
        $this->validate($request, $pesan, $atribut);        

        // $this->validate($request,[
        //     'judul'  => 'required|string',
        //     'penulis' => 'required|string|max:30',
        //     'harga' => 'required|numeric',
        //     'tanggal terbit' =>'required|date'
        // ]);

        $buku -> save();
        // menambahkan pesan menggunakan with
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Simpan');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Hapus');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('update',compact('buku'));
    }

    public function update(Request $request, $id) {
        $buku = Buku::find($id);
        $buku->judul = $request-> judul;
        $buku->penulis = $request-> penulis;
        $buku->harga = $request-> harga;
        $buku->save();
        return redirect('/buku')->with('pesan','Data Buku Berhasil di Update');
    }

    public function search(Request $request){
        $batas = 5;
        $cari= $request->kata;
        $data_buku = Buku::where('judul','like',"%".$cari."%") -> orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $no_buku = $batas * ($data_buku -> currentPage() - 1);
        $jumlah_buku = Buku::count();

        // me-return hasilnya menggunakan sebuah view
        return view('search', compact( 'jumlah_buku', 'no_buku', 'data_buku','cari'));
    }


}
