<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailtransaksi extends Model
{
    use HasFactory;
    public function relasi(){
        return $this->belongsTo('App\Models\transaksi', 'id_transaksis');
        return $this->belongsTo('App\Models\barang', 'id_barang');
    }
}
