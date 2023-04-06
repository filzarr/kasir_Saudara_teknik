@extends('layout.main')
@section('content')
    <style>
        a {
            text-decoration: none;
            color: white
        }
        #tab{
            font-size: 17px
        }
    </style>
    <div class="bg-white py-3">
        <div class="d-flex justify-content-between">
            <div class="">

                <div class="btn btn-sm btn-primary"><a href="/barang/create">Tambah Barang </a></div>


                <div class="btn btn-sm btn-success"> <a href="kategori">Tambah Kategori </a></div>


                <div class="btn btn-sm btn-danger"><a href="eksport">Ekspor PDF</a></div>

            </div>
            <form>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="kategori"
                        onchange="this.form.submit()">
                        @if ($id)
                            <option value="">Pilih Kategori</option>
                        @else
                            <option selected value="">Pilih Kategori</option>
                        @endif

                        @foreach ($kategori as $item)
                            @if ($id == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->kategori }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </form>
        </div>


        <table class="table text-center mt-3 " id="tab">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="5">
                            <div class="d-flex text-muted justify-content-center text-center">
                                Barang Belum Ada
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    @component('components.modal')
                                        @slot('target')
                                            {{ $item->id }}
                                        @endslot
                                        @slot('icon')
                                            <div type="submit" class="  btn-success btn-sm mb-1 text-white">
                                                <i class="bi bi-arrow-up"></i>
                                            </div>
                                        @endslot
                                        @slot('isi')
                                            <form action="/barang/tambah/{{ $item->id }}" method="POST">
                                                @method('post')
                                                @csrf
                                                <div class="d-flex justify-content-center text-center">
                                                    <h6>Masukkan Jumlah Stok yang ingin ditambah</h6>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number"
                                                        class="form-control border border-secondary border-opacity-50"
                                                        id="exampleFormControlInput1" name="stok">
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <i class="bi bi-check-lg"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        @endslot
                                    @endcomponent
                                    <a href="barang/{{ $item->id }}/edit">
                                        <div class=" btn-warning btn-sm text-white mb-1">
                                            <i class="bi bi-pencil "></i>
                                        </div>
                                    </a>
                               
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>


    </div>

@endsection
