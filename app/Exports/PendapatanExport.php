<?php

namespace App\Exports;

use App\Models\Biaya;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PendapatanExport implements FromView
{
    public function __construct(string $tglAwal, string $tglAkhir)
    {
        $this->tglAwal = $tglAwal;
        $this->tglAkhir = $tglAkhir;
    }

    public function view(): View
    {
        $jumlahBiaya = function (Biaya $biaya, $tglAwal, $tglAkhir) {
            return $biaya->detail_pembayaran()->whereHas("pembayaran", function ($query) use ($tglAwal, $tglAkhir) {
                return $query->where("telah_bayar", true)
                    ->whereBetween("tgl_bayar", [$tglAwal, $tglAkhir]);
            })->get()->sum("jumlah_biaya");
        };

        $totalBiaya = function (Biaya $biaya, $tglAwal, $tglAkhir) {
            return $biaya->detail_pembayaran()->whereHas("pembayaran", function ($query) use ($tglAwal, $tglAkhir) {
                return $query->where("telah_bayar", true)
                    ->whereBetween("tgl_bayar", [$tglAwal, $tglAkhir]);
            })->get()->sum("subtotal");
        };

        return view("dashboard.laporan.lap-pendapatan.pendapatan-xlsx", [
            "costs" => Biaya::all(),
            "totalBiaya" => $totalBiaya,
            "jumlahBiaya" => $jumlahBiaya,
            "tglAwal" => $this->tglAwal,
            "tglAkhir" => $this->tglAkhir
        ]);
    }
}
