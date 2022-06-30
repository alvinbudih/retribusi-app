@extends('layouts.main')

@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">
      @if(session()->has("success"))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session("success") }}
      </div>
      @endif
      
      <h3 class="card-title">Pembayaran</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fas fa-minus"></i></button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fas fa-times"></i></button>
      </div>
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
        <thead>
          <tr>
            <th>#</th>
            <th>No. Antrian</th>
            <th>Tgl Daftar</th>
            <th>No. Uji</th>
            <th>Pemilik</th>
            <th>No. Kendaraan</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bills as $bill)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $bill->pendaftaran->no_antri }}</td>
              <td>{{ $bill->tgl_bayar }}</td>
              <td>{{ $bill->pendaftaran->kendaraan->no_uji }}</td>
              <td>{{ $bill->pendaftaran->kendaraan->pemilik->nama }}</td>
              <td>{{ $bill->pendaftaran->kendaraan->no_kendaraan }}</td>
              <td>{{ $bill->pendaftaran->kendaraan->pemilik->alamat }}</td>
              <td>
                <a class="btn btn-success btn-sm" href="{{ route('form.pembayaran', [$bill->id]) }}">
                  <i class="fas fa-pencil-alt">
                  </i>
                  Bayar
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</section>
@endsection