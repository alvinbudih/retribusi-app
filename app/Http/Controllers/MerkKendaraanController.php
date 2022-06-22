<?php

namespace App\Http\Controllers;

use App\Models\MerkKendaraan;
use Illuminate\Http\Request;

class MerkKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.merk-kendaraan.index", [
            "title" => "Merk Kendaraan",
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
            "nama_merk" => "required|max:255"
        ]);

        MerkKendaraan::create($validated);

        return back()->with("success", "Berhasil Menambah Data");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerkKendaraan  $merkKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(MerkKendaraan $merkKendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerkKendaraan  $merkKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(MerkKendaraan $merk)
    {
        return view("dashboard.merk-kendaraan.edit", [
            "title" => "Edit Data",
            "merk" => $merk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MerkKendaraan  $merkKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MerkKendaraan $merk)
    {
        $rules = [
            "nama_merk" => "required|max:255|"
        ];

        if ($request->nama_merk != $merk->nama_kendaraan) {
            $rules["nama_merk"] .= "|unique:merk_kendaraan";
        }

        $validated = $request->validate($rules);

        MerkKendaraan::where("id", $merk->id)->update($validated);

        return redirect()->route("merk.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerkKendaraan  $merkKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerkKendaraan $merkKendaraan)
    {
        //
    }
}
