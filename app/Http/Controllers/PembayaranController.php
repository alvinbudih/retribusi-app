<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Jurnal;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function rekapanPembayaran()
    {
        $recaps = Pembayaran::where("tgl_bayar", date("Y-m-d"))
            ->where("telah_bayar", true)
            ->latest()->get();

        return view("dashboard.pembayaran.rekapan", [
            "title" => "Rekapan Pembayaran",
            "recaps" => $recaps,
        ]);
    }

    public function prosesPembayaran()
    {
        return view("dashboard.pembayaran.proses", [
            "title" => "Menu Pembayaran",
            "bills" => Pembayaran::where("telah_bayar", false)->where("tgl_bayar", date("Y-m-d"))->get()
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
