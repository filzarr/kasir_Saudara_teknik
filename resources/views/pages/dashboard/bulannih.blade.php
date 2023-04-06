@extends('layout.main')
@section('content')
<style>
 
</style>
    <div class="col-4  text-white rounded ">
        <div class="d-flex justify-content-center card border border-0  shadow-sm bg-primary" >
            <div class="card-body divider">
            
                    <p class="card-title text-center text-white  fw-semibold" id="tes">Barang Terlaris Bulan ini</p>
                    <p class="card-title text-center text-white  fw-semibold border-bottom" id="tes"></p>
                
                    <p class="card-title text-center text-white  fw-semibold" id="tes">{{$harini->nama}}</p>
            </div>
        </div>
    </div>
    <div class="col-3  text-white rounded ">
        <div class="d-flex justify-content-center card border border-0  shadow-sm bg-success" >
            <div class="card-body divider">
            
                    <p class="card-title text-center text-white  fw-semibold" id="tes">Keuntungan Bulan Ini</p>
                    <p class="card-title text-center text-white  fw-semibold border-bottom" id="tes"></p>
                
                    <p class="card-title text-center text-white  fw-semibold" id="tes">@currency($keuntungan)</p>
            </div>
        </div>
    </div>
    <div class="text-center fw-semibold fs-1  mt-5">Penjualan Bulan {{ $tanggal }}</div>
    <div class="d-flex justify-content-center mt-5 ">
        <div class="col-lg-12 bg-white  p-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Faktur</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($barang->isEmpty())
                        <tr>
                            <td colspan="5">
                                <div class="d-flex text-muted justify-content-center text-center">
                                    Transaksi Bulan Ini Belum Ada
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($barang as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->id_transaksi }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>@currency($item->subtotal)</td>

                            </tr>
                        @endforeach
                    @endif



                </tbody>
            </table>
        </div>
    </div>

@endsection
