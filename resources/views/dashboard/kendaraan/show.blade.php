@extends("layouts.main")
@section("content")
<section class="content">
  <form action="" method="POST" role="form">
    @csrf
    <div class="row">
      <div class="col-sm-6">
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Form Data Pemilik</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body" id="tambah-pemilik">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" name="nama" value="{{ $kendaraan->pemilik->nama }}" disabled>
              @error("nama")
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea class="form-control form-control-sm @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat Lengkap" disabled>{{ $kendaraan->pemilik->alamat }}</textarea>
              @error("alamat")
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="no_telp">No. Telepon</label>
              <input type="number" class="form-control form-control-sm @error('no_telp') is-invalid @enderror" id="no_telp" placeholder="08XXX" name="no_telp" value="{{ $kendaraan->pemilik->no_telp }}" disabled>
              @error("no_telp")
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form {{ $title }}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="no_uji">No. Uji</label>
                  <input type="text" class="form-control form-control-sm @error('no_uji') is-invalid @enderror" id="no_uji" placeholder="No. Uji" name="no_uji" value="{{ $kendaraan->no_uji }}" disabled>
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
                  <input type="text" class="form-control form-control-sm @error('no_kendaraan') is-invalid @enderror" id="no_kendaraan" placeholder="No. Kendaraan" name="no_kendaraan" value="{{ $kendaraan->no_kendaraan }}" disabled>
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
                  <input type="text" class="form-control form-control-sm @error('no_mesin') is-invalid @enderror" id="no_mesin" placeholder="No. Mesin" name="no_mesin" value="{{ $kendaraan->no_mesin }}" disabled>
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
                  <input type="text" class="form-control form-control-sm @error('srut') is-invalid @enderror" id="srut" placeholder="SRUT" name="srut" value="{{ $kendaraan->srut }}" disabled>
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
                  <input type="number" class="form-control form-control-sm @error('jbb') is-invalid @enderror" id="jbb" placeholder="JBB" name="jbb" value="{{ $kendaraan->jbb }}" disabled>
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
                  <input type="number" class="form-control form-control-sm @error('tahun_buat') is-invalid @enderror" id="tahun_buat" placeholder="Tahun Buat" name="tahun_buat" value="{{ $kendaraan->tahun_buat }}" disabled>
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
                  <select class="form-control form-control-sm @error('jenis_rumah') is-invalid @enderror" id="jenis_rumah" name="jenis_rumah" disabled>
                    <option value=""> --Pilih Jenis Rumah2--</option>
                    @foreach($jenisRumah as $jr)
                      <option value="{{ $jr }}" {{ ($kendaraan->jenis_rumah == $jr) ? 'selected' : '' }}>{{ $jr }}</option>
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
                  <select class="form-control form-control-sm @error('sifat') is-invalid @enderror" id="sifat" name="sifat" disabled>
                    <option value=""> --Pilih Sifat--</option>
                    @foreach($sifat as $s)
                      <option value="{{ $s }}" {{ ($kendaraan->sifat == $s) ? 'selected' : '' }}>{{ $s }}</option>
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
                  <select class="form-control form-control-sm @error('bahan_bakar') is-invalid @enderror" id="bahan_bakar" name="bahan_bakar" disabled>
                    <option value=""> --Pilih Bahan Bakar--</option>
                    @foreach($bahanBakar as $bb)
                      <option value="{{ $bb }}" {{ ($kendaraan->bahan_bakar == $bb) ? 'selected' : '' }}>{{ $bb }}</option>
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
                  <input type="text" class="form-control form-control-sm @error('bahan_karoseri') is-invalid @enderror" id="bahan_karoseri" placeholder="Bahan Karoseri" name="bahan_karoseri" value="{{ $kendaraan->bahan_karoseri }}" disabled>
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
                  <input type="number" class="form-control form-control-sm @error('cc') is-invalid @enderror" id="cc" placeholder="Isi Silinder" name="cc" value="{{ $kendaraan->cc }}" disabled>
                  @error("cc")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="tipe_kendaraan_id">Tipe Kendaraan</label>
                  <select class="form-control select2 form-control-sm @error('tipe_kendaraan_id') is-invalid @enderror" id="tipe_kendaraan_id" name="tipe_kendaraan_id" disabled>
                    <option value=""> --Pilih Tipe Kendaraan--</option>
                    @foreach($tipe as $t)
                      <option value="{{ $t->id }}" {{ $kendaraan->tipe_kendaraan_id == $t->id ? 'selected' : '' }}>{{ $t->merk_kendaraan->nama_merk . ' ' . $t->nama_tipe }}</option>
                    @endforeach
                  </select>
                  @error("tipe_kendaraan_id")
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
                  <label for="jenis_kendaraan_id">Jenis Kendaraan</label>
                  <select class="form-control form-control-sm @error('jenis_kendaraan_id') is-invalid @enderror" id="jenis_kendaraan_id" name="jenis_kendaraan_id" disabled>
                    <option value=""> --Pilih Jenis Kendaraan--</option>
                    @foreach($jenis as $j)
                      <option value="{{ $j->id }}" {{ ($kendaraan->jenis_kendaraan_id == $j->id) ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
                    @endforeach
                  </select>
                  @error("jenis_kendaraan_id")
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="no_rangka">No. Rangka</label>
                  <input type="text" class="form-control form-control-sm @error('no_rangka') is-invalid @enderror" id="no_rangka" placeholder="No. Rangka" name="no_rangka" value="{{ $kendaraan->no_rangka }}" disabled>
                  @error("no_rangka")
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
                  <label for="jatuh_tempo">Jatuh Tempo</label>
                  <input type="date" class="form-control form-control-sm @error('jatuh_tempo') is-invalid @enderror" id="jatuh_tempo" placeholder="Jatuh Tempo" name="jatuh_tempo" value="{{ $kendaraan->jatuh_tempo }}" disabled>
                  @error("jatuh_tempo")
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
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">History Pendaftaran</h3>

            <div class="card-tools">
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 250px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>No. Antrian</th>
                  <th>Tgl Daftar</th>
                  <th>Status Uji</th>
                  <th>Pendaftar</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kendaraan->pendaftaran as $history)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $history->no_antri }}</td>
                    <td>{{ $history->tgl_daftar }}</td>
                    <td>{{ $history->status_uji->status }}</td>
                    <td>{{ $history->user->name }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mb-3">
        <a href="{{ route('kendaraan.index') }}" class="btn btn-warning">Kembali</a>
      </div>
    </div>
  </form>
</section>
@endsection