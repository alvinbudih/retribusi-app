<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use App\Models\Kendaraan;
use App\Models\Pemilik;
use App\Models\TipeKendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function __construct()
    {
        $this->jenisRumah = ["Umum", "Bukan Umum"];
        $this->sifat = [
            "M. Angkutan Penumpang",
            "M. Angkutan Brg Terbuka",
            "M. Angkutan Brg Tertutup",
            "Kereta Tempel",
            "Kereta Gandengan"
        ];
        $this->bahanBakar = ["Bensin", "Solar", "Non BB"];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.kendaraan.index", [
            "title" => "Kendaraan",
            "kendaraan" => Kendaraan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.kendaraan.create", [
            "title" => "Tambah Data",
            "pemilik" => Pemilik::all(),
            "jenis" => JenisKendaraan::all(),
            "tipe" => TipeKendaraan::all(),
            "jenisRumah" => $this->jenisRumah,
            "sifat" => $this->sifat,
            "bahanBakar" => $this->bahanBakar,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "no_uji" => "required|max:20|unique:kendaraan",
            "no_kendaraan" => "required|max:9",
            "no_mesin" => "required|max:255|unique:kendaraan",
            "no_rangka" => "required|max:255|unique:kendaraan",
            "srut" => "required|max:255",
            "jbb" => "required|numeric",
            "tahun_buat" => "required|numeric",
            "jenis_rumah" => "required",
            "sifat" => "required",
            "bahan_bakar" => "required",
            "bahan_karoseri" => "required|max:255",
            "cc" => "required",
            "jenis_kendaraan_id" => "required",
            "jatuh_tempo" => "required",
        ];

        if ($request->cc != "-") {
            $rules["cc"] .= "|numeric";
        }

        if ($request->no_kendaraan != "-") {
            $rules["no_kendaraan"] .= "|unique:kendaraan";
        }

        if ($request->srut != "-") {
            $rules["srut"] .= "|unique:kendaraan";
        }

        if (isset($request->pemilikBaru)) {
            $validatedPemilik = $request->validate([
                "nama" => "required|max:255",
                "alamat" => "required",
            ]);

            $validatedPemilik["no_telp"] = $request->no_telp;
        } else {
            $rules["pemilik_id"] = "required";
        }

        $validatedKend = $request->validate($rules);

        $validatedKend["no_uji"] = strtoupper($validatedKend["no_uji"]);
        $validatedKend["no_kendaraan"] = strtoupper($validatedKend["no_kendaraan"]);
        $validatedKend["no_mesin"] = strtoupper($validatedKend["no_mesin"]);
        $validatedKend["no_rangka"] = strtoupper($validatedKend["no_rangka"]);
        $validatedKend["srut"] = strtoupper($validatedKend["srut"]);
        $validatedKend["awal_daftar"] = date("Y-m-d");

        if (isset($request->pemilikBaru)) {
            Pemilik::create($validatedPemilik);

            $validatedKend["pemilik_id"] = Pemilik::max("id");
        }

        Kendaraan::create($validatedKend);

        return redirect()->route("kendaraan.index")->with("success", "Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(Kendaraan $kendaraan)
    {
        return view("dashboard.kendaraan.show", [
            "title" => "History Kendaraan",
            "histories" => $kendaraan->pendaftaran()->latest()->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view("dashboard.kendaraan.edit", [
            "title" => "Edit Data",
            "kendaraan" => $kendaraan,
            "pemilik" => Pemilik::all(),
            "jenis" => JenisKendaraan::all(),
            "tipe" => TipeKendaraan::all(),
            "jenisRumah" => $this->jenisRumah,
            "sifat" => $this->sifat,
            "bahanBakar" => $this->bahanBakar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $rules = [
            "no_uji" => "required|max:20|unique:kendaraan",
            "no_kendaraan" => "required|max:9",
            "no_mesin" => "required|max:255|unique:kendaraan",
            "no_rangka" => "required|max:255|unique:kendaraan",
            "srut" => "required|max:255",
            "jbb" => "required|numeric",
            "tahun_buat" => "required|numeric",
            "jenis_rumah" => "required",
            "sifat" => "required",
            "bahan_bakar" => "required",
            "bahan_karoseri" => "required|max:255",
            "cc" => "required|numeric",
            "jenis_kendaraan_id" => "required",
            "jatuh_tempo" => "required",
            "pemilik_id" => "required",
        ];

        if ($request->cc != "-") {
            $rules["cc"] .= "|numeric";
        }

        if ($request->no_kendaraan != "-" and strtoupper($request->no_kendaraan) != $kendaraan->no_kendaraan) {
            $rules["no_kendaraan"] .= "|unique:kendaraan";
        }

        if ($request->srut != "-" and strtoupper($request->srut) != $kendaraan->srut) {
            $rules["srut"] .= "|unique:kendaraan";
        }

        if ($request->no_uji == $kendaraan->no_uji) {
            $rules["no_uji"] = "required|max:20";
        }

        if ($request->no_rangka == $kendaraan->no_rangka) {
            $rules["no_rangka"] = "required|max:255";
        }

        if ($request->no_mesin == $kendaraan->no_mesin) {
            $rules["no_mesin"] = "required|max:255";
        }

        $validated = $request->validate($rules);

        $validated["no_uji"] = strtoupper($validated["no_uji"]);
        $validated["no_kendaraan"] = strtoupper($validated["no_kendaraan"]);
        $validated["no_mesin"] = strtoupper($validated["no_mesin"]);
        $validated["no_rangka"] = strtoupper($validated["no_rangka"]);
        $validated["srut"] = strtoupper($validated["srut"]);

        $kendaraan->update($validated);

        return redirect()->route("kendaraan.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kendaraan  $kendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kendaraan $kendaraan)
    {
        //
    }
}
