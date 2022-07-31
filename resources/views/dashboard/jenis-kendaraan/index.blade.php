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
        <button type="button" class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#modal-default">
          <i class="fas fa-plus"></i>
          Tambah Data
        </button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-sm table-hover text-nowrap projects" id="dataTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Jenis</th>
            <th>Konversi Jenis</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($jenis as $j)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $j->nama_jenis }}</td>
            <td>{{ $j->konversi_jenis }}</td>
            <td>
              <a class="btn btn-success btn-sm" href="{{ route('jenis.edit', [$j->id]) }}">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <form action="" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-judul">Tambah Jenis</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_jenis">Nama Jenis</label>
            <input type="text" class="form-control @error('nama_jenis') is-invalid @enderror" id="nama_jenis" placeholder="Nama Jenis" name="nama_jenis" value="{{ old('nama_jenis') }}" autocomplete="off">
            @error("nama_jenis")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="konversi_jenis">Konversi Jenis</label>
            <input type="text" class="form-control @error('konversi_jenis') is-invalid @enderror" id="konversi_jenis" placeholder="Konversi Jenis" name="konversi_jenis" value="{{ old('konversi_jenis') }}" autocomplete="off">
            @error("konversi_jenis")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection