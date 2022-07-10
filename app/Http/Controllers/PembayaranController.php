<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\DetailPembayaran;
use App\Models\Jurnal;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // public function __construct()
    // {
    //     // dd(DetailPembayaran::where("biaya_id", 1)->where("biaya_satuan", 100000)->get());
    //     // dd((50000 * 0.02) * 2);

    //     // dd(Biaya::whereHas("detail_pembayaran", function ($query) {
    //     //     return $query->whereNotIn("pembayaran_id", [5])
    //     //         ->whereNotIn("biaya_id", [2, 5, 6]);
    //     // })->get());
    // }

    public function rekapanPembayaran()
    {
        return view("dashboard.pembayaran.rekapan", [
            "title" => "Rekapan Pembayaran",
        ]);
    }

    public function prosesPembayaran()
    {
        return view("dashboard.pembayaran.proses", [
            "title" => "Menu Pembayaran",
            "bills" => Pembayaran::where("telah_bayar", false)->get()
        ]);
    }

    public function formPembayaran(Pembayaran $pembayaran)
    {
        // $detail = DetailPembayaran::where("biaya_id", 1)->where("biaya_satuan", 100000)->get();

        return view("dashboard.pembayaran.form-pembayaran", [
            "title" => "Form Pembayaran",
            "bill" => $pembayaran,
            "costs" => Biaya::where("item", "!=", "biaya uji")->where("item", "!=", "pembubuhan nomor uji")->get(),
        ]);
    }

    public function tambahBiaya(Request $request, Pembayaran $pembayaran)
    {
        $detail = DetailPembayaran::where("pembayaran_id", $pembayaran->id);
        $harga = Biaya::find($request->biaya_id)->jumlah;
        $request->validate(["biaya_id" => "required"]);


        if ($detail->where("biaya_id", $request->biaya_id)->exists()) {
            $detail = $detail->where("biaya_id", $request->biaya_id)->first();
            ++$detail->jumlah_biaya;
            $detail->subtotal = $detail->biaya_satuan * $detail->jumlah_biaya;
            DetailPembayaran::where("pembayaran_id", $pembayaran->id)
                ->where("biaya_id", $request->biaya_id)
                ->update([
                    "jumlah_biaya" => $detail->jumlah_biaya,
                    "subtotal" => $detail->subtotal
                ]);
            return back()->with("success", "Data Berhasil Diubah");
        } else {
            $detail = new DetailPembayaran;
            $detail->pembayaran_id = $pembayaran->id;
            $detail->biaya_id = $request->biaya_id;
            $detail->jumlah_biaya = 1;
            $detail->biaya_satuan = $harga;
            $detail->subtotal = $harga * $detail->jumlah_biaya;
            $detail->save();
            return back()->with("success", "Data Berhasil Ditambah");
        }
    }

    public function tambahPembayaran(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update([
            "jumlah" => $request->total,
            "telah_bayar" => true
        ]);

        Jurnal::create([
            "no_jurnal" => $pembayaran->kd_bayar,
            "tgl_jurnal" => date("Y-m-d"),
            "no_akun" => "1100-00-010",
            "keterangan" => "Kas",
            "debit" => $request->total,
            "kredit" => 0
        ]);

        foreach ($pembayaran->detail_pembayaran as $key => $value) {
            Jurnal::create([
                "no_jurnal" => $pembayaran->kd_bayar,
                "tgl_jurnal" => date("Y-m-d"),
                "no_akun" => $request->no_akun[$key],
                "keterangan" => $request->keterangan[$key],
                "debit" => 0,
                "kredit" => $request->kredit[$key]
            ]);
        }

        return redirect()->route("proses.pembayaran")->with("success", "Data Berhasil Ditambahkan");
    }
}
