<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use Illuminate\Http\Request;

class BiayaController extends Controller
{
    public function __construct()
    {
        $this->categories = ["Regular", "Denda"];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $format = sprintf("%'.03d", Biaya::max("id") + 1);

        return view("dashboard.biaya.index", [
            "title" => "Biaya",
            "costs" => Biaya::all(),
            "categories" => $this->categories,
            "format" => $format
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

        if ($request->param == null) {
            $validated["param"] = 0;
        } else {
            $validated["param"] = $request->param;
        }

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
            "categories" => $this->categories
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
        $rules = [
            "kode" => "required|max:3",
            "item" => "required|max:255",
            "jenis" => "required|max:255",
            "kategori" => "required",
            "jumlah" => "numeric|required",
            "persen" => "numeric|required"
        ];

        if ($request->kode != $biaya->kode) {
            $rules["kode"] .= "|unique:biaya";
        }

        $validated = $request->validate($rules);

        if ($request->param == null) {
            $validated["param"] = 0;
        } else {
            $validated["param"] = $request->param;
        }

        Biaya::where("id", $biaya->id)->update($validated);

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
