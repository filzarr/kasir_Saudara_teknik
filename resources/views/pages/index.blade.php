
@extends('layout.main')
@section('content')

    <div class="col-lg-4  text-white rounded ">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
            style="background-color: #ffff !important" id="card">

            <img src="/assets/images/profile-pic.png" class="img-fluid" alt="...">
            <div class="card-body">
                @if ($harini->isEmpty())
                    <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">Belum Tersedia</p>
                    <a href="/harinih" class="text-center" style="text-decoration: none;">
                        <p>ITEM TERLARIS HARI INI</p>
                    </a>
                @else
                    @foreach ($harini as $item)
                        <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">
                            {{ $item->nama }}
                        </p>
                        <a href="/harinih" class="text-center" style="text-decoration: none;">
                            <p>ITEM TERLARIS HARI INI</p>
                        </a>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <div class="col-lg-4  text-white rounded ">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
            style="background-color: #ffff !important" id="card">

            <img src="/assets/images/profile-pic.png" class="img-fluid" alt="...">
            <div class="card-body">
                @if ($bulan->isEmpty())
                    <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">Belum Tersedia</p>
                    <a href="/bulannih" class="text-center" style="text-decoration: none;">
                        <p>ITEM TERLARIS BULAN INI</p>
                    </a>
                @else
                    @foreach ($bulan as $item)
                        <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">
                            {{ $item->nama }}
                        </p>
                        <a href="/bulannih" class="text-center" style="text-decoration: none;">
                            <p>ITEM TERLARIS BULAN INI</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-4  text-white rounded ">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
            style="background-color: #ffff !important" id="card">

            <img src="/assets/images/profile-pic.png" class="img-fluid" alt="...">
            <div class="card-body">
                @if ($tahun->isEmpty())
                    <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">Belum Tersedia</p>
                    <a href="/bulannih" class="text-center" style="text-decoration: none;">
                        <p>ITEM TERLARIS BULAN INI</p>
                    </a>
                @else
                    @foreach ($tahun as $item)
                        <p class="card-title text-dark text-center text-muted fw-semibold" id="tes">
                            {{ $item->nama }}
                        </p>
                        <a href="/bulannih" class="text-center" style="text-decoration: none;">
                            <p>ITEM TERLARIS BULAN INI</p>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-4  text-white rounded  mt-5">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
            style="background-color: #ffff !important" id="card">


            <div class="card-body">
                <p class="card-title text-dark text-center fw-bold" id="tes">Transaksi Hari Ini</p>
                <a  class="text-center text-muted" style="text-decoration: none;">
                    <p>{{$transaksihari}}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4  text-white rounded  mt-5">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
            style="background-color: #ffff !important" id="card">


            <div class="card-body">
                <p class="card-title text-dark text-center fw-bold" id="tes">Transaksi Bulan Ini</p>
                <a href="" class="text-center text-muted" style="text-decoration: none;">
                    <p>{{$transaksibulan}}</p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-4  text-white rounded  mt-5">
        <div class="d-flex justify-content-center card border border-0 bg-white shadow-sm"
            style="background-color: #ffff !important" id="card">


            <div class="card-body">
                <p class="card-title text-dark text-center fw-bold" id="tes">Transaksi Tahun Ini</p>
                <a href="" class="text-center text-muted" style="text-decoration: none;">
                    <p>{{$transaksitahun}}</p>
                </a>
            </div>
        </div>
    </div>





@endsection

