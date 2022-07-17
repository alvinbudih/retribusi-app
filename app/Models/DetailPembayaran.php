<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;

    protected $table = "detail_pembayaran";
    protected $fillable = ["pembayaran_id", "biaya_id", "jumlah_biaya", "biaya_satuan", "subtotal"];

    public function getRouteKeyName()
    {
        return "biaya_id";
    }

    public function biaya()
    {
        return $this->belongsTo(Biaya::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
