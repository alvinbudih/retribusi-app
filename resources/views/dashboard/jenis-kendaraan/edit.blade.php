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
        <form action="{{ route('jenis.update', [$jenis->id]) }}" method="POST" role="form">
          @method("put")
          @csrf
          <div class="card-body">
            <div class="row">
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="nama_jenis">Nama Jenis</label>
                  <input type="text" class="form-control @error('nama_jenis') is-invalid @enderror" id="nama_jenis" placeholder="Nama Jenis" name="nama_jenis" value="{{ old('nama_jenis', $jenis->nama_jenis) }}">
                  @error("nama_jenis")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="konversi_jenis">Konversi</label>
                  <input type="text" class="form-control @error('konversi_jenis') is-invalid @enderror" id="konversi_jenis" placeholder="Nama Jenis" name="konversi_jenis" value="{{ old('konversi_jenis', $jenis->konversi_jenis) }}">
                  @error("konversi_jenis")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('jenis.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
@endsection