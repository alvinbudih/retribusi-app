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
        <form action="{{ route('akun.update', [$akun->id]) }}" method="POST" role="form">
          @method("put")
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kode_akun">Kode Akun</label>
                  <input type="text" class="form-control @error('kode_akun') is-invalid @enderror" id="kode_akun" placeholder="Nama Lengkap" name="kode_akun" value="{{ old('kode_akun', $akun->kode_akun) }}">
                  @error("kode_akun")
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
                  <label for="nama_akun">Nama Akun</label>
                  <input type="text" class="form-control @error('nama_akun') is-invalid @enderror" id="nama_akun" placeholder="nama_akun" name="nama_akun" value="{{ old('nama_akun', $akun->nama_akun) }}">
                  @error("nama_akun")
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
            <a href="{{ route('akun.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
@endsection