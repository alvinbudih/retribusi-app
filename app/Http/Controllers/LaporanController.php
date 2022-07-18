<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Jurnal;
use Illuminate\Http\Request;
use App\Exports\JurnalExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function getJurnal()
    {
        return view("dashboard.laporan.lap-jurnal.jurnal", [
            "title" => "Jurnal",
            "journals" => Jurnal::latest()->get()
        ]);
    }

    public function getJurnalReport()
    {
        return Pdf::loadView("dashboard.laporan.lap-jurnal.jurnal-pdf", ["journals" => Jurnal::latest()->get()])->setPaper("A4", "landscape")->stream();
    }

    public function getJurnalExport()
    {
        return Excel::download(new JurnalExport, "data-jurnal.xlsx");
    }

    public function getLapBiaya()
    {
        $jumlahBiaya = function (Biaya $biaya, $tglAwal = null, $tglAkhir = null) {
            if ($biaya->detail_pembayaran->count()) {
                // dd($biaya->detail_pembayaran());
                $temp = $biaya->detail_pembayaran()->whereHas("pembayaran", function ($query) {
                    $tglAwal = "2022-07-16";
                    return $query->whereBetween("tgl_bayar", [$tglAwal, $tglAwal]);
                });

                $kondisi = $temp->first();

                if ($kondisi == null) {
                    return 0;
                }

                if (!$kondisi->pembayaran->telah_bayar) {
                    return 0;
                }

                $counted = $temp->get()->countBy(function ($detail) {
                    return $detail->pembayaran->telah_bayar;
                })[1];
            } else {
                $counted = 0;
            }

            return $counted;
        };
        $tglAwal = date("Y-m-d");
        $tglAkhir = date("Y-m-d");

        return view("dashboard.laporan.lap-biaya.lap-biaya", [
            "title" => "Laporan Biaya",
            "costs" => Biaya::all(),
            "jumlahBiaya" => $jumlahBiaya,
            "tglAwal" => $tglAwal,
            "tglAkhir" => $tglAkhir,
        ]);
    }
}
