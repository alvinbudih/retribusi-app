<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function getJurnal()
    {
        return view("dashboard.laporan.jurnal", [
            "title" => "Jurnal",
            "journals" => Jurnal::all()
        ]);
    }

    public function getJurnalReport()
    {
        return Pdf::loadView("dashboard.laporan.jurnal-pdf", ["journals" => Jurnal::all()])->setPaper("A4", "landscape")->stream();
    }
}
