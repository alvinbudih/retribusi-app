<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Jurnal;
use App\Models\Kendaraan;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
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

    //     // $biaya = Biaya::find(1);

    //     // $biaya->detail_pembayaran->countBy(fn ($detail) => dd($detail->pembayaran->telah_bayar ? true : false));
    // }

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
        $jatuhTempo = date("Y-m-d", strtotime("+6 month", strtotime(date("Y-m-d"))));

        $pembayaran->pendaftaran->kendaraan()->update([
            "jatuh_tempo" => $jatuhTempo
        ]);

        $pembayaran->update([
            "jumlah" => $request->total,
            "telah_bayar" => true
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

        sleep(1);

        Jurnal::create([
            "no_jurnal" => $pembayaran->kd_bayar,
            "tgl_jurnal" => date("Y-m-d"),
            "no_akun" => "1110",
            "keterangan" => "Kas",
            "debit" => $request->total,
            "kredit" => 0
        ]);

        return redirect()->route("proses.pembayaran")->with("success", "Data Berhasil Ditambahkan");
    }

    public function cetakInvoice(Pembayaran $pembayaran)
    {
        return Pdf::loadView("dashboard.pembayaran.invoice", [
            "title" => "Bukti Pembayaran",
            "bill" => $pembayaran
        ])->stream();
    }
}
