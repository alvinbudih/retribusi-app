<?php

namespace App\Http\Controllers;

use App\Models\MerkKendaraan;
use App\Models\TipeKendaraan;
use Illuminate\Http\Request;

class TipeKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.tipe-kendaraan.index", [
            "title" => "Tipe Kendaraan",
            "types" => TipeKendaraan::all(),
            "merk" => MerkKendaraan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama_tipe" => "required|max:255|unique:tipe_kendaraan",
            "merk_kendaraan_id" => "required"
        ]);

        TipeKendaraan::create($validated);

        return back()->with("success", "Data Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipeKendaraan  $tipeKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(TipeKendaraan $tipeKendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipeKendaraan  $tipeKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKendaraan $tipe)
    {
        return view("dashboard.tipe-kendaraan.edit", [
            "title" => "Edit Data",
            "tipe" => $tipe,
            "merk" => MerkKendaraan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipeKendaraan  $tipeKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeKendaraan $tipe)
    {
        $rules = [
            "nama_tipe" => "required|max:255",
            "merk_kendaraan_id" => "required"
        ];

        if ($request->nama_kendaraan != $tipe->nama_kendaraan) {
            $rules["nama_tipe"] .= "|unique:tipe_kendaraan";
        }

        $validated = $request->validate($rules);

        TipeKendaraan::where("id", $tipe->id)->update($validated);

        return redirect()->route("tipe.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipeKendaraan  $tipeKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeKendaraan $tipeKendaraan)
    {
        //
    }
}
