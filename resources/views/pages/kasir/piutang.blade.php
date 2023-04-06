@extends('layout.main')
@section('content')






    <div class="d-flex justify-content-center mt-2 ">
        <div class="col-lg-12 bg-white  px-2 py-5">
            <div class="fs-3 fw-semibold text-center mb-5">Piutang</div>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Faktur</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Tanggal Pembeli</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Tanggal Tempo</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($transaksi->isEmpty())
                        <tr>
                            <td colspan="5">
                                <div class="d-flex text-muted justify-content-center text-center">
                                    Transaksi Belum Ada
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($transaksi as $item)
                            <tr class="text-center">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td class="text-start ms-5 ps-5">{{ $item->jenispembayaran }}</td>
                                <td class="text-start ms-5 ps-5">
                                    {{ Carbon\Carbon::parse($item->jatuh_tempo)->format('d-m-Y') }}</td>
                                <td>@currency($item->total)</td>

                                <td class="d-flex gap-2"> <a target="_blank" href="/pdf/{{ $item->id }}">
                                        <div class=" btn-primary btn-sm text-white mb-1">
                                            <i class="bi bi-printer"></i>
                                        </div>
                                    </a>
                                    @component('components.modal')
                                    @slot('target')
                                        {{ $item->id }}
                                    @endslot
                                    @slot('icon')
                                        <div type="submit" class=" btn-success btn-sm text-white mb-1">
                                            <i class="bi bi-check"></i>
                                        </div>
                                    @endslot
                                    @slot('isi')
                                        <form action="/piutang/{{ $item->id }}" method="POST">
                                            @csrf
                                            <div class="d-flex justify-content-center text-center">
                                                <select class="form-select" aria-label="Default select example"
                                                    name="jenispembayaran" onchange="bon()" id="jenispembayaran">
                                                    <option selected>Pilih Metode Pembayaran</option>
                                                    <option value="tunai">Tunai</option>
                                                    <option value="non-tunai">Non-Tunai</option>
                                                </select>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="bi bi-check-lg"></i>
                                                </button>
                                            </div>
                                        </form>
                                    @endslot
                                @endcomponent
                                </td>

                            
                            </tr>
                        @endforeach
                    @endif



                </tbody>
            </table>
        </div>
    </div>

@endsection
