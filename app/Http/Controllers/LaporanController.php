<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
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
}
