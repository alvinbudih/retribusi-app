<?php

namespace App\Http\Controllers;

use App\Models\Biaya;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\DetailPembayaran;

class DetailPembayaranController extends Controller
{
    public function tambahBiaya(Request $request, Pembayaran $pembayaran)
    {
        $detail = DetailPembayaran::where("pembayaran_id", $pembayaran->id);
        $biaya = Biaya::find($request->biaya_id);
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
            if ($biaya->persen > 0) {
                $detail->biaya_satuan = $biaya->jumlah * $biaya->persen;
            } else {
                $detail->biaya_satuan = $biaya->jumlah;
            }
            $detail->subtotal = $detail->biaya_satuan * $detail->jumlah_biaya;
            $detail->save();
            return back()->with("success", "Data Berhasil Ditambah");
        }
    }

    public function hapusBiaya(Pembayaran $pembayaran, DetailPembayaran $detail)
    {
        DetailPembayaran::where("pembayaran_id", $pembayaran->id)
            ->where("biaya_id", $detail->biaya_id)
            ->delete();

        return back()->with("success", "Data Berhasil Dihapus");
    }
}
