<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Pemilik;
use App\Models\Kendaraan;
use App\Models\StatusUji;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TipeKendaraan;
use App\Models\JenisKendaraan;
use App\Models\DetailPembayaran;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->jenisRumah = ["Umum", "Bukan Umum"];
        $this->sifat = ["Terbuka", "Tertutup"];
        $this->bahanBakar = ["Bensin", "Solar", "Non BB"];

        if (Pendaftaran::where("tgl_daftar", date("Y-m-d"))->get()->count() <= 0) {
            $this->noAntri = date("d") . date("m") . date("y") . "0001";
        } else {
            $this->noAntri = Pendaftaran::max("no_antri") + 1;
        }

        if (!Pembayaran::where("tgl_bayar", date("Y-m-d"))->get()->count()) {
            $this->kdBayar = date("Y") . date("m") . date("d") . "001";
        } else {
            $this->kdBayar = Pembayaran::max("kd_bayar") + 1;
        }
    }

    public function rekapanPendaftaran()
    {
        return view("dashboard.pendaftaran.rekapan", [
            "title" => "Rekapan Pendaftaran",
            "recaps" => Pendaftaran::where("tgl_daftar", date("Y-m-d"))->get()
        ]);
    }

    public function formPendaftaran()
    {
        $noUjiCari = request("noUjiCari");

        $kendaraan = Kendaraan::where("no_uji", $noUjiCari);
        if (request("noUjiCari")) {
            if (!$kendaraan->exists()) {
                return back()->with("notFound", "Kendaraan Tidak Ditemukan");
            }
        }

        return view("dashboard.pendaftaran.form-pendaftaran", [
            "title" => "Form Pendaftaran",
            "pemilik" => Pemilik::all(),
            "jenis" => JenisKendaraan::all(),
            "tipe" => TipeKendaraan::all(),
            "statusUji" => StatusUji::all(),
            "jenisRumah" => $this->jenisRumah,
            "sifat" => $this->sifat,
            "bahanBakar" => $this->bahanBakar,
            "dateNow" => date("Y-m-d"),
            "kendaraan" => $kendaraan->first(),
        ]);
    }

    public function pendaftaranKendaraan(Request $request)
    {
        $rulesKendaraan = [
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
            "tipe_kendaraan_id" => "required",
        ];

        if ($request->status_uji_id == 1) {
            $rulesKendaraan["no_uji"] = "required|max:15|unique:kendaraan";
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
                "no_antri" => $this->noAntri,
                "tgl_daftar" => date("Y-m-d"),
                "kendaraan_id" => Kendaraan::max("id"),
                "status_uji_id" => $request->status_uji_id,
                "user_id" => auth()->user()->id
            ]);

            $this->setBiayaUji(true);

            return back()->with("success", "Data Berhasil Ditambahkan");
        } else {
            $this->validate($request, ["status_uji_id" => "required"]);

            $kendaraan = Kendaraan::where("no_uji", $request->no_uji)->first();
            $pemilik = Pemilik::find($kendaraan->pemilik->id);

            if ($request->no_kendaraan != $kendaraan->no_kendaraan) {
                $rulesKendaraan["no_kendaraan"] .= "|unique:kendaraan";
            }

            if ($request->no_mesin != $kendaraan->no_mesin) {
                $rulesKendaraan["no_mesin"] .= "|unique:kendaraan";
            }

            if ($request->srut != $kendaraan->srut) {
                $rulesKendaraan["srut"] .= "|unique:kendaraan";
            }

            $validatedKend = $request->validate($rulesKendaraan);

            $validatedKend["no_kendaraan"] = strtoupper($validatedKend["no_kendaraan"]);
            $validatedKend["no_mesin"] = strtoupper($validatedKend["no_mesin"]);
            $validatedKend["no_rangka"] = strtoupper($validatedKend["no_rangka"]);
            $validatedKend["srut"] = strtoupper($validatedKend["srut"]);
            $validatedKend["jatuh_tempo"] = date("Y-m-d", strtotime("+6 month", strtotime(date("Y-m-d"))));

            $validatedPemilik = $request->validate([
                "nama" => "required|max:255",
                "alamat" => "required",
            ]);

            if (Pendaftaran::isRegisteredToday($kendaraan->no_uji)) {
                return redirect()->route("form.pendaftaran")->with("failed", "Kendaraan Sudah Terdaftar Hari Ini!");
            }
            Pendaftaran::create([
                "no_antri" => $this->noAntri,
                "tgl_daftar" => date("Y-m-d"),
                "kendaraan_id" => $kendaraan->id,
                "status_uji_id" => $request->status_uji_id,
                "user_id" => auth()->user()->id
            ]);


            $pemilik->update($validatedPemilik);
            $kendaraan->update($validatedKend);

            $this->setBiayaUji(false);

            return redirect()->route("form.pendaftaran")->with("success", "Pendaftaran Berhasil");
        }
    }

    private function setBiayaUji(bool $kendaraanBaru)
    {
        $pendaftaran = Pendaftaran::latest()->first();
        $biayaWajib = Biaya::where("param", true);

        if ($kendaraanBaru) {
            $biayaWajib->where("item", "!=", "Biaya Uji Kend. Besar")
                ->where("item", "!=", "Biaya Uji Kend. Kecil");

            if ($pendaftaran->kendaraan->jbb >= 5500) {
                $biayaWajib->where("item", "!=", "Biaya Uji Kend. Kecil Baru");
            } else {
                $biayaWajib->where("item", "!=", "Biaya Uji Kend. Besar Baru");
            }
        } else {
            $biayaWajib->where("item", "!=", "Pembubuhan Nomor Uji")
                ->where("item", "!=", "Biaya Uji Kend. Besar Baru")
                ->where("item", "!=", "Biaya Uji Kend. Kecil Baru");

            if ($pendaftaran->kendaraan->jbb >= 5500) {
                $biayaWajib->where("item", "!=", "Biaya Uji Kend. Kecil");
            } else {
                $biayaWajib->where("item", "!=", "Biaya Uji Kend. Besar");
            }
        }

        Pembayaran::create([
            "kd_bayar" => $this->kdBayar,
            "jumlah" => 0,
            "tgl_bayar" => date("Y-m-d"),
            "pendaftaran_id" => $pendaftaran->id,
            "biaya_id" => Biaya::first()->id,
            "user_id" => auth()->user()->id,
        ]);

        foreach ($biayaWajib->get() as $biaya) {
            $detail = new DetailPembayaran;
            $detail->biaya_id = $biaya->id;
            $detail->pembayaran_id = Pembayaran::max("id");
            $detail->jumlah_biaya = 1;
            $detail->biaya_satuan = $biaya->jumlah;
            $detail->subtotal = $detail->biaya_satuan * $detail->jumlah_biaya;
            $detail->save();
        }
    }
}
