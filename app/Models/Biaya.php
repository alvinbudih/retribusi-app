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

    public function scopeRequired(Builder $query, bool $kendaraanBaru, int $jbb)
    {
        $query->where("jenis", "Reguler");

        $query->when($kendaraanBaru, function (Builder $query) use ($jbb) {
            $query->where("item", "!=", "Biaya Uji Kend. Besar")
                ->where("item", "!=", "Biaya Uji Kend. Kecil");

            $query->when($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Kecil Baru"));
            $query->unless($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Besar Baru"));
            $query->where("kategori", "Biaya");
        });

        $query->unless($kendaraanBaru, function (Builder $query) use ($jbb) {
            $query->where("item", "!=", "Pembubuhan Nomor Uji")
                ->where("item", "!=", "Biaya Uji Kend. Besar Baru")
                ->where("item", "!=", "Biaya Uji Kend. Kecil Baru");

            $query->when($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Kecil"));
            $query->unless($jbb >= 5500, fn (Builder $query) => $query->where("item", "!=", "Biaya Uji Kend. Besar"));
            $query->where("kategori", "Biaya");
        });
    }

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function detail_pembayaran()
    {
        return $this->hasMany(DetailPembayaran::class);
    }
}
