<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = "pendaftaran";
    protected $guarded = ["id"];

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
