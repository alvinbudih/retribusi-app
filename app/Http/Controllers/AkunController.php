<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.akun.index", [
            "title" => "Akun",
            "accounts" => Akun::all()
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
            "kode_akun" => "required|max:3|unique:akun",
            "nama_akun" => "required"
        ]);

        Akun::create($validated);

        return back()->with("success", "Data Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit(Akun $akun)
    {
        return view("dashboard.akun.edit", [
            "title" => "Ubah Akun",
            "akun" => $akun
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Akun $akun)
    {
        $rules = ["nama_akun" => "required|max:255"];

        if ($request->kode_akun != $akun->kode_akun) {
            $rules["kode_akun"] = "required|max:3|unique:akun";
        }

        $validated = $request->validate($rules);

        Akun::where("id", $akun->id)->update($validated);

        return redirect()->route("akun.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Akun $akun)
    {
        $akun->delete();

        return back()->with("success", "Data Berhasil Dihapus");
    }
}
