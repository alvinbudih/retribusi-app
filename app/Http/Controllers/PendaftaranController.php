<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function rekapanPendaftaran()
    {
        dd(Pendaftaran::where("tgl_daftar", "2022-06-26")->get());

        return view("dashboard.pendaftaran.rekapan", [
            "title" => "Rekapan Pendaftaran",
            "recaps" => Pendaftaran::where("tgl_daftar", date("Y-m-d"))->get()
        ]);
    }
}
