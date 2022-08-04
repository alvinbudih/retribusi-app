<?php

namespace App\Exports;

use App\Models\Jurnal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
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

    public function __construct(string $tglAwal, string $tglAkhir)
    {
        $this->tglAwal = $tglAwal;
        $this->tglAkhir = $tglAkhir;
    }

    public function queryDateRange()
    {
        return Jurnal::whereBetween("tgl_jurnal", [$this->tglAwal, $this->tglAkhir]);
    }

    public function view(): View
    {
        return view("dashboard.laporan.lap-jurnal.jurnal-xlsx", [
            "journals" => $this->queryDateRange()->latest()->get()
        ]);
    }
}
