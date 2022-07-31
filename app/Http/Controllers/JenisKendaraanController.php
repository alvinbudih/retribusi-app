<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.jenis-kendaraan.index", [
            "title" => "Jenis Kendaraan",
            "jenis" => JenisKendaraan::all()
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
            "nama_jenis" => "required|max:255",
            "konversi_jenis" => "required|max:255"
        ]);

        JenisKendaraan::create($validated);

        return back()->with("success", "Data Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKendaraan $jenisKendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisKendaraan $jeni)
    {
        return view("dashboard.jenis-kendaraan.edit", [
            "title" => "Edit Jenis Kendaraan",
            "jenis" => $jeni
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisKendaraan $jeni)
    {
        $rules = [
            "nama_jenis" => "required|max:255",
            "konversi_jenis" => "required|max:255"
        ];

        $validate = $request->validate($rules);

        $jeni->update($validate);

        return redirect()->route("jenis.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKendaraan  $jenisKendaraan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisKendaraan $jenisKendaraan)
    {
        //
    }
}
