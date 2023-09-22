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

        // Untuk memberi nomor baris data
        $no = 1;

        // me-return hasilnya menggunakan sebuah view
        return view('index', compact('data_buku', 'jumlah_data', 'total_harga', 'no'));
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
        $buku -> save();
        return redirect('/buku');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
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
        return redirect('/buku');
    }

}
