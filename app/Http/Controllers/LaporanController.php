<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use App\Models\transaksi;
use App\Models\detailtransaksi;
use Excel;
class LaporanController extends Controller
{
    public function index(Request $request){
        // $data = transaksi::whereDate('created_at', '>=', $request->tgl_awal)->whereDate('created_at', '<=', $request->tgl_akhir)->get();
        // // foreach ($data as $transaksi) {
        // //     $transaksi['hitung'] = detailtransaksi::where('id_transaksi', $data->id)->sum('jumlah');
        // // };
        // dd($data);
        return Excel::download(new LaporanExport($request->tgl_awal,$request->tgl_akhir), 'LaporanTransaksi.xlsx');
    }
}
