@extends("layouts.main")

@section('content')
  <section class="content">
    @if(session()->has("success"))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ session("success") }}
        </div>
      </div>
    </div>
    @elseif(session()->has("failed"))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ session("failed") }}
        </div>
      </div>
    </div>
    @elseif(session()->has("notFound"))
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{ session("notFound") }}
        </div>
      </div>
    </div>
    @endif
    <form action="" method="get">
      <div id="inputNoUjiCari">
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Form Pencarian</h3>
              </div>
              <div class="card-body">
                
                  <div class="form-group row">
                    <label for="noUjiCari" class="col-sm-2 col-form-label">Cari No. Uji</label>
                    <div class="col-sm-10">
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-sm" name="noUjiCari" id="noUjiCari" placeholder="Cari No. Uji" value="{{ request('noUjiCari') ? request('noUjiCari') : '' }}">
                        <span class="input-group-append">
                          <button type="submit" class="btn btn-info btn-flat">Cari</button>
                        </span>
                      </div>
                    </div>
                  </div>
                
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </form>
    <form action="{{ route('pendaftaran.kendaraan') }}" method="post">
      @csrf
      <div class="row">
        <div class="col-sm-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ $title }}</h3>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="status_uji_id" class="col-sm-2 col-form-label">Status Uji</label>
                <div class="col-sm-10">
                  <select class="form-control form-control-sm @error('status_uji_id') is-invalid @enderror" name="status_uji_id" id="status_uji_id">
                    <option value=""> --Pilih Status-- </option>
                    @foreach($statusUji as $status)
                      <option value="{{ $status->id }}" {{ (old('status_uji_id') == $status->id) ? 'selected' : '' }}>{{ $status->status }}</option>
                    @endforeach
                  </select>
                  @error("status_uji_id")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.card-body -->
          </div>
          @if(!request("noUjiCari"))
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Pemilik</h3>
              </div>
              <div class="card-body" id="tambah-pemilik">
                <div class="form-group">
                  <label for="">Tambah Pemilik Baru</label>
                  <div class="custom-control custom-switch">
                    <input class="custom-control-input" type="checkbox" name="pemilikBaru" id="pemilikBaru" value="1" {{ (old('pemilikBaru') == 1) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="pemilikBaru">Pemilik Baru</label>
                  </div>
                </div>
                <div id="form-pemilik">

                </div>
              </div>
            </div>
          @else
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Pemilik</h3>
              </div>
              <div class="card-body" id="tambah-pemilik">
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama', $kendaraan->pemilik->nama) }}">
                  @error("nama")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat Lengkap">{{ old("alamat", $kendaraan->pemilik->alamat) }}</textarea>
                  @error("alamat")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="no_telp">No. Telepon</label>
                  <input type="number" class="form-control form-control-sm @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="08XXX" name="no_telp" value="{{ old('no_telp', $kendaraan->pemilik->no_telp) }}">
                  @error("no_telp")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
            </div>
          @endif
        </div>
        
        <div class="col-sm-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Form Kendaraan</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="no_kendaraan">No. Kendaraan</label>
                    <input type="text" class="form-control form-control-sm @error('no_kendaraan') is-invalid @enderror" id="no_kendaraan" placeholder="No. Kendaraan" name="no_kendaraan" value="{{ old('no_kendaraan', (request('noUjiCari') ? $kendaraan->no_kendaraan : '')) }}">
                    @error("no_kendaraan")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="no_mesin">No. Mesin</label>
                    <input type="text" class="form-control form-control-sm @error('no_mesin') is-invalid @enderror" id="no_mesin" placeholder="No. Mesin" name="no_mesin" value="{{ old('no_mesin', (request('noUjiCari') ? $kendaraan->no_mesin : '')) }}">
                    @error("no_mesin")
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
                    <label for="srut">SRUT</label>
                    <input type="text" class="form-control form-control-sm @error('srut') is-invalid @enderror" id="srut" placeholder="SRUT" name="srut" value="{{ old('srut', (request('noUjiCari') ? $kendaraan->srut : '')) }}">
                    @error("srut")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="jbb">JBB</label>
                    <input type="number" class="form-control form-control-sm @error('jbb') is-invalid @enderror" id="jbb" placeholder="jbb" name="jbb" value="{{ old('jbb', (request('noUjiCari') ? $kendaraan->jbb : '')) }}">
                    @error("jbb")
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
                    <label for="tahun_buat">Tahun Buat</label>
                    <input type="number" class="form-control form-control-sm @error('tahun_buat') is-invalid @enderror" id="tahun_buat" placeholder="Tahun Buat" name="tahun_buat" value="{{ old('tahun_buat', (request('noUjiCari') ? $kendaraan->tahun_buat : '')) }}">
                    @error("tahun_buat")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="jenis_rumah">Jenis Rumah2</label>
                    <select class="form-control form-control-sm @error('jenis_rumah') is-invalid @enderror" id="jenis_rumah" name="jenis_rumah">
                      <option value=""> --Pilih Jenis Rumah2--</option>
                      @foreach($jenisRumah as $jr)
                        <option value="{{ $jr }}" {{ (old('jenis_rumah', (request('noUjiCari') ? $kendaraan->jenis_rumah : '')) == $jr) ? 'selected' : '' }}>{{ $jr }}</option>
                      @endforeach
                    </select>
                    @error("jenis_rumah")
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
                    <label for="sifat">Sifat</label>
                    <select class="form-control form-control-sm @error('sifat') is-invalid @enderror" id="sifat" name="sifat">
                      <option value=""> --Pilih Sifat--</option>
                      @foreach($sifat as $s)
                        <option value="{{ $s }}" {{ (old('sifat', (request('noUjiCari') ? $kendaraan->sifat : '')) == $s) ? 'selected' : '' }}>{{ $s }}</option>
                      @endforeach
                    </select>
                    @error("sifat")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="bahan_bakar">Bahan Bakar</label>
                    <select class="form-control form-control-sm @error('bahan_bakar') is-invalid @enderror" id="bahan_bakar" name="bahan_bakar">
                      <option value=""> --Pilih Bahan Bakar--</option>
                      @foreach($bahanBakar as $bb)
                        <option value="{{ $bb }}" {{ (old('bahan_bakar', (request('noUjiCari') ? $kendaraan->bahan_bakar : '')) == $bb) ? 'selected' : '' }}>{{ $bb }}</option>
                      @endforeach
                    </select>
                    @error("bahan_bakar")
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
                    <label for="bahan_karoseri">Bahan Karoseri</label>
                    <input type="text" class="form-control form-control-sm @error('bahan_karoseri') is-invalid @enderror" id="bahan_karoseri" placeholder="Bahan Karoseri" name="bahan_karoseri" value="{{ old('bahan_karoseri', (request('noUjiCari') ? $kendaraan->bahan_karoseri : '')) }}">
                    @error("bahan_karoseri")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="cc">Isi Silinder / CC</label>
                    <input type="number" class="form-control form-control-sm @error('cc') is-invalid @enderror" id="cc" placeholder="Isi Silinder" name="cc" value="{{ old('cc', (request('noUjiCari') ? $kendaraan->cc : '')) }}">
                    @error("cc")
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
                    <label for="tipe_kendaraan_id">Tipe Kendaraan</label>
                    <select class="form-control form-control-sm @error('tipe_kendaraan_id') is-invalid @enderror" id="tipe_kendaraan_id" name="tipe_kendaraan_id">
                      <option value=""> --Pilih Tipe Kendaraan--</option>
                      @foreach($tipe as $t)
                        <option value="{{ $t->id }}" {{ old('tipe_kendaraan_id') == $t->id ? 'selected' : '' }}>{{ $t->nama_tipe }}</option>
                      @endforeach
                    </select>
                    @error("tipe_kendaraan_id")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="jenis_kendaraan_id">Jenis Kendaraan</label>
                    <select class="form-control form-control-sm @error('jenis_kendaraan_id') is-invalid @enderror" id="jenis_kendaraan_id" name="jenis_kendaraan_id">
                      <option value=""> --Pilih Jenis Kendaraan--</option>
                      @foreach($jenis as $j)
                        <option value="{{ $j->id }}" {{ (old('jenis_kendaraan_id', (request('noUjiCari') ? $kendaraan->jenis_kendaraan_id : '')) == $j->id) ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
                      @endforeach
                    </select>
                    @error("jenis_kendaraan_id")
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
                    <label for="no_rangka">No. Rangka</label>
                    <input type="text" class="form-control form-control-sm @error('no_rangka') is-invalid @enderror" id="no_rangka" placeholder="No. Rangka" name="no_rangka" value="{{ old('no_rangka', (request('noUjiCari') ? $kendaraan->no_rangka : '')) }}">
                    @error("no_rangka")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="no_uji">No. Uji</label>
                    <input type="text" class="form-control form-control-sm @error('no_uji') is-invalid @enderror" id="no_uji" placeholder="No. Uji" name="no_uji" value="{{ old('no_uji', (request('noUjiCari') ? $kendaraan->no_uji : '')) }}" {{ request('noUjiCari') ? 'readonly' : '' }}>
                    @error("no_uji")
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-3">
          <button type="reset" class="btn btn-warning">Reset</button>
          <button type="submit" class="btn btn-primary float-right">Submit</button>
        </div>
      </div>
    </form>
  </section>
  <script>

    // bikin form tambah pemilik berubah-ubah apabila checkbox-nya diceklis
    const pemilikBaru = document.getElementById("pemilikBaru")
    const formPemilik = document.getElementById("form-pemilik")
    if (pemilikBaru.checked) {
      formPemilik.innerHTML = tambahPemilik()
    } else {
      formPemilik.innerHTML = pemilikLama()
    }

    pemilikBaru.addEventListener("change", function () {
      if (pemilikBaru.checked) {
        formPemilik.innerHTML = tambahPemilik()
      } else {
        formPemilik.innerHTML = pemilikLama()
      }
    })

    const inputNoUjiCari = document.getElementById("inputNoUjiCari")
    const statusUjiId = document.getElementById("status_uji_id")
    if (statusUjiId.value == 1) {
      inputNoUjiCari.innerHTML = ""
    } else {
      inputNoUjiCari.innerHTML = inputNoUjiCariUI()
    }

    statusUjiId.addEventListener("change", function () {
      if (statusUjiId.value == 1) {
        inputNoUjiCari.innerHTML = ""
      } else {
        inputNoUjiCari.innerHTML = inputNoUjiCariUI()
      }
    })

    function inputNoUjiCariUI() {
      return `<div class="row">
                <div class="col-sm-12">
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Form Pencarian</h3>
                    </div>
                    <div class="card-body">
                      
                        <div class="form-group row">
                          <label for="noUjiCari" class="col-sm-2 col-form-label">Cari No. Uji</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-sm">
                              <input type="text" class="form-control form-control-sm" name="noUjiCari" id="noUjiCari" placeholder="Cari No. Uji">
                              <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat">Cari</button>
                              </span>
                            </div>
                          </div>
                        </div>
                      
                      <!-- /input-group -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                </div>
              </div>`
    }

    function pemilikLama() {
      return `<div class="form-group">
                <label for="pemilik_id">Pemilik</label>
                <select class="form-control form-control-sm @error('pemilik_id') is-invalid @enderror" id="pemilik_id" name="pemilik_id">
                  <option value=""> --Pilih Pemilik--</option>
                  @foreach($pemilik as $pm)
                    <option value="{{ $pm->id }}" {{ (old('pemilik_id') == $pm->id) ? 'selected' : '' }}>{{ $pm->nama }}</option>
                  @endforeach
                </select>
                @error("pemilik_id")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>`
    }

    function tambahPemilik() {
      return `<div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
                @error("nama")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat Lengkap">{{ old("alamat") }}</textarea>
                @error("alamat")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="no_telp">No. Telepon</label>
                <input type="number" class="form-control form-control-sm @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="08XXX" name="no_telp" value="{{ old('no_telp') }}">
                @error("no_telp")
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>`
    }
  </script>
@endsection