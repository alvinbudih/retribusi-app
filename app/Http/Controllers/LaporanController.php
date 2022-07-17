<?php

namespace App\Http\Controllers;

use App\Exports\JurnalExport;
use App\Models\Jurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function getJurnal()
    {
        return view("dashboard.laporan.jurnal", [
            "title" => "Jurnal",
            "journals" => Jurnal::latest()->get()
        ]);
    }

    public function getJurnalReport()
    {
        return Pdf::loadView("dashboard.laporan.jurnal-pdf", ["journals" => Jurnal::latest()->get()])->setPaper("A4", "landscape")->stream();
    }

    public function getJurnalExport()
    {
        return Excel::download(new JurnalExport, "data-jurnal.xlsx");
    }
}
