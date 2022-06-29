<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = "pendaftaran";
    protected $guarded = ["id"];

    public function scopeIsRegisteredToday($query, $no_uji)
    {
        return $query->where("tgl_daftar", date("Y-m-d"))
            ->whereHas("kendaraan", fn ($query) => $query->where("no_uji", $no_uji))->exists();
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function status_uji()
    {
        return $this->belongsTo(StatusUji::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
