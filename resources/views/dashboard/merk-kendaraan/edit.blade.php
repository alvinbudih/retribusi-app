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
        <form action="{{ route('merk.update', [$merk->id]) }}" method="POST" role="form">
          @method("put")
          @csrf
          <div class="card-body">
            <div class="row">
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="nama_merk">Nama Merk</label>
                  <input type="text" class="form-control @error('nama_merk') is-invalid @enderror" id="nama_merk" placeholder="nama_merk" name="nama_merk" value="{{ old('nama_merk', $merk->nama_merk) }}">
                  @error("nama_merk")
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
            <a href="{{ route('merk.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
@endsection