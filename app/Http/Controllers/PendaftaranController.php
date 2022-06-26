<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use App\Models\Kendaraan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\MerkKendaraan;
use App\Models\JenisKendaraan;
use App\Models\StatusUji;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->jenisRumah = ["Umum", "Bukan Umum"];
        $this->sifat = ["Terbuka", "Tertutup"];
        $this->bahanBakar = ["Bensin", "Solar", "Non BB"];
    }

    public function rekapanPendaftaran()
    {
        // dd((int)date("d") . date("m") . date("y") . "0001" + 1);
        // dd(Pendaftaran::where("tgl_daftar", date("Y-m-d"))->get()->count());

        return view("dashboard.pendaftaran.rekapan", [
            "title" => "Rekapan Pendaftaran",
            "recaps" => Pendaftaran::where("tgl_daftar", date("Y-m-d"))->get()
        ]);
    }

    public function formPendaftaran()
    {
        $noUjiCari = request("noUjiCari");

        // dd(Kendaraan::where("no_uji", "KRW 12345")->first()->pemilik);

        return view("dashboard.pendaftaran.form-pendaftaran", [
            "title" => "Form Pendaftaran",
            "pemilik" => Pemilik::all(),
            "jenis" => JenisKendaraan::all(),
            "merk" => MerkKendaraan::all(),
            "statusUji" => StatusUji::all(),
            "jenisRumah" => $this->jenisRumah,
            "sifat" => $this->sifat,
            "bahanBakar" => $this->bahanBakar,
            "dateNow" => date("Y-m-d"),
            "kendaraan" => Kendaraan::where("no_uji", $noUjiCari)->first(),
        ]);
    }

    public function daftarKendaraan()
    {
        $rulesKendaraan = [
            "no_uji" => "required|max:15",
            "no_kendaraan" => "required|max:9",
            "no_mesin" => "required|max:255",
            "no_rangka" => "required|max:255",
            "srut" => "required|max:255",
            "jbb" => "required|numeric",
            "tahun_buat" => "required|numeric",
            "jenis_rumah" => "required",
            "sifat" => "required",
            "bahan_bakar" => "required",
            "bahan_karoseri" => "required|max:255",
            "cc" => "required|numeric",
            "jenis_kendaraan_id" => "required",
            "merk_kendaraan_id" => "required",
            "tipe_kendaraan_id" => "required",
            "jatuh_tempo" => "required"
        ];
    }
}
