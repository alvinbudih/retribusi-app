@extends("layouts.main")

@section("content")
<section class="content">
  <!-- Default box -->
  {{-- <form action="" method="get">
        <div class="row">
          <div class="col-sm-10">
            <input type="text" name="date_range" id="reservation" class="form-control">
          </div>
          <div class="col-sm-2">
            <button type="submit" class="btn btn-primary btn-block">Lihat</button>
          </div>
        </div>
      </form>
      <hr> --}}
  <div class="card">
    <div class="card-header">

      <h3 class="card-title">{{ $title }}</h3>

      <div class="card-tools">
        <a href="{{ route('journal.report') }}" target="_blank" rel="noopener noreferrer" class="btn btn-default">
          <i class="fas fa-print"></i>
          Cetak
        </a>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <table class="table table-bordered text-nowrap projects" id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>No. Jurnal</th>
                {{-- <th>No. Akun</th> --}}
                <th>Keterangan</th>
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
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
@endsection