@extends('layout.main')
@section('content')




    <div class="text-center fw-semibold fs-1">Histori Penjualan</div>
    <div class="d-flex justify-content-center ">
        <div class="col-lg-12 bg-white  p-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nomor Faktur</th>
                        <th scope="col">Pengguna</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($penjualan->isEmpty())
                        <tr>
                            <td colspan="5">
                                <div class="d-flex text-muted justify-content-center text-center">
                                    Histori Belum Ada
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($penjualan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->id_transaksi }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                @if (Str::lower($item->action) == 'insert')
                                    <td><button class="btn btn-sm btn-success">{{ $item->action }}</button></td>
                                @elseif(Str::lower($item->action) == 'update')
                                    <td><button class="btn btn-sm btn-warning text-white">{{ $item->action }}</button></td>
                                @else
                                    <td><button class="btn btn-sm btn-danger">{{ $item->action }}</button></td>
                                @endif

                            </tr>
                        @endforeach
                    @endif



                </tbody>
            </table>
        </div>
    </div>

@endsection
