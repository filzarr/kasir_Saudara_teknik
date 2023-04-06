@extends('layout.main')
@section('content')
    <div class="col-lg-9  px-5">
        <form action="/barang" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Kode barang</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="satuan">
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="id_kategori">
                    <option selected>Pilih Kategori</option>
                    @foreach ($kategori as $item)
                        
                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Masukkan minimum stok pemberitahuan</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="minimstok">
           
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargabeli">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Eceran</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaeceran">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Grosir</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargagrosir">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Retail</label>
                <div class="input-group mb-3" id="exampleInputEmail1">
                    <span class="input-group-text">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="hargaretail">
                    <span class="input-group-text">.000</span>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stok</label>
                <input type="number" class="form-control border border-secondary border-opacity-50" id="exampleFormControlInput1" name="stok">
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
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endpush
