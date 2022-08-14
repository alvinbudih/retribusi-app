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
      <th>#</th>
      <th>Pemilik</th>
      <th>No. Kendaraan</th>
      <th>No. Uji</th>
      <th>Jenis Kendaraan</th>
      <th>Status</th>
    </thead>
    <tbody>
      @if(!$kendaraan->count())
        <tr>
          <td class="text-center" colspan="6">
            Belum Ada Data
          </td>
        </tr>
      @else
        @foreach($kendaraan as $kend)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kend->pemilik->nama }}</td>
            <td>{{ $kend->no_kendaraan }}</td>
            <td>{{ $kend->no_uji }}</td>
            <td>{{ $kend->jenis_kendaraan->nama_jenis }}</td>
            <td>{{ $kend->jenis_rumah }}</td>
          </tr>
        @endforeach
      @endif
    </tbody>
  </table>
  <div align="right">
      <h6>Tanda Tangan</h6><br><br>
      <h6>{{ auth()->user()->name }}</h6>
  </div>
</body>

</html>