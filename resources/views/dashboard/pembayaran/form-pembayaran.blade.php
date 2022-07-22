@extends('layouts.main')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            @if(session()->has("success"))
            <div class="row">
              <div class="col-12">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  {{ session("success") }}
                </div>
              </div>
            </div>
            @endif
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> AdminLTE, Inc.
                  <small class="float-right">Tanggal: {{ date("d/m/Y") }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Dari
                <address>
                  <strong>{{ $bill->pendaftaran->kendaraan->pemilik->nama }}</strong><br>
                  {{ $bill->pendaftaran->kendaraan->pemilik->alamat }} <br>
                  {{ $bill->pendaftaran->kendaraan->pemilik->no_telp }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Kepada
                <address>
                  <strong>Dinas Perhubungan</strong><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Kode:</b> {{ $bill->kd_bayar }}<br>
                <br>
                <b>Jatuh Tempo:</b> {{ $bill->pendaftaran->kendaraan->jatuh_tempo }}<br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-md-12 text-right mb-3">
                <button type="button" class="btn btn-primary tombol-tambah" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-plus"></i>
                  Tambah Data
                </button>
              </div>
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Kode Biaya</th>
                      <th>Item Biaya</th>
                      <th>Satuan</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($bill->detail_pembayaran as $detail)
                      <tr>
                        <td>{{ $detail->jumlah_biaya }}</td>
                        <td>{{ $detail->biaya->kode }}</td>
                        <td>{{ $detail->biaya->item }}</td>
                        <td>{{ number_format($detail->biaya_satuan, 2, ",", ".") }}</td>
                        <td>Rp. {{ number_format($detail->subtotal, 2, ",", ".") }}</td>
                        <td>
                          <form action="{{ route('hapus.biaya', [$bill->id, $detail->biaya_id]) }}" method="POST" class="d-inline">
                            @method("delete")
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash"></i>
                              Hapus
                            </button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row justify-content-end">
              <!-- /.col -->
              <div class="col-6">

                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th>Total:</th>
                      <td>Rp. {{ number_format($bill->detail_pembayaran->sum("subtotal"), 2, ",", ".") }}</td>
                    </tr>
                    {{-- <tr>
                      <th>Uang Bayar:</th>
                      <td><input type="number" name="uang_bayar" id="uang_bayar" class="form-control" value="0"></td>
                    </tr>
                    <tr>
                      <th>Kembalian:</th>
                      <td><input type="number" name="kembalian" id="kembalian" class="form-control" value="0"></td>
                    </tr> --}}
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="{{ route('cetak.invoice', [$bill->id]) }}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <form action="{{ route('tambah.pembayaran', [$bill->id]) }}" method="post" class="d-inline">
                  @method("PUT")
                  @csrf
                  <input type="hidden" name="total" value="{{ $bill->detail_pembayaran->sum('subtotal') }}">
                  <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> 
                    Submit Payment
                  </button>
                </form>
                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <form action="" method="post">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modal-judul">Tambah Biaya</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="biaya_id">Item Biaya</label>
              <select class="form-control select2 @error('biaya_id') is-invalid @enderror" id="biaya_id" name="biaya_id">
                <option value=""> --Pilih Biaya--</option>
                @foreach($costs as $cost)
                  <option value="{{ $cost->id }}" {{ old('biaya_id') == $cost->id ? 'selected' : '' }}>{{ $cost->item }}</option>
                @endforeach
              </select>
              @error("biaya_id")
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
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