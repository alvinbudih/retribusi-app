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
      <table class="table table-sm table-hover text-nowrap projects">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Lengkap</th>
            <th>Alamat</th>
            <th>No. Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($owners as $owner)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $owner->nama }}</td>
            <td>{{ $owner->alamat }}</td>
            <td>{{ $owner->no_telp }}</td>
            <td>
              <a class="btn btn-success btn-sm" href="{{ route('pemilik.edit', [$owner->id]) }}">
                <i class="fas fa-pencil-alt">
                </i>
                Edit
              </a>
              <form action="{{ route("pemilik.destroy", [$owner->id]) }}" method="post" class="d-inline">
                @method("delete")
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">
                  <i class="fas fa-trash"></i>
                  Delete
                </button>
              </form>
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
          <h4 class="modal-title" id="modal-judul">Tambah Pemilik</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
            @error("nama")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat Lengkap">{{ old("alamat") }}</textarea>
            @error("alamat")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="no_telp">No. Telepon</label>
            <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="08XXX" name="no_telp" value="{{ old('no_telp') }}">
            @error("no_telp")
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