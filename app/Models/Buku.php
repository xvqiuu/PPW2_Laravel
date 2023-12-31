<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primarykey = 'id';
    protected $fillable = ['judul','penulis','harga','create_at','update_at'];
    protected $dates = ['tgl_terbit'];
}
