<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\detailtransaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $currentMonth = date('m');
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->where('detailtransaksis.created_at', Carbon::now()->today())
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();
        $bulan = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereRaw('MONTH(detailtransaksis.created_at) = ?',[$currentMonth])
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();
        // dd($bulan);
        $tahun = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereYear('detailtransaksis.created_at', Carbon::now()->year)
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->get();
        $transaksihari = detailtransaksi::where('created_at', Carbon::now()->today())
        ->count('id_transaksi');
        $transaksibulan = detailtransaksi::whereMonth('created_at', Carbon::now()->month)
        ->count('id_transaksi');
        $transaksitahun = detailtransaksi::whereYear('created_at', Carbon::now()->year)
        ->count('id_transaksi');
        return view('pages.index', compact('harini', 'bulan', 'tahun', 'transaksihari', 'transaksibulan', 'transaksitahun'));
    }
    public function harinih(){
        $modal = detailtransaksi::where('created_at', Carbon::now()->today())
        ->sum('modal');
        $jumlah = detailtransaksi::where('created_at', Carbon::now()->today())
        ->sum('jumlah');
        $jual = detailtransaksi::where('created_at', Carbon::now()->today())
        ->sum('harga_jual');
       $keuntungan = $jual - $modal;
       $currentMonth = date('m');
        $barang = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')
        ->select('barangs.nama', 'barangs.id', 'detailtransaksis.id_transaksi', 'detailtransaksis.jumlah', 'detailtransaksis.subtotal')
        ->where('detailtransaksis.created_at', Carbon::now()->today())
        ->get();
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->where('detailtransaksis.created_at', Carbon::now()->today())
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->first();
        $tanggal = Carbon::now()->today()->format('d-m-Y');
        return view('pages.dashboard.harinih', compact('keuntungan', 'barang', 'tanggal', 'harini'));
    }
    public function bulannih(){
        $modal = detailtransaksi::whereMonth('created_at', Carbon::now()->month)
        ->sum('modal');
        $jumlah = detailtransaksi::whereMonth('created_at', Carbon::now()->month)
        ->sum('jumlah');
        $jual = detailtransaksi::whereMonth('created_at', Carbon::now()->month)
        ->sum('harga_jual');
       $keuntungan = $jual - $modal;
       $currentMonth = date('m');
        $barang = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')
        ->select('barangs.nama', 'barangs.id', 'detailtransaksis.id_transaksi', 'detailtransaksis.jumlah', 'detailtransaksis.subtotal')
        ->whereMonth('detailtransaksis.created_at', Carbon::now()->month)
        ->get();
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereMonth('detailtransaksis.created_at', Carbon::now()->month)
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->first();
        $tanggal = Carbon::now()->today()->format('M');
        return view('pages.dashboard.bulannih', compact('keuntungan', 'barang', 'tanggal', 'harini'));
    }
    public function tahunnih(){
        $modal = detailtransaksi::whereYear('created_at', Carbon::now()->year)
        ->sum('modal');
        $jumlah = detailtransaksi::whereYear('created_at', Carbon::now()->year)
        ->sum('jumlah');
        $jual = detailtransaksi::whereYear('created_at', Carbon::now()->year)
        ->sum('harga_jual');
       $keuntungan = $jual - $modal;
       $currentMonth = date('m');
        $barang = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')
        ->select('barangs.nama', 'barangs.id', 'detailtransaksis.id_transaksi', 'detailtransaksis.jumlah', 'detailtransaksis.subtotal')
        ->whereYear('detailtransaksis.created_at', Carbon::now()->year)
        ->get();
        $harini = detailtransaksi::join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->select('barangs.nama')
        ->whereYear('detailtransaksis.created_at', Carbon::now()->year)
        ->groupBy('barangs.nama')
        ->orderByRaw('COUNT(*) DESC')
        ->limit(1)
        ->first();
        $tanggal = Carbon::now()->today()->format('Y');
        return view('pages.dashboard.tahunnih', compact('keuntungan', 'barang', 'tanggal', 'harini'));
    }
}
