<?php

namespace App\Exports;

use App\Models\Kendaraan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class KendaraanExport implements FromView
{
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function view(): View
    {
        return view("dashboard.kendaraan.kendaraan-xlsx", [
            "kendaraan" => Kendaraan::latest()->filter($this->filters)->get()
        ]);
    }
}
