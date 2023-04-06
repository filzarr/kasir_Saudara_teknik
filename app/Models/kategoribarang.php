<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribarang extends Model
{
    use HasFactory;
    public $incrementing = false;
    public function relasi(){

        return $this->belongsTo('App\Models\barang', 'id_kategori');
    }
}
