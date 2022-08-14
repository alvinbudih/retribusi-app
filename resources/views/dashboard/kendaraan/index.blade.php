@extends("layouts.main")

@section("content")
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Form Filter</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="" method="GET" role="form">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="reservation">Periode</label>
                  <input type="text" class="form-control" name="periode" id="reservation" value="{{ request('periode') ? request('periode') : '' }}">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="jenisKendaraan">Jenis Kendaraan</label>
                  <select class="form-control select2 @error('jenisKendaraan') is-invalid @enderror" id="jenisKendaraan" name="jenisKendaraan" style="width: 100%;">
                    <option value="">--Pilih Model Kendaraan--</option>
                    @foreach($jenis as $j)
                      <option value="{{ $j->id }}" {{ (request('jenisKendaraan') ? request('jenisKendaraan') : '') == $j->id ? 'selected' : '' }}>{{ $j->nama_jenis }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
        <a href="{{ request(['periode', 'jenisKendaraan']) ? route('kendaraan.export') . '?periode=' . request('periode') . '&jenisKendaraan=' . request('jenisKendaraan') : route('kendaraan.export') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success">
          <i class="oi oi-spreadsheet"></i>
          Export to XLSX
        </a>
        <a href="{{ request(['periode', 'jenisKendaraan']) ? route('kendaraan.report') . '?periode=' . request('periode') . '&jenisKendaraan=' . request('jenisKendaraan') : route('kendaraan.report') }}" target="_blank" rel="noopener noreferrer" class="btn btn-default">
          <i class="fas fa-print"></i>
          Cetak
        </a>
        <a href="{{ route('kendaraan.create') }}" class="btn btn-primary">
          <i class="fas fa-plus"></i>
          Tambah Data
        </a>
      </div>
    </div>
    <div class="card-body">
      <table id="dataTable" class="table table-sm table-hover text-nowrap projects">
        <thead>
          <tr>
            <th>#</th>
            <th>Tgl Daftar</th>
            <th>No. Uji</th>
            <th>Pemilik</th>
            <th>No. Kendaraan</th>
            <th>No. Rangka</th>
            <th>No. Mesin</th>
            <th>Jenis</th>
            <th>Jatuh Tempo</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($kendaraan as $kend)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $kend->awal_daftar }}</td>
              <td>{{ $kend->no_uji }}</td>
              <td>{{ $kend->pemilik->nama }}</td>
              <td>{{ $kend->no_kendaraan }}</td>
              <td>{{ $kend->no_rangka }}</td>
              <td>{{ $kend->no_mesin }}</td>
              <td>{{ $kend->jenis_kendaraan->nama_jenis }}</td>
              <td>{{ $kend->jatuh_tempo }}</td>
              <td>
                <a class="btn btn-success btn-sm" href="{{ route('kendaraan.edit', [$kend->id]) }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Edit
                </a>
                <a class="btn btn-info btn-sm" href="{{ route('kendaraan.show', [$kend->id]) }}">
                  <i class="oi oi-eye"></i>
                  History
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
@endsection