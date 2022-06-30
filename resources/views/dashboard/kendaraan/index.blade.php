@extends("layouts.main")

@section("content")
<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      @if(session()->has("success"))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session("success") }}
      </div>
      @endif

      <h3 class="card-title">{{ $title }}</h3>

      <div class="card-tools">
        {{-- <button type="button" class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-plus"></i>
          Tambah Data
        </button> --}}
        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i>
          Tambah Data
        </a>
      </div>
    </div>
    <div class="card-body p-0">
      <table id="dataTable" class="table table-sm table-hover text-nowrap projects">
        <thead>
          <tr>
            <th>#</th>
            <th>Tgl Daftar</th>
            <th>No. Uji</th>
            <th>Pemilik</th>
            <th>No. Kendaraan</th>
            <th>Alamat</th>
            <th>Jatuh Tempo</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if(!$kendaraan->count())
            <tr>
              <td colspan="9" class="text-center"><small>Tidak Ada Item</small></td>
            </tr>
          @else
            @foreach($kendaraan as $kend)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kend->awal_daftar }}</td>
                <td>{{ $kend->no_uji }}</td>
                <td>{{ $kend->pemilik->nama }}</td>
                <td>{{ $kend->no_kendaraan }}</td>
                <td>{{ $kend->pemilik->alamat }}</td>
                <td>{{ $kend->jatuh_tempo }}</td>
                <td>
                  <a class="btn btn-success btn-sm" href="{{ route('kendaraan.edit', [$kend->id]) }}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                </td>
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