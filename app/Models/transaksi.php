<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public $incrementing = false;
    public function relasi(){
        return $this->hasMany('App\Models\detailtransaksi', 'id_transaksi');
    }
}
