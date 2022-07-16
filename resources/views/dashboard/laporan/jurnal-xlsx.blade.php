<table>
  <thead>
    <tr>
      <th rowspan="2">#</th>
      <th rowspan="2">Tanggal</th>
      <th rowspan="2">No. Jurnal</th>
      <th rowspan="2">Keterangan</th>
      <th colspan="2">Jumlah</th>
    </tr>
    <tr>
      <th>Debit</th>
      <th>Kredit</th>
    </tr>
  </thead>
  <tbody>
    @foreach($journals as $journal)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $journal->tgl_jurnal }}</td>
        <td>{{ $journal->no_jurnal }}</td>
        <td>{{ $journal->keterangan }}</td>
        <td>Rp. {{ number_format($journal->debit, 2, ",", ".") }}</td>
        <td>Rp. {{ number_format($journal->kredit, 2, ",", ".") }}</td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="4">Total :</td>
      <td>Rp. {{ number_format($journals->sum("debit"), 2, ",", ".") }}</td>
      <td>Rp. {{ number_format($journals->sum("kredit"), 2, ",", ".") }}</td>
    </tr>
    <tr>
      <td colspan="4">Balance :</td>
      <td colspan="2">Rp. {{ number_format($journals->sum("debit") - $journals->sum("kredit"), 2, ",", ".") }}</td>
    </tr>
  </tfoot>
</table>