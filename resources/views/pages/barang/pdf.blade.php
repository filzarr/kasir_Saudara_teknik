<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="all">
    
</head>

<body>
    <style>
        h1{
            font-family: sans-serif !important;
        }
        td,
        th {
            border: 2px solid black !important;
            font-size: 15px;
            font-family: sans-serif !important;
        }
        #info{
            font-weight: normal !important;
            vertical-align: middle !important;
        }
    </style>
    <div class="d-flex justify-content-center px-5 py-3">
        <h1 class="fw-bold text-center">Price List</h1>
    </div>
    <div class="d-flex justify-content-center px-3 ">
        <div class="col-md-8">
            <table class="table table-bordered ">
                <thead>
                    <tr style="background-color: #d5dce4 " class="fw-semibold">
                        <th scope="col" width="5%" class="text-center">NO</th>
                        <th scope="col" class="text-center" width="15%">KODE</th>
                        <th scope="col" class="text-center">NAMA</th>
                        <th scope="col" class="text-center" width="10%">SATUAN</th>
                        <th scope="col" class="text-center" width="20%">HARGA</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold">
                    @foreach ($kategori as $item)
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td >{{ $item->kategori }}</td>
                            <td ></td>
                            <td ></td>
                        </tr>
                        @foreach ($item->barang as $data)
                          
                                <tr id="info">
                                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                    <td class="text-center">{{$data->id}}</td>
                                    <td class="table-secondary" style="background-color: #d5dce4">{{$data->nama}}</td>
                                    <td class="table-info text-center" style="background-color: #deeaf6">{{$data->satuan}}</td>
                                    <td class="table-warning text-center" style="background-color: #ffd865">@currency($data->hargaeceran) </td>
                                </tr>
                         
                        @endforeach
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

    <script src="{{asset('js/bootstrap.min.js')}}" media="all">
    </script>
</body>

</html>
