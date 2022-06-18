<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerkKendaraan extends Model
{
    use HasFactory;

    protected $table = "merk_kendaraan";
    protected $guarded = ["id"];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }

    public function tipe_kendaraan()
    {
        return $this->hasMany(TipeKendaraan::class);
    }
}
