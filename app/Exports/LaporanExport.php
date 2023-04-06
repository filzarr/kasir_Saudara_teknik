<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\transaksi;
class LaporanExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($tgl_awal, $tgl_akhir)
    {
        $this->tgl_awal = $tgl_awal;
        $this->tgl_akhir = $tgl_akhir;
       
    }
    public function view(): View
    {
        $data = transaksi::whereDate('created_at', '>=', $this->tgl_awal)->whereDate('created_at', '<=', $this->tgl_akhir)->get();
        // dd( $data);
        return view('pages.laporan.excel',compact('data'));
    }
  
    
}
