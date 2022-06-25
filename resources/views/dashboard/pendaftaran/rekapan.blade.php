@extends("layouts.main")

@section("content")
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">

      <h3 class="card-title">{{ $title }}</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-sm table-hover text-nowrap projects">
        <thead>
          <tr>
            <th>#</th>
            <th>Tgl Daftar</th>
            <th>No. Uji</th>
            <th>Pemilik</th>
            <th>No. Kendaraan</th>
            <th>Alamat</th>
            <th>User</th>
            {{-- <th>Aksi</th> --}}
          </tr>
        </thead>
        <tbody>
          @if(!$recaps->count())
            <tr>
              <td colspan="9" class="text-center"><small>Tidak Ada Item</small></td>
            </tr>
          @else
            @foreach($recaps as $recap)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $recap->tgl_daftar }}</td>
                <td>{{ $recap->kendaraan->no_uji }}</td>
                <td>{{ $recap->kendaraan->pemilik->nama }}</td>
                <td>{{ $recap->kendaraan->no_kendaraan }}</td>
                <td>{{ $recap->kendaraan->pemilik->alamat }}</td>
                <td>{{ $recap->user->name }}</td>
                {{-- <td>
                  <a class="btn btn-success btn-sm" href="">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                </td> --}}
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
@endsection