<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Jurnal;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function __construct()
    {
        // dd(DetailPembayaran::where("biaya_id", 1)->where("biaya_satuan", 100000)->get());
        // dd((50000 * 0.02) * 2);

        // dd(Biaya::whereHas("detail_pembayaran", function ($query) {
        //     return $query->whereNotIn("pembayaran_id", [5])
        //         ->whereNotIn("biaya_id", [2, 5, 6]);
        // })->get());

        // $biaya = Biaya::find(1);

        // $biaya->detail_pembayaran->countBy(fn ($detail) => dd($detail->pembayaran->telah_bayar ? true : false));
        dd(Pembayaran::whereBetween("tgl_bayar", [date("Y-m-d"), date("Y-m-d")]));
    }

    public function rekapanPembayaran()
    {
        $recaps = Pembayaran::where("tgl_bayar", date("Y-m-d"))
            ->where("telah_bayar", true)
            ->latest()->get();

        // $myFunc = function ($nama) {
        //     return "Hello $nama";
        // };

        return view("dashboard.pembayaran.rekapan", [
            "title" => "Rekapan Pembayaran",
            "recaps" => $recaps,
            // "myFunc" => fn ($nama) => "Hello $nama"
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

        foreach ($pembayaran->detail_pembayaran as $detail) {
            Jurnal::create([
                "no_jurnal" => $pembayaran->kd_bayar,
                "tgl_jurnal" => date("Y-m-d"),
                "no_akun" => $detail->biaya->kode,
                "keterangan" => $detail->biaya->item,
                "debit" => 0,
                "kredit" => $detail->subtotal
            ]);
        }

        return redirect()->route("proses.pembayaran")->with("success", "Data Berhasil Ditambahkan");
    }
}
