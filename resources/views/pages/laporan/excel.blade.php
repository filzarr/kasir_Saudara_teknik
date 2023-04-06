<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <table style="word-wrap:break-word;">
        <thead>
        <tr>
            <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;" >Kode Faktur</th>
            <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;" >Nama </th>
            <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;">Alamat </th>
            <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;">Tanggal Pembelian</th>
            <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;">Pembayaran</th>
            <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;">Jatuh Tempo</th>
            <th style="word-wrap:break-word;word-wrap:break-word;text-align:center;">Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
            <tr>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">{{ $data->id }}</td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">{{ $data->nama }}</td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">{{ $data->alamat }}</td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">{{ $data->created_at->format('d-m-Y') }}</td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">{{ $data->jenispembayaran }}</td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">
                    {{ $data->jatuh_tempo ?? '-' }}
                </td>
                <td style="word-wrap:break-word;word-wrap:break-word;text-align:center;">@currency($data->total) </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>