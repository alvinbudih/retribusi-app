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
        $journals = Jurnal::latest();
        $tglAwal = date("Y-m-d");
        $tglAkhir = date("Y-m-d");

        if (request("dateRange")) {
            $dateRange = explode("-", request("dateRange"));
            $tglAwal = date("Y-m-d", strtotime($dateRange[0]));
            $tglAkhir = date("Y-m-d", strtotime($dateRange[1]));
        }

        $journals->whereBetween("tgl_jurnal", [$tglAwal, $tglAkhir]);

        return view("dashboard.laporan.lap-jurnal.jurnal", [
            "title" => "Jurnal",
            "journals" => $journals->get()
        ]);
    }

    public function getJurnalReport()
    {
        $journals = Jurnal::latest();
        $tglAwal = date("Y-m-d");
        $tglAkhir = date("Y-m-d");

        if (request("dateRange")) {
            $dateRange = explode("-", request("dateRange"));
            $tglAwal = date("Y-m-d", strtotime($dateRange[0]));
            $tglAkhir = date("Y-m-d", strtotime($dateRange[1]));
        }

        $journals->whereBetween("tgl_jurnal", [$tglAwal, $tglAkhir]);

        return Pdf::loadView("dashboard.laporan.lap-jurnal.jurnal-pdf", [
            "journals" => $journals->get()
        ])->setPaper("A4", "landscape")->stream();
    }

    public function getJurnalExport()
    {
        return Excel::download(new JurnalExport, "data-jurnal.xlsx");
    }

    public function getLapBiaya()
    {
        $jumlahBiaya = function (Biaya $biaya, $tglAwal = null, $tglAkhir = null) {
            return $biaya->detail_pembayaran()->whereHas("pembayaran", function ($query) {
                $tglAwal = "2022-07-16";
                $tglAkhir = date("Y-m-d");
                return $query->where("telah_bayar", true)
                    ->whereBetween("tgl_bayar", [$tglAwal, $tglAkhir]);
            })->get()->sum("jumlah_biaya");
        };

        $totalBiaya = function (Biaya $biaya, $tglAwal, $tglAkhir) {
            return $biaya->detail_pembayaran()->whereHas("pembayaran", function ($query) {
                $tglAwal = "2022-07-16";
                $tglAkhir = date("Y-m-d");
                return $query->where("telah_bayar", true)
                    ->whereBetween("tgl_bayar", [$tglAwal, $tglAkhir]);
            })->get()->sum("subtotal");
        };

        $tglAwal = date("Y-m-d");
        $tglAkhir = date("Y-m-d");

        return view("dashboard.laporan.lap-biaya.lap-biaya", [
            "title" => "Laporan Biaya",
            "costs" => Biaya::all(),
            "totalBiaya" => $totalBiaya,
            "jumlahBiaya" => $jumlahBiaya,
            "tglAwal" => $tglAwal,
            "tglAkhir" => $tglAkhir,
        ]);
    }
}
