<?php

namespace App\Http\Controllers;

use App\Models\StatusUji;
use Illuminate\Http\Request;

class StatusUjiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("dashboard.status-uji.index", [
            "title" => "Status Uji",
            "statusUji" => StatusUji::all()
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
        $validated = $request->validate(["status" => "required|max:255|unique:status_uji"]);

        StatusUji::create($validated);

        return back()->with("success", "Data Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatusUji  $statusUji
     * @return \Illuminate\Http\Response
     */
    public function show(StatusUji $statusUji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatusUji  $statusUji
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusUji $status)
    {
        return view("dashboard.status-uji.edit", [
            "title" => "Edit Status",
            "statusUji" => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StatusUji  $statusUji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusUji $status)
    {
        $rules = ["status" => "required|max:255"];

        if ($request->status != $status->status) {
            $rules["status"] .= "|unique:status_uji";
        }

        $validated = $request->validate($rules);

        StatusUji::where("id", $status->id)->update($validated);

        return redirect()->route("status.index")->with("success", "Data Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatusUji  $statusUji
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusUji $statusUji)
    {
        //
    }
}
