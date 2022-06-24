@extends("layouts.main")
@section("content")
<section class="content">
  <form action="{{ route('kendaraan.store') }}" method="POST" role="form">
    @csrf
    <div class="row">
      <div class="col-sm-5">
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Form Tambah Pemilik</h3>
          </div>
          <div class="card-body" id="tambah-pemilik">
            <div class="form-group">
              <label for="pemilikBaru">Tambah Pemilik Baru</label>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="pemilikBaru" id="pemilikBaru" value="1" {{ (old('pemilikBaru') == 1) ? 'checked' : '' }}>
                <label class="form-check-label">Pemilik Baru</label>
              </div>
            </div>
            <div class="form-group">
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
            </div>
            <div class="form-group">
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
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-7">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form {{ $title }}</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="no_uji">No. Uji</label>
                  <input type="text" class="form-control form-control-sm @error('no_uji') is-invalid @enderror" id="no_uji" placeholder="No. Uji" name="no_uji" value="{{ old('no_uji') }}">
                  @error("no_uji")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="no_kendaraan">No. Kendaraan</label>
                  <input type="text" class="form-control form-control-sm @error('no_kendaraan') is-invalid @enderror" id="no_kendaraan" placeholder="No. Kendaraan" name="no_kendaraan" value="{{ old('no_kendaraan') }}">
                  @error("no_kendaraan")
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
                  <label for="no_mesin">No. Mesin</label>
                  <input type="text" class="form-control form-control-sm @error('no_mesin') is-invalid @enderror" id="no_mesin" placeholder="No. Mesin" name="no_mesin" value="{{ old('no_mesin') }}">
                  @error("no_mesin")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="srut">SRUT</label>
                  <input type="text" class="form-control form-control-sm @error('srut') is-invalid @enderror" id="srut" placeholder="SRUT" name="srut" value="{{ old('srut') }}">
                  @error("srut")
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
                  <label for="jbb">JBB</label>
                  <input type="number" class="form-control form-control-sm @error('jbb') is-invalid @enderror" id="jbb" placeholder="jbb" name="jbb" value="{{ old('jbb') }}">
                  @error("jbb")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="tahun_buat">Tahun Buat</label>
                  <input type="number" class="form-control form-control-sm @error('tahun_buat') is-invalid @enderror" id="tahun_buat" placeholder="Tahun Buat" name="tahun_buat" value="{{ old('tahun_buat') }}">
                  @error("tahun_buat")
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
                  <label for="jenis_rumah">Jenis Rumah2</label>
                  <select class="form-control form-control-sm @error('jenis_rumah') is-invalid @enderror" id="jenis_rumah" name="jenis_rumah">
                    <option value=""> --Pilih Jenis Rumah2--</option>
                    @foreach($jenisRumah as $jr)
                      <option value="{{ $jr }}" {{ (old('jenis_rumah') == $jr) ? 'selected' : '' }}>{{ $jr }}</option>
                    @endforeach
                  </select>
                  @error("jenis_rumah")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="sifat">Sifat</label>
                  <select class="form-control form-control-sm @error('sifat') is-invalid @enderror" id="sifat" name="sifat">
                    <option value=""> --Pilih Sifat--</option>
                    @foreach($sifat as $s)
                      <option value="{{ $s }}" {{ (old('sifat') == $s) ? 'selected' : '' }}>{{ $s }}</option>
                    @endforeach
                  </select>
                  @error("sifat")
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
                  <label for="bahan_bakar">Bahan Bakar</label>
                  <select class="form-control form-control-sm @error('bahan_bakar') is-invalid @enderror" id="bahan_bakar" name="bahan_bakar">
                    <option value=""> --Pilih Bahan Bakar--</option>
                    @foreach($bahanBakar as $bb)
                      <option value="{{ $bb }}" {{ (old('bahan_bakar') == $bb) ? 'selected' : '' }}>{{ $bb }}</option>
                    @endforeach
                  </select>
                  @error("bahan_bakar")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="bahan_karoseri">Bahan Karoseri</label>
                  <input type="text" class="form-control form-control-sm @error('bahan_karoseri') is-invalid @enderror" id="bahan_karoseri" placeholder="Bahan Karoseri" name="bahan_karoseri" value="{{ old('bahan_karoseri') }}">
                  @error("bahan_karoseri")
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
                  <label for="cc">Isi Silinder / CC</label>
                  <input type="number" class="form-control form-control-sm @error('cc') is-invalid @enderror" id="cc" placeholder="Isi Silinder" name="cc" value="{{ old('cc') }}">
                  @error("cc")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="merk_kendaraan_id">Merk Kendaraan</label>
                  <select class="form-control form-control-sm @error('merk_kendaraan_id') is-invalid @enderror" id="merk_kendaraan_id" name="merk_kendaraan_id">
                    <option value=""> --Pilih Merk Kendaraan--</option>
                    @foreach($merk as $mrk)
                      <option value="{{ $mrk->id }}" {{ (old('merk_kendaraan_id') == $mrk->id) ? 'selected' : '' }}>{{ $mrk->nama_merk }}</option>
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
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="tipe_kendaraan_id">Tipe Kendaraan</label>
                  <select class="form-control form-control-sm @error('tipe_kendaraan_id') is-invalid @enderror" id="tipe_kendaraan_id" name="tipe_kendaraan_id">
                    <option value=""> --Pilih Tipe Kendaraan--</option>
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
                      <option value="{{ $j->id }}" {{ (old('jenis_kendaraan_id') == $j->id) ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
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
                  <input type="text" class="form-control form-control-sm @error('no_rangka') is-invalid @enderror" id="no_rangka" placeholder="No. Rangka" name="no_rangka" value="{{ old('no_rangka') }}">
                  @error("no_rangka")
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
        <a href="{{ route('kendaraan.index') }}" class="btn btn-warning">Kembali</a>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
      </div>
    </div>
  </form>
</section>
<script>

  const merkId = document.querySelector("#merk_kendaraan_id")
  
  merkId.addEventListener("change", function () {

    fetch("http://retribusi-app.test/api/tipe/" + merkId.value)
      .then(response => response.json())
      .then(result => {
        const tipeKendaraan = result.data

        tipeKendaraanId = document.getElementById("tipe_kendaraan_id")
        let option = `<option value=""> --Pilih Tipe Kendaraan-- </option>`
        
        if (tipeKendaraan.length <= 0) {
          tipeKendaraanId.innerHTML = option
        } else {
          tipeKendaraan.forEach(tipe => {
            option += `<option value="${tipe.id}">${tipe.nama_tipe}</option>`
          })
          tipeKendaraanId.innerHTML = option
        }
      })
      
  })

  // bikin form tambah pemilik baru aktif apabila checkbox-nya ceklis
  const pemilikBaru = document.getElementById("pemilikBaru")
  const pemilikId = document.getElementById("pemilik_id")
  const nama = document.getElementById("nama")
  const alamat = document.getElementById("alamat")
  const noTelp = document.getElementById("no_telp")

  nama.removeAttribute("disabled")
  alamat.removeAttribute("disabled")
  noTelp.removeAttribute("disabled")

  pemilikId.setAttribute("disabled", "")
  
  pemilikBaru.addEventListener("change", function () {
    if (pemilikBaru.checked) {
      nama.setAttribute("disabled", "")
      alamat.setAttribute("disabled", "")
      noTelp.setAttribute("disabled", "")

      pemilikId.removeAttribute("disabled")
    } else {
      nama.removeAttribute("disabled")
      alamat.removeAttribute("disabled")
      noTelp.removeAttribute("disabled")

      pemilikId.setAttribute("disabled", "")
    }
  })

</script>
@endsection