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
            <th>Kode</th>
            <th>Item</th>
            <th>Jenis</th>
            <th>Kategori</th>
            <th>Param</th>
            <th>Jumlah</th>
            <th>Persen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($costs as $cost)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $cost->kode }}</td>
            <td>{{ $cost->item }}</td>
            <td>{{ $cost->jenis }}</td>
            <td>{{ $cost->kategori }}</td>
            <td>{{ ($cost->param) ? "Yes" : "No" }}</td>
            <td>{{ $cost->jumlah }}</td>
            <td>{{ $cost->persen }}</td>
            <td>
              <a class="btn btn-success btn-sm" href="{{ route('biaya.edit', [$cost->id]) }}">
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
          <h4 class="modal-title" id="modal-judul">Tambah Biaya</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="kode">Kode</label>
            <input type="number" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="Kode" name="kode" readonly value="{{ $format }}">
            @error("kode")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="item">Item</label>
            <input type="text" class="form-control @error('item') is-invalid @enderror" id="item" placeholder="Item" name="item" value="{{ old('item') }}">
            @error("item")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="jenis">Jenis</label>
            <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis Biaya" name="jenis" value="{{ old('jenis') }}">
            @error("jenis")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="kategori">Kategori</label>
            <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
              <option value=""> --Pilih Kategori--</option>
              @foreach($categories as $category)
                <option value="{{ $category }}" {{ old('kategori') ? 'selected' : '' }}>{{ $category }}</option>
              @endforeach
            </select>
            @error("kategori")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="">Param</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="param" name="param" value="1" {{ old('param') ? 'checked' : '' }}>
              <label class="form-check-label" for="param">Yes</label>
            </div>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" name="jumlah" value="{{ old('jumlah', 0) }}">
            @error("jumlah")
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="persen">Persen</label>
            <input type="number" class="form-control @error('persen') is-invalid @enderror" id="persen" placeholder="Persen" name="persen" value="{{ old('persen', 0) }}">
            @error("persen")
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