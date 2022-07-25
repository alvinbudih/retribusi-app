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
        <form action="{{ route('tipe.update', [$tipe->id]) }}" method="POST" role="form">
          @method("put")
          @csrf
          <div class="card-body">
            <div class="row">
            </div>
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label for="nama_tipe">Nama Tipe</label>
                  <input type="text" class="form-control @error('nama_tipe') is-invalid @enderror" id="nama_tipe" placeholder="Nama Tipe" name="nama_tipe" value="{{ old('nama_tipe', $tipe->nama_tipe) }}" autocomplete="off">
                  @error("nama_tipe")
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
                  <label for="merk_kendaraan_id">Dari Merk</label>
                  <select class="form-control select2 @error('merk_kendaraan_id') is-invalid @enderror" id="merk_kendaraan_id" name="merk_kendaraan_id">
                    <option value=""> --Pilih Merk--</option>
                    @foreach($merk as $m)
                      <option value="{{ $m->id }}" {{ old('merk_kendaraan_id', $tipe->merk_kendaraan->nama_merk) ? 'selected' : '' }}>{{ $m->nama_merk }}</option>
                    @endforeach
                  </select>
                  @error("merk_kendaraan_id")
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
            <a href="{{ route('tipe.index') }}" class="btn btn-warning">Kembali</a>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
@endsection