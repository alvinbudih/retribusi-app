@extends('layouts.main')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <form action="{{ route('tambah.pembayaran', [$bill->id]) }}" method="post">
            @method("PUT")
            @csrf
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
                  From
                  <address>
                    <strong>Dinas Perhubungan</strong><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $bill->pendaftaran->kendaraan->pemilik->nama }}</strong><br>
                    {{ $bill->pendaftaran->kendaraan->pemilik->alamat }} <br>
                    {{ $bill->pendaftaran->kendaraan->pemilik->no_telp }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #007612</b><br>
                  <br>
                  <b>Payment Due:</b> {{ date("d/m/Y") }}<br>
                  <b>Account:</b> 968-34567
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
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($bill->detail_pembayaran as $detail)
                        <tr>
                          <td>{{ $detail->jumlah_biaya }}</td>
                          <td><input type="hidden" name="no_akun[]" value="{{ $detail->biaya->kode }}">{{ $detail->biaya->kode }}</td>
                          <td><input type="hidden" name="keterangan[]" value="{{ $detail->biaya->item }}">{{ $detail->biaya->item }}</td>
                          <td>{{ number_format($detail->biaya_satuan) }}</td>
                          <td><input type="hidden" name="kredit[]" value="{{ $detail->subtotal }}">{{ number_format($detail->subtotal) }}</td>
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
                  {{-- <p class="lead">Amount Due {{ date("Y-m-d") }}</p> --}}
  
                  <div class="table-responsive">
                    <table class="table">
                        <th>Total:</th>
                        <td>{{ number_format($bill->detail_pembayaran->sum("subtotal")) }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
  
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <input type="hidden" name="total" value="{{ $bill->detail_pembayaran->sum('subtotal') }}">
                  <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i> 
                    Submit Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
          </form>
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
              <select class="form-control @error('biaya_id') is-invalid @enderror" id="biaya_id" name="biaya_id">
                <option value=""> --Pilih Biaya--</option>
                @foreach($costs->skip(1) as $cost)
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