<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $table = 'perumahan';
    protected $tableprimaryKey = 'id_perumahan';
    protected $fillable = ['luas_perumahan','harga_perumahan','created_at','update_at'];
}
