<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = "kendaraan";
    protected $guarded = ["id"];
    protected $with = ["pemilik", "jenis_kendaraan", "tipe_kendaraan"];

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters["periode"] ?? false, function (Builder $query, $periode) {
            return $query->whereHas("jenis_kendaraan", function (Builder $query) use ($periode) {
                $periode = explode("-", $periode);
                $tglAwal = date("Y-m-d", strtotime($periode[0]));
                $tglAkhir = date("Y-m-d", strtotime($periode[1]));

                $query->whereBetween("awal_daftar", [$tglAwal, $tglAkhir]);
            });
        });

        $query->when($filters["jenisKendaraan"] ?? false, function (Builder $query, $jenisKendaraan) {
            return $query->whereHas("jenis_kendaraan", fn (Builder $query) => $query->where("id", $jenisKendaraan));
        });
    }

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class);
    }

    public function jenis_kendaraan()
    {
        return $this->belongsTo(JenisKendaraan::class);
    }

    public function tipe_kendaraan()
    {
        return $this->belongsTo(TipeKendaraan::class);
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
