@extends('layout.main')
@section('content')
    <div class="col-lg-9  px-5">
        <form action="/barang/{{ $barang->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama" value="{{ old('nama',$barang->nama) }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargabeli" value="{{ old('hargabeli',Str::limit($barang->hargabeli, 3, "")) }}">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Eceran</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaeceran" value="{{ old('hargaeceran',Str::limit($barang->hargaeceran, 3, "")) }}">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Grosir</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargagrosir" value="{{ old('hargagrosir',Str::limit($barang->hargagrosir, 3, "")) }}">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Retail</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaretail" value="{{ old('hargaretail',Str::limit($barang->hargaretail, 3, "")) }}">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stok</label>
                <input type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="stok" value="{{ old('stok',$barang->stok) }}">
              </div>
              <div class="mb-3">
                <label for="formFileSm" class="form-label">Masukkan Gambar</label>
                <input class="form-control form-control-sm" id="formFileSm" type="file" name="gambar">
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>
    </div>
@endsection