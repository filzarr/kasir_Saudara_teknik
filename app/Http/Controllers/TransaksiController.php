<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\transaksi;
use App\Models\detailtransaksi;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Str;
use PDF;
use DB;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $data = barang::orderBy('nama')->get();
        return view('pages.kasir.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function detail($id_barang)
    {
        $data =barang::where('id',$id_barang)->first();
        
        return response()->json([
            'data'=>$data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $jumlah = transaksi::where('created_at', Carbon::now()->today())->get();
        
        $hasil = $jumlah->count() + 1;
        // dd(Carbon::now()->today());
        $id = "ST".Carbon::now()->format('dm').sprintf("%03d", $hasil);
        // dd($id);
        for ($i=0; $i <count($request->nama) ; $i++) { 
            $barang = barang::where('id', $request->nama[$i]);
            $barang->decrement('stok', $request->jumlah[$i]);
        }
        $uuid = str::uuid();
        transaksi::insert([
            'id' => $id,
            'kodefaktut'=> $uuid,
            'nama' =>$request->nama_pembeli,
            'jenispembayaran'=> $request->jenispembayaran,
            'total'=>$request->grandtotal,
            'alamat'=>$request->alamat,
            'user_id'=> Auth::user()->id,
            'jatuh_tempo' => $request->jatuh_tempo,
            'created_at' => $request->tgl_beli,
        ]);
        for ($i=0; $i <count($request->nama) ; $i++) {
            $detail = detailtransaksi::insert([
                'id_transaksi' => $id,
                'id_barang' => $request->nama[$i],
                'jumlah' => $request->jumlah[$i],
                'subtotal' => $request->subtotal[$i],
                'harga_jual' => $request->harga_jual[$i],
                'modal'=>$request->modal[$i],
                'created_at' => $request->tgl_beli,
            ]);
        }
       
        return redirect()->route('preview', ['id' => $id]);
        return redirect('/penjualan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function pdf($id, Request $request){
       
        $transaksi = transaksi::where('id', '=', $id)->first();
        $detail = detailtransaksi::where('id_transaksi', '=', $id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->get();
        // $transaksi->
        // dd($transaksi->id);
    
            // dd($detail);
            $count = count($detail);
            $transaksi->detail = $detail;
          
            switch ($count % 5) {
                case 1:
                    $break = $count + 4;
                    break;
                
                case 2:
                    $break = $count + 3;
                    break;
                
                case 3:
                    $break = $count + 2;
                    break;
                
                case 4:
                    $break = $count + 1;
                    break;
                
                default:
                $break = $count;
                    break;
            }
            $tes = $break / 5;
            $ket = $request->query('note');
            $pdf = PDF::loadview('pages.kasir.pdf', compact('transaksi','detail', 'count', 'tes','ket'));
            return $pdf->download($transaksi['id'].'.pdf');
    }
    public function penjualan(Request $request){
        \DB::enableQueryLog();
        $data['tgl_awal'] = $request->query('tgl_awal');
        $data['tgl_akhir'] = $request->query('tgl_akhir');
        $data['jenispembayaran'] = $request->query('jenispembayaran');
        //   dd($data['jenispembayaran']); 
              $transaksi = DB::table('transaksis');
              if ($data['tgl_awal']  ){
                $transaksi->whereDate('created_at', '>=',  $data['tgl_awal']);}
              if ($data['tgl_akhir']){
                $transaksi->where('created_at', '<=',  $data['tgl_akhir']);}
              if ($data['jenispembayaran']){
                $transaksi->Where('jenispembayaran','=',$data['jenispembayaran']);}
            //   ->where('jenispembayaran',$data['jenispembayaran'])->get();
            $hasil = $transaksi->get();
            // dd($hasil);
        return view('pages.kasir.kasir', compact('hasil', 'data'));
    }
    public function piutang(){
        $transaksi = transaksi::where('jenispembayaran','belum-dibayar')->orderBy('jatuh_tempo')->get();
        return view('pages.kasir.piutang', compact('transaksi'));
    }
    public function storepiutang($id, Request $request){
        transaksi::where('id', $id)->update(['jenispembayaran' => $request->jenispembayaran, 'user_id' => Auth::user()->id]);
        alert()->success('Berhasil','Berhasil Mengupdate Piutang');
        return redirect('/penjualan');
    }
    public function preview($id){
        $transaksi = transaksi::where('id',$id)->first();
        $detail = detailtransaksi::where('id_transaksi',$id)->join('barangs', 'detailtransaksis.id_barang', '=', 'barangs.id')->get();
        // dd($detail);
        return view('pages.kasir.preview', compact('transaksi', 'detail'));
    }
}
