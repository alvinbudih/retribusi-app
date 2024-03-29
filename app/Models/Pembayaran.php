<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayaran";
    protected $guarded = ["id"];
    protected $with = ["pendaftaran", "user"];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }

    public function detail_pembayaran()
    {
        return $this->hasMany(DetailPembayaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
