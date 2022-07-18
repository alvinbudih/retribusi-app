<?php

namespace App\Exports;

use App\Models\Jurnal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JurnalExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    // public function collection()
    // {
    //     return Jurnal::all();
    // }

    public function view(): View
    {
        return view("dashboard.jurnal.lap-jurnal.jurnal-xlsx", [
            "journals" => Jurnal::latest()->get()
        ]);
    }
}
