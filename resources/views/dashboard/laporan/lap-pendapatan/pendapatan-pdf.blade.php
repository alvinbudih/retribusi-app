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
        <h2>{{ $title }}<br>Dinas Perhubungan</h2>
        <hr>
      </td>
    </tr>
  </table>
  <table class="table-sm" width="100%" align="center">
    <thead>
      <tr>
        <th>#</th>
        <th>Keterangan</th>
        <th>Biaya</th>
        <th>X</th>
        <th>Jumlah</th>
        <th>=</th>
        <th>Total Biaya</th>
      </tr>
    </thead>
    <tbody>
      @php($total = 0)
      @foreach($costs as $cost)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $cost->item }}</td>
          <td>{{ number_format($cost->persen > 0 ? $cost->jumlah * $cost->persen : $cost->jumlah, 2, ",", ".") }}</td>
          <td>X</td>
          <td>{{ $jumlahBiaya($cost, $tglAwal, $tglAkhir) }}</td>
          <td>=</td>
          <td>{{ number_format($totalBiaya($cost, $tglAwal, $tglAkhir), 2, ",", ".") }}</td>
        </tr>
        @php($total += $totalBiaya($cost, $tglAwal, $tglAkhir))
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4"></th>
        <th>TOTAL</th>
        <th>=</th>
        <th>{{ number_format($total, 2, ",", ".") }}</th>
      </tr>
    </tfoot>
  </table>
  <div class="text-right mt-3">
    <h6>Tanda Tangan</h6><br><br>
    <h6>{{ auth()->user()->name }}</h6>
  </div>
</body>

</html>