@extends("layouts.main")

@section("content")
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">

      <h3 class="card-title">{{ $title }}</h3>

      <div class="card-tools">
      </div>
    </div>
    <div class="card-body">
      <table class="table table-sm table-hover text-nowrap projects" id="dataTable">
        <thead>
          <tr>
            <th>#</th>
            <th>No. Antrian</th>
            <th>Tgl Bayar</th>
            <th>No. Uji</th>
            <th>Pemilik</th>
            <th>No. Kendaraan</th>
            <th>Alamat</th>
            <th>User</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recaps as $recap)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $recap->kd_bayar }}</td>
              <td>{{ $recap->pendaftaran->no_antri }}</td>
              <td>{{ $recap->tgl_bayar }}</td>
              <td>{{ $recap->pendaftaran->kendaraan->no_uji }}</td>
              <td>{{ $recap->pendaftaran->kendaraan->pemilik->nama }}</td>
              <td>{{ $recap->pendaftaran->kendaraan->no_kendaraan }}</td>
              <td>{{ $recap->user->name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
@endsection