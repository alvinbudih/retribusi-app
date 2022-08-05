<table>
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