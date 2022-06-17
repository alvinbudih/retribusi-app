<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;

    protected $table = "akun";
    protected $guarded = ["id"];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function detail_pembayaran()
    {
        return $this->hasMany(DetailPembayaran::class);
    }

    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }
}
