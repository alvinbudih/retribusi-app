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
  <table class="table table-bordered" width="100%" align="center">
    <thead>
      <tr>
        <th rowspan="2">#</th>
        <th rowspan="2">Tanggal</th>
        <th rowspan="2">No. Jurnal</th>
        <th rowspan="2">No. Akun</th>
        <th rowspan="2">Keterangan</th>
        <th class="text-center" colspan="2">Jumlah</th>
      </tr>
      <tr>
        <th>Debit</th>
        <th>Kredit</th>
      </tr>
    </thead>
    <tbody>
      @if(!$journals->count())
        <tr>
          <td class="text-center" colspan="6">
            Belum Ada Data
          </td>
        </tr>
      @else
        @foreach($journals as $journal)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $journal->tgl_jurnal }}</td>
            <td>{{ $journal->no_jurnal }}</td>
            <td>{{ $journal->no_akun }}</td>
            <td>{{ $journal->keterangan }}</td>
            <td>Rp. {{ number_format($journal->debit, 2, ",", ".") }}</td>
            <td>Rp. {{ number_format($journal->kredit, 2, ",", ".") }}</td>
          </tr>
        @endforeach
      @endif
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5">Total :</td>
        <td>Rp. {{ number_format($journals->sum("debit"), 2, ",", ".") }}</td>
        <td>Rp. {{ number_format($journals->sum("kredit"), 2, ",", ".") }}</td>
      </tr>
      <tr>
        <td colspan="5">Balance :</td>
        <td colspan="2">Rp. {{ number_format($journals->sum("debit") - $journals->sum("kredit"), 2, ",", ".") }}</td>
      </tr>
    </tfoot>
  </table>
  <div align="right">
      <h6>Tanda Tangan</h6><br><br>
      <h6>{{ auth()->user()->name }}</h6>
  </div>
</body>

</html>