<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;

    protected $table = "biaya";
    protected $guarded = ["id"];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function detail_pembayaran()
    {
        return $this->hasMany(DetailPembayaran::class);
    }
}