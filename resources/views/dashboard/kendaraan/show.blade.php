@extends("layouts.main")
@section("content")
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">History Pendaftaran</h3>

          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 250px;">
          <table class="table table-head-fixed text-nowrap">
            <thead>
              <tr>
                <th>#</th>
                <th>No. Antrian</th>
                <th>Tgl Daftar</th>
                <th>Status Uji</th>
                <th>Pendaftar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($histories as $history)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $history->no_antri }}</td>
                  <td>{{ $history->tgl_daftar }}</td>
                  <td>{{ $history->status_uji->status }}</td>
                  <td>{{ $history->user->name }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mb-3">
      <a href="{{ route('kendaraan.index') }}" class="btn btn-warning">Kembali</a>
    </div>
  </div>
</section>
@endsection