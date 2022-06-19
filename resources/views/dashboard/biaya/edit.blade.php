@extends("layouts.main")
@section("content")
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">{{ $title }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('biaya.update', [$biaya->id]) }}" method="POST" role="form">
          @method("put")
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kode">Kode</label>
                  <input type="number" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="Kode" name="kode" readonly value="{{ $biaya->kode }}">
                  @error("kode")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="item">Item</label>
                  <input type="text" class="form-control @error('item') is-invalid @enderror" id="item" placeholder="Item" name="item" value="{{ old('item', $biaya->item) }}">
                  @error("item")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="jenis">Jenis</label>
                  <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" placeholder="Jenis Biaya" name="jenis" value="{{ old('jenis', $biaya->jenis) }}">
                  @error("jenis")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori">
                    <option value=""> --Pilih Kategori--</option>
                    @foreach($categories as $category)
                      <option value="{{ $category }}" {{ old('kategori', $biaya->kategori) ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                  </select>
                  @error("kategori")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" name="jumlah" value="{{ old('jumlah', $biaya->jumlah) }}">
                  @error("jumlah")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="persen">Persen</label>
                  <input type="number" class="form-control @error('persen') is-invalid @enderror" id="persen" placeholder="Persen" name="persen" value="{{ old('persen', $biaya->persen) }}">
                  @error("persen")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Param</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="param" name="param" value="1" {{ (old('param', $biaya->param)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="param">Yes</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('biaya.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
@endsection