<?php

namespace App\Http\Controllers;

use App\Models\Pemilik;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.pemilik.index", [
            "title" => "Pemilik",
            "owners" => Pemilik::all()
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
            "nama" => "required|max:255",
            "alamat" => "required",
            "no_telp" => "required|max:15|unique:pemilik"
        ]);

        Pemilik::create($validated);

        return back()->with("success", "Data Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilik $pemilik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilik $pemilik)
    {
        return view("dashboard.pemilik.edit", [
            "title" => "Ubah Pemilik",
            "pemilik" => $pemilik
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilik $pemilik)
    {
        $rules = [
            "nama" => "required|max:255",
            "alamat" => "required",
            "no_telp" => "required|max:15"
        ];

        if ($request->no_telp != $pemilik->no_telp) {
            $rules["no_telp"] .= "|unique:pemilik";
        }

        $validated = $request->validate($rules);

        Pemilik::where("id", $pemilik->id)->update($validated);

        return redirect()->route("pemilik.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilik $pemilik)
    {
        $pemilik->delete();

        return back()->with("success", "Data Berhasil Dihapus");
    }
}
