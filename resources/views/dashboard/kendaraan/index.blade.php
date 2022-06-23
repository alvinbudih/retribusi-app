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
    <div class="card-body p-0">
      <table class="table table-sm table-hover text-nowrap projects">
        <thead>
          <tr>
            <th>#</th>
            <th>Tgl Daftar</th>
            <th>No. Uji</th>
            <th>Pemilik</th>
            <th>No. Kendaraan</th>
            <th>Alamat</th>
            <th>Jatuh Tempo</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if(!$kendaraan->count())
            <tr>
              <td colspan="9" class="text-center"><small>Tidak Ada Item</small></td>
            </tr>
          @else
            @foreach($kendaraan as $kend)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kend->awal_daftar }}</td>
                <td>{{ $kend->no_uji }}</td>
                <td>{{ $kend->pemilik->nama }}</td>
                <td>{{ $kend->no_kendaraan }}</td>
                <td>{{ $kend->pemilik->alamat }}</td>
                <td>{{ $kend->jatuh_tempo }}</td>
                <td>
                  <a class="btn btn-success btn-sm" href="{{ route('kendaraan.edit', [$kend->id]) }}">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <form action="" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modal-judul">Tambah Kendaraan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                    <option value="{{ $jr }}" {{ old('jenis_rumah') ? 'selected' : '' }}>{{ $jr }}</option>
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
                    <option value="{{ $s }}" {{ old('sifat') ? 'selected' : '' }}>{{ $s }}</option>
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
                    <option value="{{ $bb }}" {{ old('bahan_bakar') ? 'selected' : '' }}>{{ $bb }}</option>
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
                <label for="pemilik_id">Pemilik</label>
                <select class="form-control form-control-sm @error('pemilik_id') is-invalid @enderror" id="pemilik_id" name="pemilik_id">
                  <option value=""> --Pilih Pemilik--</option>
                  @foreach($pemilik as $pm)
                    <option value="{{ $pm->id }}" {{ old('pemilik_id') ? 'selected' : '' }}>{{ $pm->nama }}</option>
                  @endforeach
                </select>
                @error("pemilik_id")
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
                <select class="form-control form-control-sm @error('jenis_kendaraan_id') is-invalid @enderror" id="jenis_kendaraan_id" name="jenis_kendaraan_id">
                  <option value=""> --Pilih Jenis Kendaraan--</option>
                  @foreach($jenis as $j)
                    <option value="{{ $j->id }}" {{ old('jenis_kendaraan_id') ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
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
                <label for="merk_kendaraan_id">Merk Kendaraan</label>
                <select class="form-control form-control-sm @error('merk_kendaraan_id') is-invalid @enderror" id="merk_kendaraan_id" name="merk_kendaraan_id">
                  <option value=""> --Pilih Merk Kendaraan--</option>
                  @foreach($merk as $mrk)
                    <option value="{{ $mrk->id }}" {{ old('merk_kendaraan_id') ? 'selected' : '' }}>{{ $mrk->nama_merk }}</option>
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