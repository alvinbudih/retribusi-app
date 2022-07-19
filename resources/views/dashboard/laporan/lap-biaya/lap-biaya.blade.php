@extends("layouts.main")

@section("content")
<section class="content">
  <!-- Default box -->
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
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</section>
@endsection