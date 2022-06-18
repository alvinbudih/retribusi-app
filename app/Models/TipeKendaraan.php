<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeKendaraan extends Model
{
    use HasFactory;

    protected $table = "tipe_kendaraan";
    protected $guarded = ["id"];

    public function merk_kendaraan()
    {
        return $this->belongsTo(MerkKendaraan::class);
    }
}
