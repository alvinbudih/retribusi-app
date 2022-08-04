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
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
    
          <h3 class="card-title">{{ $title }}</h3>
    
          <div class="card-tools"></div>
        </div>
        <div class="card-body p-0">
          <table class="table table-sm table-hover text-nowrap projects">
            <thead>
              <tr>
                <th>#</th>
                <th>Keterangan</th>
                <th>Biaya</th>
                <th>X</th>
                <th>Jumlah</th>
                <th>=</th>
                <th>Total Biaya</th>
              </tr>
            </thead>
            <tbody>
              @php($total = 0)
              @foreach($costs as $cost)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $cost->item }}</td>
                  <td>{{ number_format($cost->persen > 0 ? $cost->jumlah * $cost->persen : $cost->jumlah, 2, ",", ".") }}</td>
                  <td>X</td>
                  <td>{{ $jumlahBiaya($cost, $tglAwal, $tglAkhir) }}</td>
                  <td>=</td>
                  <td>{{ number_format($totalBiaya($cost, $tglAwal, $tglAkhir), 2, ",", ".") }}</td>
                </tr>
                @php($total += $totalBiaya($cost, $tglAwal, $tglAkhir))
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th colspan="4"></th>
                <th>TOTAL</th>
                <th>=</th>
                <th>{{ number_format($total, 2, ",", ".") }}</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
  <!-- /.card -->
</section>
@endsection