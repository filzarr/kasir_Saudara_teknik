@extends('layout.main')
@section('content')
    <style>
        a{
            text-decoration: none;
            color: white;
        }
    </style>
    <div class="bg-white py-3 px-3">
        <div class="d-flex justify-content-start align-items-center me-5 gap-2">

            <a href="/kasir">
                <div class=" btn-md btn-primary fs-6 p-2">Tambah Penjualan</div>
            </a>
            @component('components.modal')
            @slot('target')
               laporan
            @endslot
            @slot('icon')
                <div class="text-white  btn-success btn-md btn-primary fs-6 p-2">
                    Ekspor Laporan
                </div>
            @endslot
            @slot('isi')
                <form action="/laporan" method="POST">
                    @method('post')
                    @csrf
                    <div class="mb-3">Export Log Barang</div>
                    <div class="d-flex gap-3">
                        <div class='input-group date' id='myDatepicker2'>
                            <input type="date" name="tgl_awal" id="tgl_beli" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        <div class="align-text-center text-center mt-1">Hingga</div>
                        <div class='input-group date' id='myDatepicker2'>
                            <input type="date" name="tgl_akhir" id="tgl_beli" class="form-control">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="bi bi-check-lg"></i>
                        </button>
                    </div>
                </form>
            @endslot
        @endcomponent


            
        </div>
        <form>

            <div class="d-flex gap-3 justify-content-end align-items-end pb-5">
                <div class="d-flex  col-3">
                    <select class="form-select" aria-label="Default select example" name="jenispembayaran">
                        <option value="" selected>Pilih Metode Pembayaran</option>
                        <option value="tunai">Tunai</option>
                        <option value="non-tunai">Non-Tunai</option>
                        <option value="belum-dibayar">Belum Dibayar</option>
                    </select>
                </div>
                <div class="">
                    <label class="control-label  col-sm-12" for="tgl_beli">Tanggal
                        Transaksi</label>
                    <div class="d-flex gap-3">
                        <div class="col-sm-4 ">
                            <div class='input-group date' id='myDatepicker2'>
                                <input type="date" name="tgl_awal" id="tgl_beli" class="form-control">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class='input-group date' id='myDatepicker2'>
                                <input type="date" name="tgl_akhir" id="tgl_beli" class="form-control">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Cari</button>
                    </div>
                </div>
            </div>
        </form>
   
        <table class="table ">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Faktur</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Tanggal Pembeli</th>
                <th scope="col">Total</th>
                <th scope="col">Metode Pembayaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($hasil->isEmpty())
                <tr>
                    <td colspan="5">
                        <div class="d-flex text-muted justify-content-center text-center">
                            Transaksi Belum Ada
                        </div>
                    </td>
                </tr>
            @else
                @foreach ($hasil as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td>@currency($item->total)</td>
                        <td class="text-start ms-5 ps-5">{{ $item->jenispembayaran }}</td>
                        <td> <a target="_blank" href="/preview/{{ $item->id }}">
                                <div class="btn btn-primary btn-sm text-white mb-1">
                                    <i class="bi bi-printer"></i>
                                </div>
                            </a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        </table>
        
    </div>


@endsection
