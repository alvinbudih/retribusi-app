<html>

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: normal;
            /* inherit */
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="asset/img/logo_ubsi.png" width="80px">
                            </td>
                            <td>
                                Invoice : <strong>#{{ $bill->kd_bayar }}</strong><br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="5">
                    <table>
                        <tr>
                            <td>
                                <strong>DARI</strong><br>
                                {{ $bill->pendaftaran->kendaraan->pemilik->nama }}<br>
                                {{ $bill->pendaftaran->kendaraan->pemilik->alamat }}<br>
                                {{ $bill->pendaftaran->kendaraan->pemilik->no_telp }}
                            </td>
                            <td>
                                <strong>PENERIMA</strong><br>
                                Dinas Perhubungan
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table>
          <tr>
            <th>Qty</th>
            <th>Kode Biaya</th>
            <th>Item Biaya</th>
            <th>Satuan</th>
            <th>Subtotal</th>
          </tr>
          @foreach ($bill->detail_pembayaran as $detail)
          <tr>
            <td>{{ $detail->jumlah_biaya }}</td>
            <td>{{ $detail->biaya->kode }}</td>
            <td>{{ $detail->biaya->item }}</td>
            <td>{{ number_format($detail->biaya_satuan, 2, ",", ".") }}</td>
            <td>Rp. {{ number_format($detail->subtotal, 2, ",", ".") }}</td>
          </tr>
          @endforeach
          <tr>
            <td>Total:</td>
            <td></td>
            <td></td>
            <td></td>
            <td>Rp {{ number_format($detail->sum('subtotal'), 2, ",", ".") }}</td>
          </tr>
          <tr>
            <td colspan="5">Mohon segera dikirim permintaan barang yang tertera diatas</td>
          </tr>
        </table>
    </div>
</body>

</html>