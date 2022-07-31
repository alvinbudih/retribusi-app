@extends("layouts.main")

@section("content")
<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <form action="" method="get">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Form Pencarian</h3>
          </div>
          <div class="card-body">
            
              <div class="form-group row">
                <label for="reservation" class="col-sm-2 col-form-label">Jarak Waktu</label>
                <div class="col-sm-10">
                  <div class="input-group input-group-sm">
                    <input class="form-control" type="text" name="dateRange" id="reservation" value="{{ request("dateRange") ? request("dateRange") : '' }}">
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
      </form>
    </div>
  </div>
  <div class="">
    <div class="card">
      <div class="card-header">
  
        <h3 class="card-title">{{ $title }}</h3>
  
        <div class="card-tools">
          <a href="{{ request('dateRange') ? route('journal.export') . '?dateRange=' . request('dateRange') : route('journal.export') }}" target="_blank" rel="noopener noreferrer" class="btn btn-success">
            <i class="oi oi-spreadsheet"></i>
            Export to XLSX
          </a>
          <a href="{{ request('dateRange') ? route('journal.report') . '?dateRange=' . request('dateRange') : route('journal.report') }}" target="_blank" rel="noopener noreferrer" class="btn btn-default">
            <i class="fas fa-print"></i>
            Cetak
          </a>
        </div>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered text-nowrap projects" id="dataTable">
          <thead>
            <tr>
              <th rowspan="2">#</th>
              <th rowspan="2">Tanggal</th>
              <th rowspan="2">No. Jurnal</th>
              {{-- <th rowspan="2">No. Akun</th> --}}
              <th rowspan="2">Keterangan</th>
              <th class="text-center" colspan="2">Jumlah</th>
            </tr>
            <tr>
              <th>Debit</th>
              <th>Kredit</th>
            </tr>
          </thead>
          <tbody>
            @foreach($journals as $journal)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $journal->tgl_jurnal }}</td>
                <td>{{ $journal->no_jurnal }}</td>
                {{-- <td>{{ $journal->no_akun }}</td> --}}
                <td>{{ $journal->keterangan }}</td>
                <td>Rp. {{ number_format($journal->debit, 2, ",", ".") }}</td>
                <td>Rp. {{ number_format($journal->kredit, 2, ",", ".") }}</td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="4">Total :</td>
              <td>Rp. {{ number_format($journals->sum("debit"), 2, ",", ".") }}</td>
              <td>Rp. {{ number_format($journals->sum("kredit"), 2, ",", ".") }}</td>
            </tr>
            <tr>
              <td colspan="4">Balance :</td>
              <td colspan="2">Rp. {{ number_format($journals->sum("debit") - $journals->sum("kredit"), 2, ",", ".") }}</td>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <!-- /.card -->
</section>
@endsection