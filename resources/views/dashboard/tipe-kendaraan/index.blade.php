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
            <th>Tipe Kendaraan</th>
            <th>Dari Merk</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($types as $type)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $type->nama_tipe }}</td>
            <td>{{ $type->merk_kendaraan->nama_merk }}</td>
            <td>
              <a class="btn btn-success btn-sm" href="{{ route('tipe.edit', [$type->id]) }}">
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
          <h4 class="modal-title" id="modal-judul">Tambah Tipe</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_tipe">Nama Tipe</label>
            <input type="text" class="form-control @error('nama_tipe') is-invalid @enderror" id="nama_tipe" placeholder="Nama Merk" name="nama_tipe" value="{{ old('nama_tipe') }}" autocomplete="off">
            @error("nama_tipe")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="merk_kendaraan_id">Dari Merk</label>
            <select class="form-control select2 @error('merk_kendaraan_id') is-invalid @enderror" id="merk_kendaraan_id" name="merk_kendaraan_id">
              <option value=""> --Pilih Merk--</option>
              @foreach($merk as $m)
                <option value="{{ $m->id }}" {{ old('merk_kendaraan_id') ? 'selected' : '' }}>{{ $m->nama_merk }}</option>
              @endforeach
            </select>
            @error("nama_tipe")
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