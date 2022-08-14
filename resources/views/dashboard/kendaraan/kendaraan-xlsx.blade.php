<table>
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