<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body * {
            font-family: 'Times New Roman', Times, serif;
        }

        .page-break {
            page-break-before: always;
        }

        #info td {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        #info {
            width: 100% !important;
        }

        #barang td {
            margin: 0 0 0 0 !important;
            padding: 0 0 0 0 !important;
            text-align: center !important;
            font-size: 15px;
        }

        #barang th {
            margin: 0 0 0 0 !important;
            padding: 0 0 0 0 !important;
            text-align: center !important;
            font-size: 18px !important;
        }

        .page-break {
            page-break-after: always;
        }

        #bawah td {
            padding-bottom: 4rem !important;
            font-size: 18px
        }

        #barang thead {
            border-bottom: 1px solid black;
            border-top: 1px solid black;
            border-spacing: -1px;
        }

        #barang tbody {
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.49);

        }

        #barang {
            /* border-collapse: collapse; */
            border-spacing: -1px;
        }

        #ket {
            margin-top: -0.5rem
        }

        @media print {}
    </style>
</head>

<body class="px-2 " onload="window.print()">
    @if ($count > 5)
        <div class="d-flex justify-content-between" id="tek">
            <div class="fw-semibold fs-4" style="float: left; width: 25%; ">SAUDARA TEKNIK</div>
            <div class="fw-semibold fs-4" style="margin-left: 70%; width: 30%;" id="fak">FAKTUR PENJUALAN</div>
        </div>
        <div class="">
            <br style="">
            Jl. Gatot Subroto KM.4, No.63,
            <br>
            Medan, 0821-6291-9393

        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td>Nomor Faktur</td>
                <td width="3%">:&nbsp;</td>
                <td>{{ $transaksi->id }}</td>
                <td width="10%">Kepada</td>
                <td width="5%">:&nbsp;</td>
                <td>{{ $transaksi->nama }}</td>
            </tr>
            <tr>
                <td>Tanggal Faktur</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                <td>Alamat</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->alamat }}</td>
            </tr>
            <tr>
                @if (($transaksi->jatuh_tempo == null))
                <td></td>
                <td></td>
                <td></td>
                @else
                <td>Tanggal Tempo</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($transaksi->jatuh_tempo)->format('d-m-Y') }}</td>
                @endif
                <td>Petugas</td>
                <td>:&nbsp;</td>
                <td>admin</td>
            </tr>
        </table>
        <table class="table table-borderless" id="barang">
            <thead>
                <tr class="fw-semibold">
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            @php
                $nomor = 1;
            @endphp
            <tbody>
                @foreach ($detail->slice(0, 5) as $item)
                    <tr>
                        <td>{{ $nomor }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>@currency($item->harga_jual)</td>
                        <td>@currency($item->subtotal)</td>
                    </tr>
                    @php
                        $nomor++;
                    @endphp
                @endforeach

            </tbody>
        </table>
        <table class="table table-borderless">
            <tr id="bawah">
                <td class="text-center">Penerima</td>
                <td class="text-center">Waktu Terima</td>
                <td class="text-center">Petugas</td>
                <td class="text-center">Sales</td>
                <td style="text-align:right" class="fw-semibold">Total&nbsp;:</td>
                <td style="text-align:center; " class="fw-semibold">@currency($transaksi->total)</td>
            </tr>

            <tr>
                <td class="text-center">Faktur1 </td>
                <td class="text-center">{{ Now()->format('d-m-Y') }}</td>
                <td class="text-center">admin</td>
                <td class="border-bottom text-center" colspan="1">____________</td>
                <td></td>
            </tr>
        </table>
        <div id="ket">
            <div class="text-start fw-semibold">Keterangan</div>
            <div class="text-start ">-{{$ket ?? ''}}</div>

        </div>
        <div class="d-flex justify-content-between mt-5" id="tek" style="margin-top: 10rem">
            <div class="fw-semibold fs-4" style="float: left; width: 25%; ">SAUDARA TEKNIK</div>
            <div class="fw-semibold fs-4" style="margin-left: 70%; width: 30%;" id="fak">FAKTUR PENJUALAN</div>
        </div>
        <div class="">
            <br style="">
            Jl. Gatot Subroto KM.4, No.63,
            <br>
            Medan, 0821-6291-9393

        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td>Nomor Faktur</td>
                <td width="3%">:&nbsp;</td>
                <td>{{ $transaksi->id }}</td>
                <td width="10%">Kepada</td>
                <td width="5%">:&nbsp;</td>
                <td>{{ $transaksi->nama }}</td>
            </tr>
            <tr>
                <td>Tanggal Faktur</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                <td>Alamat</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->alamat }}</td>
            </tr>
            <tr>
                @if (($transaksi->jatuh_tempo == null))
                <td></td>
                <td></td>
                <td></td>
                @else
                <td>Tanggal Tempo</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($transaksi->jatuh_tempo)->format('d-m-Y') }}</td>
                @endif
                <td>Petugas</td>
                <td>:&nbsp;</td>
                <td>admin</td>
            </tr>
        </table>
        <table class="table table-borderless" id="barang">
            <thead>
                <tr class="fw-semibold">
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail->slice(5, $count+2) as $item)
                    <tr>
                        <td>{{ $nomor }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>@currency($item->harga_jual)</td>
                        <td>@currency($item->subtotal)</td>
                    </tr>
                    @php
                        $nomor++;
                    @endphp
                    @endforeach

            </tbody>
        </table>
        <table class="table table-borderless">
            <tr id="bawah">
                <td class="text-center">Penerima</td>
                <td class="text-center">Waktu Terima</td>
                <td class="text-center">Petugas</td>
                <td class="text-center">Sales</td>
                <td style="text-align:right" class="fw-semibold">Total&nbsp;:</td>
                <td style="text-align:center; " class="fw-semibold">@currency($transaksi->total)</td>
            </tr>

            <tr>
                <td class="text-center">Faktur1 </td>
                <td class="text-center">{{ Now()->format('d-m-Y') }}</td>
                <td class="text-center">admin</td>
                <td class="border-bottom text-center" colspan="1">____________</td>
                <td></td>
            </tr>
        </table>
        <div id="ket">
            <div class="text-start fw-semibold">Keterangan</div>
            <div class="text-start ">-{{$ket ?? ''}}</div>

        </div>
    @else
        <div class="d-flex justify-content-between" id="tek">
            <div class="fw-semibold fs-4" style="float: left; width: 25%; ">SAUDARA TEKNIK</div>
            <div class="fw-semibold fs-4" style="margin-left: 70%; width: 30%;" id="fak">FAKTUR PENJUALAN</div>
        </div>
        <div class="">
            <br style="">
            Jl. Gatot Subroto KM.4, No.63,
            <br>
            Medan, 0821-6291-9393

        </div>
        <table class="table table-borderless" id="info">
            <tr>
                <td>Nomor Faktur</td>
                <td width="3%">:&nbsp;</td>
                <td>{{ $transaksi->id }}</td>
                <td width="10%">Kepada</td>
                <td width="5%">:&nbsp;</td>
                <td>{{ $transaksi->nama }}</td>
            </tr>
            <tr>
                <td>Tanggal Faktur</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                <td>Alamat</td>
                <td>:&nbsp;</td>
                <td>{{ $transaksi->alamat }}</td>
            </tr>
            <tr>
                @if (($transaksi->jatuh_tempo == null))
                <td></td>
                <td></td>
                <td></td>
                @else
                <td>Tanggal Tempo</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($transaksi->jatuh_tempo)->format('d-m-Y') }}</td>
                @endif
                
                <td>Petugas</td>
                <td>:&nbsp;</td>
                <td>admin</td>
            </tr>
        </table>
        <table class="table table-borderless" id="barang">
            <thead>
                <tr class="fw-semibold">
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>@currency($item->harga_jual)</td>
                        <td>@currency($item->subtotal)</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <table class="table table-borderless">
            <tr id="bawah">
                <td class="text-center">Penerima</td>
                <td class="text-center">Waktu Terima</td>
                <td class="text-center">Petugas</td>
                <td class="text-center">Sales</td>
                <td style="text-align:right" class="fw-semibold">Total&nbsp;:</td>
                <td style="text-align:center; " class="fw-semibold">@currency($transaksi->total)</td>
            </tr>

            <tr>
                <td class="text-center">Faktur1 </td>
                <td class="text-center">{{ Now()->format('d-m-Y') }}</td>
                <td class="text-center">admin</td>
                <td class="border-bottom text-center" colspan="1">____________</td>
                <td></td>
            </tr>
        </table>
        <div id="ket">
            <div class="text-start fw-semibold">Keterangan</div>
            <div class="text-start ">-{{$ket ?? ''}}</div>

        </div>
    @endif





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
