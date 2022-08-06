<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
        }
    </style>
</head>

<body>
    <table class="table table-bordered" width="100%" align="center">
        <tr align="center">
            <td>
                <h2>{{ $title }}</h2>
                <hr>
            </td>
        </tr>
    </table>
    <table class="mb-3" width="100%">
        <tr>
            <th colspan="6">Dari</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $bill->pendaftaran->kendaraan->pemilik->nama }}</td>
            <td>Pada Tanggal</td>
            <td>:</td>
            <td>{{ date("Y-m-d") }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $bill->pendaftaran->kendaraan->pemilik->alamat }}</td>
            <td>Kode Pembayaran</td>
            <td>:</td>
            <td>{{ $bill->kd_bayar }}</td>
        </tr>
        <tr>
            <td>Sebagai Pembayaran</td>
            <td>:</td>
            <td>Retr. Uji KIR No. Uji: {{ $bill->pendaftaran->kendaraan->jenis_kendaraan->nama_jenis }} - {{ $bill->pendaftaran->kendaraan->no_uji }}</td>
            <td colspan="3"></td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" align="center">
        <thead>
            <tr>
                <th>Qty</th>
                <th>Kode Biaya</th>
                <th>Item Biaya</th>
                <th>Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bill->detail_pembayaran as $detail)
                <tr>
                    <td>{{ $detail->jumlah_biaya }}</td>
                    <td>{{ $detail->biaya->kode }}</td>
                    <td>{{ $detail->biaya->item }}</td>
                    <td>{{ number_format($detail->biaya_satuan, 2, ",", ".") }}</td>
                    <td>Rp. {{ number_format($detail->subtotal, 2, ",", ".") }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-right">Jumlah</th>
                <th>Rp. {{ number_format($bill->detail_pembayaran->sum("subtotal"), 2, ",", ".") }}</th>
            </tr>
        </tfoot>
    </table>
    <div align="right">
        <h6>Tanda Tangan</h6><br><br>
        <h6>{{ auth()->user()->name }}</h6>
    </div>
</body>

</html>