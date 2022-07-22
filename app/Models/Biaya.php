<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;

    protected $table = "biaya";
    protected $guarded = ["id"];

    // public function scopeFilterByDate(Builder $query, array $date)
    // {
    //     $query->when($date["tglAwal"] and $date["tglAkhir"] ?? false, function (Builder $query, $tglAwal, $tglAkhir) {

    //     });
    // }

    public function scopeRequired(Builder $query, bool $kendaraanBaru, int $jbb, $jatuh_tempo)
    {
        $query->where("jenis", "Reguler");

        $query->when($kendaraanBaru, function (Builder $query) use ($jbb) {
            $query->where("item", "!=", "Biaya Uji Kend. Besar")
                ->where("item", "!=", "Biaya Uji Kend. Kecil");

            $query->when($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Kecil Baru"));
            $query->unless($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Besar Baru"));
            $query->where("kategori", "Biaya");
        });

        $query->unless($kendaraanBaru, function (Builder $query) use ($jbb, $jatuh_tempo) {
            $query->where("item", "!=", "Pembubuhan Nomor Uji")
                ->where("item", "!=", "Biaya Uji Kend. Besar Baru")
                ->where("item", "!=", "Biaya Uji Kend. Kecil Baru");

            $query->when($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Kecil"));
            $query->unless($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Besar"));
            $query->when($jatuh_tempo < date("Y-m-d"), function (Builder $query) use ($jbb) {
                $query->when($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Denda Retribusi Kend. Kecil"));
                $query->unless($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Denda Retribusi Kend. Besar"));
            });
            $query->unless($jatuh_tempo < date("Y-m-d"), fn (Builder $query) => $query->where("kategori", "Biaya"));
        });
    }

    public function detail_pembayaran()
    {
        return $this->hasMany(DetailPembayaran::class);
    }
}
