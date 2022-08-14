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
            <th>Tgl Daftar</th>
            <th>No. Uji</th>
            <th>Pemilik</th>
            <th>No. Kendaraan</th>
            <th>Status Uji</th>
            <th>User</th>
            {{-- <th>Aksi</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach($recaps as $recap)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $recap->no_antri }}</td>
              <td>{{ $recap->tgl_daftar }}</td>
              <td>{{ $recap->kendaraan->no_uji }}</td>
              <td>{{ $recap->kendaraan->pemilik->nama }}</td>
              <td>{{ $recap->kendaraan->no_kendaraan }}</td>
              <td>{{ $recap->status_uji->status }}</td>
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