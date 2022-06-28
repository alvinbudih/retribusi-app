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

        if (Pendaftaran::where("tgl_daftar", date("Y-m-d"))->get()->count() <= 0) {
            $this->no_antri = date("d") . date("m") . date("y") . "0001";
        } else {
            $this->no_antri = Pendaftaran::max("no_antri") + 1;
        }
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

    public function pendaftaranKendaraan(Request $request)
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
        ];

        if ($request->status_uji_id == 1) {
            $rulesKendaraan["no_uji"] .= "|unique:kendaraan";
            $rulesKendaraan["no_kendaraan"] .= "|unique:kendaraan";
            $rulesKendaraan["no_mesin"] .= "|unique:kendaraan";
            $rulesKendaraan["srut"] .= "|unique:kendaraan";

            if (isset($request->pemilikBaru)) {
                $validatedPemilik = $request->validate([
                    "nama" => "required|max:255",
                    "alamat" => "required"
                ]);
            } else {
                $rulesKendaraan["pemilik_id"] = "required";
            }

            $validatedKend = $request->validate($rulesKendaraan);

            $validatedKend["no_uji"] = strtoupper($validatedKend["no_uji"]);
            $validatedKend["no_kendaraan"] = strtoupper($validatedKend["no_kendaraan"]);
            $validatedKend["no_mesin"] = strtoupper($validatedKend["no_mesin"]);
            $validatedKend["no_rangka"] = strtoupper($validatedKend["no_rangka"]);
            $validatedKend["srut"] = strtoupper($validatedKend["srut"]);
            $validatedKend["awal_daftar"] = date("Y-m-d");
            $validatedKend["jatuh_tempo"] = date("Y-m-d", strtotime("+6 month", strtotime($validatedKend["awal_daftar"])));

            if (isset($request->pemilikBaru)) {
                Pemilik::create($validatedPemilik);

                $validatedKend["pemilik_id"] = Pemilik::max("id");
            }

            Kendaraan::create($validatedKend);

            Pendaftaran::create([
                "no_antri" => $this->no_antri,
                "tgl_daftar" => date("Y-m-d"),
                "kendaraan_id" => Kendaraan::max("id"),
                "status_uji_id" => $request->status_uji_id,
                "user_id" => auth()->user()->id
            ]);

            return back()->with("success", "Data Berhasil Ditambahkan");
        } else {
        }
    }
}
