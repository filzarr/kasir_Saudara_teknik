<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use str;
class HistoriController extends Controller
{
    public function penjualan(){
        $penjualan = DB::table('log_transaksis')->join('users', 'users.id', '=', 'log_transaksis.user_id')
        ->select('log_transaksis.*', 'users.name')->latest()->get();
  
        return view('pages.histori.penjualan', compact('penjualan'));
    }
    public function barang(){
        $barang = DB::table('log_barang')->latest()->get();
  
        return view('pages.histori.barang', compact('barang'));
    }
    public function index(){
        return view('pages.histori.index');
    }
}
