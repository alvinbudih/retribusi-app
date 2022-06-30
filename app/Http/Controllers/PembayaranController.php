<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\DetailPembayaran;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // public function __construct()
    // {
    //     // dd(DetailPembayaran::where("biaya_id", 1)->where("biaya_satuan", 100000)->get());
    // }

    public function rekapanPembayaran()
    {
        return view("dashboard.pembayaran.rekapan", [
            "title" => "Rekapan Pembayaran",
        ]);
    }

    public function tagihanPembayaran()
    {
        return view("dashboard.pembayaran.tagihan", [
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

        return redirect()->route("tagihan.pembayaran")->with("success", "Data Berhasil Ditambahkan");
    }
}
