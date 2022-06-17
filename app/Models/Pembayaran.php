<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayaran";
    protected $guarded = ["id"];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function akun()
    {
        return $this->belongsTo(Akun::class);
    }
}
