<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = "kendaraan";
    protected $guarded = ["id"];

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
