<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function __construct()
    {
        $this->categories = ["Biaya", "Denda"];
        $this->types = ["Reguler", "Lain - Lain", "Khusus"];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.biaya.index", [
            "title" => "Biaya",
            "costs" => Biaya::all(),
            "categories" => $this->categories,
            "types" => $this->types,
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
            "kode" => "required|max:3|unique:biaya",
            "item" => "required|max:255",
            "jenis" => "required|max:255",
            "kategori" => "required",
            "jumlah" => "required|numeric",
            "persen" => "required|numeric"
        ]);

        Biaya::create($validated);

        return back()->with("success", "Data Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function show(Biaya $biaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function edit(Biaya $biaya)
    {
        return view("dashboard.biaya.edit", [
            "title" => "Ubah Biaya",
            "biaya" => $biaya,
            "categories" => $this->categories,
            "types" => $this->types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Biaya $biaya)
    {
        $validated = $request->validate([
            "jenis" => "required|max:255",
            "kategori" => "required",
            "jumlah" => "numeric|required",
            "persen" => "numeric|required"
        ]);

        $biaya->update($validated);

        return redirect()->route("biaya.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biaya  $biaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Biaya $biaya)
    {
        //
    }
}
